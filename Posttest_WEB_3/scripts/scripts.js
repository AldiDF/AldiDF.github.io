function openNav() {
    document.getElementById("sidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
}

function mode(){
    let body = document.body;
    body.classList.toggle("dark-mode")

    const darkmode = document.body.classList.contains("dark-mode");

    if (darkmode){
        localStorage.setItem("dark-mode", "enabled");

    } else {
        localStorage.setItem("dark-mode", "disabled");
    }
}

function checkmode(){
    const modesetting = localStorage.getItem("dark-mode");
    if (modesetting === "enabled"){
        document.body.classList.add("dark-mode");
    }

}
window.onload = checkmode;


function mlbb_category(menu){
    document.getElementById("menu1").style.display = "none";
    document.getElementById("menu2").style.display = "none";
    document.getElementById("menu3").style.display = "none";
    document.getElementById("payment").style.display = "none";

    if (menu === 1){
        document.getElementById("menu1").style.display = "block";
    } else if (menu === 2){
        document.getElementById("menu2").style.display = "block";
    } else if (menu === 3){
        document.getElementById("menu3").style.display = "block";
    }

    document.getElementById("payment").style.display = "block";
}

function category(menu){
    document.getElementById("menu").style.display = "none";
    document.getElementById("payment").style.display = "none";

    if (menu === 1){
        document.getElementById("menu").style.display = "block";
    }
    document.getElementById("payment").style.display = "block";
}


function mla_category(menu){
    document.getElementById("menu").style.display = "none";
    document.getElementById("payment").style.display = "none";

    if (menu === 1){
        document.getElementById("menu").style.display = "block";
    }
    document.getElementById("payment").style.display = "block";
}

function method_payment(choose){
    document.getElementById("bank").style.display = "none";
    document.getElementById("other").style.display = "none";

    if (choose === 1){
        document.getElementById("bank").style.display = "block";
    } else if (choose === 2){
        document.getElementById("other").style.display = "block";
    }
}

document.getElementById('loginForm').addEventListener('submit', function(event){
    event.preventDefault();
    let email = document.getElementById('mail').value;
    let password = document.getElementById('pw').value;

        if (email && password) {
            alert('Anda telah login');
            window.location.href = "index.html";
        }
    });

function registerform(event){
    event.preventDefault();
    const first_name = document.querySelector('#first-name').value;
    const last_name = document.querySelector('#last-name').value;
    const region = document.querySelector('#region').value;
    const email = document.querySelector('#reg-mail').value;
    const password = document.querySelector('#reg-pw').value;

    if (!first_name){
        alert("Silahkan Masukkan Nama Depan.");
        return;
    }

    if (!last_name){
        alert("Silahkan Masukkan Nama Belakang.");
        return;
    }
    
    if (!region){
        alert("Silahkan Masukkan Region.");
        return;
    }

    if (!email){
        alert("Silahhkan Masukkan Email.");
        return;
    }

    if (!password){
        alert("Silahkan Masukkan Password.");
        return;
    }

    alert("Anda telah Mendaftar.");
    window.location.href = "login.html";
}


function reset_form_mlbb(){
    const payment = document.querySelectorAll('.pay-radio input[type="radio"]');
    payment.forEach(radio => radio.checked = false);

    const category = document.querySelectorAll('.radio-category input[type="radio"]');
    const topUp = document.querySelectorAll('.radio-top-up input[type="radio"]');
    const wdp = document.querySelectorAll('.radio-wdp input[type="radio"]');
    const twilight = document.querySelectorAll('.radio-twilight input[type="radio"]');

    category.forEach(radio => radio.checked = false);
    topUp.forEach(radio => radio.checked = false);
    wdp.forEach(radio => radio.checked = false);
    twilight.forEach(radio => radio.checked = false);

    document.getElementById("bank").style.display = "none";
    document.getElementById("other").style.display = "none";
    document.getElementById("menu1").style.display = "none";
    document.getElementById("menu2").style.display = "none";
    document.getElementById("menu3").style.display = "none";
    document.getElementById("payment").style.display = "none";
}

function checkout_mlbb(){
    const payment = document.querySelector('.pay-radio input[type="radio"]:checked');
    if (!payment){
        alert("Silahkan pilih metode pembayaran.");
        return;
    }

    const user = document.querySelector('.input-box input[type="text"]:nth-child(1)').value;
    const server = document.querySelector('.input-box input[type="text"]:nth-child(2)').value;
    if (!user || !server){
        alert("Silahkan Masukkan ID Pengguna dan Server.");
        return;
    }

    const topUp = document.querySelector('.radio-top-up input[type="radio"]:checked') ||
                  document.querySelector('.radio-wdp input[type="radio"]:checked') ||
                  document.querySelector('.radio-twilight input[type="radio"]:checked');
    
    if (!topUp){
        alert("Silahkan pilih kategori dan jumlah top-up.");
        return;
    }

    const payment_identify = document.querySelector('.input-box-payment input[type="text"]').value;

    if (!payment_identify){
        alert("Silahkan masukkan nomor rekening atau nomor telepon");
        return;
    }

    alert("Pembelian berhasil! Terima kasih.");
    window.location.href = "../index.html";
}

function reset_form_OneCategory(){
    const payment = document.querySelectorAll('.pay-radio input[type="radio"]');
    payment.forEach(radio => radio.checked = false);

    const category = document.querySelectorAll('.radio-category-ff input[type="radio"]');
    const topUp = document.querySelectorAll('.radio-top-up input[type="radio"]');

    category.forEach(radio => radio.checked = false);
    topUp.forEach(radio => radio.checked = false);

    document.getElementById("bank").style.display = "none";
    document.getElementById("other").style.display = "none";
    document.getElementById("menu").style.display = "none";
    document.getElementById("payment").style.display = "none";
}

function checkout_OneCategory(){
    const payment = document.querySelector('.pay-radio input[type="radio"]:checked');
    if (!payment){
        alert("Silahkan pilih metode pembayaran.");
        return;
    }

    const user = document.querySelector('.input-box-ff input[type="text"]').value;
    if (!user){
        alert("Silahkan Masukkan ID Pengguna.");
        return;
    }

    const topUp = document.querySelector('.radio-top-up input[type="radio"]:checked');
    
    if (!topUp){
        alert("Silahkan pilih kategori dan jumlah top-up.");
        return;
    }

    const payment_identify = document.querySelector('.input-box-payment input[type="text"]').value;

    if (!payment_identify){
        alert("Silahkan masukkan nomor rekening atau nomor telepon");
        return;
    }

    alert("Pembelian berhasil! Terima kasih.");
    window.location.href = "../index.html";
}

function reset_form_mla(){
    const payment = document.querySelectorAll('.pay-radio input[type="radio"]');
    payment.forEach(radio => radio.checked = false);

    const category = document.querySelectorAll('.radio-category-mla input[type="radio"]');
    const topUp = document.querySelectorAll('.radio-top-up input[type="radio"]');

    category.forEach(radio => radio.checked = false);
    topUp.forEach(radio => radio.checked = false);

    document.getElementById("bank").style.display = "none";
    document.getElementById("other").style.display = "none";
    document.getElementById("menu").style.display = "none";
    document.getElementById("payment").style.display = "none";
}

function checkout_mla(){
    const payment = document.querySelector('.pay-radio input[type="radio"]:checked');
    if (!payment){
        alert("Silahkan pilih metode pembayaran.");
        return;
    }

    const user = document.querySelector('.input-box input[type="text"]:nth-child(1)').value;
    const server = document.querySelector('.input-box input[type="text"]:nth-child(2)').value;
    if (!user || !server){
        alert("Silahkan Masukkan ID Pengguna dan Server.");
        return;
    }

    const topUp = document.querySelector('.radio-top-up input[type="radio"]:checked');
    
    if (!topUp){
        alert("Silahkan pilih kategori dan jumlah top-up.");
        return;
    }

    const payment_identify = document.querySelector('.input-box-payment input[type="text"]').value;

    if (!payment_identify){
        alert("Silahkan masukkan nomor rekening atau nomor telepon");
        return;
    }

    alert("Pembelian berhasil! Terima kasih.");
    window.location.href = "../index.html";
}