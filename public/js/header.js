(() => {

	/*************** Menu ***************/

	const menuBtn = document.querySelector('.btn-caret');
	const menu = document.querySelector('.dropdown');
	
	const removeEvents = () => {
		document.removeEventListener('click', closeMenu);
		menu.removeEventListener('click', stopPropagation);
		document.removeEventListener('keydown', escapeMenu);
	};

	const stopPropagation = e => e.stopPropagation();
	
	const closeMenu = () => {
		menu.classList.remove('menu-open');
		removeEvents();
	};
	
	const escapeMenu = e => e.key === 'Escape' && closeMenu();
	
	menuBtn.addEventListener('click', e => {
		const isOpen = menu.classList.toggle('menu-open');
		
		if (isOpen) {
			e.stopPropagation();

			document.addEventListener('click', closeMenu);
			menu.addEventListener('click', stopPropagation);
			document.addEventListener('keydown', escapeMenu);
		} else {
			removeEvents();
		}
	});
	
})();