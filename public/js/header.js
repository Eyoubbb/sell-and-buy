(() => {
	
	/*************** Menu ***************/

	const profileBtn = document.querySelector('.btn-caret');
	const profileMenu = document.querySelector('.dropdown-profile');

	const removeProfileEvents = () => {
		document.removeEventListener('click', closeProfileMenu);
		profileMenu.removeEventListener('click', stopProfilePropagation);
		document.removeEventListener('keydown', escapeProfileMenu);
	};
	
	const stopProfilePropagation = e => e.stopPropagation();
	
	const closeProfileMenu = () => {
		profileMenu.classList.remove('open');
		removeProfileEvents();
	};
	
	const escapeProfileMenu = e => e.key === 'Escape' && closeProfileMenu();

	/*************** Links ***************/
	
	const linksBtn = document.querySelector('.btn-links');
	const linksMenu = document.querySelector('.dropdown-links');
	
	const removeLinksEvents = () => {
		document.removeEventListener('click', closeLinksMenu);
		linksMenu.removeEventListener('click', stopLinksPropagation);
		document.removeEventListener('keydown', escapeLinksMenu);
	};
	
	const stopLinksPropagation = e => e.stopPropagation();
	
	const closeLinksMenu = () => {
		linksMenu.classList.remove('open');
		removeLinksEvents();
	};
	
	const escapeLinksMenu = e => e.key === 'Escape' && closeLinksMenu();
	
	/*************** Dropdowns ***************/

	const dropdowns = [
		{
			btn: profileBtn,
			menu: profileMenu,
			callbacks: {
				closeMenu: closeProfileMenu,
				stopPropagation: stopProfilePropagation,
				escapeMenu: escapeProfileMenu,
				removeEvents: removeProfileEvents
			}
		},
		{
			btn: linksBtn,
			menu: linksMenu,
			callbacks: {
				closeMenu: closeLinksMenu,
				stopPropagation: stopLinksPropagation,
				escapeMenu: escapeLinksMenu,
				removeEvents: removeLinksEvents
			}
		}
	];

	const openDropdown = dropdown => {
		dropdown.menu.classList.add('open');
		document.addEventListener('click', dropdown.callbacks.closeMenu);
		dropdown.menu.addEventListener('click', dropdown.callbacks.stopPropagation);
		document.addEventListener('keydown', dropdown.callbacks.escapeMenu);
	};

	const closeDropdown = dropdown => {
		dropdown.menu.classList.remove('open');
		dropdown.callbacks.removeEvents();
	};

	const toggleDropdown = dropdown => {
		if (dropdown.menu.classList.contains('open')) {
			closeDropdown(dropdown);
		} else {
			for (const d of dropdowns) {
				d.menu.classList.contains('open') && closeDropdown(d);
			}
			openDropdown(dropdown);
		}
	};

	for (const d of dropdowns) {
		d.btn.addEventListener('click', () => toggleDropdown(d));
	}
	
})();