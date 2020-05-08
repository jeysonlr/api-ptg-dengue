function onSubmit() {
    nome = document.getElementById("nome").value
    email = document.getElementById('email').value
    senha = document.getElementById('senha').value
    cpf = document.getElementById('cpf').value
    rg = document.getElementById('rg').value
    estado = document.getElementById('estado').value
    cidade = document.getElementById('cidade').value
    bairro = document.getElementById('bairro').value
    endereco = document.getElementById('endereco').value
    telefone = document.getElementById('telefone').value

    const data = {
        nome: nome,
        email: email,
        senha: senha,
        cpf: cpf,
        rg: rg,
        estado: estado,
        cidade: cidade,
        bairro: bairro,
        endereco: endereco,
        telefone: parseInt(telefone)
    }
    postUsuario(data)
}

var config = {
    header: {
        'Content-Type': 'application/json'
    }
}

function postUsuario(data) {
    axios.post(
        'http://localhost:8080/v1/usuariodengue',
        data,
        config,
    ).then(response => {
        window.location.replace("postDenunciaDengue.html")
        alert(response.data.data)
    }).catch(err => {
        alert("Ocorreu erro ao salvar dados de usuario " + err.error)
    })
}
