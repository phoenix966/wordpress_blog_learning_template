
   <footer>

      <div class="row">

         <div class="twelve columns">
         <?php
                  wp_nav_menu(
                     array(
                        'theme_location' => 'menu-2',
                        'menu' => 'ul',
                        'menu_class' => 'footer-nav',
                        'echo' => true,
                     )
                  );
                  ?>

            <ul class="footer-social">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
               <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>

            <ul class="copyright">
               <li>Copyright &copy; 2014 Sparrow</li> 
               <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
            </ul>

         </div>

         <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

      </div>

   </footer>

   <?php wp_footer(); ?>

</body>

</html>
