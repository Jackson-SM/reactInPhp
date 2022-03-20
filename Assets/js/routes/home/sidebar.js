const sidebar = document.querySelector('.sidebar');
const menu = document.querySelector('.menu');

menu.addEventListener('click', e => {
  e.preventDefault();
  sidebar.classList.toggle('open');
})