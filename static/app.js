(function () {
	console.log("I'm here");
	let allCards = document.querySelectorAll('.js-card-wrap');

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
			}
			card.id = this.getAttribute('data-id');
			card.title = this.querySelector('.js-card-title').innerHTML;
			card.description = this.querySelector('.js-card-description').innerHTML;

			const cardInfo = document.querySelector('.js-description-row');

			cardInfo.setAttribute('data-id', card.id);
			cardInfo.querySelector('.js-title').textContent = card.title;
			cardInfo.querySelector('.js-description').textContent = card.description;
			//stop insert card data

		})
	}
}());
