let login = document.getElementById('login');
let registrazione = document.getElementById('registrazione');
let loginForm = document.getElementById('login-form');
let registrazioneForm = document.getElementById('registrazione-form');


login.addEventListener('click', () => {
    login.classList.add('text-pink-500', 'border-4', 'border-pink-200');
    registrazione.classList.remove('text-pink-500', 'border-4', 'border-pink-200');
    registrazione.classList.add('text-gray-500');
    loginForm.classList.remove('hidden');
    registrazioneForm.classList.add('hidden');
});

registrazione.addEventListener('click', () => {
    registrazione.classList.add('text-pink-500', 'border-4', 'border-pink-200');
    login.classList.remove('text-pink-500', 'border-4', 'border-pink-200');
    login.classList.add('text-gray-500');
    registrazioneForm.classList.remove('hidden');
    loginForm.classList.add('hidden');
});