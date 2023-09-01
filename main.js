let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

const sr = ScrollReveal({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: true
});

// les sélecteurs et options pour l'effet de révélation
const revealItems = [
    { selector: '.text', options: { delay: 100, origin: 'top' } },
    { selector: '.service', options: { delay: 100, origin: 'top' } },
    { selector: '.heading', options: { delay: 200, origin: 'top' } },
    { selector: '.about-img', options: { delay: 600, origin: 'left' } },
    { selector: '.about-text', options: { delay: 200, origin: 'right' } },
    { selector: '.head', options: { delay: 100, origin: 'top' } },
    { selector: '.table', options: { delay: 100, origin: 'top' } },

    { selector: '.container', options: { delay: 100, origin: 'top' } },
    { selector: '.table-container', options: { delay: 100, origin: 'top' } }
];

// l'effet de révélation à chaque élément de la liste
revealItems.forEach(item => {
    sr.reveal(item.selector, item.options);
});
