<?php

function swh_like_dislike_btn_register_menu_page()
{
   add_menu_page('SWH Settings Page','SWH Settings','manage_options','swh-settings','swh_like_dislike_btn_setting_page_html','dashicons-thumbs-up',30);
}

add_action('admin_menu','swh_like_dislike_btn_register_menu_page');


function swh_like_dislike_btn_setting_page_html()
{
   if(!is_admin()){
       return;
   }?>
       <div class="wrap">
           <h1 style="padding: 10px; background:#333; color:#fff;"><?= esc_html(get_admin_page_title()) ?></h1>
           <?php
   // Check if there are any settings errors and display them
   settings_errors();
   ?>
           <form action="options.php" method="post">
               <?php
                   settings_fields( 'swhldb_settings_group' );
                   do_settings_sections( 'swh-settings' );
                   submit_button('Save Changes');
               ?>
           </form>
       </div>
   <?php

}

function swhldb_plugin_settings(){
   register_setting('swhldb_settings_group','swhldb_like_label');
   register_setting('swhldb_settings_group','swhldb_dislike_label');
   add_settings_section('swhldb_label_settings_section','SWH BUTTON SECTION','swhldb_plugin_settings_section_cb','swh-settings');
   add_settings_field('swhldb_like_label_field','Like Button Label','swhldb_plugin_settings_field1_cb','swh-settings','swhldb_label_settings_section');
   add_settings_field('swhldb_dislike_label_field','DisLike Button Label','swhldb_plugin_settings_field2_cb','swh-settings','swhldb_label_settings_section');
}

add_action('admin_init','swhldb_plugin_settings');

function swhldb_plugin_settings_section_cb()
{
}
function swhldb_plugin_settings_field1_cb()
{
   // get the value of the setting we've registered with register_setting()
   $setting = get_option('swhldb_like_label');
   // output the field
   ?>
   <input type="text" name="swhldb_like_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
   <?php
}
function swhldb_plugin_settings_field2_cb()
{
   // get the value of the setting we've registered with register_setting()
   $setting = get_option('swhldb_dislike_label');
   // output the field
   ?>
   <input type="text" name="swhldb_dislike_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
   <?php
}