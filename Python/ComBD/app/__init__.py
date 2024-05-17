from flask import Flask
from .models import db
from .routes import routes_bp

def create_app():
    app = Flask(__name__)
    app.secret_key = 'your_secret_key'
    app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://teste:teste2024@localhost/teste'
    app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
    
    # Inicializa o banco de dados
    db.init_app(app)
    
    # Registra o Blueprint das rotas
    app.register_blueprint(routes_bp)
    
    return app
