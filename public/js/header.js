(()=>{

    const search = document.getElementById('search');
    const rightBox = document.querySelector('ul.right');
    let timeout = false

    const growSearchBar = () => {
        const form = document.querySelector('form');
        if(!rightBox.classList.contains('shift-right') && !rightBox.classList.contains('shift-left')){
            rightBox.classList.toggle('shift-left');
        } else {
            rightBox.classList.toggle('shift-left');
            rightBox.classList.toggle('shift-right');
        }
        // form.classList.toggle('hide');
        
        if(timeout){
            setTimeout(function() {
                form.classList.toggle('hide');
            }, 300);
            timeout = false;
        } else{
            form.classList.toggle('hide');
            timeout = true;
        }


    }

    search.addEventListener('click', growSearchBar);

})();
