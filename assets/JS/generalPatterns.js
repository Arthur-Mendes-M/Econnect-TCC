// Adicionando nomes aos incones do menu lateral (desktop)

let WidthWindow = window.innerWidth;
let minWidthWindow = 901;

if(WidthWindow >= minWidthWindow) {
    insertLinkName()
}

function insertLinkName() {
    let allLinksSide = document.querySelectorAll("#bottomMenu .link")

    allLinksSide.forEach(link => {
        let elementName = document.createElement('h4')
        elementName.className = 'skeleton';
        let linkName = '';
        
        let classLink = link.classList[1];

        switch (classLink) {
            case 'home':
                linkName = 'Início'
                break;
            case 'map':
                linkName = 'Mapa'
                break;
            case 'denounce':
                linkName = 'Denúncias'
                break;
            case 'perfil':
                linkName = 'Perfil'
                break;
            case 'settings':
                linkName = 'Configurações'
                break;
            default:
                console.log('erro')
            break;
        }

        elementName.innerText = linkName
        link.appendChild(elementName)
    })
}

// Preloader

let html = document.querySelector('html')
let preloaderContainer = document.getElementById('preloader')

window.setTimeout(() => {
    skeleton()

    let pathFile = window.location.pathname.split('/').pop()

    if(window.location.pathname.includes('index.php') || pathFile.length == 0) {
        preloader()
    }
}, 2200)

function preloader() {
    preloaderContainer.style.display = "none";
}

// Skeleton preloader

let allSkeletonElements = document.querySelectorAll('.skeleton')

function skeleton() {
    html.style.overflow = "auto";

    allSkeletonElements.forEach(element => {
        element.classList.remove('skeleton')
    })
}

// Adicionando estilo ao link correspondente a página atual

window.addEventListener("load", () => {
    let windowLocation = window.location.pathname;
    let allLinksBottomMenu = document.querySelectorAll("#bottomMenu a")

    checkPageAndActiveLink(windowLocation, allLinksBottomMenu);
})

function checkPageAndActiveLink(pathName, links) {

    let pathFile = pathName.split('/').pop()

    if(pathFile.length == 0 || pathFile == 'index.php') {
        for(let link of links) {
            if(link.classList[1] === 'home') {
                link.classList.add('active')
            }
        }
    } else {
        links.forEach(link => {
            if(link.href.includes(pathName)) {
                link.classList.add("active")
            }
        })
    }

    console.log(pathName)

    if(pathName.includes('complaintsTimeLine.php')) {
        links[2].classList.add('subActive')
    }
}

// Dark/light theme

let themeButtons = document.querySelectorAll(".changeThemeContainer .theme")

themeButtons.forEach(themeButton => {
    themeButton.addEventListener('click', () => {
        changeTheme(themeButton.classList[1])
    })
})

let appliedTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : 'dark';

changeTheme(appliedTheme)

function changeTheme(theme) {
    themeButtons.forEach(btn => {
        btn.classList.remove('active')

        if (btn.classList[1] == theme) {
            btn.classList.add('active')
        }
    })

    if(theme === 'dark') {
        html.className = ''
        appliedTheme = 'dark'

        localStorage.setItem('theme', 'dark')
    } else if(theme === 'light') {
        appliedTheme = 'light'
        html.className = 'lightTheme'

        localStorage.setItem('theme', 'light')
    }
}

// console.log(markers)


let allAriaBot = document.querySelectorAll('[aria-bot]')

allAriaBot.forEach(element => {
    element.addEventListener('click', () => {
        if(element.getAttribute('aria-bot') == 'action-alternatePage') {
            window.location.href = 'map.php'
        } else {
            let botContainer = document.querySelector('.botContainer')
            let botMobile = window.getComputedStyle(botContainer).display == 'none' ? true : false

            if(!botMobile) {
                commandInput.value = element.getAttribute('aria-bot')
                submitForms()
            } else {
                window.location.href = `perfil.php?botAction=${element.getAttribute('aria-bot')}`
            }
        }
        
    })
})