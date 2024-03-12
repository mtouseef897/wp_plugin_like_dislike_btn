<?php
 if(!function_exists('swh_like_dislike_btn_add_scripts'))
 {
    function swh_like_dislike_btn_add_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('swh-like-dislike-btn-js',SWH_LIKE_DISLIKE_BTN_DIR.'assets/js/main.js','jQuery','1.0.0',true);
 
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4', 'all');
        wp_enqueue_style('swh-like-dislike-btn-css',SWH_LIKE_DISLIKE_BTN_DIR.'assets/css/styles.css');

        wp_enqueue_script('swhldb-ajax-js',SWH_LIKE_DISLIKE_BTN_DIR.'assets/js/ajax.js','jQuery','1.0.0',true);
        wp_localize_script('swhldb-ajax-js','swhldb_ajax_url',array(
            'ajax_url'=>admin_url('admin-ajax.php')
        ));
    }

    add_action('wp_enqueue_scripts','swh_like_dislike_btn_add_scripts');
 }
