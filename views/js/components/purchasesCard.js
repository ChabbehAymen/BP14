export class PurchasesCard extends HTMLElement {

    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <div class="bg-gray-100 py-2 rounded px-4">
            <div class="d-flex align-items-center justify-between">
                <p class="fs-5 fw-bold"> ${this.getAttribute('eventTitle')}</p>
                <p>${this.getAttribute('purchaseDate')}</p>
                <p class="badge text-bg-primary">${this.getAttribute('category')}</p>
                <i class="fa fa-caret-down"></i>
            </div>
            <div class="d-none">
                <p>${this.getAttribute('description')}</p>
            </div>
        </div>`
    }

}

