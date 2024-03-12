jQuery(document).ready(function($) {  
// Get the div element
var myDiv = $('#ajax-like-res');

// Check if the div is empty
if ($.trim(myDiv.html()) === '') {
    // If empty, hide the div
    myDiv.hide();
} else {
    // If not empty, show the div
    myDiv.show(); // Or any other display value
}


});

function swhldb_like_ajax(postid,usrid){
    var post_id=postid;
    var usr_id=usrid;

jQuery(document).ready(function($) {  
        jQuery.ajax(
        {
            url:swhldb_ajax_url.ajax_url,
            type:'post',
            data:{
                action:'swhldb_like_ajax_action',
                pid:post_id,
                uid:usr_id
            },
            success:function(response){
                jQuery('#ajax-like-res').html(response).show();
            }
        }
    
    )
});


    // jQuery(document).ready(function($){
    //     jQuery('#ajax-like-res span').html("Hello World");
    // })
}
function swhldb_dislike_ajax(postid,usrid){
    var post_id=postid;
    var usr_id=usrid;

jQuery(document).ready(function($) {  
        jQuery.ajax(
        {
            url:swhldb_ajax_url.ajax_url,
            type:'post',
            data:{
                action:'swhldb_dislike_ajax_action',
                pid:post_id,
                uid:usr_id
            },
            success:function(response){
                jQuery('#ajax-like-res').html(response).show();
            }
        }
    
    )
});


    // jQuery(document).ready(function($){
    //     jQuery('#ajax-like-res span').html("Hello World");
    // })
}
