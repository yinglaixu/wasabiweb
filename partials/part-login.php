<?php
// If called from AJAX, change to the correct language
if( isset( $_GET['language'] ) ) {
	global $sitepress;
	$sitepress->switch_lang( $_GET['language'] );
}
?>

<?php if( isset( $_COOKIE['renthia_registration'] ) ) : ?>
	<div class="u-text-center u-push--bottom u-txt-lg u-soft" style="border-radius: 4px;border: 2px solid green;color: green">
		<?php echo icl_t('Theme-login', 'Property not registered correctly'); ?>
	</div>
<?php endif; ?>

<header class="u-text-center">
    <h1 class="u-flush--bottom">
          <?php echo icl_t('Theme-login', 'Login heading'); ?>
    </h1>
	<p>
		<?php echo icl_t('Theme-login', 'Login text'); ?>
	</p>
</header>

<ul class="o-bare-list o-bare-list--spaced">
    <li>
        <a href="<?php echo site_url(); ?>/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Facebook&redirect_to=http%3A%2F%2Fwww.renthia.com%2Fwp-admin%2F" class="c-btn c-btn--lg c-btn--full c-btn--facebook c-svg-icon c-svg-icon--btn-facebook">
            <svg class="c-svg-icon__svg c-svg-icon--btn-facebook__svg">
                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-facebook"></use>
            </svg>
            <?php echo icl_t('Theme-login', 'Facebook login'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo site_url(); ?>/wp-login.php?action=wordpress_social_authenticate&mode=login&provider=Google&redirect_to=http%3A%2F%2Fwww.renthia.com%2Fwp-admin%2F" class="c-btn c-btn--lg c-btn--full c-btn--google c-svg-icon c-svg-icon--btn-google">
            <svg class="c-svg-icon__svg c-svg-icon--btn-google__svg">
                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-google"></use>
            </svg>
            <?php echo icl_t('Theme-login', 'Google login'); ?>
        </a>
    </li>
</ul>
<div class="c-modal__divider">
    <span>
        <?php echo icl_t('Theme-login', 'Or'); ?>
    </span>
</div>

<?php
if( $_SESSION['login-failed'] == true ) :
	unset( $_SESSION['login-failed'] );
	?>
	<span style="color: red">
 		<?php echo icl_t('Theme-errors', 'Login failed'); ?>
	</span>
<?php endif; ?>

<?php
if( $_SESSION['email-already-taken'] == true ) :
	unset( $_SESSION['email-already-taken'] );
	?>
	<span style="color: red">
 		<?php echo icl_t('Theme-errors', 'Email already in use'); ?>
	</span>
<?php endif; ?>

<?php
if( $_SESSION['username-too-long'] == true ) :
	unset( $_SESSION['username-too-long'] );
	?>
	<span style="color: red">
 		<?php echo icl_t('Theme-errors', 'Username max 60 characters'); ?>
	</span>
<?php endif; ?>

<?php
if( $_SESSION['fields-validation'] == true ) :
	unset( $_SESSION['fields-validation'] );
	?>
	<span style="color: red">
 		<?php echo icl_t('Theme-errors', 'Account information is needed'); ?>

<?php endif; ?>

<form class="c-block-form" action="" method="post">
	<ul class="o-bare-list o-bare-list--spaced">
		<li>
			<ul class="o-bare-list o-bare-list--spaced-sixth">
				<li>
					<label for="modal-email">
						<strong><?php echo icl_t('Theme-form', 'E-mail'); ?>:</strong>
					</label>
				</li>
				<li>
					<input required autofocus type="text" class="c-text-input c-text-input--lg" name="login[email]" id="modal-email" placeholder="mailen@mailen.se">
				</li>
			</ul>
		</li>
		<li>
			<ul class="o-bare-list o-bare-list--spaced-sixth">
				<li>
					<label for="modal-password">
						<strong><?php echo icl_t('Theme-login', 'Password'); ?>:</strong>
					</label>
				</li>
				<li>
					<input required type="password" class="c-text-input c-text-input--lg" name="login[password]" id="modal-password">
				</li>
			</ul>
		</li>

		<?php // login-for-ask is hiding the li, used for tricking bots to fill in the field. ?>
		<li class="login-for-ask">
			<ul class="o-bare-list o-bare-list--spaced-sixth">
				<li>
					<label for="modal-password">
						<strong>Ask:</strong>
					</label>
				</li>
				<li>
					<input type="text" class="c-text-input c-text-input--lg" name="login[ask]" id="modal-password">
				</li>
			</ul>
		</li>

<!--		<li>-->
<!--			<input class="c-styled-input-el u-hidden" type="checkbox" name="login[register]" value="true" id="modal-register-checkbox">-->
<!--			<label class="c-styled-input-option c-styled-input-option--radio" for="modal-register-checkbox">-->
<!--                <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">-->
<!--                    <svg class="c-styled-input-option__svg">-->
<!--	                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://localhost/renthia/wp-content/themes/wasabiweb/build/img/sprite.svg#icon-tick-alt"></use>-->
<!--                    </svg>-->
<!--                </span>-->
<!--				--><?php //echo icl_t('Theme-login', 'Register text'); ?>
<!--			</label>-->
<!--		</li>-->
		<li>
			<a href="<?php echo wp_lostpassword_url( site_url() ); ?>"><?php echo icl_t('Theme-login', 'Forgot password?'); ?></a>
		</li>
		<li>
			<button type="submit" class="c-btn c-btn--brand c-btn--lg c-btn--full">
				<?php echo icl_t('Theme-login', 'Login Button text'); ?>
			</button>
		</li>
        <li>
            <span><?php echo icl_t( 'Theme-login', 'Dont have account' ) ?></span>
            <a href="#" class="btn btn--brand btn--md"
               data-change="modal"
               data-target="<?php bloginfo( 'template_directory' ); ?>/partials/modals/signup.php?language=<?php echo ICL_LANGUAGE_CODE; ?>">
				<?php echo icl_t( 'Theme-login', 'Signup heading' ) ?>
            </a>
        </li>
	</ul>
	<?php wp_nonce_field( 'user_validation', 'user_nonce' ); ?>
</form>
