(function () {
	console.log("I'm here");
	const allCards = document.querySelectorAll('.js-card-wrap');
	const allRemoveBtns = document.querySelectorAll('.js-card-remove');

	const cardInfo = document.querySelector('.js-description-row');
	const updateBtn = cardInfo.querySelector('.js-update-card');
	const id = cardInfo.querySelector('input[name="id"]');
	const title = cardInfo.querySelector('textarea[name="title"]');
	const description = cardInfo.querySelector('textarea[name="description"]');
	const parentIdSelect = cardInfo.querySelector('select[name="parentId"]');
	const cardInfoBtn = cardInfo.querySelector('.js-update-card');

	//add event click
	for (let i = 0; i < allCards.length; i++) {
		allCards[i].addEventListener("click", function () {
			const openBtn = this.querySelector('.js-open-group');

			//if it parent card
			if (openBtn) {
				const parent = this.closest('.js-parent-card');
				const group = parent.children;

				//transform arrow
				openBtn.classList.toggle('active');

				if (group.length > 0) {
					for (let i = 0; i < group.length; i++) {
						if (group[i].classList.contains('js-card-item')) {
							if(group[i].classList.contains('displayNone')) {
								group[i].classList.toggle('displayNone');

								setTimeout(() => {
									group[i].classList.toggle('isHidden');
								}, 100)
							} else {
								group[i].classList.toggle('isHidden');

								setTimeout(() => {
									group[i].classList.toggle('displayNone');
								}, 300)
							}
						}
					}
				}
			}

			//start insert card data
			const card = {
				id: '',
				title: '',
				description: '',
				parentId: '',
			}
			card.id = this.getAttribute('data-id');
			card.title = this.querySelector('.js-card-title').innerHTML;
			card.description = this.querySelector('.js-card-description').innerHTML;
			card.parentId = this.getAttribute('data-parent-id');

			id.value = card.id;
			title.value = card.title;
			description.value = card.description;
			parentIdSelect.value = card.parentId;
			cardInfoBtn.innerText = 'Update';

			if(title.value.length <= 0) {
				desableCardInfoBtn();
			} else {
				enableCardInfoBtn();
			}
			//stop insert card data
		})
	}

	//for title textarea
	title.addEventListener('input', () => {
		if(title.value.length <= 0) {
			desableCardInfoBtn();
		}

		if(title.value.length > 0) {
			enableCardInfoBtn();
		}
	})

	//for parentId selector
	parentIdSelect.addEventListener('change', () => {
		if(title.value.length > 0) {
			enableCardInfoBtn();
		}
	})

	function enableCardInfoBtn () {
		if(updateBtn.classList.contains('disabled')){
			updateBtn.classList.remove('disabled');
		}
	}

	function desableCardInfoBtn () {
		if(!updateBtn.classList.contains('disabled')){
			updateBtn.classList.add('disabled');
		}
	}

	//Remove card
	for (let i = 0; i < allRemoveBtns.length; i++) {
		allRemoveBtns[i].addEventListener("click", function () {
			const id = this.closest('.js-card-wrap').getAttribute('data-id');

			let xhr = new XMLHttpRequest();
			let formData = new FormData();
			formData.append('deleteId', id);
			xhr.open('POST', '/');
			xhr.send(formData);

			setTimeout(() => {
				location.reload();
			}, 1000);
		})
	}
}());
