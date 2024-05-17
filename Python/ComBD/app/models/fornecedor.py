from app.models import db

class Fornecedor(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    fornecedor = db.Column(db.String(100), nullable=False)
    telefone = db.Column(db.String(20), nullable=False)
    revendedor = db.Column(db.String(100), nullable=False)
