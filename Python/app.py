from flask import Flask, render_template, redirect, request, url_for
from models.user import User
from controllers.login_controller import login

app = Flask(__name__) 

# Rota para a página de login
@app.route('/') 
def index(): 
 return render_template('login.html') 

# Rota para a página de boas-vindas
@app.route('/welcome') 
def welcome(): 
 return render_template('welcome.html') 

# Rota para a página de erro
@app.route('/error') 
def error(): 
 return render_template('error.html') 

# Rota para lidar com a submissão do formulário de login
@app.route('/login', methods=['POST']) 
def submit_login(): 
 return login() 
if __name__ == '__main__': 
 app.run(debug=True) 