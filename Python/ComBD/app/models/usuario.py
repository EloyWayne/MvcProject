from . import db
from werkzeug.security import generate_password_hash, check_password_hash

class Usuario(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    usuario = db.Column(db.String(15), unique=True, nullable=False)
    senha_hash = db.Column(db.String(255), nullable=False)
    tipo = db.Column(db.String(255), nullable=False)

    @property
    def senha(self):
        raise AttributeError('senha não é um atributo legível')

    @senha.setter
    def senha(self, senha):
        self.senha_hash = generate_password_hash(senha)

    def verificar_senha(self, senha):
        return check_password_hash(self.senha_hash, senha)

    def __repr__(self):
        return f"<Usuario {self.usuario}>"
