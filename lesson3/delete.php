<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $conn = mysqli_connect("localhost", "root", "", "beginer");
        if (!$conn) {
        die("Cannot connect database");
        }

        $sql = "DELETE FROM clients WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        header("location:index.php");
    }


?>