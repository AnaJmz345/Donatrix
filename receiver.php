<?php
session_start();
require 'database.php';
$message = '';
$escribe = false;

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <title>
    Display of Available Products
  </title>
  <style type="text/css">
    body {
      margin: 40px;
      margin-top: 10px;
    }
    th, tr, td {
      border: 3px solid #062A54;
      text-align: center;
    }
    th {
      background: linear-gradient(#2B4590, #BFD6F0);
    }
    a {
      background-color: #062A54 !important;
      color: white !important;
      margin-bottom: 0px;
    }
  </style>
  

</head>

<body>
    <center>
      <h2>
    <table border="1">
          <tr>
              <th>Company</th>
              <th>Product</th>
              <th>Quantity</th>
              <th>Description</th>
              <th>Address</th>
          </tr>
        <?php

        $result = $conn->query('SELECT id_user, company, product, quantity, description, address FROM donor'); 
        
        $all = array();
          while ($p = $result->fetch()) {
            $all[] = $p;
          }
          foreach ($all as $value) {
              echo "<tr>";
                echo "<td>" . $value["company"] . "</td>";
                echo "<td>" . $value["product"] . "</td>";
                echo "<td>" . $value["quantity"] . "</td>";
                echo "<td>" . $value["description"] . "</td>";
                echo "<td>" . $value["address"] . "</td>";
              echo "</tr>";                          
          }
        ?> 
      </table>
      </center> 
</body>
</html>

