<?php
	status_header( 404 );
    nocache_headers();
    include( get_query_template( '404' ) );
    die();
?>    	