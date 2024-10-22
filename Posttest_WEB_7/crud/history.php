<?php
    session_start();
    require "connection.php";
    $data;
    $sesi_login = isset($_SESSION["login"]);
    $sesi_admin = isset($_SESSION["admin"]);
    if (!isset($_SESSION["admin"])){
        echo "
            <script>
                document.location.href = '../index.php';
            </script>
        ";
        exit;
    }

    $sql_forAkun = mysqli_query($conn, "SELECT * FROM akun");
    
    $akun = [];
    
    $i_akn = 0;
    while ($row = mysqli_fetch_assoc($sql_forAkun)) {
        $akun[] = $row;
        $i_akn++;
    }
    
    $sql_forPembelian = mysqli_query($conn, "SELECT * FROM pembelian");
    
    $pembelian = [];
    
    $i_pem = 0;
    while ($row = mysqli_fetch_assoc($sql_forPembelian)) {
        $pembelian[] = $row;
        $i_pem++;
    }
    
    $sql_forPenjualan = mysqli_query($conn, "SELECT * FROM penjualan");
    
    $penjualan = [];
    $i_pen = 0;
    while ($row = mysqli_fetch_assoc($sql_forPenjualan)) {
        $penjualan[] = $row;
        $i_pen++;
    }
    
    if(isset($_GET["search-receipt"])){
        $pembelian[] = NULL;
        $cari = $_GET["search-receipt"];
        
        $sql_forPembelian = mysqli_query($conn, "SELECT * FROM pembelian WHERE nama_pembeli LIKE '%$cari%' OR nama_game LIKE '%$cari%'");
        
        $pembelian = [];
        $count = 0;
        while ($row = mysqli_fetch_assoc($sql_forPembelian)) {
            $pembelian[] = $row;
            $count++;
        }

        if ($count == 0){
            echo "
                <script>
                    alert('Data yang dicari tidak ada');
                    document.location.href = 'history.php';
                </script>
            ";
        }
    }

    if(isset($_GET["search-sell"])){
        $penjualan[] = NULL;
        $cari = $_GET["search-sell"];
        
        $sql_forPenjualan = mysqli_query($conn, "SELECT * FROM penjualan WHERE nama_produk LIKE '%$cari%'");
        
        $penjualan = [];
        $count = 0;
        while ($row = mysqli_fetch_assoc($sql_forPenjualan)) {
            $penjualan[] = $row;
            $count++;
        }

        if ($count == 0){
            echo "
                <script>
                    alert('Data yang dicari tidak ada');
                    document.location.href = 'history.php';
                </script>
            ";
        }
    }

    if(isset($_GET["search-account"])){
        $akun[] = NULL;
        $cari = $_GET["search-account"];

        if (str_contains($cari, " ")){
            $pisah = explode(" ", $cari);
            $nama_depan = $pisah[0];
            $nama_belakang = $pisah[1];
            $sql_forAkun = mysqli_query($conn, "SELECT * FROM akun WHERE nama_depan LIKE '%$nama_depan%' OR nama_belakang LIKE '%$nama_belakang%'");
            
        } else {
            $sql_forAkun = mysqli_query($conn, "SELECT * FROM akun WHERE nama_depan LIKE '%$cari%' OR nama_belakang LIKE '%$cari%' OR region LIKE '%$cari%' OR email LIKE'%$cari%' OR telepon LIKE '%$cari%'");

        }
        
        $akun = [];
        $count = 0;
        while ($row = mysqli_fetch_assoc($sql_forAkun)) {
            $akun[] = $row;
            $count++;
        }

        if ($count == 0){
            echo "
                <script>
                    alert('Data yang dicari tidak ada');
                    document.location.href = 'history.php';
                </script>
            ";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History - Top Up Store</title>
    <link rel="stylesheet" href="../styles/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/history.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofadi+One&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/main-logo.jpg">
</head>
<body>
    <nav class="header-container" id="header">
        <div class="icon">
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
            <a href="../index.php"><img src="../assets/main-logo.jpg" class="title" alt="main-logo" width="50px" height="50px"></a>    
        </div>
        
        <menu class="header-list" id="head-list">
            <li>
                <a href="../index.php"><button class="header-item">Home</button></a>
            </li>
            
            <li>
                <a href="../about_me.php"><button class="header-item">About Me</button></a>
            </li>

            <li>
                <button class="dark-button" id="mode" onclick="mode()">Dark</button>
            </li>
            
        </menu>
        <a href='logout_account.php' class="logout-button">
                <?php 
                    if (isset($_SESSION["admin"])){
                        echo "<img src='../assets/admin_profile.png' alt='profile-picture' class='profile'>";

                    } else if (isset($_SESSION["login"])){
                         if ($account['profil'] == ''){
                            echo "<img src='../assets/default.jpg' alt='profile-picture' class='profile'>";
                            
                        } else {
                            echo "<img src='$direktori' alt='profile-picture' class='profile'>";
                        }
                    } else {
                        echo "<a href='login.php' class='account' onchange=''>Login</a>";
                    }
                ?>
        </a>
    </nav>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../index.php">Home</a>
        <a href="../about_me.php">About Me</a>
        <a href="../login.php">Login</a>
        <a href="../contact.php">Contact</a>
        <a href="history.php">History</a>
    </div>

    <main class="">
        <h3 style="transition: 0.5s;"><u>HISTORY</u></h3>
        <div class="button-container">
            <button class="button-history-left" id="left-button" onclick="hover_button('left')">Pembelian</button>
            <button class="button-history-mid" id="mid-button" onclick="hover_button('mid')">Produk</button>
            <button class="button-history-right" id="right-button" onclick="hover_button('right')">Akun</button>
        </div>
        <div id="if-empty">
            <div class="empty">
                <h1 class="title-empty"><br><br>Silahkan Pilih Menu Riwayat</h1>
            </div>
        </div>
        <div id="list-container">
            <div id="buy" class="payment-container">
                <h3 style="transition: 0.5s;">Purchase History</h3>
                <search>
                    <form action="" class="search-bar" method="get">
                        <input type="text" placeholder="Masukkan Nama Game atau Nama Pembeli" name="search-receipt" class="input-search">
                        <button type="submit" class="search-button">
                            <img src="../assets/search.png" alt="search" width="20px" height="20px">
                        </button>
                    </form>
                </search>
                <table class="table-purchase" border=1>
                    <thead>
                        <tr class="account-table-row">
                            <th class="header-table">No</th>
                            <th class="header-table">Top Up Game</th>
                            <th class="header-table">Nama Pembeli</th>
                            <th class="header-table">ID Account</th>
                            <th class="header-table">Category</th>
                            <th class="header-table">Amount</th>
                            <th class="header-table">Method</th>
                            <th class="header-table">Phone/Account</th>
                            <th class="header-table">Tanggal Pembelian</th>
                            <th class="header-table">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($pembelian as $beli) : ?>
                        <tr class="account-table-row">
                            <td class="data-table"><?= $i ?></td>
                            <td class="data-table"><?php echo $beli["nama_game"];?></td>
                            <td class="data-table"><?php echo $beli["nama_pembeli"];?></td>
                            <td class="data-table"><?php echo $beli["id_akun"];?></td>
                            <td class="data-table"><?php echo $beli["kategori"];?></td>
                            <td class="data-table"><?php echo $beli["jumlah"];?></td>
                            <td class="data-table"><?php echo $beli["metode"];?></td>
                            <td class="data-table"><?php echo $beli["norek_telepon"];?></td>
                            <td class="data-table"><?php echo $beli["tgl_pembelian"];?></td>
                            <td class="data-table" style="text-align: center">
                                <div class="action-button">
                                    <a href="delete_purchase.php?id=<?= $beli['id'] ?>" onclick="return confirm('Yakin ingin menghapus bukti pembelian ini?');">
                                        <button class="delete-data">
                                            <img src="../assets/delete.png" alt="delete" width="25px" height="25px">
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
                <?php 
                if (isset($_GET["search-receipt"])){
                        echo "<br>";
                        echo "<a href='history.php' class='register-button'>Back</a>";
                        echo "<br>";
                    }
                ?>
            </div>
            <div id="selling" class="sale-container">
            <h3 style="transition: 0.5s;">Selling History</h3>
                <search>
                    <form action="" class="search-bar" method="get">
                        <input type="text" placeholder="Masukkan Nama Produk" name="search-sell" class="input-search">
                        <button type="submit" class="search-button">
                            <img src="../assets/search.png" alt="search" width="20px" height="20px">
                        </button>
                    </form>
                </search>
                <table class="table-selling" border=1>
                    <thead>
                        <tr class="account-table-row">
                            <th class="header-table">No</th>
                            <th class="header-table">Nama Produk</th>
                            <th class="header-table">Jumlah Tersisa</th>
                            <th class="header-table">Omset Penjualan</th>
                            <th class="header-table">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($penjualan as $sale) : ?>
                        <tr class="account-table-row">
                            <td class="data-table"><?= $i ?></td>
                            <td class="data-table"><?php echo $sale["nama_produk"]; ?></td>
                            <td class="data-table"><?= $sale["stok"]; ?></td>
                            <td class="data-table"><?php echo "Rp". $sale["omset"]; ?></td>
                            <td class="data-table" style="text-align: center">
                                <div class="action-button">
                                    <a href="update_selling.php?id=<?= $sale['id'] ?>" onclick="return confirm('Dengan mengubah stok, maka akan menghapus omset. Lanjutkan?')">
                                        <button class="update-data">
                                            <img src="../assets/update.png" alt="update" width="25px" height="25px">
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
                <?php
                    if (isset($_GET["search-sell"])){
                        echo "<br>";
                        echo "<a href='history.php' class='register-button'>Back</a>";
                        echo "<br>";
                    }
                ?>
            </div>
            <div id="account" class="account-container">
                <h3 style="transition: 0.5s;">Account History</h3>
                <search>
                    <form action="" class="search-bar" method="get">
                        <input type="text" placeholder="Masukkan Nama Akun" name="search-account" class="input-search">
                        <button type="submit" class="search-button">
                            <img src="../assets/search.png" alt="search" width="20px" height="20px">
                        </button>
                    </form>
                </search>
                <table class="table-account" border=1>
                    <thead>
                        <tr class="account-table-row">
                            <th class="header-table">No</th>
                            <th class="header-table">Picture</th>
                            <th class="header-table">Name</th>
                            <th class="header-table">Region</th>
                            <th class="header-table">Phone Number</th>
                            <th class="header-table">Email</th>
                            <th class="header-table">Tanggal Bergabung</th>
                            <th class="header-table">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($akun as $acc) : ?>
                        <tr class="account-table-row">
                            <td class="data-table"><?= $i ?></td>
                            <?php $direktori = "saves/". $acc["profil"]?>
                            <td class="data-picture"><?php if ($acc["profil"] == ""){echo "Foto Belum Ada";} else {echo "<img src='$direktori' alt='profile-picture' width='60px' height='60px'>";} ?></td>
                            <td class="data-table"><?php echo $acc["nama_depan"]. " " . $acc["nama_belakang"]; ?></td>
                            <td class="data-table"><?= $acc["region"]; ?></td>
                            <td class="data-table"><?= $acc["telepon"] ?></td>
                            <td class="data-table"><?= $acc["email"] ?></td>
                            <td class="data-table"><?= $acc["tgl_bergabung"] ?></td>
                            <td class="data-table">
                                <div class="action-button">
                                    <a href="update_account.php?id=<?= $acc['id'] ?>">
                                        <button class="update-data">
                                            <img src="../assets/update.png" alt="update" width="25px" height="25px">
                                        </button>
                                    </a>
                                    <a href="delete_account.php?id=<?= $acc['id'] ?>" onclick="return confirm('Yakin ingin menghapus akun?');">
                                        <button class="delete-data">
                                            <img src="../assets/delete.png" alt="delete" width="25px" height="25px">
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php $i++; endforeach ?>
                    </tbody>
                </table>
                <?php 
                if (isset($_GET["search-account"])){
                        echo "<br>";
                        echo "<a href='history.php' class='register-button'>Back</a>";
                        echo "<br>";
                    }
                ?>
            </div>
        </div>
    </main>

    <footer id="footer">
        <p>2309106017 Aldi Daffa Arisyi</p>
    </footer>

    <script>
        const session_admin = <?php echo json_encode($sesi_admin); ?>;
        const session_login = <?php echo json_encode($sesi_login); ?>;

        const marginlist = document.getElementById("head-list");

        if (session_admin){
            marginlist.style.marginLeft = "0"
            marginlist.style.marginRight = "36px"
        } else if (session_login){
            marginlist.style.marginLeft = "0"
            marginlist.style.marginRight = "36px"
        } else {
            marginlist.style.marginLeft = "180px"
        }
    </script>

    <script src="../scripts/scripts.js?v=<?php echo time(); ?>"></script>
</body>
</html>
