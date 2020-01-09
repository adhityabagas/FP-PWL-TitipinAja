    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/profile.css">

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-user-circle"></i>Akun Saya</a>
                        <ul class="sub-menu children active dropdown-menu">
                            <li><i class="fa fa-user-circle"></i><a
                                    href="profile.php?id=<?php echo $pecah['id_customer']; ?>">Profile</a></li>
                            <li><i class="fa fa-address-card"></i><a
                                    href="address.php?id=<?php echo $pecah['id_customer']; ?>">Address</a></li>
                            <li><i class="fas fa-money-check"></i><a
                                    href="bank.php?id=<?php echo $pecah['id_customer']; ?>">Rekening Bank</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cart-plus"></i>Pesanan</a>
                        <ul class="sub-menu children dropdown-menu">
                            <!-- <li><i class="fa fa-table"></i><a href="detail_pembayaran.php?id=<?php echo $pecah['id_customer']; ?>">Detail Pembayaran</a></li> -->
                            <li><i class="fa fa-clipboard-check"></i><a
                                    href="riwayat_belanja.php?id=<?php echo $pecah['id_customer']; ?>">Riwayat
                                    Belanja</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>