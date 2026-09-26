<?php
/**
 * Contact details on the left, and on the right a tab per Gravity Forms form.
 * The tabs are switched in assets/js/contact.js.
 *
 * @var array  $args
 * @var array  $details  array( 'label' => string, 'lines' => list of html strings )
 * @var array  $forms    array( 'id' => string, 'label' => string, 'text' => string, 'form' => Gravity Forms title or id )
 * @var string $fallback Html shown when Gravity Forms is not active
 * @var string $classes
 */
extract( $args );
$classes = $classes ?? '';
?>

<section class="b-contact <?= $classes; ?>">
	<div class="o-container o-grid">

		<dl class="b-contact__details sm:col-span-4 border-b border-ink self-start">
			<?php foreach ( $details as $detail ) : ?>
				<div class="grid grid-cols-[7rem_1fr] gap-[1.5rem] py-[1.5rem] border-t border-ink">
					<dt class="c-eyebrow pt-[0.375rem]"><?= $detail['label']; ?></dt>
					<dd class="text-[1.1rem] leading-[1.75rem]">
						<?php foreach ( $detail['lines'] as $line ) : ?>
							<span class="block"><?= $line; ?></span>
						<?php endforeach; ?>
					</dd>
				</div>
			<?php endforeach; ?>
		</dl>

		<div class="b-contact__forms sm:col-span-7 sm:col-start-6 js-contact">

			<div class="b-contact__tabs flex flex-wrap gap-x-[3rem] gap-y-[1rem]" role="tablist" aria-label="Kies een formulier">
				<?php foreach ( $forms as $index => $form ) : ?>
					<button type="button" role="tab"
							id="contact-tab-<?= $form['id']; ?>"
							class="b-contact__tab js-contact-tab font-display text-[3rem] leading-[3.5rem]"
							aria-controls="<?= $form['id']; ?>"
							aria-selected="<?= $index === 0 ? 'true' : 'false'; ?>"
							tabindex="<?= $index === 0 ? '0' : '-1'; ?>">
						<?= $form['label']; ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $forms as $index => $form ) : ?>
				<div class="b-contact__panel js-contact-panel mt-[3.5rem]" role="tabpanel"
					 id="<?= $form['id']; ?>"
					 aria-labelledby="contact-tab-<?= $form['id']; ?>"
					 <?= $index > 0 ? 'hidden' : ''; ?>>

					<p class="max-w-[34rem]"><?= $form['text']; ?></p>

					<div class="c-form mt-[3.5rem]">
						<?php if ( function_exists( 'gravity_form' ) ) : ?>
							<?php gravity_form( $form['form'], false, false, false, null, true ); ?>
						<?php else : ?>
							<p><?= $fallback; ?></p>
						<?php endif; ?>
					</div>

				</div>
			<?php endforeach; ?>

		</div>

	</div>
</section>
