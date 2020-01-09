<?php 

session_start(); 
require_once 'admin/koneksi.php';

include 'includes/header.php';

$keyword = $_GET["keyword"];
$datapencarian = array();
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN customer 
                            ON pembelian.id_customer = customer.id_customer
                            WHERE nomor_resi LIKE '%$keyword%' ");
while($hasil = $ambil->fetch_assoc()) 
{
    $datapencarian[] = $hasil;
} 

?>


<html>

<body>

    <br><br><br><br><br><br>

    <?php if(empty($datapencarian)): ?>
    <div class="alert alert-danger">Nomor Resi <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
    <?php endif ?>

    <div id="right-panel" class="right-panel">

        <?php foreach($datapencarian as $key => $value): ?>

        <div class="content">

            <div class="animated fadeIn">
                <!--  Traffic  -->
                <!-- MENAMPILKAN ADDRESS -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">TRACK ORDER BERDASARKAN NOMOR RESI</h6>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nomor Resi</th>
                                            <th>Alamat Tujuan</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Nama Penerima</th>
                                            <th>Tanggal Diterima</th>
                                            <th>Total Pembelian</th>
                                            <th>Status Barang</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><?php echo $value['nomor_resi'];?> </td>
                                            <td><?php echo $value['alamat_lengkap'];?></td>
                                            <td><?php echo $value['nama_customer'];?></td>
                                            <td> <?php echo $value['tanggal_pembelian'] ?> </td>
                                            <td><?php echo $value['nama_penerima'];?></td>
                                            <td>
                                            <?php if (!empty($value['tanggal_diterima'])): ?>
                                            <?php echo $value['tanggal_diterima'];?>
                                            <?php endif ?>
                                            </td>
                                            <td> Rp. <?php echo number_format($value['total_pembelian']) ?></td>
                                            <td> <?php echo $value['status_pembelian']?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach ?>

</body>

<br><br><br>

<!-- Footer -->
<?php     
  include 'includes/footer.php';
?>

</html>