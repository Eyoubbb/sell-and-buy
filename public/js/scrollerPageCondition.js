(() => {

    const elements = document.querySelector('div.nav').children;
    const elementsP = document.querySelectorAll('div.step');

    const titles = document.querySelectorAll('div.content h3');

    elements[0].addEventListener('click', () => {
        window.scrollTo(0, titles[0].offsetTop - 30);
        triggerTitle(titles[0]);
    });

    elements[1].addEventListener('click', () => {
        window.scrollTo(0, titles[1].offsetTop - 30);
        triggerTitle(titles[1]);
    });

    elements[2].addEventListener('click', () => {
        window.scrollTo(0, titles[2].offsetTop - 30);
        triggerTitle(titles[2]);
    });

    elements[3].addEventListener('click', () => {
        window.scrollTo(0, titles[3].offsetTop - 30);
        triggerTitle(titles[3]);
    });

    elements[4].addEventListener('click', () => {
        window.scrollTo(0, titles[4].offsetTop - 30);
        triggerTitle(titles[4]);
    });

    elementsP[0].addEventListener('click', () => {
        window.scrollTo(0, titles[0].offsetTop - 30);
        triggerTitle(titles[0]);
    });

    elementsP[1].addEventListener('click', () => {
        window.scrollTo(0, titles[1].offsetTop - 30);
        triggerTitle(titles[1]);
    });

    elementsP[2].addEventListener('click', () => {
        window.scrollTo(0, titles[2].offsetTop - 30);
        triggerTitle(titles[2]);
    });

    elementsP[3].addEventListener('click', () => {
        window.scrollTo(0, titles[3].offsetTop - 30);
        triggerTitle(titles[3]);
    });

    elementsP[4].addEventListener('click', () => {
        window.scrollTo(0, titles[4].offsetTop - 30);
        triggerTitle(titles[4]);
    });


    function triggerTitle(title) {
        title.classList.add('active');
        setTimeout(() => {
            title.classList.remove('active');
        }, 500);
    }

})();