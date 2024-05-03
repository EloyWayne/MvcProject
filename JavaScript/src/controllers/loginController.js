const User = require('../models/user'); 

const login = (req, res) => { 
 const { username, password } = req.body; 

 const user = new User(username, password); 

 if (user.validate()) { 
 res.redirect('/welcome'); 
 } else { 
 res.redirect('/error'); 
 } 
}; 

module.exports = { 
 login, 
}; 
