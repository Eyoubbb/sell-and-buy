(() => {

    const elements = document.querySelector('div.nav').children;
    const elementsP = document.querySelectorAll('div.step');

    const titles = document.querySelectorAll('div.content h3');

    for (let i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', () => {
            window.scrollTo(0, titles[i].offsetTop - 30);
            triggerTitle(titles[i]);
        });
    }

    for (let i = 0; i < elementsP.length; i++) {
        elementsP[i].addEventListener('click', () => {
            window.scrollTo(0, titles[i].offsetTop - 30);
            triggerTitle(titles[i]);
        });
    }

    function triggerTitle(title) {
        title.classList.add('active');
        setTimeout(() => {
            title.classList.remove('active');
        }, 500);
    }

})();