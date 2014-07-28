$(function loadPosts(){
    // don't cache ajax or content won't be fresh
    $.ajaxSetup ({
        cache: false,
        complete: function() {
          // Schedule the next request when the current one's complete
          setTimeout(loadPosts, 3000);
        }
    });
    var ajax_load = "<img src='images/small-loading.gif' alt='loading...' />";
    
    var start = 0;
    var loadUrl = window.location.origin + window.location.pathname + "?q=post/from/" + start;
    
    $("#post-container").html(ajax_load).load(loadUrl);
});