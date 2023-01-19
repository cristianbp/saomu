
// Form Toggle
const formToggle = document.querySelector('.form-toggle');
const formPanels = document.querySelectorAll('.form-panel');

formToggle.addEventListener('click', () => {
    formPanels.forEach((panel) => {
        panel.classList.toggle('hidden');
    });
});

// Show/hide password
const password = document.querySelector('.password');
const showBtn = document.querySelector('.show-password');

showBtn.addEventListener('click', (event) => {
    event.preventDefault();
    if (password.type === 'password') {
        password.type = 'text';
        showBtn.innerHTML = '<i class="material-icons">visibility_off</i>';
    } else {
        password.type = 'password';
        showBtn.innerHTML = '<i class="material-icons">visibility</i>';
    }
});