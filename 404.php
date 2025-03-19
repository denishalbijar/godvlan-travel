  <?php include 'partials/header.php'; ?>


         <main id="content" class="site-main">
            <div class="no-content-section 404-page" style="background-image: url(assets/images/404-img.jpg);">
               <div class="container">
                  <div class="no-content-wrap">
                     <span>404</span>
                     <h1>Oops! That page can't be found</h1>
                     <h4>It looks like nothing was found at this location. Maybe try one of the links below or a search?</h4>
                     <div class="search-form-wrap">
                        <form class="search-form">
                           <input type="text" name="search" placeholder="Search...">
                           <button class="search-btn"><i class="fas fa-search"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="overlay"></div>
            </div>
         </main>
         
         <?php include 'partials/footer.php'; ?>

         <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
         </a>
         <!-- custom search field html -->
            <div class="header-search-form">
               <div class="container">
                  <div class="header-search-container">
                     <form class="search-form" role="search" method="get" >
                        <input type="text" name="s" placeholder="Enter your text...">
                     </form>
                     <a href="#" class="search-close">
                        <i class="fas fa-times"></i>
                     </a>
                  </div>
               </div>
            </div>
         <!-- header html end -->
      </div>

      <!-- JavaScript -->
      <script src="assets/js/jquery.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
      <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
      <script src="assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
      <script src="assets/js/jquery.counterup.js"></script>
      <script src="assets/vendors/modal-video/jquery-modal-video.min.js"></script>
      <script src="assets/vendors/masonry/masonry.pkgd.min.js"></script>
      <script src="assets/vendors/lightbox/dist/js/lightbox.min.js"></script>
      <script src="assets/vendors/slick/slick.min.js"></script>
      <script src="assets/js/jquery.slicknav.js"></script>
      <script src="assets/js/custom.min.js"></script>
   </body>
</html>