<?php 

session_start(); 
include 'includes/header.php';

?>

<html>

<body>

<div class="container center-holder">
    <div class="row">
      <div class="card acik-renk-form">
        <div class="card-body">

          <div class="col-12">
            <h2>TRACK ORDER</h2> <br>
            <h5>Nomor Resi dapat dilihat di Riwayat Belanja</h5>
          </div>

          <div class="col-12">
            <div id="custom-search-input">
            <form action="trackorder_proses.php" method="GET">
              <div class="input-group">
            
                <input type="search" class="search-query form-control"  name="keyword" id="nomor_resi" placeholder="Masukan Nomor Resi | XXX" />
                <span class="input-group-btn">
                  <button type="button" disabled>
                    <span class="fa fa-search"></span>
                  </button>
                </span>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include 'includes/footer.php'; ?>
  <!-- End -->

</body>

</html>