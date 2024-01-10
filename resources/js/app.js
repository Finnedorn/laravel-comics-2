import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// prendo il bottone con la classe cancel-button
// che corrisponde a quello con la funzione delete
const buttons = document.querySelectorAll('.cancel-button');
buttons.forEach((button)=>{
    button.addEventListener('click', (event)=> {
        // impedisco che il form venga inviato
        event.preventDefault();
        // prendo le info del titolo del comic dal bottone
        const dataTitle = button.getAttribute("data-item-title");
        // pesco la modale tramide l'id
        const modal = document.getElementById("deleteModal");
        // creo una nuova modale di bootstrap
        const bootstrapModal= new bootstrap.Modal(modal);
        // la mostro col metodo della componente di bootstrap show()
        bootstrapModal.show();
        // pesco dalla struttura della modale lo span che mi farà da spazio dove inserire il titolo
        const title = modal.querySelector("#modal-item-title");
        // inserisco il titolo del comic nella modale
        title.textContent = dataTitle;
        // pesco il bottone del modal
        const buttonDelete= modal.querySelector("button.btn-primary");
        // creo una funzione che al click attivi il submit dell'elemento padre
        // quindi del bottone delete
        buttonDelete.addEventListener('click', ()=>{
            button.parentElement.submit();
        });
    });
});
