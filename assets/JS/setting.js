let editDataButton = document.getElementById('editDataButton')
let allInps = document.querySelectorAll('.field .input')
let editAccountButton = document.getElementById('editAccount')

let userPhotoInput = document.getElementById('userPhoto');

let userPhotoContainer = document.querySelectorAll('.userPhotoContainer')
let userPhotoForm = document.getElementById('userPhotoForm');
let submitFormUserPhoto = document.getElementById('submitForm');

editDataButton.addEventListener('click', () => {
    allInps.forEach(input => {
        input.toggleAttribute('disabled')
        allInps[0].focus()

        editAccountButton.toggleAttribute('disabled')
    })

    editDataButton.classList.toggle('active')
})

window.addEventListener('load', () => {
    let searchPage = window.location.search.split('?')[1]

    if(searchPage) {
        switch (searchPage) {
            case 'Success':
                createCustomAlert('Dados alterados com sucesso!', 'green', 'none', 5000)
                break;
            case 'UserNotLoged':
                createCustomAlert('Usuário não logado', 'red', 'Para que seja possivel editar seu perfil precisamos que você esteja logado.', 6000)
                break;
            case 'ExtensionFile':
                createCustomAlert('Arquivo de midia incompatível', 'red', 'Favor utilize arquivos de imagem com extesão [JPG, JPEG ou PNG]', 6000)
                break;
            case 'LargeFile':
                createCustomAlert('Arquivo muito grande.', 'red', 'Favor utilize arquivos de imagem com no máximo 2MB', 6000)
                break;
            default:
                createCustomAlert('Ops :/', 'yellow', 'Algo deu errado. Tente novamente, caso o erro persista, logo iremos resolver :)', 6000)
                break;
        }
    }
})

userPhotoInput.addEventListener('change', () => {
    let path = userPhotoInput.value;
    let extensionFile = `.${path.split('.').pop()}`
    
    if(!extensionFile.match(/\.(jpg|jpeg|png)$/i)) {
        createCustomAlert('Arquivo não compativel!', 'red', 'Favor selecionar um arquivo de imagem.');
    } else {
        callHiddenSubmit(submitFormUserPhoto)
    }
})

function callHiddenSubmit(button) {
    button.click()
}


// Validando email e senha

const validateEmail = (email) => {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
};


const validatePassword = (password) => {
    if(password.length < 8 || password.length > 16) {
        return false
    } else {
        return true
    }
}

let passwordSignUp = document.getElementById('passwordSignUp')
let emailSignUp = document.getElementById('emailSignUp')

emailSignUp.addEventListener('keyup', () => {
    if(validateEmail(emailSignUp.value) === false) {
        emailSignUp.style.borderColor = 'red'
    } else { 
        emailSignUp.style.borderColor = 'green'
    }
})

passwordSignUp.addEventListener('keyup', () => {
    if(validatePassword(passwordSignUp.value) === false) {
        passwordSignUp.style.borderColor = 'red'
    } else { 
        passwordSignUp.style.borderColor = 'green'
    }
})

