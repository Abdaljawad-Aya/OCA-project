<?php
include('includes/connection.php');

$query = "DELETE from customers where customer_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_customers.php");
