<?php global $locator; if (!$locator) exit('Forbidden. hacking attempt'); ?>

<div class="wrap videe-settings">
	<h1> Account Settings</h1>
	<fieldset>
		<legend><span><?php _e('Videe.TV Player Settings', 'videe') ?></span></legend>
		<form method="post" action="" id="settings">

			<?php
			settings_fields(Videe_Settings::PAGE_NAME);
			$locator->settings->do_settings_sections(Videe_Settings::PAGE_NAME, Videe_Settings::SETTINGS_SECTION_NAME);
			?>
			<div class="save">
				<input type="submit" name="submit_settings"  class="button button-primary videe_settings" value="Save changes">
				<span class="spinner_update"></span>
			</div>

			<div class="clear"></div>
		</form>
	</fieldset>

    <?php if ($this->locator->getOption('userId')):?>

		<fieldset>
			<legend><span><?php _e('Payment Information', 'videe') ?></span></legend>
			<?php if ( !$this->locator->getOption('manualRegistration') && !$this->locator->getOption('verified')):?> 
				<p>To receive earnings generated by Videe.TV plugin, please first <a href="<?php echo $locator->admin->getPageUrl('verify');?>" >verify your account</a>. </p>
			<?php endif; ?>

			<form method="post" action="" id="paymentinfo">

				<?php
				settings_fields(Videe_Settings::PAGE_NAME);
				$locator->settings->do_settings_sections(Videe_Settings::PAGE_NAME, Videe_Settings::PAYMENTINFO_SECTION_NAME);
				$info = $locator->user->getBillingPaypalInfo();
				$disabled = isset($info['paypal_email']) ? 'disabled': '';
				?>
				<div class="save">
					<input type="submit" name="submit_paymentinfo" <?php echo $disabled; ?> class="button button-primary videe_settings" value="Submit">
					<span class="spinner_update"></span>
				</div>
			</form>
		</fieldset>

    <?php endif; ?>
</div>