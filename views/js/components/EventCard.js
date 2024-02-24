export class EventCard extends HTMLElement {
    #template;
    #shadow;
    #_endTime;

    constructor() {
        super();
        this.#template = document.getElementById('event-card-temp').content.cloneNode(true);
    }

    connectedCallback() {
        this.#shadow = this.attachShadow({mode: "open"});
        this.#shadow.appendChild(this.#template);
    }

    set img(imgPath) {
        this.#template.querySelector('img').src = imgPath;
    }

    set title(title) {
        this.#template.querySelector('h5').innerText = title;
    }

    get title() {
        return this.shadowRoot.querySelector('h5').innerText;
    }

    set category(category) {
        this.#template.querySelector('.category-label').innerText = category;
    }

    set leftTime(time) {
        this.#template.querySelector('p').innerText = time;
    }

    set endTime(endTime) {
        this.#_endTime = endTime;
    }

}

// <template id="event-card-temp">
//     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
//           integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
//           crossOrigin="anonymous"/>
//     <div className="card" style="width: 18rem;">
//         <img src="views/assets/AlNU3WTK_400x400.jpg" className="card-img-top" alt="..."/>
//         <a href="#" className="btn btn-dark p-1 disabled m-1 align-self-start category-label">Music</a>
//         <div className="card-body d-flex flex-column">
//             <h5 className="card-title fw-bold">Card title</h5>
//             <p className="card-text d-flex gap-2 align-items-center"><i className="fa-regular fa-clock"></i>20:40:00</p>
//             <a href="#" className="btn btn-warning align-self-end">Detail</a>
//         </div>
//     </div>
// </template>