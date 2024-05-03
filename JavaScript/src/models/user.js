class User {
    constructor(username, password) {
        this.username = username;
        this.password = password;
    }

    validate() {
        // Aqui você deve adicionar a lógica de validação do usuário
        // Por exemplo:
        return this.username === 'Admin' && this.password === '123456';
    }
}

module.exports = User;
