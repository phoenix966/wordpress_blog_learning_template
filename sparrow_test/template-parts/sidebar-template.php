<aside id="sidebar">
	<div class="widget widget_search">
		<h5>Search</h5>
		<form action="#">

			<input class="text-search" type="text" onfocus="if (this.value == 'Search here...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search here...'; }" value="Search here...">
			<input type="submit" class="submit-search" value="">

		</form>
	</div>

	<div class="widget widget_categories">
		<h5 class="widget-title">Categories</h5>
        <ul class="link-list cf">
		<?php
			$terms =  get_terms(array(
                'taxonomy'   => 'category'
            ));
            foreach($terms as $term){
                ?>
                <li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name;?></a></li>
                <?php
            }
		?>
        </ul>
	</div>

	<div class="widget widget_tag_cloud">
		<h5 class="widget-title">Tags</h5>
		<div class="tagcloud cf">
            <?php
                $tags = get_tags(array(
                    'hide_empty' => false
                ));
                foreach($tags as $tag){
                    ?>
                    <a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name;?></a>
                    <?php
                }
            ?>
			<?php
				
			?>
		</div>
	</div>

	<div class="widget widget_photostream">
		<h5>Photostream</h5>
        <ul class="photostream cf">
            <?php
            global $post;
        
            $myposts = get_posts( array(
                'posts_per_page' => 8,
                'post_type' => 'post'
            ) );
        
            if ( $myposts ) {
                foreach ( $myposts as $post ) :
                    setup_postdata( $post ); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></li>
                <?php
                endforeach;
                wp_reset_postdata();
            }
            ?>
        </ul>
	</div>

</aside>
