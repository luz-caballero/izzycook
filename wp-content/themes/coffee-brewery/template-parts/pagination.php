<?php
	the_posts_pagination( array(
		'prev_text' => esc_html__( 'Previous page', 'coffee-brewery' ),
		'next_text' => esc_html__( 'Next page', 'coffee-brewery' ),
	) );