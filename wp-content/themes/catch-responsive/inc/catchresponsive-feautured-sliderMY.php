<?php
/**
 * Created by PhpStorm.
 * User: serfcompany
 * Date: 10.04.17
 * Time: 16:38
 */
$catchresponsive_page_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Permalink to '.the_title('','',false).'" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchresponsive_page_post_meta().'</div>
					</header>';
if ( $excerpt !='') {
    $catchresponsive_page_slider .= '<div class="entry-content"><p>'. $excerpt.'</p></div>';
}
$catchresponsive_page_slider .= '
				</div>--><!-- .entry-container -->
			</article><!-- .slides -->';



function catchresponsive_demo_slider( $options ) {
    $catchresponsive_demo_slider ='
								<article class="post hentry slides demo-image displayblock">
									<figure class="slider-image">
										<a title="Slider Image 1" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'.get_template_directory_uri().'/images/gallery/slider1.jpg" class="wp-post-image" alt="Slider Image 1" title="Slider Image 1">
										</a>
									</figure>
									<!--<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="Slider Image 1" href="#"><span>Slider Image 1</span></a>
											</h1>
										</header>
										<div class="entry-content">
											<p>Slider Image 1 Content</p>
										</div>
									</div>-->
								</article><!-- .slides -->

								<article class="post hentry slides demo-image displaynone">
									<figure class="Slider Image 2">
										<a title="Slider Image 2" href="'. esc_url( home_url( '/' ) ) .'">
											<img src="'. get_template_directory_uri() . '/images/gallery/slider2.jpg" class="wp-post-image" alt="Slider Image 2" title="Slider Image 2">
										</a>
									</figure>
									<!--<div class="entry-container">
										<header class="entry-header">
											<h1 class="entry-title">
												<a title="Slider Image 2" href="#"><span>Slider Image 2</span></a>
											</h1>
										</header>
										<div class="entry-content">
											<p>Slider Image 2 Content</p>
										</div>
									</div>-->
								</article><!-- .slides --> ';
    return $catchresponsive_demo_slider;
}
