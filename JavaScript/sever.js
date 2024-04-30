const authController = require('./controllers/authController'); 

app.use(bodyParser.urlencoded({ extended: true })); 
app.use(express.static('public')); 

app.get('/', (req, res) => { 
 res.sendFile(__dirname + '/views/login.html'); 
}); 

app.post('/login', loginController.login); 

const PORT = process.env.PORT || 3000; 
app.listen(PORT, () => console.log('Server running on port ${PORT}'));