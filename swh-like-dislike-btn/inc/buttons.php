<?php
function swhldb_Buttons($content)
{
    $like_btn_label=get_option('swhldb_like_label','Like');
    $dislike_btn_label=get_option('swhldb_dislike_label','disLike');
    $post_id=get_the_ID();
    $user_id=get_current_user_id();


    $btn_wrap_start='<div class="swhldb-btn-wrapper">';
    $like='<a href="javascript:;" onclick="swhldb_like_ajax('. $post_id.','.$user_id.')" class="swhldb-btn swhldb-btn-like"><i class="fas fa-thumbs-up"></i> '.$like_btn_label.'</a>';
    $dislike='<a href="javascript:;" onclick="swhldb_dislike_ajax('. $post_id.','.$user_id.')" class="swhldb-btn swhldb-btn-dislike"><i class="fas fa-thumbs-down"></i>  '.$dislike_btn_label.'</a>';
    $btn_wrap_end='</div>';

    $res='<div id="ajax-like-res" class="ajax-response"></div>';

    $content.=$btn_wrap_start;
    $content.=$like;
    $content.=$dislike;
    $content.=$btn_wrap_end;
    $content.=$res;

    return $content;
}

add_filter('the_content','swhldb_Buttons');