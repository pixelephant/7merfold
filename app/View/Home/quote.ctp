<section class="section">
	
	<h2>Árajánlatkérés - <?php echo $quote_text; ?></h2>
	<div class="cont">
	<p>Ha már kezd körvonalazódni álmaid utazása, írd le nekünk elképzeléseidet és mi segítünk a legmegfelelőbb utat megszervezni! Kérlek ne felejtsd el megírni, hogy mikor, hányan és mennyi időre utaznátok! Köszönjük.</p>
		<form action="<?php echo $this->webroot; ?>ajanlat/email" method="POST" id="quote-form">
			<div>
				<input type="hidden" name="referal" id="referal" value="<?php echo $quote_text; ?>">
			</div>
			<div>
				<label for="name">Név</label>
				<input type="text" name="name" id="name" required>
			</div>
			<div>
				<label for="telephone">Telefonszám</label>
				<input  type="tel" step="0" name="telephone" id="telephone" required>
			</div>
			<div>
				<label for="e-mail">Email cím</label>
				<input type="email" name="e-mail" id="e-mail" required>
			</div>
			<div>
				<label for="message">Üzeneted, kívánságaid</label>
				<textarea name="message" id="message" rows="5"></textarea>
			</div>
			<div>
				<input type="submit" value="Küldés &raquo;">
			</div>
		</form>
	</div>
</section>