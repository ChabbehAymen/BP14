import {EventCard} from "./components/EventCard.js";
customElements.define('event-card' ,EventCard);

// count down days
const clockDiv = document.querySelector('.clock-count-down');
const countDownDate = new Date(clockDiv.id).getTime();
const timer = setInterval(function () {
    let now = new Date().getTime();
    let distance = countDownDate-now;

    // Time calculations for days, hours, minutes and seconds
    let days = Math.floor(distance / (1000 * 60 * 60 * 24));
    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    clockDiv.querySelector('.days').innerText = days+' D';
    clockDiv.querySelector('.hours').innerText = hours+' H';
    clockDiv.querySelector('.mints').innerText = minutes+' M';
    clockDiv.querySelector('.seconds').innerText = seconds+' S';

    if (distance<0){
        clearInterval(timer);
    }
}, 1000);
// activate scrolling after a successful purchase
document.querySelector('.dismiss-btn').addEventListener('click', e=>{
    document.querySelector('.purchasing-successful').remove();
    document.querySelector('body').style.overflow = 'auto'
})