const express = require('express');
const router = express.Router();

router.get('/', (req, res) => {
    res.sendFile(__dirname + './public/view/inicio.html');
});

router.post('/', (req, res) => {
    const { username, password } = req.body;

    if (username === 'Admin' && password === '123456') {
        res.sendFile(__dirname + './public/view/welcome.html');
    } else {
        setTimeout(() => {
            res.redirect('/');
        }, 5000);
        }
});

module.exports = router;
