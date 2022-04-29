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
				<?php if($isAuth): ?>
					<div class="user">Admin</div>
				<?php endif ?>
				<div class="auth-link">
					<?php if($isAuth): ?>
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

						function tplSubCards ($card) {
							$tplSubCards = '<div class="sub-card hidden">';
							$tplSubCards .= '<div class="card-wrap js-card-wrap">';
							$tplSubCards .= '<div class="card">';
							$tplSubCards .= '<div class="card-title">' . $card['title'] . '</div>';
							$tplSubCards .= '<div class="card-description">' . $card['description'] . '</div>';
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


						function renderSubCards ($cards) {
							$subCardsHTML = '';

							foreach($cards as $card){
								$subCardsHTML .= tplSubCards($card);
							}

							return $subCardsHTML;
						}
					?>


					<?php foreach($cards as $card): ?>
						<div class="card-group">
							<div class="card-wrap js-card-wrap">
								<div class="card">
									<div class="card-title"><?= $card['title'] ?></div>
									<div class="card-description"><?= $card['description'] ?></div>
									<?php if(count($card['children']) > 0): ?>
										<span class="open-group js-open-group">
											<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
											<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
											<g><path d="M494.4,806.3L10,193.8l980,4.6L494.4,806.3z"/></g>
											</svg>
										</span>
									<?php endif ?>
								</div>
							</div>

							<?php
								if(count($card['children']) > 0){
	//										echo '<pre>';
	//										var_dump($card['children']);
	//										echo '</pre>'; die;
									$subCards = renderSubCards($card['children']);
									echo $subCards;
								}
							?>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
	</div>
	<script src="/static/app.js"></script>
</body>
</html>
