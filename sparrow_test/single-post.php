 <?php get_header(); ?>
 <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Blog<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

            <article class="post">

               <div class="entry-header cf">

                  <h1><?php  the_title();?></h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24"><?php echo get_the_date('M Y'); ?></time>
                     /
                     <span class="categories">
                     <?php the_terms($post, 'category', '', ' / ', '');?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <!-- <img src="images/post-image/post-image-1300x500-01.jpg" alt="post-image" title="post-image"> -->
                  <?php the_post_thumbnail('large');?>
               </div>

               <div class="post-content">
                <?php the_content();?>

                  <p class="tags">
  			            <span>Tagged in </span>:
                          <?php the_tags( '', ',', '' ); ?>
  				         <!-- <a href="#">orci</a>, <a href="#">lectus</a>, <a href="#">varius</a>, <a href="#">turpis</a> -->
  			         </p>

                  <div class="bio cf">

                     <div class="gravatar">
                        <img src="images/author-img.png" alt="">
                     </div>
                     <div class="about">
                        <h5><a title="Posts by John Doe" href="#" rel="author">John Doe</a></h5>
                        <p>Jon Doe is lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate
                        cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh vulputate
                        <a href="#">cursus</a> a sit <a href="#">amet mauris</a>. Morbi elit consequat ipsum.</p>
                     </div>

                  </div>

                  <ul class="post-nav cf">
                           <?php 
                                $next_post = get_next_post_link('<strong>Next Entry</strong> %link'); 
                                $prev_post = get_previous_post_link('<strong>Previous Entry</strong> %link'); 
                            ?>
                            <li class="next"><?php echo $next_post;?></li>	
                            <li class="prev"><?php echo $prev_post;?></li>
  			         </ul>

               </div>

            </article> <!-- post end -->
            <!-- Comments
            ================================================== -->
         <!-- commentlist -->
      <ol class="commentlist">
          <?php 
            $id = get_the_ID();
            $comments = get_comments(array(
               'post_id' => $id,
            ));
            
            // print_r($comments);

            if(count($comments) != 0){
               foreach($comments as $comment){
                  if($comment->comment_parent == 0):
                  ?>
                     <li class="depth-1">
                        <div class="avatar">
                           <?php echo get_avatar( $comment, 50);?>
                        </div>

                        <div class="comment-info">
                           <cite><?php echo $comment->comment_author; ?></cite>

                           <div class="comment-meta">
                              <time class="comment-time" datetime="2014-01-14T23:05"><?php comment_date('M j, Y @ G:i',$comment->comment_ID); ?></time>
                              <span class="sep">/</span>
                              <?php echo get_comment_reply_link( array(
                                 'reply_text' => "Reply",
                                 'depth' => 1,
                                 'max_depth' => 2,
                                 'before' => '<a class="reply"',
                              ),$comment->comment_ID,$id);?>
                           </div>
                        </div>

                        <div class="comment-text">
                           <p><?php echo $comment->comment_content;?> </p>
                        </div>
                     </li>
                  <?php
                  endif;
                  $replies = get_comments( array( 'parent' => $comment->comment_ID, 'status' => 'approve', 'order' => 'ASC' ) );
                  
                  // print("<pre>".print_r($replies,true)."</pre>");

                  foreach($replies as $reply):
                     ?>
                        <li class="depth-1" style="margin-left: 50px">
                           <div class="avatar">
                              <?php echo get_avatar( $reply, 50);?>
                           </div>

                           <div class="comment-info">
                              <cite><?php echo $reply->comment_author; ?></cite>

                              <div class="comment-meta">
                                 <time class="comment-time" datetime="2014-01-14T23:05"><?php comment_date('M j, Y @ G:i',$reply->comment_ID); ?></time>
                              </div>
                           </div>

                           <div class="comment-text">
                              <p><?php echo $reply->comment_content; ?></p>
                           </div>
                     </li>
                     <?php
                  endforeach;
               }
            }else{
               echo '<li>Коментариев не найдено!</li>';
            }

          ?>
      </ol> <!-- Commentlist End -->
      <?php

      $args = [
         'fields' => [
            'author' => '<div class="cf">
               <label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
               <input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
            </div>',
            'email'  => '<div class="cf">
               <label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
               <input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
            </div>',
            // 'url'    => '<p class="comment-form-url">
            //    <label for="url">' . __( 'Website' ) . '</label>
            //    <input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
            // </p>',
            'cookies' => '<p class="comment-form-cookies-consent">'.
                sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
                <label for="wp-comment-cookies-consent">'. __( 'Save my name, email, and website in this browser for the next time I comment.' ) .'</label>
            </p>',
         ],
         'comment_field'        => '<div class="cf">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
            <textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
         </div>',
         'must_log_in'          => '<p class="must-log-in">' .
             sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
          </p>',
         'logged_in_as'         => '<p class="logged-in-as">' .
             sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
          </p>',
         'comment_notes_before' => '<p class="comment-notes">
            <span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span>'.
            ( $req ? $required_text : '' ) . '
         </p>',
         'comment_notes_after'  => '',
         'id_form'              => 'commentform',
         'id_submit'            => 'submit',
         'class_container'      => 'respond',
         'class_form'           => 'comment-form',
         'class_submit'         => 'submit',
         'name_submit'          => 'submit',
         'title_reply'          => __( 'Leave a Reply' ),
         'title_reply_to'       => __( 'Leave a Reply to %s' ),
         'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
         'title_reply_after'    => '</h3>',
         'cancel_reply_before'  => ' <small>',
         'cancel_reply_after'   => '</small>',
         'cancel_reply_link'    => __( 'Cancel reply' ),
         'label_submit'         => __( 'Post Comment' ),
         'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
         'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
         'format'               => 'xhtml',
      ];
      
      comment_form($args);
      
      ?>
   <?php get_footer(); ?>