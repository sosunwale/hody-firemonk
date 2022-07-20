<?php
/**
 * Inner Content Group pattern
 */
return array(
	'title'      => __( 'Inner Content', 'hody-firemonk' ),
	'categories' => array( 'columns', 'sections'),
	'content'    => '<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"bottom":"5px"}}},"layout":{"inherit":true}} -->
	<div class="wp-block-group alignwide" style="padding-bottom:5px"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"4em","bottom":"4em"}},"border":{"bottom":{"color":"var:preset|color|separator","width":"1px"}}}} -->
	<div class="wp-block-group alignwide" style="border-bottom-color:var(--wp--preset--color--separator);border-bottom-width:1px;padding-top:4em;padding-right:20px;padding-bottom:4em;padding-left:20px"><!-- wp:heading -->
	<h2></h2>
	<!-- /wp:heading -->
	
	<!-- wp:paragraph -->
	<p></p>
	<!-- /wp:paragraph --></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->',
);

?>