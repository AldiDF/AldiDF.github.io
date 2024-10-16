<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MLA - Top Up Store</title>
    <link rel="stylesheet" href="../styles/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/topup.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/main.css">
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

    <main>
        <form action="../receipt/receipt_mla.php" class="top-up-container" method="POST" onsubmit="return limit_number_forTopupmlbbmla()">
            <div class="left-content">
                <div class="game-description">
                    <figure class="game-logo">
                        <img src="../assets/mla-logo.png" alt="mla-logo" class="game" width="100px" height="100px">
                        <figcaption>
                            <p class="developer">Moonton</p>
                            Mobile Legends: Adventure
                        </figcaption>
                    </figure>
                    <p style="text-align: justify;">Mobile Legends: Adventure (MLA) adalah RPG Idle santai yang cocok dimainkan di tengah kesibukan Anda. Mulai petualangan bersama lebih dari 100 Hero unik, untuk mengungkap kebenaran di balik ramalan mengerikan dan menyelamatkan Land of Dawn dari kehancuran!
                    </p>
                    <br>
                    <p style="text-align: justify;">Top up Diamond Mobile Legends: Adventure hanya dalam hitungan detik! Cukup masukan User ID Mobile Legends: Adventure Anda, pilih jumlah Diamond yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun Mobile Legends: Adventure Anda.</p>
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
                            <input type="text" placeholder="Id Pengguna" pattern="\d*" maxlength="9" inputmode="numeric" title="Harus Masukkan Angka" class="input-form-mla" id="user" name="ID" required>
                            <input type="text" placeholder="(     Server    )" pattern="\d*" maxlength="6" inputmode="numeric" title="Harus Masukkan Angka" class="input-form-mla" id="server" name="serv" required>
                        </div>
                </div>
                <div class="category-content">
                    <h2>Pilih Kategori</h2>
                    <div class="radio-category-mla">
                        <input type="radio" id="radio1" name="kategori" value="Diamond" onclick="mla_category(1)">
                        <label for="radio1">
                            <span class="category-specify">
                                <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">
                            </span> <br>  Diamond
                        </label> 
                    </div>
                </div>

                <div class="top-up-content">
                    <div id="menu" class="menu-diamond-mla">
                        <div class="radio-top-up">
                            <input type="radio" id="radio1.1" value="50 MLA-Diamond Rp15.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.1">
                                <span class="top-up-category">
                                    50 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp15.000,00
                            </label> 

                            <input type="radio" id="radio1.2" value="250 MLA-Diamond Rp75.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.2">
                                <span class="top-up-category">
                                    250 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">                            
                                </span> <br> Rp75.000,00
                            </label> 

                            <input type="radio" id="radio1.3" value="500 MLA-Diamond Rp149.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.3">
                                <span class="top-up-category">
                                    500 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp149.000,00
                            </label>

                            <input type="radio" id="radio1.4" value="1000 MLA-Diamond Rp299.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.4">
                                <span class="top-up-category">
                                    1000 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp299.000,00
                            </label> 

                            <input type="radio" id="radio1.5" value="2500 MLA-Diamond Rp739.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.5">
                                <span class="top-up-category">
                                    2500 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">                            
                                </span> <br> Rp739.000,00
                            </label> 

                            <input type="radio" id="radio1.6" value="5000 MLA-Diamond Rp1.499.000,00" name="top-up" onclick="methodt(1)">
                            <label for="radio1.6">
                                <span class="top-up-category">
                                    5000 Diamond <br>
                                    <img src="../assets/diamond_ungu.png" alt="diamond" width="100px" height="100px">
                                </span> <br> Rp1.499.000,00
                            </label>
                        </div>
                    </div>
                </div>
                <div class="checkout-content" id="other">
                    <h2>Konfirmasi Pembelian</h2><br>
                    <button class="reset-button" type="button" onclick="reset_form_mla()">Batalkan Semua Pilihan</button>
                    <div class="input-box-payment" id="other-form">
                        Silahkan Masukkan: <br>
                        <input type="text" min="0" placeholder="Nomor Rekening/Telepon" pattern="\d*" maxlength="15" inputmode="numeric" title="Harus Masukkan Angka" id="num" class="payment-form" name="number"required><br>
                        <input type="submit" name="submit" value="Beli Sekarang" class="checkout-button">
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
