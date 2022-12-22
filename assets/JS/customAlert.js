function createCustomAlert(title = 'Ação realizada com sucesso!', borderColor = 'green', subtitle = '', timeMileseconds = 3000) {
    let alertContainer = document.createElement('div');
    alertContainer.style.zIndex = '10000000000000000'
    alertContainer.style.position = 'fixed'
    alertContainer.style.inset = '0'
    alertContainer.style.padding = '1rem 2rem'
    alertContainer.style.margin = '1rem'
    alertContainer.style.backgroundColor = 'var(--backgroundColor)'
    alertContainer.style.color = 'var(--color)'
    alertContainer.style.border = `2px solid ${borderColor}`
    alertContainer.style.borderRadius = '.5rem'
    alertContainer.style.maxHeight = 'fit-content'
    alertContainer.style.width =  'fit-content'
    alertContainer.style.maxWidth =  '100%'
    alertContainer.style.transform = 'translateX(-100%)'
    alertContainer.style.transition = 'all .3s linear'
    alertContainer.style.fontFamily = 'Poppins light'
    alertContainer.style.animation = 'transformeX .3s normal forwards'

    alertContainer.style.textAlign = 'center'

    let titleElement = document.createElement('h2')
    titleElement.textContent = title

    alertContainer.appendChild(titleElement)

    if(subtitle && subtitle != 'none') {
        let subtitleElement = document.createElement('p')
        subtitleElement.style.maxWidth = '400px'
        subtitleElement.textContent = subtitle

        alertContainer.appendChild(subtitleElement)
    }

    if(timeMileseconds == 'none') {
        let confirmButton = document.createElement('button')
        confirmButton.type = 'button'
        confirmButton.style.border = 'none'
        confirmButton.style.background = 'none'
        confirmButton.style.border = `2px solid ${borderColor}`
        confirmButton.style.borderRadius = `.5rem`
        confirmButton.style.padding = '1rem 1.5rem'
        confirmButton.style.color = 'var(--color)'
        confirmButton.style.marginTop = '1rem'
        confirmButton.style.transition = 'all .2s linear'
        confirmButton.style.cursor = 'pointer'
        confirmButton.style.fontFamily = 'Inter light'

        confirmButton.textContent = 'Confirmar'


        confirmButton.addEventListener('mouseover', () => {
            confirmButton.style.color = 'var(--green)'
            confirmButton.style.borderColor = 'var(--color)' 
        })

        confirmButton.addEventListener('mouseout', () => {
            confirmButton.style.color = 'var(--color)'
            confirmButton.style.borderColor = borderColor
        })

        confirmButton.addEventListener('click', () => {
            alertContainer.style.display = 'none'
        })

        alertContainer.appendChild(confirmButton)
    } else {
        setTimeout(() => {
            alertContainer.style.display = 'none'
        }, timeMileseconds)
    }

    document.body.appendChild(alertContainer)
}