<?php
    session_start();
    require "connection.php";
    
    if (isset($_SESSION["admin"]) || isset($_SESSION["login"])){
        $email;
        $account;
        $direktori;
        $count = 0;
        if (isset($_SESSION["email"])){
            $email = $_SESSION["email"];
            $sql_select_acc = mysqli_query($conn, "SELECT * FROM akun WHERE email='$email'");
            $account = mysqli_fetch_assoc($sql_select_acc);
            $direktori = "saves/" . $account["profil"];
            
        } else {
            $pembelian = [];
            $sql_forPembelian = mysqli_query($conn, "SELECT * FROM pembelian");
            while ($row = mysqli_fetch_assoc($sql_forPembelian)) {
                $pembelian[] = $row;
                $count++;
            }
            
        }

        
        if (isset($_POST["logout"])){
            unset($_SESSION["login"]);
            unset($_SESSION["email"]);
            unset($_SESSION["admin"]);
            session_destroy();
            echo "
                <script>
                    alert('Anda telah logout');
                    document.location.href = '../index.php';
                </script>
            ";
        }

    } else {
        echo "
            <script>
                document.location.href = '../index.php';
            </script>
        ";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile - Top Up Store</title>
    <link rel="stylesheet" href="../styles/main.css?v=<?php echo time(); ?>">
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

        <a href='logout_account.php'>
            <button class="logout-button">
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
                        echo "<a href='login.php' class='account'>Login</a>";
                    }
                ?>
            </button>
        </a>
        
        
    </nav>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
        <a href="../index.php">Home</a>
        <a href="../about_me.php">About Me</a>
        <a href="../login.php">Login</a>
        <a href="../ontact.php">Contact</a>
        <?php
            if (isset($_SESSION["admin"])){
                echo "<a href='history.php'>History</a>";
            }
        ?>
    </div>

    <main class="logout-container">
        <u>Informasi Akun</u><br><br>
        <div class="info-account-container">
            <div class="info-profile-container">
                <div class="profile-container">
                    <b>Foto Profil</b>
                    <?php
                        if (isset($_SESSION["admin"])){
                            echo "<img src='../assets/admin_profile.png' alt='profile-picture' class='picture' >";
                            echo "ADMIN";
    
                        } else if (isset($_SESSION["login"])){
                            if ($account["profil"] == ""){
                                echo "<img src='../assets/default.jpg' alt='profile-picture' class='picture' >";
                                echo $account["nama_depan"] . " " . $account["nama_belakang"];
                                
                            } else {
                                echo "<img src='$direktori' alt='profile-picture' class='picture' >";
                                echo $account["nama_depan"] . " " . $account["nama_belakang"];
                            }
                        }
                    ?>
                </div>
                <div class="profile-button">
                    <?php
                        if (isset($_SESSION["login"])){
                            echo "<a href='update_account.php?id=" . $account['id'] . "'><button class='edit-button'>Edit Profil</button></a><br>";
                            echo "<button id='open-notif' class='notification-button' >Notifikasi</button><br>";
                            echo "<a href='delete_account.php?id=" . $account['id'] . "'><button id='open-notif' class='notification-button' >Hapus Akun</button></a>";
                        
                        } else {
                            echo "<button id='open-notif' class='notification-button' >Notifikasi</button>";
                        }
                    ?>
                    <div class="notification-container" id="notif">
                        <div class="notification-inner" id="inner">
                            <h2>Notifikasi</h2>
                            <?php 
                            if (isset($_SESSION["login"])){
                                    for ($i = 0; $i < $count; $i++){
                                        echo"<a href='delete_purchase.php?id=" . $pembelian[$i]['id'] . "' onclick='return confirm(\"Yakin ingin menghapus bukti pembelian ini?\");'><p class='notif'>Selamat atas pembelian " . $pembelian[$i]['jumlah'] ." telah berhasil menggunakan metode pembayaran " . $pembelian[$i]["metode"] . "</p></a>";
                                    }
                                } else {
                                    for ($i = 0; $i < $count; $i++){
                                        echo"<a href='delete_purchase.php?id=" . $pembelian[$i]['id'] . "' onclick='return confirm(\"Yakin ingin menghapus bukti pembelian ini?\");'><p class='notif'>Terdapat pembelian " . $pembelian[$i]['jumlah'] ." pada ". $pembelian[$i]["tgl_pembelian"] ." </p></a>";
                                    }
                                }
                            ?>
                            <br>
                            <button class="close-notification-button" id="close-notif">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info-container">
                <div class="info-account">
                    <div class="name-container">
                        <label for="first-name">
                            Nama Depan <br>
                            <input type="text" id="first-name" class="input-readonly" value="<?php if (isset($_SESSION["login"])) {echo $account['nama_depan'];} else {echo "ADMIN";} ?>" readonly>
                        </label>
                        <label for="last-name">
                            Nama Belakang <br>
                            <input type="text" id="last-name" class="input-readonly" value="<?php if (isset($_SESSION["login"])) {echo $account['nama_belakang'];} else {echo "ADMIN";}?>" readonly>
                        </label>
                    </div><br>
                    <div class="name-container">
                        <label for="region">
                            Region <br>
                            <input type="text" id="region" class="input-readonly" value="<?php if (isset($_SESSION["login"])) {echo $account['region'];} else {echo "Indonesia";}?>" readonly>
                        </label>
                        <label for="telepon">
                            Nomor Telepon <br>
                            <input type="text" id="telepon" class="input-readonly" value="<?php if (isset($_SESSION["login"])) {echo $account['telepon'];} else {echo "";}?>" readonly><br><br>
                        </label>
                    </div>
                    <label for="email">
                        Email <br>
                        <input type="email" id="email" class="input-email-readonly" value="<?php if (isset($_SESSION["login"])) {echo $account['email'];} else {echo "ADMIN@gmail.com";}?>" readonly>
                    </label>
                    <form action="" class="submit-logout" method="post">
                        <input type="submit" class="register-button" value="Logout" name="logout">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer">
        <p>2309106017 Aldi Daffa Arisyi</p>
    </footer>

    <script>
        const open_notif = document.getElementById("open-notif")
        const close_notif = document.getElementById("close-notif")
        const container_notif = document.getElementById("notif")

        open_notif.addEventListener("click", () => {
            container_notif.classList.add("open")
        })

        close_notif.addEventListener("click", () => {
            container_notif.classList.remove("open")
        })
    </script>

    <script src="../scripts/scripts.js?v=<?php echo time(); ?>"></script>
</body>
</html>
