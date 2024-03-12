<?php
function swhldb_like_ajax_action()
{
    
    global $wpdb;

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    $table_name=$wpdb->prefix."swhldb_system";

    //check if parameters are passed
    if(isset($_POST['pid']) && isset($_POST['uid']))
    {
        $user_id=$_POST['uid'];
        $post_id=$_POST['pid'];

        $check_like=$wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND like_count=1");
        $check_dislike=$wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND dislike_count=1");

        if($check_like>0)
        {
            echo "Sorry You Already Liked this Post!";
        }
        else if($check_dislike>0)
        {
            $update_success=$wpdb->update(
                ''.$table_name.'',
                array(
                    'like_count'=>1,
                    'dislike_count'=>0,
                ),
                array('user_id' => $user_id, 'post_id' => $post_id) // WHERE condition
                );

                if($update_success !=false)
                {
                    echo "Thank You For Revisiting and Liking this Post !";
                }
        }
        else 
        {
                $wpdb->insert(
                    ''.$table_name.'',
                    array(
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'like_count'=>1,
                        'dislike_count'=>0,
                    ),
                    array(
                        '%d',
                        '%d',
                        '%d',
                    )
                    );

                    if($wpdb->insert_id)
        {
            echo "Thank You For Loving this Post !";
        }
        }


        
    }


    wp_die();
}

add_action('wp_ajax_swhldb_like_ajax_action','swhldb_like_ajax_action');
add_action('wp_ajax_nopriv_swhldb_like_ajax_action','swhldb_like_ajax_action');

function swhldb_display_like_count($content)
{
    global $wpdb;
    $table_name=$wpdb->prefix."swhldb_system";
    $post_id=get_the_ID();
    $like_count=$wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE post_id='$post_id' AND like_count=1 ");

    $show_like_count='<center><i class="fas fa-heart"></i> This post has been liked <strong>'.$like_count.'</strong> time(s) </center>';

    $content.=$show_like_count;
    return $content;

}

add_filter('the_content','swhldb_display_like_count');

function swhldb_dislike_ajax_action()
{
    
    global $wpdb;

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    $table_name=$wpdb->prefix."swhldb_system";

    //check if parameters are passed
    if(isset($_POST['pid']) && isset($_POST['uid']))
    {
        $user_id=$_POST['uid'];
        $post_id=$_POST['pid'];

        $check_like=$wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND like_count=1");
        $check_dislike=$wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND dislike_count=1");

        if($check_dislike>0)
        {
            echo "Sorry You Already DisLiked this Post!";
        }
        else if($check_like>0)
        {
            $update_success=$wpdb->update(
                ''.$table_name.'',
                array(
                    'like_count'=>0,
                    'dislike_count'=>1,
                ),
                array('user_id' => $user_id, 'post_id' => $post_id) // WHERE condition
                );

                if($update_success !=false)
                {
                    echo "Respect for Your Changed Opinion for this Post!";
                }
        }
        else
        {
                $wpdb->insert(
                    ''.$table_name.'',
                    array(
                        'post_id'=>$post_id,
                        'user_id'=>$user_id,
                        'like_count'=>0,
                        'dislike_count'=>1,
                    ),
                    array(
                        '%d',
                        '%d',
                        '%d',
                    )
                    );
        }

        if($wpdb->insert_id)
        {
            echo "Respect Your Opinion for this Post";
        }
    }


    wp_die();
}

add_action('wp_ajax_swhldb_dislike_ajax_action','swhldb_dislike_ajax_action');
add_action('wp_ajax_nopriv_swhldb_dislike_ajax_action','swhldb_dislike_ajax_action');