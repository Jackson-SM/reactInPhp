const go = document.querySelector('.btn-wrapper-go');
const back = document.querySelector('.btn-wrapper-back');
const items_container = document.querySelector('.wrapper_initial');

go.addEventListener('click', event => {
  items_container.scrollBy(300,0);
})
back.addEventListener('click', event => {
  items_container.scrollBy(-300,0);
})