<?php get_header(); ?>

<section class="o-container grid grid-cols-1 gap-y-4">
	<div class="flex items-center justify-center gap-4">
		<div class="w-32 h-32 p-8 bg-primary text-white flex items-center justify-center text-center rounded">Primary</div>
		<div class="w-32 h-32 p-8 bg-primary-dark text-white flex items-center justify-center text-center rounded">Primary dark</div>
	</div>
	<div class="flex items-center justify-center gap-4">
		<div class="w-32 h-32 p-8 bg-secondary text-white flex items-center justify-center text-center rounded">Primary</div>
		<div class="w-32 h-32 p-8 bg-secondary-dark text-white flex items-center justify-center text-center rounded">Primary dark</div>
	</div>
</section>

<section class="mt-40">
	<div class="o-container o-grid">
		<?php foreach( range( 1, 12 ) as $column ) : ?>
			<div class="col-span-1 border text-center bg-white py-4"><?= $column; ?></div>
		<?php endforeach; ?>
	</div>
</section>

<section class="o-container o-grid--lg mt-40">
	<div class="lg:col-start-3 lg:col-span-8">
		<h1 class="mb-8">The quick brown fox jumps over the lazy dog</h1>
		<h2 class="mb-8">The quick brown fox jumps over the lazy dog</h2>
		<h3 class="mb-8">The quick brown fox jumps over the lazy dog</h3>
		<h4 class="mb-8">The quick brown fox jumps over the lazy dog</h4>
		<h5 class="mb-8">The quick brown fox jumps over the lazy dog</h5>
		<h6 class="mb-8">The quick brown fox jumps over the lazy dog</h6>
	</div>
</section>

<section class="o-container o-grid--lg mt-40 s-rich-text">
	<div class="lg:col-start-3 lg:col-span-8">
		<p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing</a> elit. Animi ducimus <strong>earum esse expedita</strong> hic in iure labore <i>laudantium maiores</i> obcaecati odio possimus quas quis rem repudiandae, saepe sapiente tenetur voluptates.</p>
		<p>Aperiam consectetur error exercitationem:</p>
		<ul>
			<li>praesentium qui quidem</li>
			<li>recusandae vitae voluptate</li>
			<li>aperiam dolores eligendi</li>
			<li>enim error ex ipsam reprehenderit</li>
			<li>similique tempora ut voluptates</li>
		</ul>
		<p>Aperiam consectetur error exercitationem:</p>
		<ol>
			<li>praesentium qui quidem</li>
			<li>recusandae vitae voluptate</li>
			<li>aperiam dolores eligendi</li>
			<li>enim error ex ipsam reprehenderit</li>
			<li>similique tempora ut voluptates</li>
		</ol>
	</div>
</section>

<section class="o-container o-grid--lg mt-40">
	<div class="lg:col-start-3 lg:col-span-8 o-button-group">
			<?php get_template_part('partials/components/button', null, array()); ?>
			<?php get_template_part('partials/components/button', null, array(
				'label' => 'Secondary button',
				'classes' => 'c-button--secondary'
			)); ?>
	</div>
	<div class="lg:col-start-3 lg:col-span-8 o-button-group">
		<?php get_template_part('partials/components/button', null, array(
			'type' => 'outline',
		)); ?>
		<?php get_template_part('partials/components/button', null, array(
			'type' => 'outline',
			'color', 'secondary',
			'label' => 'Secondary button',
			'classes' => 'c-button--secondary'
		)); ?>
	</div>
	<div class="lg:col-start-3 lg:col-span-8 o-button-group">
		<?php get_template_part('partials/components/button', null, array(
			'type' => 'transparent',
		)); ?>
		<?php get_template_part('partials/components/button', null, array(
			'type' => 'transparent',
			'label' => 'Secondary button',
			'classes' => 'c-button--secondary'
		)); ?>
	</div>
</section>

<?php get_template_part('partials/blocks/text-image', null, array(
	'classes' => 'mt-40'
)); ?>
<?php get_template_part('partials/blocks/text-image', null, array(
	'image_position' => 'right',
	'classes' => 'mt-40'
)); ?>

<?php get_template_part('partials/blocks/text-image', null, array(
	'image_overflow' => true,
	'classes' => 'mt-40'
)); ?>
<?php get_template_part('partials/blocks/text-image', null, array(
	'image_position' => 'right',
	'image_overflow' => true,
	'classes' => 'mt-40'
)); ?>

<section class="o-container o-grid mt-40">
	<div class="col-span-12 lg:col-start-3 lg:col-span-8">
		<form action="" class="c-form form--split">
			<div class="form-field">
				<label for="firstname">First name</label>
				<input type="text" id="firstname" placeholder="Your first name">
			</div>
			<div class="form-field">
				<label for="email">E-mail</label>
				<input type="email" id="email">
			</div>
			<div class="form-field form-field--full-width">
				<div class="field-container field--select">
					<label for="select">Select your option</label>
					<select name="select" id="select">
						<option value="1">First option</option>
						<option value="2">Second option</option>
					</select>
				</div>
			</div>
			<div class="form-field form-field--radio form-field--inline form-field--full-width">
				<div class="field-label">Select your option</div>
				<div class="field-container">
					<input type="radio">
					<span>First option</span>
				</div>
				<div class="field-container">
					<input type="radio">
					<span>Second option</span>
				</div>
				<div class="field-container">
					<input type="radio">
					<span>Third option</span>
				</div>
			</div>
			<div class="form-field form-field--checkbox form-field--inline form-field--full-width">
				<div class="field-label">Select your option</div>
				<div class="field-container">
					<input type="checkbox">
					<span>First option</span>
				</div>
				<div class="field-container">
					<input type="checkbox">
					<span>Second option</span>
				</div>
				<div class="field-container">
					<input type="checkbox">
					<span>Third option</span>
				</div>
			</div>
			<div class="form-field form-field--full-width">
				<label for="message">Your message</label>
				<textarea name="" id="" cols="30" rows="10"></textarea>
			</div>
			<div class="form-field">
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
</section>

<section class="o-container o-grid mt-40">
	<div class="col-span-12 lg:col-start-3 lg:col-span-8">
		<form action="" class="c-form u-margin-bottom-20 form--split form--inverse">
			<div class="form-field">
				<label for="firstname">First name</label>
				<input type="text" id="firstname" placeholder="Your first name">
			</div>
			<div class="form-field">
				<label for="email">E-mail</label>
				<input type="email" id="email">
			</div>
			<div class="form-field form-field--full-width">
				<div class="field-container field--select">
					<label for="select">Select your option</label>
					<select name="select" id="select">
						<option value="1">First option</option>
						<option value="2">Second option</option>
					</select>
				</div>
			</div>
			<div class="form-field form-field--radio form-field--inline form-field--full-width">
				<div class="field-label">Select your option</div>
				<div class="field-container">
					<input type="radio">
					<span>First option</span>
				</div>
				<div class="field-container">
					<input type="radio">
					<span>Second option</span>
				</div>
				<div class="field-container">
					<input type="radio">
					<span>Third option</span>
				</div>
			</div>
			<div class="form-field form-field--checkbox form-field--inline form-field--full-width">
				<div class="field-label">Select your option</div>
				<div class="field-container">
					<input type="checkbox">
					<span>First option</span>
				</div>
				<div class="field-container">
					<input type="checkbox">
					<span>Second option</span>
				</div>
				<div class="field-container">
					<input type="checkbox">
					<span>Third option</span>
				</div>
			</div>
			<div class="form-field form-field--full-width">
				<label for="message">Your message</label>
				<textarea name="" id="" cols="30" rows="10"></textarea>
			</div>
			<div class="form-field">
				<button type="submit">Submit</button>
			</div>
		</form>
	</div>
</section>


<?php get_footer(); ?>
