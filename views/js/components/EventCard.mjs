export class EventCard extends HTMLElement{
    #template;
    #shadow;
    #_endTime;
    constructor() {
        super();
        this.#template = document.getElementById('event-card-temp').content.cloneNode(true);
    }

    connectedCallback(){
        this.#shadow = this.attachShadow({mode:"open"});
        this.#shadow.appendChild(this.#template);
    }

    set img(imgPath){
        this.#template.querySelector('img').src = imgPath;
    }

    set title(title){
        this.#template.querySelector('h5').innerText = title;
    }

    get title(){
        return this.shadowRoot.querySelector('h5').innerText;
    }

    set category(category){
        this.#template.querySelector('.category-label').innerText = category;
    }

    set leftTime(time){
        this.#template.querySelector('p').innerText = time;
    }

    set endTime(endTime){
        this.#_endTime = endTime;
    }

}