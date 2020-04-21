// Requisição de post para salvar denuncia no banco de dados

function onSubmit() {
    let endereco = document.getElementById('endereco').value
    let imagem = encodeImageFileAsURL()
    let descricao = document.getElementById('descricao').value

    const data = {
        endereco: endereco,
        imagem: imagem,
        descricao: descricao
    }
    postDenuncia(data)
}

function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("imagem").files;
    if (filesSelected.length > 0) {
        var fileToLoad = filesSelected[0];

        var fileReader = new FileReader();

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // <--- data: base64

            var newImage = document.createElement('img');
            newImage.src = srcData;

            document.getElementById("imgTest").innerHTML = newImage.outerHTML;
            var imagem = document.getElementById("imgTest").innerHTML;

            // Replace para remover propriedade  <img src="data:image/jpeg;base64,"> da foto 
            image = imagem.replace('<img src="data:image/jpeg;base64,', '')
            imageBase64 = image.replace('">', '')
        }
        fileReader.readAsDataURL(fileToLoad);
        return imageBase64
    }
}

var config = {
    header: {
        'Content-Type': 'application/json'
    }
}

function postDenuncia(data) {
    axios.post(
        'http://localhost:8080/v1/denunciadengue',
        data,
        config,
    ).then(response => {
        alert(response.data.data)
        window.location.replace("postDenunciaDengue.html")
    }).catch(err => {
        alert("Ocorreu um erro ao inserir sua denuncia " + err.error)
    })
}
