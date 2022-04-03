const newNoteBtn = document.querySelector('.newNote');
const modal = document.querySelector('.modal');
const btnSubmit = $('form .btn_note');

newNoteBtn.addEventListener('click', e => {
  modal.classList.toggle('show');
})

modal.addEventListener('click', e => {
  e.target.classList.toggle('show');
})

$(btnSubmit).on("click", e => {
  e.preventDefault();
    $.ajax({
      url: "/user/addnode",
      type: 'POST',
      data: $('.modal form').serialize(),
      success: function( data ) {
        console.log(data);
      }
    })
})



