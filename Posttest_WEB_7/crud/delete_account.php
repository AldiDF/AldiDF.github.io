<?php
    session_start();
    require "connection.php";

    if (isset($_GET["id"])){
        $id = $_GET["id"];

        $sql_select = mysqli_query($conn, "SELECT * FROM akun WHERE id = $id");

        while ($row = mysqli_fetch_assoc($sql_select)) {
            $account[] = $row;
        }

        $account = $account[0];

        unlink("saves/". $account["profil"]);
        
        $result = mysqli_query($conn, "DELETE FROM akun WHERE id = $id");
        
        if ($result) {
            unset($_SESSION["login"]);
            unset($_SESSION["email"]);
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