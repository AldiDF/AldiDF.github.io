<html>
<body>

<?php
echo "<pre/>"; print_r($_POST);
exit
?>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

</body>
</html>