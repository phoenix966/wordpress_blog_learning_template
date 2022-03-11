<!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">
         <?php
global $post;

$myposts = get_posts([
    'post_type' => 'slider',
]);

foreach ($myposts as $post) {
    setup_postdata($post);
    ?>

      <li>
         <div class="row">
            <div class="twelve columns">
               <div class="slider-text">
                  <h1><?php the_title();?><span>.</span></h1>
                  <p><?php the_content();?></p>
               </div>
               <div class="slider-image">
                  <?php the_post_thumbnail('large');?>
               </div>
            </div>
         </div>
      </li>

      <?php
}
wp_reset_postdata();
?>

		   </ul>

	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->

   <!-- Info Section
   ================================================== -->
   <section id="info">

      <div class="row">

         <div class="bgrid-quarters s-bgrid-halves">
         <?php
            // global $post;

            $myposts = get_posts([
               'posts_per_page' => 4,
               'post_type' => 'fields',
            ]);

            foreach ($myposts as $post) {
               setup_postdata($post);
               ?>
                           <div class="columns">
                              <h2><?php the_title();?></h2>
                              <p> <?php the_content();?> </p>
                           </div>
                           <?php
            }
            wp_reset_postdata();
         ?>
           </div>

      </div>

   </section> <!-- Info Section End-->

   <!-- Works Section
   ================================================== -->
   <section id="works">

      <div class="row">

         <div class="twelve columns align-center">
            <h1>Some of our recent works.</h1>
         </div>

         <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">

         <ul>
            <?php
                  global $post;

                  $myposts = get_posts(array(
                     'posts_per_page' => 4,
                     'post_type' => 'portfolio',
                  ));

                  if ($myposts) {
                     foreach ($myposts as $post):
                        setup_postdata($post);?>
                              <div class="columns portfolio-item">
                                 <div class="item-wrap">
                                    <a href="<?php the_permalink();?>">
                                       <img alt="img" src="<?php the_field('portfolio_image'); ?>">
                                       <div class="overlay"></div>
                                       <div class="link-icon"><i class="fa fa-link"></i></div>
                                    </a>
                                    <div class="portfolio-item-meta">
                                       <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                       <p>
                                          <?php
                                             $arr = get_the_terms( $post, 'skills');
                                             if(isset($arr[0] -> name)){
                                                echo $arr[0] -> name;
                                             }
                                             
                                          ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           <?php
                  endforeach;
                     wp_reset_postdata();
                  }
               ?>
         </ul>

         </div>

      </div>

   </section> <!-- Works Section End-->

   <!-- Journal Section
   ================================================== -->
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h1>Our latest posts and rants.</h1>
         </div>
      </div>

      <div class="blog-entries">
      <?php
            $myposts = get_posts( array(
               'posts_per_page' => 3,
               'orderby'     => 'date',
	            'order'       => 'DESC',
               'post_type' => 'post'
            ) );
         
            if ( $myposts ) {
               foreach ( $myposts as $post ) :
                     setup_postdata( $post ); ?>
               <article class="row entry">
                  <div class="entry-header">

                     <div class="permalink">
                        <a href="<?php the_permalink();?>"><i class="fa fa-link"></i></a>
                     </div>

                     <div class="ten columns entry-title pull-right">
                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                     </div>

                     <div class="two columns post-meta end">
                        <p>
                        <time datetime="2014-01-31" class="post-date" pubdate=""><?php echo get_the_date( 'j F Y h:i'); ?></time>
                        <span class="dauthor">By <?php the_author();?></span>
                        </p>
                     </div>

                  </div>

                  <div class="ten columns offset-2 post-content">
                     <p>
                        <?php
                           $post_text = get_the_content();
                           $post_permalink = get_the_permalink();
                           $post_link = '<a class="more-link" href="'. $post_permalink .'"> Read More<i class="fa fa-arrow-circle-o-right"></i></a>';
                           echo wp_trim_words( $post_text, 20, $post_link);
                        ?>
                        
                     </p>
                  </div>
               </article>
               <?php
               endforeach;
               wp_reset_postdata();
            }
         ?>

        


         

      </div> <!-- Entries End -->

   </section> <!-- Journal Section End-->

   <!-- Call-To-Action Section
   ================================================== -->
   <section id="call-to-action">

      <div class="row">

         <div class="eight columns offset-1">

            <p>
               <?php the_field('downtext');?>
            </p>

         </div>

         <div class="three columns action">

            <a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT" class="button">Sign Up Now</a>

         </div>

      </div>

   </section> <!-- Call-To-Action Section End-->

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
                  <?php the_field('text_under_twit');?>
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

   </section> <!-- Tweet Section End-->

