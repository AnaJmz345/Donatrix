<?php
session_start();
require 'database.php';
$message = '';

$records = $conn->prepare('SELECT id_user, company, product, quantity, description, address FROM donor WHERE description = :description');
$records->bindParam(':description', $_GET['description']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$rec = $conn->prepare('SELECT id, email FROM users WHERE id = :id');
$rec->bindParam(':id', $results['id_user']);
$rec->execute();
$res = $rec->fetch(PDO::FETCH_ASSOC);

$user_email = $_SESSION['email'];
$donor_email = $res['email'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Reserved</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">
        .btn {
            background-color: #062A54 !important;
            color: white !important;
            margin-bottom: 60px;
        }
    </style>
</head>
<body>
    <div class="p-3 mb-2 bg-success text-white"><h3> Congratulations <?php echo $user_email ?>, you have reserved it</h3></div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Company</th>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Description</th>
                <th scope="col">Address</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"><?php echo $results['company']; ?></th>
                <td><?php echo $results['product']; ?></td>
                <td><?php echo $results['quantity']; ?></td>
                <td><?php echo $results['description']; ?></td>
                <td><?php echo $results['address']; ?></td>
            </tr>
        </tbody>
    </table>

    <a class="btn" href="logout.php">LOG OUT</a>
    <a class="btn" href="receiverOptions.php">Return to select products</a>
    <center>
        <h6> You will soon receive a confirmation email at <?php echo $donor_email ?></h6>
        <?php

        $to = $donor_email;
        $subject = "A product of yours has been reserved";
        $message = "Your " . $results['description'] . " has been reserved";

        mail($to, $subject, $message);
        $delete = $conn->prepare('DELETE FROM donor WHERE description = :description');
        $delete->bindParam(':description', $_GET['description']);
        $delete->execute();

        ?>
    </center>
</body>

</html>
