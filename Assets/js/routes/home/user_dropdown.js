const user_dropdown = document.querySelector('.user_dropdown');
const options_user = document.querySelector('.options_user');

user_dropdown.addEventListener('click', e => {
  e.preventDefault();
  options_user.classList.toggle('show');
})