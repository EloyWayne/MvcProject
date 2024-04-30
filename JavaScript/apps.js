const express = require('express'); 
/* import routes from "./routes"; */

/* const authRouter = require('routers'); */

const authController = require('./controllers/authController'); 
const app = express(); 
const port = 3000; 

app.use(express.urlencoded({ extended: true })); 

// Middleware para analisar o corpo da requisição (req.body)
app.use(express.json()); 

app.get('/', (req, res) => { 
 res.sendFile(__dirname + '/views/inicio.html'); 
}); 

app.get('/login', (req, res) => { 
 res.sendFile(__dirname + '/views/inicio.html'); 
}); 

app.post('/login', authController.authenticate); 

app.listen(port, () => { 
 console.log(`Servidor em execução na porta ${port}`); 
}); 
