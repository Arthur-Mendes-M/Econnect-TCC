let fileTrashPoint = document.getElementById('fileTrashPoint')

fileTrashPoint.addEventListener('change', () => {

    let inputValue = fileTrashPoint.value
    let extensionFile = inputValue.split('.')[1]

    if(extensionFile == 'png' || extensionFile == 'jpg' || extensionFile == 'jpeg') {
        fileTrashPoint.parentNode.style.border = '2px solid'
        fileTrashPoint.parentNode.style.borderColor = 'var(--green)'
    } else {
        fileTrashPoint.parentNode.style.border = '2px solid'
        fileTrashPoint.parentNode.style.borderColor = 'var(--dangerColor)'
    }
})

window.addEventListener('load', () => {
    let searchPage = window.location.search.split('?')[1]

    if(searchPage) {
        switch (searchPage) {
            case 'Success':
                createCustomAlert('Denúncia cadastrada com sucesso!', 'green', 'Caso queira dar uma olhada em todas as denúncias cadastradas, clique no botão "Ver denúncias")', 8000)
                break;
            case 'ExtensionFile':
                createCustomAlert('Falha ao subir arquivo de midia.', 'red', 'Favor utilize arquivos de imagem com extensão [JPG, JPEG ou PNG]', 6000)
                break;
            case 'userNotLoged':
                createCustomAlert('Usuário não logado', 'red', 'Para que seja possivel criar a denúncia, precisamos que você esteja logado.', 6000)
                break;
            default:
                createCustomAlert('Ops :/', 'yellow', 'Algo deu errado. Tente novamente, caso o erro persista, logo iremos resolver :)', 6000)
                break;
        }
    }
})