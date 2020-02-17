<?php

$rixoPostsPagesArray = array(
	'select' => __('Select a post/page', 'rixo'),
);

$rixoPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$rixoPostsPagesQuery = new WP_Query( $rixoPostsPagesArgs );
	
if ( $rixoPostsPagesQuery->have_posts() ) :
							
	while ( $rixoPostsPagesQuery->have_posts() ) : $rixoPostsPagesQuery->the_post();
			
		$rixoPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$rixoPostsPagesTitle = get_the_title();
		}else{
				$rixoPostsPagesTitle = get_the_ID();
		}
		$rixoPostsPagesArray[$rixoPostsPagesId] = $rixoPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$rixoYesNo = array(
	'select' => __('Select', 'rixo'),
	'yes' => __('Yes', 'rixo'),
	'no' => __('No', 'rixo'),
);

$rixoSliderType = array(
	'select' => __('Select', 'rixo'),
	'header' => __('WP Custom Header', 'rixo'),
	'slider' => __('rixo Header', 'rixo'),
);

$rixoServiceLayouts = array(
	'select' => __('Select', 'rixo'),
	'one' => __('One', 'rixo'),
	'two' => __('Two', 'rixo'),
);

$rixoAvailableCats = array( 'select' => 'Select' );

$rixo_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $rixo_categories_raw as $category ){
	
	$rixoAvailableCats[$category->term_id] = $category->name;
	
}
