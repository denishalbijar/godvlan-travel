<?php
session_start(); // Mulai session di sini
include 'partials/header.php'; // Header sudah meng-include sidebar
?>

<main id="content" class="site-main">
  <!-- Home banner html start -->
  <section class="home-banner-section">
    <div class="home-banner-items">
      <div class="banner-inner-wrap" style="background-image: url(assets/images/ravel.avif);"></div>
      <div class="banner-content-wrap">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-8">
              <div class="banner-content section-heading section-heading-white">
                <h5>KELILING. JELAJAH. JALAN-JALAN</h5>
                <h2 class="banner-title">JELAJAH KEMANA AJA BERSAMA GODVLAN TRAVEL</h2>
                <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                <p>Godvlan Travel solusi jalan jalan kemana aja yang kamu pengen.</p>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- Home search field html start -->
              <div class="trip-search-section">
                <div class="container">
                  <div class="trip-search-inner secondary-bg">
                    <div class="input-group width-col-1">
                      <label> Search Destination* </label>
                      <input type="text" name="s" placeholder="Enter Destination">
                    </div>
                    <div class="input-group width-col-1">
                      <label> Pax Number* </label>
                      <input type="text" name="s" placeholder="No.of People">
                    </div>
                    <div class="input-group width-col-1">
                      <label> Checkin Date* </label>
                      <i class="far fa-calendar"></i>
                      <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="input-group width-col-1">
                      <label> Checkout Date* </label>
                      <i class="far fa-calendar"></i>
                      <input class="input-date-picker" type="text" name="s" placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                    </div>
                    <div class="input-group width-col-1">
                      <label class="screen-reader-text"> Search </label>
                      <input type="submit" name="travel-search" value="INQUIRE NOW">
                    </div>
                  </div>
                </div>
              </div>
              <!-- search field html end -->
            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
    </div>
  </section>
            <!-- banner html start -->
            <section class="destination-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>DESTINASI POPULAR</h5>
                           <h2>REKOMENDASI DESTINASI TERBAIK</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="destination-inner destination-four-column">
                     <div class="row">
                        <div class="col-lg-3 col-sm-6">
                           <div class="desti-item text-center">
                              <figure class="desti-image">
                                 <img src="assets/images/masurian.avif" alt="">
                                 <div class="rating-start" title="Rated 5 out of 4">
                                    <span style="width: 53%"></span>
                                 </div>
                              </figure>
                              <div class="desti-content">
                                 <h3>
                                    <a href="#">Danau Masurian</a>
                                 </h3>
                                 <div class="meta-cat">
                                    <a href="#">POLANDIA</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div class="desti-item text-center">
                              <figure class="desti-image">
                                 <img src="assets/images/santorini.avif" alt="">
                                 <div class="rating-start" title="Rated 5 out of 4">
                                    <span style="width: 53%"></span>
                                 </div>
                              </figure>
                              <div class="desti-content">
                                 <h3>
                                    <a href="#">Pulau Santorini</a>
                                 </h3>
                                 <div class="meta-cat">
                                    <a href="#">YUNANI</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div class="desti-item text-center">
                              <figure class="desti-image">
                                 <img src="assets/images/timbet.webp" alt="">
                                 <div class="rating-start" title="Rated 5 out of 4">
                                    <span style="width: 53%"></span>
                                 </div>
                              </figure>
                              <div class="desti-content">
                                 <h3>
                                    <a href="#">Puncak Tibet</a>
                                 </h3>
                                 <div class="meta-cat">
                                    <a href="#">TIBET</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                           <div class="desti-item text-center">
                              <figure class="desti-image">
                                 <img src="assets/images/vardo.jpeg" alt="">
                                 <div class="rating-start" title="Rated 5 out of 4">
                                    <span style="width: 53%"></span>
                                 </div>
                              </figure>
                              <div class="desti-content">
                                 <h3>
                                    <a href="#">Benteng Vardøhus</a>
                                 </h3>
                                 <div class="meta-cat">
                                    <a href="#">NORWEGIA</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="btn-wrap text-center">
                        <a href="#" class="button-primary">DESTINASI LAINNYA</a>
                     </div>
                  </div>
               </div>
            </section>
            <section class="home-about-section">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-7">
                        <div class="about-img-wrap">
                           <div class="about-img-left">
                              <div class="about-content secondary-bg d-flex flex-wrap">
                                 <h3>Something you want to know about us !!</h3>
                                 <a href="#" class="button-primary">LEARN MORE</a>
                              </div>
                              <div class="about-img">
                                 <img src="assets/images/guido.jpeg" alt="">
                              </div>
                           </div>
                           <div class="about-img-right">
                              <div class="about-img">
                                 <img src="assets/images/gandos.jpeg" alt="">
                              </div>
                              <div class="about-img">
                                 <img src="assets/images/guide.jpg" alt="">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-5">
                        <div class="banner-content section-heading">
                           <h5>MEMPERKENALKAN TENTANG</h5>
                           <h2 class="banner-title">PEMANDU TERBAIK UNTUK ANDA</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                           <p>Seorang pemandu travel terbaik bukan sekadar pengarah jalan, tetapi seorang pendamping yang menjadikan setiap perjalanan penuh makna. Dengan pengetahuan mendalam tentang destinasi, budaya lokal, dan sejarah, mereka mampu membawamu melampaui sekadar pemandangan, memperkenalkan kisah-kisah di balik tempat-tempat ikonik yang dikunjungi. Mengutamakan kenyamanan dan kebahagiaan wisatawan, mereka memiliki kemampuan komunikasi yang luar biasa—ramah, sabar, dan penuh perhatian terhadap kebutuhan individu maupun kelompok. Kreativitas dan fleksibilitas adalah keunggulan mereka, mampu mengatasi tantangan tak terduga dan menjadikan setiap momen perjalanan istimewa. Dipadukan dengan jiwa petualangan dan dedikasi tinggi, pemandu travel terbaik menciptakan suasana yang hangat dan bersahabat, membuat setiap wisatawan merasa diterima dan dihargai. Dengan mereka, perjalanan bukan hanya soal tujuan, tetapi perjalanan itu sendiri menjadi pengalaman yang berharga.</p>
                        </div>
                        <div class="about-service-container">
                           <div class="about-service">
                              <div class="about-service-icon">
                                 <img src="assets/images/icon15.png" alt="">
                              </div>
                              <div class="about-service-content">
                                 <h4>HARGA DAN KUALITAS TERBAIK</h4>
                                 <p>Harga dan Kualitas Terbaik menjadi komitmen kami di Godvlan Travel, menawarkan perjalanan tak terlupakan dengan layanan istimewa yang tetap ramah di kantong.</p>
                              </div>
                           </div>
                           <div class="about-service">
                              <div class="about-service-icon">
                                 <img src="assets/images/icon16.png" alt="">
                              </div>
                              <div class="about-service-content">
                                 <h4>DESTINASI MENARIK</h4>
                                 <p>Destinasi Menarik menawarkan pengalaman tak terlupakan, mengajak Anda menjelajahi tempat-tempat penuh keindahan dan cerita yang memikat hati.</p>
                              </div>
                           </div>
                           <div class="about-service">
                              <div class="about-service-icon">
                                 <img src="assets/images/icon17.png" alt="">
                              </div>
                              <div class="about-service-content">
                                 <h4>LAYANAN KHUSUS</h4>
                                 <p>Layanan Khusus memberikan pengalaman perjalanan yang dipersonalisasi, dirancang untuk memenuhi kebutuhan unik Anda dengan perhatian dan kenyamanan maksimal.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- client section html start -->
            <div class="client-section">
               <div class="container">
                  <div class="client-wrap client-slider">
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo7.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo8.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo9.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo10.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo11.png" alt="">
                        </figure>
                     </div>
                     <div class="client-item">
                        <figure>
                           <img src="assets/images/logo8.png" alt="">
                        </figure>
                     </div>
                  </div>
               </div>
            </div>
            <!-- client html end -->
            <!-- Home packages section html start -->
            <section class="package-section bg-light-grey">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>JELAJAHI TEMPAT TERBAIK</h5>
                           <h2>PAKET WISATA POPULER</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="package-inner package-inner-list">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="package-wrap package-wrap-list">
                              <figure class="feature-image">
                                 <a href="#">
                                    <img src="assets/images/donostia.jpeg" alt="">
                                 </a>
                                 <div class="package-price">
                                    <h6>
                                       <span>Rp9.000.000</span> / per person
                                    </h6>
                                 </div>
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="far fa-clock"></i>
                                          7H/6M
                                       </li>
                                       <li>
                                          <i class="fas fa-user-friends"></i>
                                          People: 1
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          Spanyol
                                       </li>
                                    </ul>
                                 </div>
                              </figure>
                              <div class="package-content">
                                 <h3>
                                    <a href="#">Pemandangan lautan di Donostia</a>
                                 </h3>
                                 <div class="review-area">
                                    <span class="review-text">(25 reviews)</span>
                                    <div class="rating-start" title="Rated 5 out of 5">
                                       <span style="width: 60%"></span>
                                    </div>
                                 </div>
                                 <p>Pemandangan lautan di Donostia (San Sebastián) sungguh memukau, dengan pantai-pantai indah seperti La Concha yang dikelilingi oleh perbukitan hijau. Air lautnya yang biru jernih berpadu dengan suasana kota yang elegan, menciptakan harmoni sempurna antara alam dan arsitektur. Tempat ini menjadi surga bagi pecinta keindahan alam dan ketenangan.</p>
                                 <div class="btn-wrap">
                                    <a href="#" class="button-text width-6">Pesan Sekarang<i class="fas fa-arrow-right"></i></a>
                                    <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="package-wrap package-wrap-list">
                              <figure class="feature-image">
                                 <a href="#">
                                    <img src="assets/images/copenhage.jpeg" alt="">
                                 </a>
                                 <div class="package-price">
                                    <h6>
                                       <span>Rp12.000.000 </span> / per person
                                    </h6>
                                 </div>
                                 <div class="package-meta text-center">
                                    <ul>
                                       <li>
                                          <i class="far fa-clock"></i>
                                          7H/6M
                                       </li>
                                       <li>
                                          <i class="fas fa-user-friends"></i>
                                          People: 1
                                       </li>
                                       <li>
                                          <i class="fas fa-map-marker-alt"></i>
                                          Denmark
                                       </li>
                                    </ul>
                                 </div>
                              </figure>
                              <div class="package-content">
                                 <h3>
                                    <a href="#">Liburan ke Copenhagen</a>
                                 </h3>
                                 <div class="review-area">
                                    <span class="review-text">(22 reviews)</span>
                                    <div class="rating-start" title="Rated 5 out of 5">
                                       <span style="width: 80%"></span>
                                    </div>
                                 </div>
                                 <p>Liburan ke Copenhagen menawarkan pengalaman unik yang memadukan sejarah, budaya modern, dan keindahan alam. Kota ini dikenal dengan arsitekturnya yang menawan, kanal yang tenang, dan suasana ramah. Jangan lewatkan Nyhavn, pelabuhan berwarna-warni yang ikonik, dan nikmati suasana santai di taman Tivoli Gardens yang legendaris. Cocok untuk pecinta seni, kuliner, dan gaya hidup berkelanjutan!</p>
                                 <div class="btn-wrap">
                                    <a href="#" class="button-text width-6">Pesan Sekarang<i class="fas fa-arrow-right"></i></a>
                                    <a href="#" class="button-text width-6">Wish List<i class="far fa-heart"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
               </div>
            </section>
            <!-- activity html end -->
            <!-- Home choice section html start -->
            <section class="choice-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>LIBURAN YANG MENYENANGKAN</h5>
                           <h2>PILIHA TERBAIK BUAT PARA TRAVELLER</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="choice-slider">
                     <div class="choice-slider-item" style="background-image: url(assets/images/hawei.webp);">
                       <div class="row">
                          <div class="col-lg-6 offset-lg-3">
                              <div class="choice-slider-content text-center">
                                 <h3>Liburan ke Hawaii</h3>
                                 <p>Liburan ke Hawaii menghadirkan surga tropis dengan pantai berpasir putih, ombak yang sempurna untuk berselancar, dan pemandangan gunung berapi yang menakjubkan. Pulau-pulau ini menawarkan kombinasi sempurna antara relaksasi dan petualangan, dari snorkeling di air jernih hingga menikmati budaya lokal seperti tarian hula dan hidangan tradisional. Pengalaman yang benar-benar tak terlupakan!</p>
                                 <a href="#" class="button-primary">BOOK NOW</a>
                              </div>
                          </div>
                       </div>
                     </div>
                     <div class="choice-slider-item" style="background-image: url(assets/images/kyoto.jpg);">
                       <div class="row">
                          <div class="col-lg-6 offset-lg-3">
                              <div class="choice-slider-content text-center">
                                 <h3>Jelajahi kota lama Kyoto</h3>
                                 <p>Liburan ke Kyoto menawarkan perjalanan ke jantung budaya tradisional Jepang. Kota ini dikenal dengan keindahan kuil-kuil bersejarah seperti Kinkaku-ji (Paviliun Emas) dan Fushimi Inari-taisha dengan jajaran gerbang torii-nya yang ikonik. Anda juga bisa menikmati suasana tenang di distrik Gion, tempat geisha masih melestarikan seni tradisional, atau berjalan-jalan di Arashiyama Bamboo Grove, hutan bambu yang memukau. Kyoto adalah perpaduan sempurna antara pesona masa lalu dan keindahan alam!</p>
                                 <a href="#" class="button-primary">BOOK NOW</a>
                              </div>
                          </div>
                       </div>
                     </div>
                     <div class="choice-slider-item" style="background-image: url(assets/images/malam.jpg);">
                       <div class="row">
                          <div class="col-lg-6 offset-lg-3">
                              <div class="choice-slider-content text-center">
                                 <h3>Jelajahi pegunungan tinggi Alpen</h3>
                                 <p>Pegunungan Alpen menawarkan pemandangan spektakuler dengan puncak-puncaknya yang menjulang tinggi, ditutupi salju sepanjang tahun. Dikenal sebagai surga para pendaki dan pencinta alam, wilayah ini juga menyajikan keindahan danau-danau biru jernih, lembah hijau subur, serta desa-desa kecil yang memancarkan pesona tradisional. Dari kegiatan ski di musim dingin hingga mendaki di musim panas, Pegunungan Alpen adalah destinasi yang memukau sepanjang tahun!</p>
                                 <a href="#" class="button-primary">BOOK NOW</a>
                              </div>
                          </div>
                       </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- choice html end -->
            <!-- Home special section html start -->
            <section class="special-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>DISKON BUAT PARA TRAVEL</h5>
                           <h2>HARGA MURAH BUAT KAMU</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="special-inner mt-0">
                     <div class="row">
                        <div class="col-sm-6 col-lg-4">
                           <div class="special-overlay-inner">
                              <div class="special-overlay-item">
                                 <figure class="special-img">
                                    <img src="assets/images/rome.jpg" alt="">
                                    <div class="badge-dis">
                                       <span>
                                          <strong>15%</strong>
                                          off
                                       </span>
                                    </div>
                                 </figure>
                                 <div class="special-content">
                                    <div class="meta-cat">
                                       <a href="#">ITALIA</a>
                                    </div>
                                    <h3>
                                       <a href="#">Keindahan Koloseum yang megah</a>
                                    </h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                           <div class="special-overlay-inner">
                              <div class="special-overlay-item">
                                 <figure class="special-img">
                                    <img src="assets/images/sisilia.jpg" alt="">
                                    <div class="badge-dis">
                                       <span>
                                          <strong>15%</strong>
                                          off
                                       </span>
                                    </div>
                                 </figure>
                                 <div class="special-content">
                                    <div class="meta-cat">
                                       <a href="#">ITALIA</a>
                                    </div>
                                    <h3>
                                       <a href="#">Keindahan lautan di Sisilia</a>
                                    </h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                           <div class="special-overlay-inner">
                              <div class="special-overlay-item">
                                 <figure class="special-img">
                                    <img src="assets/images/cinas.jpg" alt="">
                                    <div class="badge-dis">
                                       <span>
                                          <strong>15%</strong>
                                          off
                                       </span>
                                    </div>
                                 </figure>
                                 <div class="special-content">
                                    <div class="meta-cat">
                                       <a href="#">CHINA</a>
                                    </div>
                                    <h3>
                                       <a href="#">Panjangnya Tembok Besar China</a>
                                    </h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- best html end -->
            <!-- Home subscribe section html start -->
            <!-- subscribe html end -->
            <!-- Home team section html start -->
            <section class="team-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>TEAM MEMBERS</h5>
                           <h2>PEMANDU KITA</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-3 col-sm-6">
                        <div class="team-item">
                           <figure class="team-image">
                              <img src="assets/images/img38.jpg" alt="">
                           </figure>
                           <div class="team-content">
                              <div class="heading-wrap">
                                 <h3>Hary Dinata</h3>
                                 <h5>Travel Agent</h5>
                              </div>
                              <div class="social-links">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="team-item">
                           <figure class="team-image">
                              <img src="assets/images/img42.jpg" alt="">
                           </figure>
                           <div class="team-content">
                              <div class="heading-wrap">
                                 <h3>Fahri Althaf Indra</h3>
                                 <h5>Travel Guide</h5>
                              </div>
                              <div class="social-links">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="team-item">
                           <figure class="team-image">
                              <img src="assets/images/img43.jpg" alt="">
                           </figure>
                           <div class="team-content">
                              <div class="heading-wrap">
                                 <h3>Ahmad Fauzan</h3>
                                 <h5>Travel Guide</h5>
                              </div>
                              <div class="social-links">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-sm-6">
                        <div class="team-item">
                           <figure class="team-image">
                              <img src="assets/images/img39.jpg" alt="">
                           </figure>
                           <div class="team-content">
                              <div class="heading-wrap">
                                 <h3>Hafiz Ramdani Fattah Al Madani</h3>
                                 <h5>Travel Guide</h5>
                              </div>
                              <div class="social-links">
                                 <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- Home blog section html start -->
            <section class="blog-section">
               <div class="container">
                  <div class="section-heading text-center">
                     <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                           <h5>BLOG DARI KAMI</h5>
                           <h2>POSTINGAN TERBARU KAMI</h2>
                           <div class="title-icon-divider"><i class="fas fa-suitcase-rolling"></i></div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-lg-4">
                        <article class="post">
                           <figure class="feature-image">
                              <a href="#">
                                 <img src="assets/images/img17.jpg" alt="">
                              </a>
                           </figure>
                           <div class="entry-content">
                              <h3>
                                 <a href="#">Life is a beautiful journey not a destination</a>
                              </h3>
                              <div class="entry-meta">
                                 <span class="byline">
                                    <a href="#">Demoteam</a>
                                 </span>
                                 <span class="posted-on">
                                    <a href="#">August 17, 2021</a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">No Comments</a>
                                 </span>
                              </div>
                           </div>
                        </article>
                     </div>
                     <div class="col-md-6 col-lg-4">
                        <article class="post">
                           <figure class="feature-image">
                              <a href="#">
                                 <img src="assets/images/img18.jpg" alt="">
                              </a>
                           </figure>
                           <div class="entry-content">
                              <h3>
                                 <a href="#">Take only memories, leave only footprints</a>
                              </h3>
                              <div class="entry-meta">
                                 <span class="byline">
                                    <a href="#">Demoteam</a>
                                 </span>
                                 <span class="posted-on">
                                    <a href="#">August 17, 2021</a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">No Comments</a>
                                 </span>
                              </div>
                           </div>
                        </article>
                     </div>
                     <div class="col-md-6 col-lg-4">
                        <article class="post">
                           <figure class="feature-image">
                              <a href="#">
                                 <img src="assets/images/img19.jpg" alt="">
                              </a>
                           </figure>
                           <div class="entry-content">
                              <h3>
                                 <a href="#">Journeys are best measured in new friends</a>
                              </h3>
                              <div class="entry-meta">
                                 <span class="byline">
                                    <a href="#">Demoteam</a>
                                 </span>
                                 <span class="posted-on">
                                    <a href="#">August 17, 2021</a>
                                 </span>
                                 <span class="comments-link">
                                    <a href="#">No Comments</a>
                                 </span>
                              </div>
                           </div>
                        </article>
                     </div>
                  </div>
               </div>
            </section>
         
            <!-- callback html end -->
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