from flask_sqlalchemy import SQLAlchemy

# Cria uma instância do SQLAlchemy
db = SQLAlchemy()

# Importa os modelos definidos em outros arquivos
from .fornecedor import Fornecedor
from .usuario import Usuario
from .produto import Produto  # Certifique-se de que Produto é importado corretamente
