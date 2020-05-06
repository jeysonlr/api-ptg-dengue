var config = {
    header: {
        'Content-Type': 'application/json'
    }
}

getDenuncias()

function getDenuncias() {
    axios.get('http://localhost:8080/v1/denunciasdengue',
        config
    ).then(response => {
        return populateTable(response.data.data)
    }).catch(err => {
        alert("Ocorreu erro ao buscar denuncias " + err.error)
        console.log(err)
    })
}

function populateTable(data) {
    var html = '';
    for (let i = 0; i < data.length; i++) {
        html += "<tr style='border-radius: 10px;'>";
            html += "<td style='border: 1px solid #000000; border-radius: 10px; text-align: center;'>" + data[i].endereco + '</td>';
            html += "<td style='border: 1px solid #000000; text-align: center;'>" + data[i].estado + '</td>';
            html += "<td style='border: 1px solid #000000; text-align: center;'>" + data[i].cidade + '</td>';
            html += "<td style='border: 1px solid #000000; text-align: center;'>" + data[i].descricao + '</td>';
            html += "<td style='border: 1px solid #000000; text-align: center;'>" + "<img src='data:image/jpeg;base64, " + data[i].imagem + "' width='120' height='120'/>" + '</td>';
        html += '</tr>';
    }
    document.getElementById("corpoTabela").innerHTML = ""
    document.getElementById("corpoTabela").innerHTML = html
}
