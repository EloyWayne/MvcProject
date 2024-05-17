from app.models import db

class Produto(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    produto = db.Column(db.String(255), nullable=False)
    idfornecedor = db.Column(db.Integer, db.ForeignKey('fornecedor.id'), nullable=False)
    
    # Define o relacionamento com o fornecedor
    fornecedor = db.relationship('Fornecedor', backref=db.backref('produtos', lazy=True))
    
    def __repr__(self):
        return f"<Produto {self.produto}>"
