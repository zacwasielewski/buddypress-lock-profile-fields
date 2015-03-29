<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://wasielewski.org
 * @since      1.0.0
 *
 * @package    Buddypress_Lock_Profile_Fields
 * @subpackage Buddypress_Lock_Profile_Fields/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">

  <h2><?php echo __( 'Lock BuddyPress Profile Fields', 'buddypress-lock-profile-fields' ) ?></h2>

  <form method="post" action="options.php">
    <?php settings_fields( 'buddypress-lock-profile-fields' ); ?>
    <?php do_settings_sections( 'buddypress-lock-profile-fields' ); ?>
    
    <?php $locked_fields = get_option('locked_fields'); ?>
    
    <!--<h3 class="title"></h3>-->
    <table class="form-table">
      <tr valign="top">
        <th scope="row">Locked Fields</th>
        <td>

					<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( array( 'profile_group_id' => 1, 'fetch_field_data' => false ) ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>
            <?php while ( bp_profile_fields() ): bp_the_profile_field(); ?>

              <?php if ( bp_field_has_data() ): ?>
                <label>
                  <input
                    type="checkbox"
                    name="locked_fields[]"
                    <?php if (in_array( bp_get_the_profile_field_name(), $locked_fields )) echo 'checked'; ?>
                    value="<?php bp_the_profile_field_name() ?>">
                  <?php bp_the_profile_field_name() ?>
                </label><br>
              <?php endif; ?>

            <?php endwhile; ?>          
          <?php endwhile; endif; endif; ?>
                
        </td>
      </tr>
    </table>

    <?php submit_button(); ?>    
  </form>

</div>
