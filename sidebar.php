<?php

// This gets the parent page ID
$parentid = $post->post_parent;

?>

<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4" role="complementary">
	<div class="sidebar-header">
		<h2>
			<a name="inThisSection" href="<?php echo get_permalink($parentid); ?>">
				Also in <?php the_title(); ?>
			</a>
		</h2>
	</div>
	<div class="sidebar-nav clearfix">
		<ul class="sibling">
			<?php

			// This uses wp_list_pages to get the list of siblings of the current page. However we're actually showing the children of the parent page. We're also excluding the current page ID ($post->ID) so as not to duplicate it in the navigation and sorting the links by their menu order, as set manually on the WP edit page
			// We're using depth=1 to ensure we only get the children of the parent page, not grandchildren
			//See http://codex.wordpress.org/Function_Reference/wp_list_pages for a full list of parameters
			echo wp_list_pages("echo=0&title_li=&child_of=$parentid&sort_column=menu_order&depth=1&exclude=$post->ID");

			?>
		</ul>
	</div>
</aside>