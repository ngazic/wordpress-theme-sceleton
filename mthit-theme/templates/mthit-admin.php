<h1>Mthit Theme Options</h1>
<?php settings_errors(); ?>
<?php
	$logo = esc_attr( get_option( 'logo' ) ); ?>
<div class="guardsman-sidebar-preview" style="margin-bottom: 30px; margin-top: 30px;">
	<div class="guardsman-sidebar">
		<div class="image-container">
		<h3>Logo image preview</h3>
			<div class="logo-preview upload-picture-preview" style="background-image: url(<?php print $logo; ?>);width: 300px; height: 100px; background-size: contain;background-repeat: no-repeat;"></div>
		</div>
	</div>
</div>
<form method="post" action="options.php" class="">
	<?php settings_fields( 'mthit-setting-group' ); ?>
	<?php do_settings_sections( 'mthit' ); ?>
	<?php submit_button(); ?>
</form>