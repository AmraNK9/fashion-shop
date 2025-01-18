const header = document.querySelector("header");
window.addEventListener ("scroll",function(){
    header.classList.toggle("sticky",window.scrollY > 0);
});

const loginButton = document.getElementById('login-button')
const loginModal = document.getElementById('login')
loginButton.onclick = e=>{
    loginModal.style.display = 'flex'
}

const closeLoginButton = document.getElementById('close-login')
closeLoginButton.onclick = e=>{
    loginModal.style.display = 'none'
}


document.getElementById('submitBtn').addEventListener('click', function() {
    const emailInput = document.getElementById('emailInput').value;
    
    if (!emailInput) {
        alert('Please enter your email address.');
    } else {
        alert('Email successfully submitted!');
    }
});