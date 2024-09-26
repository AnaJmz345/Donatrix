<?php
session_start();
require 'database.php';
$message = '';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>
    Clothing
  </title>
  <style type="text/css">
    body{
      background: url('toystory.png')no-repeat;height: 100vh; background-size: cover;background-position: center;"
      margin: 40px;
      margin-top: 10px;
      
    }
    th,tr,td{
      background-color: white !important;
      border: 3px solid #062A54;
      text-align: center;

    }
    th{
      background: linear-gradient(#2B4590, #BFD6F0)
    }
    a{
      background-color: #062A54 !important;
      color:  white !important;
      margin-bottom: 0px;
    }

 
  </style>
  <a class="btn" href="receiverOptions.php">Return to options menu</a>

</head>

<body>
    <center>
    <table border="1">
          <tr>
              <th>Company</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Description</th>
              <th>Address</th>
              
          </tr>
        <?php

        $result = $conn->query('SELECT id_user,company, product, quantity,description,address FROM donador WHERE producto="toys"'); 
         
        $all = array();
          while ( $p = $result->fetch()){
            $all[] = $p;
          }
            foreach ($all as $value) {

              echo "<tr>";
                echo "<td>". $value["company"] ."</td>";
                echo "<td>". $value["product"] ."</td>";
                echo "<td>". $value["quantity"] ."</td>";
                echo "<td>". $value["description"] ."</td>";
                echo "<td>". $value["address"] ."</td>";
                echo "<td><a class='btn' href='reserve.php?description=" . $value["description"] . "'>Reserve</a></td>";
              echo "</tr>";                          
            }
        ?> 
      </table>
      </center> 
      <a class="btn" href="logout.php">LOG OUT</a>
</body>
</html>
