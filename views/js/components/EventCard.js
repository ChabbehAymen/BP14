export class EventCard extends HTMLElement {
    #active;

    constructor() {
        super();
    }

    connectedCallback() {
        let isActive = ()=>{
            if(Number(this.getAttribute('active')) === 1) {
            return `<a href="event?id=${this.id}" class="btn btn-warning align-self-end buy-btn">J’achète</a>`
        }else return `<a href="event?id=${this.id}" class="btn btn-dark align-self-end buy-btn">Guichet fermé</a>`
        }
        this.innerHTML = `
        <div class="card" style="width: 18rem;">
            <img src="views/assets/AlNU3WTK_400x400.jpg" class="card-img-top" alt="..."/>
            <a href="#" class="badge text-bg-primary text-decoration-none m-1 align-self-start category-label">${this.getAttribute('category')}</a>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold">${this.getAttribute('title')}</h5>
                <p class="card-text d-flex gap-2 align-items-center"><i class="fa-regular fa-clock"></i>${this.getAttribute('endTime')}</p>
                ${isActive()}
            </div>
        </div>`
    }

    get getTitle() {
        return this.querySelector('h5').innerText;
    }

    isActive(){
        return this.querySelector('.buy-btn').innerText = 'J’achète';
    }

}

