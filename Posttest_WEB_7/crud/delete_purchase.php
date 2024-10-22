<?php
    require "connection.php";

    if (isset($_GET["id"])){
        $id = $_GET["id"];
        $result = mysqli_query($conn, "DELETE FROM pembelian WHERE id = $id");
        if ($result) {
            echo "
                <script>
                    alert('Berhasil Menghapus Akun');
                    document.location.href = 'history.php';
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