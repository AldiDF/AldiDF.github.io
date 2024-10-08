<?php
    require "connection.php";

    $id = $_GET["id"];

    $result = mysqli_query($conn, "DELETE FROM akun WHERE id = $id");

    if ($result) {
        echo "
            <script>
                alert('Berhasil Menghapus Akun');
                document.location.href = 'history.php';
            </script>
        ";
    }
?>