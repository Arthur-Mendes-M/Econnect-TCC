let botLink = document.getElementById('botIcon')

if(botLink) {
    let chat = document.querySelector('#botLink .chat')

    botLink.addEventListener('click', () => {
        chat.classList.toggle('show')
    })
}


let chatScreen = document.querySelector(".chatScreen")
let firstChildChat = chatScreen.children[0]

let commandInput = document.getElementById("commandInput")
let commandForms = document.getElementById("sendCommand").parentElement

let answerTitleElement = document.createElement('h4')

let answerElementList = document.createElement('ul')
answerElementList.style.display = "flex"
answerElementList.style.flexDirection = "column"
answerElementList.style.alignItems = "flex-start"
answerElementList.style.justifyContent = "flex-start"
answerElementList.style.gap = "1rem"

let closeBot = document.getElementById('closeBot')

if(closeBot) {
    closeBot.addEventListener('click', () => {
        closeBot.parentElement.classList.toggle('show')
    })
}

commandForms.addEventListener('submit', () => {
    event.preventDefault()
    submitForms()
})

function submitForms() {
    if(commandInput.value != '') {
        question(commandInput.value.toLowerCase())
    } else {
        chatScreen.innerHTML = ''
        if(firstChildChat) {
            chatScreen.appendChild(firstChildChat)
        }

        answerTitleElement.innerText = 'Favor, digite um comando válido.'
        answerTitleElement.style.fontStyle = 'Italic'
        chatScreen.appendChild(answerTitleElement)
    }
}

let keyWords = [
    'retirada',
    'descartar',
    'denunciar',
    'ajuda'
]

function question(sentence) {
    validadeQuestion(sentence) ? answer(sentence) : notice()
}

function validadeQuestion(sentence) {
    let request = sentence.split(' ')
    return keyWords.some(el => request.includes(el))
}
 
function answer(sentence) {
    let request = sentence.split(' ')

    keyWords.some(el => {
        if(request.includes(el)) {
            chatScreen.appendChild(answerTitleElement)
            
            let commandKeyWord = el
            
            switch (commandKeyWord) {
                case 'retirada':
                    chatScreen.innerHTML = ''
                    if(firstChildChat) {
                        chatScreen.appendChild(firstChildChat)
                    }

                    answerTitleElement.innerText = 'Opção: solicitar uma retirada'
                    chatScreen.appendChild(answerTitleElement)

                    answerElementList.innerHTML = ''

                    for(i = 0; i < markers.length; i++) {

                        let answerElementListItem = document.createElement('li')

                        answerElementListItem.style.display = "flex"
                        answerElementListItem.style.flexDirection = "column"
                        answerElementListItem.style.alignItems = "flex-start"
                        answerElementListItem.style.justifyContent = "flex-start"
                        answerElementListItem.style.gap = ".7rem"

                        answerElementListItem.style.borderBottom = "1px solid var(--color)"
                        answerElementListItem.style.paddingBottom = ".5rem"
                        
                        let answerElementListItemTitle = document.createElement('h5')

                        answerElementListItemTitle.innerText = markers[i].title
                        answerElementListItemTitle.style.textDecoration = "underline"
            
                        let answerElementSubList = document.createElement('ul')

                        let answerElementSubListItem = document.createElement('li')
                        answerElementSubListItem.style.fontSize = '1rem'

                        if(markers[i].telephone != false) {
                            answerElementSubListItem.innerHTML = `Telefone: ${markers[i].telephone}`
                        } else {
                            answerElementSubListItem.innerHTML = `Sem telefone cadastrado`
                        }

                        
                        answerElementList.appendChild(answerElementListItem)
                        answerElementListItem.appendChild(answerElementListItemTitle)
                        answerElementListItem.appendChild(answerElementSubList)
                        answerElementSubList.appendChild(answerElementSubListItem)

                    }

                    chatScreen.appendChild(answerElementList)

                    break;
                case 'descartar':
                    chatScreen.innerHTML = ''
                    if(firstChildChat) {
                        chatScreen.appendChild(firstChildChat)
                    }

                    answerTitleElement.innerText = 'Opção: descartar resíduos'
                    chatScreen.appendChild(answerTitleElement)

                    answerElementList.innerHTML = ''

                    for(i = 0; i < markers.length; i++) {
                        let answerElementListItem = document.createElement('li')
                        answerElementListItem.style.display = "flex"
                        answerElementListItem.style.flexDirection = "column"
                        answerElementListItem.style.alignItems = "flex-start"
                        answerElementListItem.style.justifyContent = "flex-start"
                        answerElementListItem.style.gap = ".7rem"

                        answerElementListItem.style.borderBottom = "1px solid var(--color)"
                        answerElementListItem.style.paddingBottom = ".5rem"
                        
                        let answerElementListItemTitle = document.createElement('h5')
                        answerElementListItemTitle.innerText = markers[i].title
                        answerElementListItemTitle.style.textDecoration = "underline"
            
                        let answerElementSubList = document.createElement('ul')

                        let answerElementSubListItem = document.createElement('li')
                        answerElementSubListItem.style.fontSize = '1rem'
                        answerElementSubListItem.innerHTML = '<i>Verifique as suas informações na <a href="map.php" class="link">página do mapa</a></i>'

                        
                        answerElementList.appendChild(answerElementListItem)
                        answerElementListItem.appendChild(answerElementListItemTitle)
                        answerElementListItem.appendChild(answerElementSubList)
                        answerElementSubList.appendChild(answerElementSubListItem)

                    }

                    chatScreen.appendChild(answerElementList)

                    break;
                case 'denunciar':
                    chatScreen.innerHTML = ''
                    if(firstChildChat) {
                        chatScreen.appendChild(firstChildChat)
                    }
                    
                    answerTitleElement.innerText = 'Opção: denúnciar local com acúmulo indevido de resíduos'
                    chatScreen.appendChild(answerTitleElement)
                    
                    let subTitleElement = document.createElement('p')
                    subTitleElement.style.fontSize = '1rem'
                    subTitleElement.style.fontStyle = 'italic'
                    subTitleElement.innerText = 'Redirecionando para a página de denúncias...'

                    chatScreen.appendChild(subTitleElement)

                    setTimeout(() => {
                        window.location.href = 'denounce.php'
                    }, 4000)

                    break;
                default:
                    chatScreen.innerHTML = ''
                    if(firstChildChat) {
                        chatScreen.appendChild(firstChildChat)
                    }

                    answerTitleElement.innerText = 'Opção: ajuda'
                    chatScreen.appendChild(answerTitleElement)

                    answerElementList.innerHTML = ''

                    for(i = 0; i < keyWords.length; i++) {
                        if(keyWords[i] != 'ajuda') {
                            let answerElementListItem = document.createElement('li')
                            answerElementListItem.style.fontSize = '1rem'
                            answerElementListItem.innerText = `Caso deseje, digite: ${keyWords[i]}`
                            answerElementList.appendChild(answerElementListItem)
                        }
                    }

                    chatScreen.appendChild(answerElementList)
                    break;
            }

        }
    })
}

function notice() {
    let firstChildChat = chatScreen.children[0]
    chatScreen.innerHTML = ''
    if(firstChildChat) {
        chatScreen.appendChild(firstChildChat)
    }

    answerTitleElement.innerText = 'Opção: ajuda'
    chatScreen.appendChild(answerTitleElement)

    answerElementList.innerHTML = ''

    for(i = 0; i < keyWords.length; i++) {
        if(keyWords[i] != 'ajuda') {
            let answerElementListItem = document.createElement('li')
            answerElementListItem.style.fontSize = '1rem'
            answerElementListItem.innerText = `Caso deseje, digite: ${keyWords[i]}`
            answerElementList.appendChild(answerElementListItem)
        }
    }

    chatScreen.appendChild(answerElementList)
}


