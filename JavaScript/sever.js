const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const PORT = process.env.PORT || 3000;

// Importando o controlador de autenticação
const loginController = require('./controllers/loginController');

// Middleware para analisar o corpo da requisição (req.body)
app.use(bodyParser.urlencoded({ extended: true }));

// Servindo arquivos estáticos da pasta 'public'
app.use(express.static('public'));

// Rota para a página de login
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/view/login.html');
});

// Rota para lidar com a submissão do formulário de login
app.post('/login', loginController.login);

// Iniciando o servidor
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
