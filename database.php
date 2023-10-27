<?php
$host = "localhost";
    $user = "id21372732_admin";
    $pwd = "Apple123@";
    $sql_db = "id21372732_lilappledb";

$conn = new mysqli($host, $user, $pwd, $sql_db);

if ($conn -> connect_error){
    die("Connection failed: ".$conn->connect_error);
}

$conn->begin_transaction();

$inventory_sql ="CREATE TABLE `inventory` (
    `itemID` varchar(4) NOT NULL PRIMARY KEY,
    `name` varchar(40) NOT NULL DEFAULT '',
    `quantity` int(10) NOT NULL ,
    `price` DOUBLE(10, 2) NOT NULL,
    `supplier` varchar(40) NOT NULL DEFAULT ''
    )";

$products_sql ="CREATE TABLE `products` (
    `productID` varchar(4) NOT NULL PRIMARY KEY,
    `productName` varchar(40) NOT NULL DEFAULT '',
    `productPrice` DOUBLE(10,2) NOT NULL ,
    `productImage` varchar(80) NOT NULL,
    `productDescription` varchar(120) NOT NULL DEFAULT '',
    `productCategory` varchar(40) NOT NULL DEFAULT ''
    )";

if ($conn->query($inventory_sql) === TRUE) {
    echo "Table 'inventory' created successfully<br>";
  } else {
    echo "Error creating table 'inventory': " . $conn->error . "<br>";
  }

  if ($conn->query($products_sql) === TRUE) {
    echo "Table 'products' created successfully<br>";
  } else {
    echo "Error creating table 'products': " . $conn->error . "<br>";
  }

  $conn->close();
  ?>
