<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLBB - Top Up Store</title>
    <link rel="stylesheet" href="../styles/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/topup.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofadi+One&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/main-logo.jpg">
</head>
<body>
    <nav class="header-container">
        <div class="icon">
            <span class="menu-icon" onclick="openNav()">&#9776;</span>
            <a href="../index.php"><img src="../assets/main-logo.jpg" class="title" alt="main-logo" width="50px" height="50px"></a>    
        </div>
        
        <menu class="header-list">
            <li>
                <button class="header-item"><a href="../index.php">Home</a></button>
            </li>
            
            <li>
                <button class="header-item"><a href="../about_me.php">About Me</a></button>
            </li>

            <li>
                <button class="dark-button" id="mode" onclick="mode()">Dark</button>
            </li>
            
        </menu>
        <a href="../login.php" class="account">Login</a>
    </nav>

    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../index.php">Home</a>
        <a href="../about_me.php">About Me</a>
        <a href="../login.php">Login</a>
        <a href="../contact.php">Contact</a>
        <a href="../crud/history.php">History</a>
    </div>

    <main class="container">
        <form action="../receipt/receipt_mlbb.php" class="top-up-container" method="POST" onsubmit="return limit_number_forTopupmlbbmla()">
            <div class="left-content">
                <div class="game-description">
                    <figure class="game-logo">
                        <img src="../assets/mlbb-logo.png" alt="mlbb-logo" class="game" width="100px" height="100px">
                        <figcaption>
                            <p class="developer">Moonton</p>
                            Mobile Legends: Bang Bang
                        </figcaption>
                    </figure>
                    <p style="text-align: justify;">Dirilis pada tahun 2016, Mobile Legends: Bang Bang merupakan Mobile Multiplayer Online Battle Arena yang dikembangkan oleh Moonton. Game ini sangat populer terutama di Asia Tenggara dan menjadi salah satu game terpilih untuk kompetisi e-sport pertama di ASEAN Games Filipina, 2019 lalu.</p>
                    <br>
                    <p style="text-align: justify;">Top up ML Diamond, Weekly Diamond Pass (WDP), dan Twilight Pass hanya dalam hitungan detik! Cukup masukkan User ID dan Zone ID MLBB Anda, pilih jumlah Diamond yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Mobile Legends Anda.</p>
                </div>
                <div class="payment-medhod">
                    <div id="payment" class="menu-payment">
                        <h2>Pilih Metode Pembayaran</h2>
                        <div class="pay-radio" >
                            <input type="radio" id="pay-this1" name="pay" value="Bank BCA" onclick="method_payment(1)">
                            <label for="pay-this1">
                                <span class="pay-category">
                                    Bank BCA <br>
                                    <img src="../assets/bca.png" alt="bca" width="150px" height="100px">
                                </span>
                            </label> 
    
                            <input type="radio" id="pay-this2" name="pay" value="Bank BRI" onclick="method_payment(1)" >
                            <label for="pay-this2">
                                <span class="pay-category">
                                    Bank BRI <br>
                                    <img src="../assets/bri.png" alt="bri" width="150px" height="100px">                            
                                </span>
                            </label> 
    
                            <input type="radio" id="pay-this3" name="pay" value="Bank BNI" onclick="method_payment(1)" >
                            <label for="pay-this3">
                                <span class="pay-category">
                                    Bank BNI <br>
                                    <img src="../assets/bni.png" alt="bni" width="150px" height="100px">
                                </span>
                            </label>
                            
                            <input type="radio" id="pay-this4" name="pay" value="Dana" onclick="method_payment(1)" >
                            <label for="pay-this4">
                                <span class="pay-category">
                                    Dana <br>
                                    <img src="../assets/dana.png" alt="dana" width="150px" height="100px">
                                </span>
                            </label> 
    
                            <input type="radio" id="pay-this5" name="pay" value="Gopay" onclick="method_payment(1)" >
                            <label for="pay-this5">
                                <span class="pay-category">
                                    Gopay <br>
                                    <img src="../assets/gopaay.png" alt="gopay" width="150px" height="100px">                            
                                </span>
                            </label> 
    
                            <input type="radio" id="pay-this6" name="pay" value="Shopee Pay" onclick="method_payment(1)" >
                            <label for="pay-this6">
                                <span class="pay-category">
                                    ShoopePay <br>
                                    <img src="../assets/shoopepay.png" alt="shoopepay" width="150px" height="100px">
                                </span> 
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-content">
                <div class="input-content">
                    <h2>Masukkan:</h2>
                    <div class="input-box">
                        <input type="text" placeholder="Id Pengguna" pattern="\d*" maxlength="9" inputmode="numeric" title="Harus Masukkan Angka" class="input-form" id="user" name="ID" required>
                        <input type="text" placeholder="(     Server    )" pattern="\d*" maxlength="6" inputmode="numeric" title="Harus Masukkan Angka" class="input-form" id="server" name="serv" required>
                    </div>
                </div>
                <div class="category-content">
                    <h2>Pilih Kategori</h2>
                    <div class="radio-category">
                        <input type="radio" id="radio1" name="kategori" value="Diamond" onclick="mlbb_category(1)">
                        <label for="radio1">
                            <span class="category-specify">
                                <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">
                            </span> <br>  Diamond
                        </label> 
                        <input type="radio" id="radio2" name="kategori" value="Weekly Diamond Pass" onclick="mlbb_category(2)">
                        <label for="radio2">
                            <span class="category-specify">
                                <img src="../assets/wdp.png" alt="wdp" width="100px" height="100px">                            
                            </span> <br> Weekly Diamond Pass
                        </label> 
                        <input type="radio" id="radio3" name="kategori" value="Twilight Pass" onclick="mlbb_category(3)">
                        <label for="radio3">
                            <span class="category-specify">
                                <img src="../assets/twilight_pass.png" class="Twilight" alt="twilight_pass" width="100px" height="100px">
                            </span> <br> Twilight Pass
                        </label> 
                    </div>
                </div>
    
                <div class="top-up-content">
                    <div id="menu1" class="menu-diamond-mlbb">
                        <div class="radio-top-up">
                            <input type="radio" id="radio1.1" value="50 MLBB-Diamond Rp15.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.1">
                                <span class="top-up-category">
                                    50 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp15.000,00
                            </label> 
    
                            <input type="radio" id="radio1.2" value="250 MLBB-Diamond Rp75.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.2">
                                <span class="top-up-category">
                                    250 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">                            
                                </span> <br> Rp75.000,00
                            </label> 
    
                            <input type="radio" id="radio1.3" value="500 MLBB-Diamond Rp149.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.3">
                                <span class="top-up-category">
                                    500 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp149.000,00
                            </label>
                            
                            <input type="radio" id="radio1.4" value="1000 MLBB-Diamond Rp299.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.4">
                                <span class="top-up-category">
                                    1000 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp299.000,00
                            </label> 
    
                            <input type="radio" id="radio1.5" value="2500 MLBB-Diamond Rp739.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.5">
                                <span class="top-up-category">
                                    2500 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">                            
                                </span> <br> Rp739.000,00
                            </label> 
    
                            <input type="radio" id="radio1.6" value="5000 MLBB-Diamond Rp1.499.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.6">
                                <span class="top-up-category">
                                    5000 Diamond <br>
                                    <img src="../assets/diamond.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp1.499.000,00
                            </label>
                        </div>
                    </div>
                </div>
                <div class="top-up-content">
                    <div id="menu2" class="menu-diamond-mlbb">
                        <div class="radio-wdp">
                            <input type="radio" id="radio2.1" value="WDP Rp30.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio2.1">
                                <span class="wdp-category">
                                    Weekly Diamond Pass <br>
                                    <img src="../assets/wdp.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp30.000.00
                            </label> 
                        </div>
                    </div>
                </div>
                <div class="top-up-content">
                    <div id="menu3" class="menu-diamond-mlbb">
                        <div class="radio-twilight">
                            <input type="radio" id="radio3.1" value="Twilight Pass Rp149.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio3.1">
                                <span class="twilight-category">
                                    Twilight Pass <br>
                                    <img src="../assets/twilight_pass.png" class="Twilight" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp149.000.00
                            </label> 
                        </div>
                    </div>
                    <div class="checkout-content" id="other">
                        <h2>Konfirmasi Pembelian</h2><br>
                        <button class="reset-button" type="button" onclick="reset_form_mlbb()">Batalkan Semua Pilihan</button>
                        <div class="input-box-payment">
                            Silahkan Masukkan: <br>
                            <input type="text" min="0" placeholder="Nomor Rekening/Telepon" pattern="\d*" maxlength="15" inputmode="numeric" title="Harus Masukkan Angka" class="payment-form" id="num" name="number"required><br>
                            <input type="submit" name="submit" value="Beli Sekarang" class="checkout-button">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <p>2309106017 Aldi Daffa Arisyi</p>
    </footer>

    <script src="../scripts/scripts.js?v=<?php echo time(); ?>"></script>

</body>
</html>
