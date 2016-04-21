<?php
require_once( '../../../../../wp-blog-header.php' );
header('HTTP/1.1 200 OK');
?>
<div class="c-modal js-modal" role="dialog">
	<div class="o-flag u-fill-height">
		<div class="o-flag__body" data-dismiss="modal">
			<div class="c-modal__dialog js-modal-dialog">
				<div class="c-modal__inner">
					<button class="c-svg-icon c-svg-icon--close js-close-modal" data-dismiss="modal" aria-hidden="true">
						<svg class="c-svg-icon__svg c-svg-icon--close__svg">
							<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-cross"></use>
						</svg>
					</button>
					<?php get_template_part('partials/part-login'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
