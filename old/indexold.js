const loginBtn = document.querySelector('.login-btn');
const username = document.querySelector('.username');
const password = document.querySelector('.password');

loginBtn.addEventListener('click', (e) => {
e.preventDefault();
if (username.value === '' || password.value === '') {
alert('Debe ingresar un usuario y una contraseña');
} else {
document.querySelector('.login').submit();
}
});


