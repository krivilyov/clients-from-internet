<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="/static/base.css" type="text/css"/>
	<link rel="stylesheet" href="/static/index.css" type="text/css"/>
	<title>Main page</title>
</head>
<body>
	<div class="header">
		<div class="header-container">
			<div class="auth-info-container">
				<?php if(isset($isAuth) && $isAuth): ?>
					<div class="user">Admin</div>
				<?php endif ?>
				<div class="auth-link">
					<?php if(isset($isAuth) && $isAuth): ?>
						<a href="/?action=logout">Logout</a>
					<?php else: ?>
						<a href="/?action=login">Login</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="content">
			<div class="main-row">
				<?php if(!empty($cards)): ?>
					<?php

						function tplSubCards ($card, $i) {
							$parentCard = count($card['children']) > 0 ? "js-parent-card" : "";
							$isHidden = $i > 0 ? "isHidden" : "";
							$display = $i > 0 ? "displayNone" : "";

							$tplSubCards = '<div class="card-item js-card-item ' . $parentCard . ' ' . $isHidden . ' ' .$display .'">';
							$tplSubCards .= '<div class="card-wrap js-card-wrap" data-id="'. $card['id'] .'" data-parent-id="'. $card['parentId'] .'">';
							$tplSubCards .= '<div class="card">';
							$tplSubCards .= '<div class="card-title js-card-title">' . $card['title'] . '</div>';
							$tplSubCards .= '<div class="card-description js-card-description hidden">' . $card['description'] . '</div>';
							$tplSubCards .= '<span class="card-remove-icon js-card-remove"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<g>
			<path d="M490.667,85.333h-42.665H448h-68.675l-7.012-28.062C363.905,23.609,333.658,0,298.965,0h-85.931
				c-34.693,0-64.94,23.609-73.348,57.273l-7.012,28.06H64.002c0,0-0.001,0-0.001,0c0,0,0,0-0.001,0H21.333
				C9.551,85.333,0,94.885,0,106.667C0,118.449,9.551,128,21.333,128h22.488l17.974,323.53C63.683,485.452,91.744,512,125.719,512
				h260.565c33.975,0,62.036-26.548,63.924-60.468L468.183,128h22.484c11.782,0,21.333-9.551,21.333-21.333
				C512,94.885,502.449,85.333,490.667,85.333z M181.081,67.614c3.663-14.664,16.838-24.948,31.954-24.948h85.931
				c15.116,0,28.291,10.284,31.953,24.946l4.428,17.721H176.653L181.081,67.614z M407.608,449.163
				c-0.63,11.311-9.993,20.17-21.324,20.17H125.719c-11.33,0-20.694-8.859-21.324-20.172L86.554,128h62.78h213.333h62.784
				L407.608,449.163z"/>
			<path d="M170.667,170.667c-11.782,0-21.333,9.551-21.333,21.333v213.333c0,11.782,9.551,21.333,21.333,21.333
				c11.782,0,21.333-9.551,21.333-21.333V192C192,180.218,182.449,170.667,170.667,170.667z"/>
			<path d="M256,170.667c-11.782,0-21.333,9.551-21.333,21.333v213.333c0,11.782,9.551,21.333,21.333,21.333
				s21.333-9.551,21.333-21.333V192C277.333,180.218,267.782,170.667,256,170.667z"/>
			<path d="M341.333,170.667C329.551,170.667,320,180.218,320,192v213.333c0,11.782,9.551,21.333,21.333,21.333
				c11.782,0,21.333-9.551,21.333-21.333V192C362.667,180.218,353.115,170.667,341.333,170.667z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</span>';
							$tplSubCards .= count($card['children']) > 0 ? '<span class="open-group js-open-group">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
											<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
											<g><path d="M494.4,806.3L10,193.8l980,4.6L494.4,806.3z"/></g>
											</svg>
										</span>' : '';
							$tplSubCards .= '</div>';
							$tplSubCards .= '</div>';

							if(count($card['children']) > 0){
								$tplSubCards .= renderSubCards($card['children']);
							}

							$tplSubCards .= '</div>';

							return $tplSubCards;
						}


						function renderSubCards ($cards, $i = 1) {
							$subCardsHTML = '';

							foreach($cards as $card){
								$subCardsHTML .= tplSubCards($card, $i);
							}

							return $subCardsHTML;
						}
					?>

					<?php
						$subCards = renderSubCards($cards, $i = 0);
						echo $subCards;
					?>
				<?php endif ?>
			</div>
			<form action="/" method="post" class="description-row js-description-row">
				<input type="hidden" name="id" value="">
				<textarea name="title" class="title" <?php if(!$isAuth): ?>readonly<?php endif ?>></textarea>
				<textarea name="description" class="description" <?php if(!$isAuth): ?>readonly<?php endif ?>></textarea>
				<?php if(isset($allCards)): ?>
					<select name="parentId">
						<option value="0">Without parent</option>
						<?php foreach($allCards as $card): ?>
							<option value="<?php echo $card['id'] ?>"><?php echo $card['title'] ?></option>
						<?php endforeach; ?>
					</select>
				<?php endif ?>

				<button type="submit" class="card-update-btn js-update-card disabled <?php if(!$isAuth): ?>hidden<?php endif ?>">Save</button>
			</form>
		</div>
	</div>
	<script src="/static/app.js"></script>
</body>
</html>
