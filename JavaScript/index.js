const express = require('express'); 
const app = express(); 
const port = 3000; 

// Middleware para analisar o corpo da requisição (req.body)
app.use(express.json()); 

// Rota para a página de login
app.get('/login', (req, res) => { 
 res.sendFile(__dirname + '/public/login.html'); 
}); 

// Rota para autenticação
app.post('/login', (req, res) => { 
 const { usuario, senha } = req.body; 

 if (usuario === 'Admin' && senha === '123456') { 
    res.redirect('/boas-vindas'); 
 } else { 
    res.send(`
        <html>
            <head><title>Erro de login</title></head>
            <body>
                <h1>Senha e usuário errados!</h1>
                <p>Aguarde 15 segundos para ser redirecionado para a página de login.</p>
            </body>
        </html>
    `); 

    setTimeout(() => { 
        res.redirect('/login'); 
    }, 15000); 
 } 
}); 

// Rota para página de boas-vindas
app.get('/boas-vindas', (req, res) => { 
 res.sendFile(__dirname + '/public/boas-vindas.html'); 
}); 
// Servindo arquivos estáticos
app.use(express.static(__dirname + '/public')); 

app.listen(port, () => { 
 console.log(`Servidor em execução na porta ${port}`); 
}); 
