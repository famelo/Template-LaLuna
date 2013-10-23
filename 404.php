<?php get_template_part('templates/page', 'header'); ?>

<div class="container container-404">
	<div class="row">
		<div class="span12">
			<div class="hero-unit center">
				<h1>Seite nicht gefunden <small>404</small></h1>
				<br />
				<p>
					Die Seite die sie versucht haben aufzurufen existiert leider nicht. <br />
					Bitte kontrollieren Sie, ob sie die Webadresse richtig eingegeben haben.
				</p>

				<p>
					Alternativ können Sie hier auch zur Startseite oder die ganze Seite durchsuchen:
				</p>

				<form role="search" method="get" id="searchform" class="form-search" action="/">
					<a href="/" class="btn btn-default btn-home">Startseite</a>
					<div class="search-wrapper">
						<input type="text" name="s" class="form-control" placeholder="Seitentitel, Produktname, etc" />
						<button type="submit" class="btn btn-default">Suchen</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>