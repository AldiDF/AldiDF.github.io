<?php
    session_start();
    require "../crud/connection.php";

    $sesi_login = isset($_SESSION["login"]);
    $sesi_admin = isset($_SESSION["admin"]);
    
    if (isset($_POST["submit"])) {
        $nama_depan = $_POST["firstname"];
        $nama_belakang = $_POST["lastname"];
        $region = $_POST["region"];
        $telepon = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        if ($email == "ADMIN@gmail.com"){
            echo "
            <script>
                alert('Gagal Mendaftar, email sudah tersedia');
                document.location.href = '../index.php';
            </script>
            ";
            exit;
        }

        $sql_select = mysqli_query($conn, "SELECT * FROM akun");
        $count = 0;
        while ($row = mysqli_fetch_assoc($sql_select)) {
            $akun[] = $row; 

            if ($akun[$count]["email"] == $email){
                echo "
                <script>
                    alert('Gagal Mendaftar, email sudah tersedia');
                    document.location.href = '../index.php';
                </script>
                ";
                exit;
            }
            $count++;
        }

        $foto = $_FILES["image"]["name"];
        $temp = $_FILES["image"]["tmp_name"];

        date_default_timezone_set("Asia/Makassar");
        $ekstensi = explode('.', $foto);
        $ekstensi = strtolower(end($ekstensi));
        $namabaru = date("Y-m-d H.i.s") . "." . $ekstensi;
        $direktori = "../crud/saves/" . $namabaru;
        $ekstensi_supp = ["jpg", "jepg", "png"];

        date_default_timezone_set("Asia/Makassar");
        $waktu = date("Y-m-d H:i:s");

        if (in_array($ekstensi, $ekstensi_supp)){
            if (move_uploaded_file($temp, $direktori)){
                
                $sql = "INSERT INTO akun VALUES (0, '$nama_depan', '$nama_belakang', '$region', '$telepon', '$email', '$password', '$namabaru', '$waktu')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "
                        <script>
                            alert('Berhasil Membuat Akun');
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Gagal Membuat Akun');
                        </script>
                    ";
                }
            }

        } else {
            $foto = "";

            $sql = "INSERT INTO akun VALUES (0, '$nama_depan', '$nama_belakang', '$region', '$telepon', '$email', '$password', '$foto', '$waktu')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "
                    <script>
                        alert('Berhasil Membuat Akun');
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Gagal Membuat Akun');
                    </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result - Top Up Store</title>
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
        <a href='../crud/logout_account.php' class="logout-button">
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
                    echo "<a href='../login.php' class='account' onchange=''>Login</a>";
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
        <?php
            if (isset($_SESSION["admin"])){
                echo "<a href='../crud/history.php'>History</a>";
            }
        ?>
    </div>

    <main>
        <div class="box-result-form">
            <h3 class="title-register-form"><u>Selamat Mendaftar</u></h3>
            <div class="box-form">
                <div class="box-mail">
                    <p class="paragraph-form">Nama : <?php echo $_POST["firstname"] . " " . $_POST["lastname"]; ?></p>
                    <p class="paragraph-form">Region : <?php echo $_POST["region"]; ?></p>
                    <p class="paragraph-form">Nomor Telepon : <?php echo $_POST["phone"]; ?></p>
                    <p class="paragraph-form">Email : <?php echo $_POST["email"]; ?></p>
                </div>
                <p style="color: #15292B; font-size: 20px; font-weight: 500;">Silahkan Login</p>
                <a href="../login.php">
                    <button class="register-button">
                        Login
                    </button>
                </a>
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
