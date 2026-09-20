<?php if( getenv( 'WP_ENV' ) == 'development' ) : ?>
	<div class="u-debug-grid">
		<div class="o-container o-grid">
			<?php foreach( range( 1, 12 ) as $column ) : ?>
				<div class="col-span-1"></div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>
