// import {EventCard} from "./components/EventCard.js";
// customElements.define('event-card' ,EventCard);

const searchInput = document.querySelector('.search-input');
const eventCards = document.querySelectorAll('.event-card');
document.querySelector('.search-icon').addEventListener('click', e=>{
    if (e.target.classList.contains('fa-x')) searchInput.hideInput(e.target);
    else searchInput.showInput(e.target);
});

HTMLElement.prototype.showInput = function (searchIcon) {
    searchInput.style.display = 'block';
    searchInput.classList.remove('closed');
    searchInput.classList.add('open');
    searchIcon.classList.remove('fa-magnifying-glass');
    searchIcon.classList.add('fa-x');
}

HTMLElement.prototype.hideInput = function (searchIcon) {
    searchInput.classList.remove('open');
    searchInput.classList.add('closed');
    searchIcon.classList.add('fa-magnifying-glass');
    searchIcon.classList.remove('fa-x');
    setTimeout(()=>{
        searchInput.style.display = 'none';
    }, 200)
}
// filltering using search input
searchInput.addEventListener('input', e=>{
    for (const card of eventCards) {
        if (card.querySelector('h5').innerText.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase()))card.style.display='block';
        else card.style.display='none';
    }
});
