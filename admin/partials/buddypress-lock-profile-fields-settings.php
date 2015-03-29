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
    
    <h3 class="title">Locked Fields</h3>
    <table class="form-table">
      <?php

        $groups = bp_xprofile_get_groups( array(
          'fetch_fields' => true
        ) );

        foreach ( $groups as $group ):
        
          ?>
          <tr valign="top">
            <th scope="row"><?php echo $group->name ?></th>
            <td>
            <?php

            if ( !empty( $group->fields ) ):
              foreach ( $group->fields as $field ):
                $field = new BP_XProfile_Field( $field->id );
                $is_locked = in_array( $field->name, $locked_fields );
                ?>
                <label>
                  <input
                    type="checkbox"
                    name="locked_fields[]"
                    <?php if ($is_locked) echo 'checked'; ?>
                    value="<?php echo $field->name ?>">
                  <?php echo $field->name ?>
                </label><br>
                <?php
              endforeach;
            endif;
            ?>

            </td>
          </tr>
          <?php
        
        endforeach;

      ?>                
    </table>

    <?php submit_button(); ?>    
  </form>

</div>
