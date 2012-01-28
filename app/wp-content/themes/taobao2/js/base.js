       jQuery(function(){
           $('#valid').validate({
               mail:'email',
               mess_error:'Fill in the fileds',
               mess_mail:'Not true-mail'
           });
       });
       
        var serverHours = parseInt("<?php echo getHours(); ?>");
        var serverMinutes = parseInt("<?php echo getMinutes(); ?>");
	    var clientIP = "<?php echo getenv('REMOTE_ADDR'); ?>";
        var blogUrl = "<?php bloginfo('url'); ?>";

jQuery(document).ready(function() {

        jQuery("#fancys").fancybox({

    'titlePosition'  : 'inside',

    'transitionIn'  : 'none',

    'transitionOut'  : 'none',
    'type' : 'image'


   });

       });