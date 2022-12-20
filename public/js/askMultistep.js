(() => {

    const form = document.querySelector('form');
    const progressStep = document.querySelector('.progress-bar').children;

    const formStep = document.querySelectorAll('.step');
    const nextBtns = document.querySelectorAll('.next');
    const prevBtns = document.querySelectorAll('.previous');

    if (!progressStep || !formStep || !nextBtns || !prevBtns) {
        return;
    }

    let currentStep = 0;

    const setStep = n => {
        if (n < 0 || n > formStep.length - 1) {
            return;
        }

        for (let i = 0; i < formStep.length; i++) {
            if (i === n) {
                progressStep[i].classList.add('active');
                formStep[i].classList.add('active');
            } else {
                progressStep[i].classList.remove('active');
                formStep[i].classList.remove('active');
            }
        }
    }

    const checkValidations = handler => {
		for (const input of formStep[currentStep].querySelectorAll('input')) {
			if (!input.checkValidity() || input.classList.contains('invalid')) {
				handler && handler();
				return false;
			}
		}
		return true;
	};

    const nextStep = () => {
		form.classList.remove('form-invalid');

		const verif = checkValidations(() => {
			form.classList.add('form-invalid');
		});
		
		if (!verif) {
			return;
		}

		setStep(++currentStep);
	};

    const prevStep = () => {
		setStep(--currentStep);
    };

    //event listener
    for (const btn of nextBtns) {
        btn.addEventListener('click', nextStep);
    }

    for (const btn of prevBtns) {
        btn.addEventListener('click', prevStep);
    }

    form.addEventListener('keypress', e => {
		if (e.key === 'Enter') {
			e.preventDefault();
			nextStep();
		}
	});

    for (const i of form.querySelectorAll('input')) {
		i.addEventListener('invalid', e => e.preventDefault());
	}

    setStep(currentStep);
})();
