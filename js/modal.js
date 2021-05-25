/* THIS SCRIPT WILL BE USE ON EVERY PAGE THAT HAS LOGIN/REGISTER NAVBAR EXCEPT FOR HOMEPAGE */
const register = document.getElementById("register");
const login = document.getElementById("login");

const register_modal = document.getElementById('register_modal');
const login_modal = document.getElementById('login_modal');

const closeRegister = document.getElementById('closeRegister');
const closeLogin = document.getElementById('closeLogin');

register.addEventListener('click', () => {
    register_modal.classList.add('show');  
});

login.addEventListener('click', () => {
    login_modal.classList.add('show');
});

closeRegister.addEventListener('click', () => {
    register_modal.classList.remove('show');
});

closeLogin.addEventListener('click', () => {
    login_modal.classList.remove('show');
});

window.addEventListener('click', () => {
    if (event.target == register_modal) {
        register_modal.classList.remove('show');
    }else if(event.target == login_modal){
        login_modal.classList.remove('show');
    }
});



