(function () {
	console.log("I'm here") ;
	let allCards = document.querySelectorAll('.js-card-wrap');

	//add event click
	for (let i = 0; i < allCards.length; i++) {
		allCards[i].addEventListener("click", function (){
			const openBtn = this.querySelector('.js-open-group');

			//if it parent card
			if(openBtn) {
				// //up to parent
				// const parent = this.closest('.js-sub-card');
				// //find all children and show all
				// const children = parent.querySelectorAll('.js-sub-card')
				// console.log(parent);

				this.classList.add('active');
			}

		})
	}
}());
