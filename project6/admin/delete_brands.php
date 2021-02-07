<?php
include('includes/connection.php');

$query = "DELETE from brands where brand_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_brands.php");
