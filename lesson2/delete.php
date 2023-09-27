<?php
     include("server.php");
    if(isset($_GET['id'])){
        $query = "DELETE FROM grocerytb WHERE Id='".$_GET['id']."'";
        mysqli_query($conn, $query);
        header("location: index.php");
    }

?>