<?php
/*
Custom feedback comments
https://codex.wordpress.org/Function_Reference/wp_list_comments#Comments_Only_With_A_Custom_Comment_Display
 */

function custom_pagination($numpages = '', $pagerange = '', $paged = '') {

	if (empty($pagerange)) {
		$pagerange = 2;
	}

	/**
	 * This first part of our function is a fallback
	 * for custom pagination inside a regular loop that
	 * uses the global $paged and global $wp_query variables.
	 *
	 * It's good because we can now override default pagination
	 * in our theme, and use this function in default quries
	 * and custom queries.
	 */
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if (!$numpages) {
			$numpages = 1;
		}
	}

	/**
	 * We construct the pagination arguments to enter into our paginate_links
	 * function.
	 */
	$pagination_args = array(
		'base'         => get_pagenum_link(1).'%_%',
		'format'       => '/%#%',
		'total'        => $numpages,
		'current'      => $paged,
		'show_all'     => False,
		'end_size'     => 1,
		'mid_size'     => $pagerange,
		'prev_next'    => True,
		'prev_text'    => __('&laquo;'),
		'next_text'    => __('&raquo;'),
		'type'         => 'plain',
		'add_args'     => false,
		'add_fragment' => '',
	);

	$paginate_links = paginate_links($pagination_args);

	if ($paginate_links) {
		echo "<nav class='custom-pagination'>";
		echo "<span class='page-numbers page-num'>Page ".$paged." of ".$numpages."</span> ";
		echo $paginate_links;
		echo "</nav>";
	}

}

function bst_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ('div' == $args['style']) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
			<<?php echo $tag?> <?php comment_class(empty($args['has_children'])?'':'parent')?> id="comment-<?php comment_ID()?>">
	<?php if ('div' != $args['style']):?>
			    <div id="div-comment-<?php comment_ID()?>" class="comment-body">
	<?php endif;?>
	<div class="comment-author vcard">
			      <div style="width: 60px; float: left;">
	<?php echo get_avatar($comment->comment_author_email, $size = '40');?>
			      </div>
			      <div>
			        <h4 style="margin: 0 0 5px 0"><?php comment_author();?></h4>
			        <p class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID))?>"><?php printf('%1$s '.__('at', 'bst').' %2$s', get_comment_date(), get_comment_time())?></a></p>
	<?php if ($comment->comment_approved == '0'):?>
			          <p><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'bst')?></em></p>
	<?php endif;?>
	</div>
			    </div>
			    <div class="row">
			      <div class="col-sm-12">
			        <hr/>
	<?php comment_text()?>
			      </div>
			    </div>
			    <div class="reply">
			      <p class="text-right"><?php edit_comment_link("<span class='btn btn-default btn-info'>".__('Edit', 'bst')."</span>", ' ', '');?> <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])))?></p>
			    </div>
	<?php if ('div' != $args['style']):?>
	</div>
	<?php
	endif;}
