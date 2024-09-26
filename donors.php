<?php
session_start();
require 'database.php';
$message = '';
$write = false;

if (!empty($_POST['company']) && !empty($_POST['list']) && !empty($_POST['quantity']) && !empty($_POST['description']) && !empty($_POST['address'])) {

    $sql = "INSERT INTO donor(id_user, company, product, quantity, description, address) values(" . $_SESSION['user_id'] . ",'" . $_POST['company'] . "','" . $_POST['list'] . "','" . $_POST['quantity'] . "','" . $_POST['description'] . "','" . $_POST['address'] . "')";
    $conn->query($sql);
    $write = true;

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>
        Product Registration for Donation
    </title>
    <style type="text/css">
        html, body {
            margin: 40px;
            margin-top: 10px;
            margin-left: 10px;
        }
        input {
            outline: none;
            padding: 20px;
            display: block;
            width: 300px;
            height: 10px;
            border-radius: 3px;
            border: 1px solid #062A54;
            margin: 20px auto;
        }
        select {
            width: 300px;
            height: 45px;
            border-radius: 3px;
            border: 1px solid #062A54;
            margin: 20px;
        }
        .btn {
            background-color: #062A54 !important;
            color: white !important;
            margin-bottom: 60px;
        }
    </style>
    <a class="btn" href="sampleRoom.php">Return to options menu</a>

</head>

<body style="background: url('background companies.png') no-repeat; height: 100vh; background-size: cover; background-position: center;">

    <form action="donors.php" method="POST">
      <center>
      
        <input type="text" name="company" placeholder="Company">
        <br><br>
        <select name="list" id="list">
          <option value="value1" selected>Product Type</option>
          <option value="food">Food</option>
          <option value="clothes">Clothes</option>
          <option value="toys">Toys</option>
        </select>
        <br><br>
        <input type="text" name="quantity" placeholder="Quantity">
        <br><br>
        <input type="text" name="description" placeholder="Description">
        <br><br>
        <input type="text" name="address" placeholder="Address">
        <br><br>
        <button type="submit" class="btn">Accept</button>
        <a class="btn" href="logout.php">LOG OUT</a>

      </center>
    </form>

<?php
if ($write == true) {
    echo('<br><br><center>');
    echo("Saved successfully</center>");
}
?>
</body>
</html>
