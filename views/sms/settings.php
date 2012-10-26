<div id="content" class="settings cf">
	<div class="center">
		<div class="col_12">

			<article class="container base">
				<header class="container cf">
					<div class="property-title">
						<h1><?php echo __("SMSSync"); ?></h1>
					</div>
				</header>

				<section class="property-parameters">
					<div class="parameter">
						<label for="site_locale">
							<p class="field"><?php echo __("Endpoint:"); ?></p>
							<?php echo URL::base('http', TRUE).$smssync; ?>
						</label>
					</div>
				</section>
			</article>

			<article class="container base">
				<header class="container cf">
					<div class="property-title">
						<h1><?php echo __("Frontline SMS"); ?></h1>
					</div>
				</header>

				<section class="property-parameters">
					<div class="parameter">
						<label for="site_locale">
							<p class="field"><?php echo __("Endpoint:"); ?></p>
							<?php echo URL::base('http', TRUE).$frontlinesms; ?>
						</label>
					</div>
				</section>
			</article>

			<article class="container base">
				<header class="container cf">
					<div class="property-title">
						<h1><?php echo __("Clickatell"); ?></h1>
					</div>
				</header>

				<section class="property-parameters">
					<div class="parameter">
						<label for="site_locale">
							<p class="field"><?php echo __("Endpoint:"); ?></p>
							<?php echo URL::base('http', TRUE).$clickatell; ?>
						</label>
					</div>
				</section>
			</article>

			<article class="container base">
				<header class="container cf">
					<div class="property-title">
						<h1><?php echo __("Twilio"); ?></h1>
					</div>
				</header>

				<section class="property-parameters">
					<div class="parameter">
						<label for="site_locale">
							<p class="field"><?php echo __("Endpoint:"); ?></p>
							<?php echo URL::base('http', TRUE).$twilio; ?>
						</label>
					</div>
				</section>
			</article>

		</div>
	</div>
</div>			