(function () {
	console.log("I'm here") ;
	let allCards = document.querySelectorAll('.js-card-wrap');

	//add event click
	for (let i = 0; i < allCards.length; i++) {
		allCards[i].addEventListener("click", function (){
			const openBtn = this.querySelector('.js-open-group');

			//if it parent card
			if(openBtn) {
				console.log(openBtn)
			}

		})
	}
}());
