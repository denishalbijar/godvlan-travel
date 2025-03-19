 <?php include('partials/header.php');?>


         <main id="content" class="site-main">
            <!-- Inner Banner html start-->
            <section class="inner-banner-wrap">
               <div class="inner-baner-container" style="background-image: url(assets/images/inner-banner.jpg);">
                  <div class="container">
                     <div class="inner-banner-content">
                        <h1 class="inner-title">Package Cart</h1>
                     </div>
                  </div>
               </div>
               <div class="inner-shape"></div>
            </section>
            <!-- Inner Banner html end-->
            <div class="step-section cart-section">
               <div class="container">
                  <div class="step-link-wrap">
                     <div class="step-item active">
                        Your cart
                        <a href="#" class="step-icon"></a>
                     </div>
                     <div class="step-item">
                        Your Details
                        <a href="#" class="step-icon"></a>
                     </div>
                     <div class="step-item">
                        Finish
                        <a href="#" class="step-icon"></a>
                     </div>
                  </div>
                  <!-- step one form html start -->
                  <div class="cart-list-inner">
                     <form action="#">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="">
                                  <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <span class="cartImage"><img src="assets/images/img5.jpg" alt="image"></span>
                                </td>
                                <td data-column="Product Name">Sunset view of beautiful lakeside resident</td>
                                <td data-column="Price">$ 1100.00</td>
                                <td data-column="Quantity" class="count-input">
                                    <div>
                                       <a class="minus-btn" href="#"><i class="fa fa-minus"></i></a>
                                       <input class="quantity" type="text" value="1">
                                       <a class="plus-btn" href="#"><i class="fa fa-plus"></i></a>
                                    </div>
                                </td>
                                <td data-column="Sub Total">$ 1100.00</td>
                              </tr>
                            </tbody>
                            <tr>
                                <td class="">
                                  <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <span class="cartImage"><img src="assets/images/img6.jpg" alt="image"></span>
                                </td>
                                <td data-column="Product Name">Experience the natural beauty of island</td>
                                <td data-column="Price">$ 1150.00</td>
                                <td data-column="Quantity" class="count-input">
                                    <div>
                                       <a class="minus-btn" href="#"><i class="fa fa-minus"></i></a>
                                       <input class="quantity" type="text" value="1">
                                       <a class="plus-btn" href="#"><i class="fa fa-plus"></i></a>
                                    </div>
                                </td>
                                <td data-column="Sub Total">$ 1150.00</td>
                              </tr>
                            </tbody>
                            <tr>
                                <td class="">
                                  <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                  <span class="cartImage"><img src="assets/images/img7.jpg" alt="image"></span>
                                </td>
                                <td data-column="Product Name">Vacation to the water city of Portugal</td>
                                <td data-column="Price">$ 1150.00</td>
                                <td data-column="Quantity" class="count-input">
                                    <div>
                                       <a class="minus-btn" href="#"><i class="fa fa-minus"></i></a>
                                       <input class="quantity" type="text" value="1">
                                       <a class="plus-btn" href="#"><i class="fa fa-plus"></i></a>
                                    </div>
                                </td>
                                <td data-column="Sub Total">$ 1150.00</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="updateArea">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="I have a discount coupon">
                              <a href="#" class="outline-primary">apply coupon</a>
                          </div>
                           <a href="#" class="outline-primary update-btn">update cart</a>
                        </div>
                        <div class="totalAmountArea">
                           <ul class="list-unstyled">
                              <li><strong>Sub Total</strong> <span>$ 3400.00</span></li>
                              <li><strong>Vat</strong> <span>$ 18.00</span></li>
                              <li><strong>Grand Total</strong> <span class="grandTotal">$ 4012.00</span></li>
                           </ul>
                        </div>
                        <div class="checkBtnArea text-right">
                          <a href="#" class="button-primary">checkout</a>
                        </div>
                      </form>
                  </div>
                  <!-- step one form html end -->
               </div>
            </div>
         </main>

         <?php include('partials/footer.php'); ?>

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