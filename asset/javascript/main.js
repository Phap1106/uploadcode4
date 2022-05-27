
function open_form_sign_up(){
    const form_sign = document.querySelector('.sign_up')
    form_sign.classList.add('open')
}
function open_form_sign_in(){
    const form = document.querySelector('.sign_in')
    form.classList.add('open')
}


function close_form_sign_up () {
    const form_sign = document.querySelector('.sign_up')
    form_sign.classList.remove('open')
    
   
}
function close_form () {
    const form = document.querySelector('.sign_in')
    form.classList.remove('open')
    
   
}
function open_form_update(){
    const form_update = document.querySelector('.update')
    form_update.classList.add('open')
}

function close_form_update () {
    const form_update = document.querySelector('.update')
    form_update.classList.remove('open')
    
   
}