<?php
include('includes/connection.php');

$query = "DELETE from categories where category_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_categories.php");
