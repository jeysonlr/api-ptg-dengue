
function onSubmit() {
    console.log(nome = document.getElementById("nome").value)
    console.log(email = document.getElementById('email').value)
    console.log(senha = document.getElementById('senha').value)
    console.log(cpf = document.getElementById('cpf').value)
    console.log(rg = document.getElementById('rg').value)
    console.log(estado = document.getElementById('estado').value)
    console.log(cidade = document.getElementById('cidade').value)
    console.log(bairro = document.getElementById('bairro').value)
    console.log(endereco = document.getElementById('endereco').value)
    console.log(telefone = document.getElementById('telefone').value)

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
