<?php
require_once( '../../../../../wp-blog-header.php' );
header('HTTP/1.1 200 OK');
$id = sanitize_text_field( $_GET['id'] );
$language_code = sanitize_text_field( $_GET['language'] );
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
                    <header class="u-text-center">
	                	<h1 class="u-flush--bottom">
						    <?php echo icl_t('Theme-properties', 'Apply', false, $parameter, false, $language_code); ?>
						</h1>
						<p><?php the_field('address', $id); ?></p>
                    </header>
					<form class="c-block-form" action="" method="post">
						<input type="hidden" name="applyform" value="true">
						<input type="hidden" name="formname" value="applyform">
					    <ul class="o-bare-list o-bare-list--spaced">
					        <li>
					        	<ul class="o-bare-list o-bare-list--spaced-sixth">
                                    <li>
                                        <label for="modal-email">
                                            <strong><?php echo icl_t('Theme-form', 'E-mail', false, $parameter, false, $language_code); ?>:</strong>
                                        </label>                                            
                                    </li>
                                    <li>
					            		<input type="email" class="c-text-input c-text-input--lg" name="apply[email]" id="modal-email" required placeholder="mail@mail.com">
                                    </li>
                                </ul>
					        </li>
					        <li>
					        	<ul class="o-bare-list o-bare-list--spaced-sixth">
                                    <li>
                                        <label for="modal-telephone">
                                            <strong><?php echo icl_t('Theme-form', 'Telephonenumber', false, $parameter, false, $language_code); ?>:</strong>
                                        </label>                                            
                                    </li>
                                    <li>
					            		<input type="tel" class="c-text-input c-text-input--lg" name="apply[telephone]" id="modal-telephone" required placeholder="+46 700 - 00 00 00">
                                    </li>
                                </ul>
					        </li>
					        <li>
					        	<ul class="o-bare-list o-bare-list--spaced-sixth">
                                    <li>
                                    	<strong><?php echo icl_t('Theme-properties', 'Choose date', false, $parameter, false, $language_code); ?>:</strong>
                                    </li>
                                    <li>
                                        <div class="c-styled-select js-select">
                                            <label class="c-styled-select__label c-styled-select__label--sm">
                                                <span class="js-styled-select-text">
                                                    <?php echo icl_t('Theme-contact', 'Get contacted', false, $parameter, false, $language_code); ?>
                                                </span>
                                                <span class="c-svg-icon c-svg-icon--time">
                                                    <svg class="c-styled-select__chevron">
	                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
	                                                </svg>                                               
                                                </span> 
                                            </label>
	                                        <?php $showings = get_field('showings', $id); ?>
                                            <select required class="c-styled-select__select" name="apply[select-date]" id="select-date">
                                                <option value="" selected><?php echo icl_t('Theme-contact', 'Get contacted', false, $parameter, false, $language_code); ?></option>
                                                <?php if( $showings ) : ?>
	                                                <?php foreach( $showings as $showing ) : ?>
			                                            <option value="<?php echo $showing['time_and_date']; ?>"><?php echo $showing['time_and_date']; ?></option>
		                                            <?php endforeach; ?>
	                                            <?php else : ?>
                                                    <option value="<?php echo icl_t('Theme-contact', 'Get contacted about viewing', false, $parameter, false, $language_code); ?>"><?php echo icl_t('Theme-contact', 'Get contacted about viewing', false, $parameter, false, $language_code); ?></option>
	                                            <?php endif; ?>
                                            </select>
                                        </div>                                           
                                    </li>
                                </ul>
					        </li>
					        <li>
                                <?php
                                $permalink = get_permalink($id);
                                $assistantEmail = get_field('associate_account', $id);
                                ?>
						        <input type="hidden" name="apply[address]" value="<?php the_field('address', $id); ?>">
                                <input type="hidden" name="apply[link]" value="<?php echo $permalink; ?>">
                                <input type="hidden" name="apply[assistant-email]" value="<?php echo $assistantEmail['user_email']; ?>">
					            <button type="submit" class="c-btn c-btn--alpha c-btn--lg c-btn--full">
					                <?php echo icl_t('Theme-properties', 'Apply', false, $parameter, false, $language_code); ?>
					            </button>
					        </li>
					    </ul>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
