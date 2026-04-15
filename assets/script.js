const menuBtn = document.querySelector('.menu-toggle');
const aside = document.querySelector('aside');
const closeBtn = document.querySelector('.aside-close');

menuBtn.addEventListener('click', () => {
    aside.classList.toggle('active');
});

closeBtn.addEventListener('click', () => {
    aside.classList.remove('active');
});


    if ( window.history.replaceState ) { //Novērš formas resubmission
        window.history.replaceState( null, null, window.location.href );
    }