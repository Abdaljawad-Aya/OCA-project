<?php
include('includes/connection.php');

$query = "DELETE from sub_categories where sub_category_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_sub_cat.php");
