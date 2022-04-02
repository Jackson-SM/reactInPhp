const newNoteBtn = document.querySelector('.newNote');
const modal = document.querySelector('.modal');

newNoteBtn.addEventListener('click', e => {
  modal.classList.toggle('show');
})

modal.addEventListener('click', e => {
  e.target.classList.toggle('show');
})

