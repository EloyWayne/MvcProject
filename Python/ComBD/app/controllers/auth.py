from flask import session
from app.models.usuario import Usuario

def authenticate(username, password):
    user = Usuario.query.filter_by(usuario=username).first()
    if user and user.verificar_senha(password):  # Verifica a senha usando o método seguro
        session['username'] = username
        session['user_type'] = user.tipo
        return True
    return False

def logout():
    session.pop('username', None)
    session.pop('user_type', None)
