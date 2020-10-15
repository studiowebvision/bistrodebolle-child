<?php

add_action('admin_notices', 'webvision_admin_notice');

function webvision_admin_notice()
{
    //global $pagenow;
	$screen = get_current_screen();

    // Only show this message on the admin dashboard and if asked for
    if ($_GET['notice'] == 'success'){
		    echo '<div class="notice notice-success is-dismissible">
        <p>Mail is verstuurd naar de klant!</p>
		    </div>';

    }
	 if ( $_GET['notice'] == 'fail'){
		  echo '<div class="notice notice-error is-dismissible">
        <p>Fout: mail is niet verstuurd naar de klant!</p>
	  	</div>';

    }
}