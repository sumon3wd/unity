<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xs
 */
/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'geobin_post_nav' ) ) :

	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function geobin_post_nav() {
// Don't print empty markup if there's nowhere to navigate.
		
		$next_post	 = get_next_post();
		$pre_post	 = get_previous_post();
		if ( !$next_post && !$pre_post ) {
			return;
		}

		echo '<nav class="post-navigation clearfix mrtb-40">';


		echo '<div class="post-previous">';
		if ( !empty( $pre_post ) ):
			?>
			<a href="<?php echo get_the_permalink( $pre_post->ID ); ?>">
				<h3><?php echo get_the_title( $pre_post->ID ) ?></h3>
				<span><i class="fa fa-long-arrow-left"></i><?php esc_html_e( 'Previous Post', 'geobin' ) ?></span>
			</a>

			<?php
		endif;
		echo '</div>';
		echo '<div class="post-next">';

		if ( !empty( $next_post ) ):
			?>
			<a href="<?php echo get_the_permalink( $next_post->ID ); ?>">
				<h3><?php echo get_the_title( $next_post->ID ) ?></h3>

				<span><?php esc_html_e( 'Next Post', 'geobin' ) ?> <i class="fa fa-long-arrow-right"></i></span>
			</a>

			<?php
		endif;
		echo '</div>';
		echo '</nav>';
	}

endif;


/**
 * ----------------------------------------------------------------------------------------
 *  - Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'geobin_post_meta' ) ) {

	function geobin_post_meta() {


		echo '<div class="post-meta">';
		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<span class="meta-featured-post sticky"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Featured', 'geobin' ) . ' </span>';
			}

			// Echo only for single blog post
			if( is_single() ){
				echo '<span class="single-post-meta-date">';
                    echo ' <i class="fa fa-clock-o"></i> '. get_the_date();
                echo  '</span>';
			}

			// Get the post author.
			printf(
			'<span class="post-author"><I class="icon icon-user2"></i>'. esc_html__( ' By ', 'geobin' ) . '<a href="%2$s" rel="author">%3$s</a></span>', get_avatar( get_the_author_meta( 'ID' ), 55 ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()
			);

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<span class="meta-categories post-cat"> <i class="icon icon-folder"></i>' . $category_list . ' </span>';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<span class="post-comment"><i class="icon icon-comment"></i> ';
				comments_popup_link( esc_html__( '0', 'geobin' ), esc_html__( '1 Comment', 'geobin' ), esc_html__( '% Comments', 'geobin' ) );
				echo '</span>';
			endif;

			if ( !is_single() ) {
				$tag_list = get_the_tag_list( '', ', ' );
				if ( $tag_list ) {
					echo '<span class="tagcloud"><i class="icon icon-tag"></i>' . $tag_list . ' </span>';
				}
			}
			if ( is_single() ) {
				// Edit link.
				if ( is_user_logged_in() ) {
					edit_post_link( esc_html__( 'Edit', 'geobin' ), '<span class="meta-edit"><i class="icon icon-pencil"></i>', '</span>' );
				}
			}
		}
		echo '</div>';
	}

	if ( !function_exists( 'geobin_post_meta_left' ) ) {

		function geobin_post_meta_left() {

			echo '<div class="post-item-date">';
			if ( get_post_type() === 'post' ) {

				echo '<span class="post-date"><span class="date">' . get_the_date('d') . '</span>' .
                  '<span class="month">' . get_the_date('M') . '</span></span>';

			}
			echo '</div>';
		}

	}
}


/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xs
 */
/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'geobin_paging_nav' ) ) {

	function geobin_paging_nav() {


		if ( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 )
			return;

		$paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max	 = intval( $wp_query->max_num_pages );

		/** 	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/** 	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="paging text-center"><ul class="pagination">' . "\n";

		/** 	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<span class="icon icon-arrow-left"></span>' ) );

		/** 	Link to first page, plus ellipses if necessary */
		if ( !in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( !in_array( 2, $links ) )
				echo '<li>…</li>';
		}

		/** 	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/** 	Link to last page, plus ellipses if necessary */
		if ( !in_array( $max, $links ) ) {
			if ( !in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/** 	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link( '<i class="icon icon-arrow-right"></i>' ) );

		echo '</ul></div>' . "\n";
	}

}
/**
 * Single post footer.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package xs
 */
/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - footer tags with social share
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'geobin_single_post_footer' ) ) {

	function geobin_single_post_footer() {
		?>


		<?php
		echo '<div class="post-footer clearfix">' . "\n";
		$tag_list = get_the_tag_list( '', ' ' );

		if ( $tag_list ) {
			echo '<div class="post-tags pull-left">' . "\n";
			echo ' <strong>' . esc_html_e( 'Tags', 'geobin' ) . ': </strong>' . "\n";
			echo geobin_kses( $tag_list );
			echo '</div>' . "\n";
		}
		?>
		<div class="share-items pull-right">
			<?php
			if ( function_exists( 'geobin_social_share' ) ) {
				geobin_social_share();
			}
			?>

		</div><!-- Share items end -->
		<?php
		echo '</div>' . "\n"; ?>

        <?php
        if( defined('FW')) {
            $blog_author = fw_get_db_customizer_option('blog_author_settings');

            if( $blog_author == 'yes'){
        ?>
		<div class="author-box">
          <div class="author-img">
             <?php echo get_avatar( get_the_author_meta( 'user_email' ), 50 ); ?>
          </div>
          <!-- Author Img End -->
          <div class="author-info">
             <h3><?php the_author(); ?></h3>
             <p class="author-url"><a href="<?php the_author_meta('url'); ?>"><?php the_author_meta('url'); ?></a></p>
             <p><?php the_author_meta('description'); ?></p>
          </div>
          <!-- Author Info End -->
       </div>

	<?php } } }

}

function geobin_xs_comment_style( $comment, $args, $depth ) {
    if ( 'div' === $args[ 'style' ] ) {
        $tag		 = 'div';
        $add_below	 = 'comment';
    } else {
        $tag		 = 'li ';
        $add_below	 = 'div-comment';
    }
    ?>
    <?php
    if ( $args[ 'avatar_size' ] != 0 ) {
        echo get_avatar( $comment, $args[ 'avatar_size' ], '', get_the_author(), array( 'class' => 'comment-avatar pull-left' ) );
    }
    ?>
    <<?php
    echo geobin_kses( $tag );
    comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
    ?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
    ?>
    <div class="meta-data">

        <div class="pull-right reply"><?php
            comment_reply_link(
                array_merge(
                    $args, array(
                    'add_below'	 => $add_below,
                    'depth'		 => $depth,
                    'max_depth'	 => $args[ 'max_depth' ]
                ) ) );
            ?>
        </div>


        <span class="comment-author vcard"><?php
            printf( geobin_kses( '<cite class="fn">%s</cite>', 'geobin' ), get_comment_author_link(), esc_html__( 'says:', 'geobin' ) );
            ?>
			</span>
        <?php if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'geobin' ); ?></em><br/><?php }
        ?>

        <div class="comment-meta commentmetadata comment-date">
            <?php
            /* translators: 1: date, 2: time */
            printf(
                esc_html__( '%1$s at %2$s', 'geobin' ), get_comment_date(), get_comment_time()
            );
            ?>
            <?php edit_comment_link( esc_html__( '(Edit)', 'geobin' ), '  ', '' ); ?>
        </div>
    </div>
    <div class="comment-content">
        <?php comment_text(); ?>
    </div>
    <?php if ( 'div' != $args[ 'style' ] ) : ?>
        </div><?php
    endif;
}

function geobin_link_pages() {
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'geobin' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'next',
		'separator'			 => ' | ',
		'nextpagelink'		 => esc_html__( 'Next ', 'geobin' ) . '<I class="fa fa-angle-right"></i>',
		'previouspagelink'	 => '<I class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'geobin' ),
	);
	wp_link_pages( $args );
}
