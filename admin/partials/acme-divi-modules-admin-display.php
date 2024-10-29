<?php
	/**
	 * Provide a admin area view for the plugin
	 *
	 * This file is used to markup the admin-facing aspects of the plugin.
	 *
	 * @link       http://acmemk.com
	 * @since      1.0.0
	 *
	 * @package    Acme_Divi_Modules
	 * @subpackage Acme_Divi_Modules/admin/partials
	 */

	$error_msg = null;
	$tab = $_REQUEST['acme_tab'];
	$active = array ();
		switch($tab){
			case "adm_abmb_settings":
				$active[1] = 'nav-tab-active';
				break;
			case "adm_abmp_settings":
				$active[2] = 'nav-tab-active';
				break;
			case "adm_abmsi_settings":
				$active[3] = 'nav-tab-active';
				break;
			default:
				$active[0] = 'nav-tab-active';
				break;
		}
//apply_filters ( 'acme_debug', $tab, 'tab value' );
	if ( ! isset( $plugin_data ) ) {
		$plugin_data      = apply_filters( 'acme_drop_data', null );
		$plugin_name      = $plugin_data['plugin_name'];
		$abmp_options       = $plugin_data['abmp_options'];
		$options_presets = isset( $ambp_options['abmp_presets'] ) ? explode( ',', $abmp_options['abmp_presets'] ) : null;
	}

	if ( false == $plugin_data['divi_exists'] ) {
		$error_msg = sprintf(__( 'Divi Builder is not installed. Don\'t panic, you can still download it %shere%s.', $this->plugin_name ),'<a href="http://elegantthemes.com/" target="_blank">','</a>');
	}

?>
<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<?php if (null!==$error_msg): ?>
		<div class="notice notice-error"><p><?php echo $error_msg ?></p></div>
		<?php ?>
	<?php else: ?>

	<nav class="nav-tab-wrapper">
		<a class="nav-tab <?php echo $active[0];?>" href="?page=acme-divi-modules&acme_tab=adm_main_settings"><?php _e('Basic Settings',$plugin_name); ?></a>
		<a class="nav-tab <?php echo $active[1];?>" href="?page=acme-divi-modules&acme_tab=adm_abmb_settings"><?php _e('Extended Blog Module',$plugin_name); ?></a>
		<a class="nav-tab <?php echo $active[2];?>" href="?page=acme-divi-modules&acme_tab=adm_abmp_settings"><?php _e('Extended Portfolio',$plugin_name); ?></a>
		<a class="nav-tab <?php echo $active[3];?>" href="?page=acme-divi-modules&acme_tab=adm_abmsi_settings"><?php _e('Slide In Module',$plugin_name); ?></a>
	</nav>

	<?php
		switch($tab){
			case "adm_abmb_settings":
				## Content for the abmb tab
				include('acme-divi-modules-admin-display-abmb-main-form.php');
				break;
			case "adm_abmp_settings":
				## Content for the abmp tab
				include('acme-divi-modules-admin-display-abmp-main-form.php');
				break;
			case "adm_abmsi_settings":
				##  Content for the abmsi tab
				include('acme-divi-modules-admin-display-abmsi-main-form.php');
				break;
			default:
				## Content for the main settings tab
				include('acme-divi-modules-admin-display-options.php');
				break;
		} ?>

	</div>
	<?php endif ?>
</div>
