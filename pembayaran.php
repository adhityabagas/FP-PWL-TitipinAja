<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-4.4.1/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-4.4.1/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/font-awesome.min.css">
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">



  <!-- CSS resource-->
  <link rel="stylesheet" type="text/css" href="assets/css/trackorder.css">
    <title>Pembayaran(Cheackout)</title>
    <style type="text/css">
      .icoTrack{
        width: auto;
        height: 120px;
        padding: 1px 5px 1px 10px;
      }
      .icoSize{
        width: auto;
        height: 20px;
        padding:1px 5px 1px 10px; 
      }
      .icoTrash{
        width: auto;
        height: 30px;
        padding:1px 5px 1px 10px; 
      }
    </style>
  <script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.padding = "30px 10px";
        document.getElementById("logo").style.fontSize = "25px";
      } else {
        document.getElementById("navbar").style.padding = "80px 10px";
        document.getElementById("logo").style.fontSize = "35px";
      }
    }
    </script>
</head>

<body>
 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand mx-5" href="#">
      <img src="assets/image/512px-Bootstrap_logo.svg.png" width="30" height="30" class="d-inline-block align-top"
        alt="">
      TitipinAja
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto container-fluid">
      </ul>
      <a class="nav-link text-body" href="#">TrackOrder</a>
      <a class="nav-link btn" href="#"> <i class="fa fa-shopping-cart"></i> </a>
      <a class="nav-link btn btn-outline-dark mx-4" href="#">Daftar/Login</a>
    </div>
  </nav>

<!-- center -->
<div style="margin-top:100px;padding-bottom:100px;">
  <div class="container">
  <div class="row">
    <div class="col-sm-8">
      <!-- checkout -->
      ​<h6>Checkout</h6><br>
      <p>Lorem ipsum dolor dummy text to enable scrolling, sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> <br>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h6>DATA PEMESANAN</h6>
          <form>
            <div class="form-group">
              <label for="nama">nama depan</label>
              <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" value="nama depan">
            </div>
            <div class="form-group">
              <label for="Nohp">Nomer telephone</label>
              <input type="text" class="form-control" id="Nohp">
            </div>
          </form>
        </div>
        <div class="col-sm">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
            <label class="form-check-label" for="defaultCheck1">
              <h6> Gunakan Data Login</h6>
            </label>
          </div>
          <form>
            <div class="form-group">
              <label for="nama">nama belakang</label>
              <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" value="nama depan">
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="Email" class="form-control" id="Email">
            </div>
          </form>
        </div>
      </div>
    </div>
    <table>ALAMAT PENERIMA</table>
    <div class="container">
        <div class="row">
          <div class="col-sm">
            <p>One of three columns</p><br>
            <p>One of three columns</p><br>
            <p>One of three columns</p><br>
          </div>
          <div class="col-sm">
            <button>Update Alamat</button>
          </div>
        </div>
      </div>
    <table>ITEM LIST</table><hr>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <img src="assets\image\pembayaran\sepatu.jpg" class="icoTrack"><br>
          </div>
          <div class="col-sm">
            <table>Nama Sepatu</table><br>
            <p>132132123</p>
            <p>total biaya 132123</p>
            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <img src="assets\image\pembayaran\size.png" class="icoSize">
                </div>
                <div class="col-sm">
                  <p>size</p>
                  <p>us7</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <img src="assets\image\pembayaran\trash.jpg" class="icoTrash"><br><br>
               <div>
                 <label for="Jumlah" style="font-size: 12px"><b>Jumlah</b></label><br>
                <div class="btn-group btn-group-sm " role="group" aria-label="Basic example">
                  <button type="button" class="btn border-secondary text-dark"> - </button>
                  <input type="text" class="btn border-secondary text-dark" name="1" style="width: 50px;"></input>
                  <button type="button" class="btn border-secondary text-dark">+</button>
                </div>
               </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">   
          <div class="col-sm">
            <p>Total Harga </p>
          </div>
          <div class="col-sm">
            <p>123123</p>
          </div>
        </div>
      </div>      
    </div>

    <div class="col-sm-4">
      <!-- data pembayaran -->
      <table>RINGKASAN PEMBAYARAN</table>
      <div class="fixed-list"> 
        <div class="row mt-1">
          <div class="col"><p>Harga (1 barang) </p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Jasa Beliin</p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Jasa Pengiriman</p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Internasional</p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Domestik</p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Metode Pembayaran</p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
      </div>
      <div class="row">
        <div class="col">
          <fieldset class="form-group">
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input custom-radio-right">
              <label class="custom-control-label" for="customRadio1">Payback Later</label>
              <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
              <label class="custom-control-label" for="customRadio3">Virtual Account</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
              <label class="custom-control-label" for="customRadio2">Manual Transfer</label>
              <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
              <label class="custom-control-label" for="customRadio4">Credit Card</label>
            </div>
          </fieldset>        
        </div>        
      </div>
      <div class="fixed-list"> 
        <div class="row mt-1">
          <div class="col"><p>Harga (1 barang) </p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
        <div class="row mt-1">
          <div class="col"><p>Harga (1 barang) </p></div>
          <div class="col text-right"><p>123123123</p><br></div>          
        </div>
      </div>
      <button>Pesan</button>
    </div>
   </div>
  </div>
</div>
</div>

<!-- Footer -->
  <footer class="bg-white">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="assets/image/banner-traveller-1.jpg" alt="" width="180"
            class="mb-3">
          <p class="font-italic text-muted">TitipinAja adalah sebuah website jasa titip beli produk manca negara.</p>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">TitipinAja</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">Tentang Kami</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Syarat & Ketentuan</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Kebijakan Privasi</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Blog</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Beli</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">FAQ</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Cara Berbelanja</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Track Order</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Ikuti Kami</h6>
          <ul class="list-unstyled mb-0">
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i
                  class="fab fa-facebook"></i></a>
            </li> <a class="text-muted">titipinaja_official</a>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i
                  class="fab fa-instagram"></i></a>
            </li> <a class="text-muted">@titipinaja_official</a>
          </ul>
        </div>
      </div>
    </div>
 <!-- Copyrights -->
    <div class="bg-light">
      <div class="container text-center text-muted">
        <p class="mb-0 py-2 far fa-copyright"></p> 2019 TitipinAja All rights reserved.
      </div>
    </div>
  </footer>
  <!-- End -->                                                       
</body>
</html>