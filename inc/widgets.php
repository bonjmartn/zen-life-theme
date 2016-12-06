<?php

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

function footer_widgets( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>'
	));
}

function social_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>'
	));
}

function endofpost_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '<div class="endofpost">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}


function social_widget_header( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));
}

function social_widget_sidebar( $name, $id, $description ) {

	register_sidebar(array(
		'name' => sprintf( $name ),	 
		'id' => $id, 
		'description' => sprintf( $description ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

// Social Icons Header Widget

social_widget_header( 'Social Icons Header', 'social-icons-header', 'Social icons that display in the header. If you dont want to show one of the icons, leave the URL field blank.' );

// Create Homepage Widgets

create_widget( 'Headline Button', 'front-button', 'A button for the headline area' );
create_widget( 'Homepage Feature 1', 'create-your-own-1', 'First feature area on the homepage' );
create_widget( 'Homepage Feature 2', 'create-your-own-2', 'Second feature area on the homepage' );
create_widget( 'Homepage Feature 3', 'create-your-own-3', 'Third feature area on the homepage' );


// Create Widget areas for Pages and Blog Posts

create_widget( 'Page Sidebar', 'page', 'Displays on the side of pages' );
create_widget( 'Blog Sidebar', 'blog', 'Displays on the right of blog posts' );

// CTA Bar Widget

create_widget( 'Call to Action Bar', 'front-bar', 'Displays on the bottom of the homepage, just above the footer' );

// Social Icons Footer Widget

social_widget( 'Social Icons Footer', 'social-icons-footer', 'Social icons that display in the footer. If you dont want to show one of the icons, leave the URL field blank.' );

// Create Widget areas for Footer

footer_widgets( 'Footer 1', 'footer-1', 'Displays first in the footer' );
footer_widgets( 'Footer 2', 'footer-2', 'Displays second in the footer' );
footer_widgets( 'Footer 3', 'footer-3', 'Displays third in the footer' );

// Create End of Posts widget area

endofpost_widget( 'End of Posts', 'end-post', 'Displays at the bottom of blog posts' );

?>