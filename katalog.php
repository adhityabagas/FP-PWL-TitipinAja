<?php

session_start(); 
require_once 'admin/koneksi.php';

include 'includes/header.php';

?>


<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
  <div class="container">

    <div class="row">
      <div class="col">
      </div>
      <div class="col">
      </div>
      <div class="col" style="padding-right:0px;">
        <form action="pencarian.php" method="GET">
          <div class="form-inline form-group">
            <input class="form-control form-control-lg" name="keyword" style="border-radius: 5px 0px 0px
                  5px; width: 300px;" type="search" placeholder="cari produk disini...">
            <button class="btn btn-light fa text-danger fa-search" style="height: 3rem;">
              <!-- <a class="fa text-danger fa-search" style="border-radius: 0px 5px 5px 0px;" href="pencarian.php"></a> -->
            </button>
          </div>
        </form>
      </div>
    </div>



    <div class="row flex-row-reverse">
      <div class="col-lg-9">
        <div class="product_top_bar">
          <div class="left_dorp">
            <select class="sorting">
              <option value="1">Default sorting</option>
              <option value="2">Default sorting 01</option>
              <option value="4">Default sorting 02</option>
            </select>
            <select class="show">
              <option value="1">Show 12</option>
              <option value="2">Show 14</option>
              <option value="4">Show 16</option>
            </select>
          </div>
        </div>

        <div class="latest_product_inner">
          <div class="row">

            <?php $query = mysqli_query($koneksi, "SELECT * FROM produk"); ?>
            <?php while ($pecah = mysqli_fetch_assoc($query)) { ?>

            <div class="col-lg-4 col-md-6">
              <div class="single-product">
                <div class="product-img">
                  <img class="card-img" src="admin/upload/<?php echo $pecah['image_produk']?>" alt="" />
                  <div class="p_icon">
                    <a href="detail_produk.php?id=<?php echo $pecah['id_produk']?>">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="cart.php">
                      <i class="fa fa-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                <div class="product-btm">
                  <a href="#" class="d-block">
                    <h4 style="font-size:14px;"><?php echo $pecah['nama_produk']?></h4>
                  </a>
                  <div class="mt-3">
                    <span class="mr-4" style="color:orange; font-size:12px;">Rp.
                      <?php echo number_format($pecah['harga_produk'])?></span>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="left_sidebar_area">
          <aside class="left_widgets p_filter_widgets">
            <div class="l_w_title">
              <h3>Jelajah Kategori</h3>
            </div>
            <div class="widgets_inner">
              <ul class="list">
                <li>
                  <a href="#">Sepatu</a>
                </li>
                <li>
                  <a href="#">Gadget dan Teknologi</a>
                </li>
                <li>
                  <a href="#">Fashion Pria</a>
                </li>
                <li>
                  <a href="#">Fashion Wanita</a>
                </li>
                <li>
                  <a href="#">Makanan</a>
                </li>
                <li>
                  <a href="#">Produk Kecantikan</a>
                </li>
                <li>
                  <a href="#">Mainan</a>
                </li>
              </ul>
            </div>
          </aside>

          <!-- <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Product Brand</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Apple</a>
                  </li>
                  <li>
                    <a href="#">Asus</a>
                  </li>
                  <li class="active">
                    <a href="#">Gionee</a>
                  </li>
                  <li>
                    <a href="#">Micromax</a>
                  </li>
                  <li>
                    <a href="#">Samsung</a>
                  </li>
                </ul>
              </div>
            </aside> -->

          <!-- <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Color Filter</h3>
              </div>
              <div class="widgets_inner">
                <ul class="list">
                  <li>
                    <a href="#">Black</a>
                  </li>
                  <li>
                    <a href="#">Black Leather</a>
                  </li>
                  <li class="active">
                    <a href="#">Black with red</a>
                  </li>
                  <li>
                    <a href="#">Gold</a>
                  </li>
                  <li>
                    <a href="#">Spacegrey</a>
                  </li>
                </ul>
              </div>
            </aside> -->

          <!-- <aside class="left_widgets p_filter_widgets">
              <div class="l_w_title">
                <h3>Price Filter</h3>
              </div>
              <div class="widgets_inner">
                <div class="range_item">
                  <div id="slider-range"></div>
                  <div class="">
                    <label for="amount">Price : </label>
                    <input type="text" id="amount" readonly />
                  </div>
                </div>
              </div>
            </aside> -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--================End Category Product Area =================-->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/stellar.js"></script>
  <script src="vendors/lightbox/simpleLightbox.min.js"></script>
  <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
  <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
  <script src="vendors/isotope/isotope-min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="vendors/jquery-ui/jquery-ui.js"></script>
  <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendors/counter-up/jquery.counterup.js"></script> -->


<?php     
  include 'includes/footer.php';
?>