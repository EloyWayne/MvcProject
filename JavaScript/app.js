const express = require('express');
const authController = require('./src/controllers/authController'); 

const app = express(); 
const port = 3000; 

app.use(express.urlencoded({ extended: true })); 
app.use(express.json()); 

app.get('/', (req, res) => { 
 res.sendFile(__dirname + '/src/public/view/inicio.html'); 
}); 

app.get('/login', (req, res) => { 
 res.sendFile(__dirname + '/src/public/view/inicio.html'); 
}); 

app.post('/login', authController.authenticate); 

app.listen(port, () => { 
 console.log(`Servidor em execução na porta ${port}`); 
});