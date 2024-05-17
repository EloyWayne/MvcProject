from flask import render_template, redirect, url_for, session, request
from app.controllers.auth import authenticate, logout  # Importe a função authenticate corretamente
from app.models.fornecedor import Fornecedor  # Importe o modelo Fornecedor
from app.models.produto import Produto  # Corrigido de Produto para produto
from app.models import db  # Importe o objeto db do módulo app.models
from . import routes_bp  # Certifique-se de que routes_bp está definido no __init__.py de routes

# Rota para a página inicial
@routes_bp.route('/')
def index():
    return render_template('login.html')

# Rota para a autenticação do usuário
@routes_bp.route('/auth', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']
        if authenticate(username, password):  # Chama a função authenticate corretamente
            print("Autenticação bem-sucedida")
            return redirect(url_for('routes_bp.welcome'))  # Redireciona para /welcome se a autenticação for bem-sucedida
        else:
            return render_template('login.html', error="Invalid username or password")
    else:
        return render_template('login.html')

# Rota para a página de boas-vindas
@routes_bp.route('/welcome')
def welcome():
    if 'username' in session:
        return render_template('welcome.html', username=session['username'], user_type=session['user_type'])
    else:
        return redirect(url_for('routes_bp.login'))

# Rota para logout do usuário
@routes_bp.route('/logout')
def logout_view():
    logout()  # Chama a função logout corretamente
    return redirect(url_for('routes_bp.login'))

# Rota para a página de fornecedores
@routes_bp.route('/fornecedores')
def fornecedores():
    fornecedores = Fornecedor.query.all()  # Buscar todos os fornecedores do banco de dados
    return render_template('fornecedores.html', fornecedores=fornecedores)

@routes_bp.route('/editar_fornecedor/<int:fornecedor_id>')
def edit_fornecedor(fornecedor_id):
    fornecedor = Fornecedor.query.get_or_404(fornecedor_id)  # Buscar o fornecedor com o ID fornecido
    return render_template('editar_fornecedor.html', fornecedor=fornecedor, fornecedor_id=fornecedor_id)

@routes_bp.route('/atualizar_fornecedor/<int:fornecedor_id>', methods=['POST'])
def update_fornecedor(fornecedor_id):
    fornecedor = Fornecedor.query.get_or_404(fornecedor_id)  # Buscar o fornecedor com o ID fornecido
    # Atualizar os campos do fornecedor com os dados do formulário enviado
    fornecedor.Fornecedor = request.form['Fornecedor']
    fornecedor.telefone = request.form['telefone']
    fornecedor.revendedor = request.form['revendedor']
    # Salvar as alterações no banco de dados
    db.session.commit()
    # Redirecionar de volta para a página de fornecedores após a atualização
    return redirect(url_for('routes_bp.fornecedores'))

@routes_bp.route('/detalhes_fornecedor/<int:fornecedor_id>', methods=['GET', 'POST'])
def detalhes_fornecedor(fornecedor_id):
    fornecedor = Fornecedor.query.get_or_404(fornecedor_id)
    return render_template('detalhes_fornecedor.html', fornecedor=fornecedor)

@routes_bp.route('/delete_fornecedor/<int:fornecedor_id>', methods=['POST'])
def delete_fornecedor(fornecedor_id):
    fornecedor = Fornecedor.query.get_or_404(fornecedor_id)
    db.session.delete(fornecedor)  # Excluir o fornecedor do banco de dados
    db.session.commit()
    return redirect(url_for('routes_bp.fornecedores'))

@routes_bp.route('/cadastrar_fornecedor', methods=['GET', 'POST'])
def cadastrar_novo_fornecedor():
    if request.method == 'POST':
        nome_fornecedor = request.form['Fornecedor']
        telefone = request.form['telefone']
        revendedor = request.form['revendedor']
        # Criar um novo objeto Fornecedor com os dados fornecidos
        novo_fornecedor = Fornecedor(Fornecedor=nome_fornecedor, telefone=telefone, revendedor=revendedor)
        # Adicionar o novo fornecedor ao banco de dados
        db.session.add(novo_fornecedor)
        db.session.commit()
        return redirect(url_for('routes_bp.fornecedores'))
    return render_template('cadastrar_fornecedor.html')

@routes_bp.route('/search_fornecedor', methods=['GET', 'POST'])
def search_fornecedor():
    if request.method == 'POST':
        search_term = request.form['search']
        fornecedores = Fornecedor.query.filter(Fornecedor.Fornecedor.like(f'%{search_term}%')).all()
        return render_template('fornecedores.html', fornecedores=fornecedores)
    return render_template('search_fornecedor.html')

@routes_bp.route('/produtos')
def render_produtos():
    # Consulta SQL para obter todos os produtos com seus fornecedores
    produtos = db.session.query(
        Produto.id.label('IdProduto'),
        Produto.produto.label('Produto'),
        Fornecedor.Fornecedor.label('Fornecedor'),
        Fornecedor.telefone.label('Telefone'),
        Fornecedor.revendedor.label('Revendedor')
    ).join(Fornecedor).all()
    return render_template('produtos.html', produtos=produtos)

@routes_bp.route('/encontra_produto', methods=['GET', 'POST'])
def encontra_produto():
    if request.method == 'POST':
        search_term = request.form['nome_produto']
        # Consulta SQL para encontrar produtos com base no termo de pesquisa
        produtos = db.session.query(
            Produto.id.label('IdProduto'),
            Produto.produto.label('Produto'),
            Fornecedor.Fornecedor.label('Fornecedor'),
            Fornecedor.telefone.label('Telefone'),
            Fornecedor.revendedor.label('Revendedor')
        ).join(Fornecedor).filter(
            Produto.produto.ilike(f'%{search_term}%')  # Filtrar produtos que contenham o termo de pesquisa
        ).all()
        return render_template('produtos.html', produtos=produtos)
    return render_template('encontra_produto.html')
