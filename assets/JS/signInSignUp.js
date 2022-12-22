let forms = document.querySelectorAll('.form')
let toggleButtons = document.querySelectorAll('.toggleButton')
let indicator = document.getElementById('indicator')

toggleButtons.forEach(button => {    
    button.addEventListener('click', () => {

        if(!button.className.includes('active')) {
            for(let btn of toggleButtons) {
                btn.classList.toggle('active')
            }

            forms.forEach(form => {
                form.classList.toggle('active')
            })
        }
    })
})