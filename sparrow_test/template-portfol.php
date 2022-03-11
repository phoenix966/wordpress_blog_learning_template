<?php
/*
    Template name: Портфолио шаблон
    Template post type: page,post
*/
?>

<?php get_header('page');?>
    

<!-- Content
================================================== -->
<div class="content-outer">

<div id="page-content" class="row portfolio">

   <section class="entry cf">

      <div id="secondary"  class="four columns entry-details">

         <h1><?php the_title();?></h1>

         <p class="lead"><?php the_content();?></p>

      </div> <!-- Secondary End-->

      <div id="primary" class="eight columns portfolio-list">

         <div id="portfolio-wrapper" class="bgrid-halves cf">

         <?php
                global $post;
            
                $myposts = get_posts( array(
                    // 'posts_per_page' => 5,
                    // 'offset'         => 1,
                    // 'category'       => 1,
                    'post_type' => 'portfolio'
                ) );
            
                if ( $myposts ) {
                    foreach ( $myposts as $post ) :
                        setup_postdata( $post ); ?>
                        <div class="columns portfolio-item">
                            <div class="item-wrap">
                                    <a href="<?php the_permalink();?>">
                                    <img alt="" src="<?php the_field('portfolio_image')?>">
                                    <div class="overlay"></div>
                                    <div class="link-icon"><i class="fa fa-link"></i></div>
                                </a>
                                        <div class="portfolio-item-meta">
                                        <h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                                    <p>Illustrration</p>
                                        </div>
                            </div>
                                </div>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                }
            ?>
               <!-- <div class="columns portfolio-item">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/geometrics.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Geometrics</a></h5>
                     <p>Illustrration</p>
                        </div>
               </div>
                </div> -->

            <!-- <div class="columns portfolio-item">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/console.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Console</a></h5>
                     <p>Web Development</p>
                        </div>
               </div>
                </div>

            <div class="columns portfolio-item first">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/camera-man.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Camera Man</a></h5>
                     <p>Photography</p>
                        </div>
               </div>
                </div>

            <div class="columns portfolio-item">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/into-the-light.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Into The Light</a></h5>
                     <p>Photography</p>
                        </div>
               </div>
                </div>

            <div class="columns portfolio-item first">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/farmerboy.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Farmer Boy</a></h5>
                     <p>Branding</p>
                        </div>
               </div>
                </div>

            <div class="columns portfolio-item">
               <div class="item-wrap">
                       <a href="portfolio.html">
                     <img alt="" src="images/portfolio/coffee-cup.jpg">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="portfolio.html">Coffee Cup</a></h5>
                     <p>Web Design</p>
                        </div>
               </div>
                </div> -->

         </div>

      </div> <!-- primary end-->

   </section> <!-- end section -->

</div> <!-- #page-content end-->

</div> <!-- content End-->

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

</section> <!-- Tweet Section End-->

<?php get_footer();?>