const path = require('path'); 

function authenticate(req, res) { 
 const { username, password } = req.body; 

 if (username === 'Admin' && password === '123456') { 
 res.sendFile(path.join(__dirname, '..', 'view', 'welcome.html')); 
 } else { 
 setTimeout(() => { 
 res.redirect('/login'); 
 }, 5000); 
 res.sendFile(path.join(__dirname, '..', 'view', 'error.html')); 
 } 
} 

module.exports = { 
 authenticate
}; 