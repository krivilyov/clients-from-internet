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
							$tplSubCards .= '<div class="card-wrap js-card-wrap" data-id="'. $card['id'] .'">';
							$tplSubCards .= '<div class="card">';
							$tplSubCards .= '<div class="card-title js-card-title">' . $card['title'] . '</div>';
							$tplSubCards .= '<div class="card-description js-card-description hidden">' . $card['description'] . '</div>';
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
			<div class="description-row js-description-row">
				<h1 class="js-title"></h1>
				<div class="description js-description"></div>
			</div>
		</div>
	</div>
	<script src="/static/app.js"></script>
</body>
</html>
