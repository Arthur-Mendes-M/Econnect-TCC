window.addEventListener('load', () => {
    let searchPage = window.location.search.split('?')[1]

    if(searchPage) {
        switch (searchPage) {
            case 'userNotLoged':
                createCustomAlert('Usuário não logado', 'red', 'Você não está logado. Para poder engajar essa denúncia, precisamos que faça login.', 8000)
                break;
            case 'ReportNoLongerExists':
                createCustomAlert('Usuário inexistente', 'blue', 'O usuário que criou essa denúncia apagou a própria conta. Não é possível acessar seus detalhes, porém ainda é possivel engajala para que possamos encaminhar à prefeitura.', 8000)
                break;
            default:
                createCustomAlert('Ops :/', 'yellow', 'Algo deu errado. Tente novamente, caso o erro persista, logo iremos resolver :)', 6000)
                break;
        }
    }
})