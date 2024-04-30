# controllers/login_controller.py
from flask import redirect, request, url_for

# Função para validar o login
def login(): 
 username = request.form['username'] 
 password = request.form['password'] 
 
 # Simula a autenticação, substitua pela lógica real
 if username == 'Admin' and password == '123456': 
        return redirect(url_for('welcome')) 
 else: 
        return redirect(url_for('error')) 