<div class="frontPageContainer">
	
	<div class="frontPageProducts">
		
		<?php

				$rixo_left_cat = '';

				if(get_theme_mod('rixo_products_cat')){
					$rixo_left_cat = get_theme_mod('rixo_products_cat');
				}else{
					$rixo_left_cat = 0;
				}		

				$rixo_left_args = array(
				   // Change these category SLUGS to suit your use.
				   'ignore_sticky_posts' => 1,
				   'post_type' => array('post'),
				   'posts_per_page'=> -1,
				   'cat' => $rixo_left_cat
				);

				$rixo_left = new WP_Query($rixo_left_args);		

				if ( $rixo_left->have_posts() ) : while ( $rixo_left->have_posts() ) : $rixo_left->the_post();
   		?>
		
		<div class="frontPageProduct">
		
			<div class="frontPageImage">

				<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('home-posts');
					}else{
						echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/service.jpg" />';
					}						
				?>

			</div><!-- .frontPageImage -->

			<div class="frontPageDesc">

				<a class="front-page-post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title( '<h2 class="entry-title">', '</h2>' ); ?></a>

				<p>
					<?php  

						if( has_excerpt() ){
							echo esc_html(get_the_excerpt());
						}else{
							echo esc_html(rixolimitedstring(get_the_content(), 50));
						}

					?>				
				</p>

			</div><!-- .frontPageDesc -->
			
		</div><!-- .frontPageProduct -->
		<?php endwhile; wp_reset_postdata(); endif;?>
		
	</div><!-- .frontPageProducts -->
	
</div><!-- .frontPageContainer -->	