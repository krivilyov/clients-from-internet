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
									group[i].classList.toggle('hidden');
								}, 100)
							} else {
								group[i].classList.toggle('hidden');

								setTimeout(() => {
									group[i].classList.toggle('displayNone');
								}, 300)
							}
						}
					}
				}


			}

		})
	}
}());
