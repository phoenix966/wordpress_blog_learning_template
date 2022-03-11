<?php get_header();?>

<!-- Page Title
  ================================================== -->
  <div id="page-title">

     <div class="row">

        <div class="ten columns centered text-center">
           <h1>Our Blog<span>.</span></h1>

           <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
           enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>
        <?php do_shortcode( '[URIS id=183]' ); ?>
     </div>

  </div> <!-- Page Title End-->

  <!-- Content
  ================================================== -->
  <div class="content-outer">

     <div id="page-content" class="row">

        <div id="primary" class="eight columns">
        <?php

            $ourCurrentPage = get_query_var('paged');

            $blogPosts = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 2,
            'paged' => $ourCurrentPage
            ));

            if ($blogPosts->have_posts()) :
            while ($blogPosts->have_posts()) :
                $blogPosts->the_post();
                ?> 
                    <?php get_template_part('template-parts/blog', 'article'); ?>
                <?php
            endwhile; ?>
         <nav class="pagination">
            <?php
               echo paginate_links(array(
                  'total' => $blogPosts->max_num_pages,
                  'type' => 'list',
                  'end_size' => 1,
                  'mid_size' => 1,
                  'prev_next' => true,
                  'prev_text' => 'Prev',
                  'next_text' => 'Next'
              ));
              ?>
         </nav>
         <?php
            endif;
        ?>

        </div> <!-- Primary End-->

        <div id="secondary" class="four columns end">

           <?php  get_sidebar(); ?>

        </div> <!-- Secondary End-->

     </div>

  </div> <!-- Content End-->

  <!-- Tweets Section
  ================================================== -->
  <section id="tweets">

     <div class="row">

        <div class="tweeter-icon align-center">
           <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
           <li>
              <span>
              This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
              Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
              <a href="#">http://t.co/CGIrdxIlI3</a>
              </span>
              <b><a href="#">2 Days Ago</a></b>
           </li>
           <!--
           <li>
              <span>
              This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
              Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
              <a href="#">http://t.co/CGIrdxIlI3</a>
              </span>
              <b><a href="#">3 Days Ago</a></b>
           </li>
           -->
        </ul>

        <p class="align-center"><a href="#" class="button">Follow us</a></p>

     </div>

  </section> <!-- Tweets Section End-->

<?php get_footer();?>