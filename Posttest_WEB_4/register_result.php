<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact - Top Up Store</title>
    <link rel="stylesheet" href="styles/main.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofadi+One&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/main-logo.jpg">
</head>
<body>
    <nav class="header-container">
        <div class="icon">
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
            <a href="index.php"><img src="assets/main-logo.jpg" class="title" alt="main-logo" width="50px" height="50px"></a>    
        </div>
        
        <menu class="header-list">
            <li>
                <button class="header-item"><a href="index.php">Home</a></button>
            </li>
            
            <li>
                <button class="header-item"><a href="about_me.php">About Me</a></button>
            </li>

            <li>
                <button class="dark-button" id="mode" onclick="mode()">Dark</button>
            </li>
            
        </menu>
        <a href="login.php" class="account">Login</a>
    </nav>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="about_me.php">About Me</a>
        <a href="login.php">Login</a>
        <a href="contact.php">Contact</a>
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
                <a href="login.php">
                    <button class="register-button">
                        Login
                    </button>
                </a>
            </div>
        </div>
    </main>

    <footer>
        <p>2309106017 Aldi Daffa Arisyi</p>
    </footer>

    <script src="scripts/scripts.js"></script>
</body>
</html>