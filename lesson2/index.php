<?php
include("server.php");
if (isset($_POST['btn'])) {
    $date = $_POST['idate'];
    $query = "select * from grocerytb where Date='$date'";
    $query = mysqli_query($conn, $query);
} else {
    $query = "select * from grocerytb ";
    $query = mysqli_query($conn, $query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">

        <!-- top -->
        <div class="row">
            <div class="col-lg-8">
                <h1>View Grocery List</h1>
                <a href="add.php">Add Item</a>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-8">

                        <!-- Date Filtering-->
                        <form method="post" action="">
                            <input type="date" class="form-control" name="idate">

                            <div class="col-lg-4" method="post">
                                <input type="submit" class="btn btn-danger float-right" name="btn" value="filter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <?php
                while($qq=mysqli_fetch_array($query))
                {
            ?>
                 <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $qq['Item_name']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo 
                            $qq['Item_quantity']; ?>
                        </h6>
                        <?php
                        if($qq['Item_status'] == 0) {
                        ?>
                        <p class="text-info">PENDING</p>
  
                        <?php
                        } else if($qq['Item_status'] == 1) {
                        ?>
                        <p class="text-success">BOUGHT</p>
  
                        <?php } else { ?>
                        <p class="text-danger">NOT AVAILABLE</p>
  
                        <?php } ?>
                        <a href=
                        "delete.php?id=<?php echo $qq['Id']; ?>" 
                            class="card-link">
                            Delete
                        </a>
                        <a href=
                        "update.php?id=<?php echo $qq['Id']; ?>" 
                            class="card-link">
                            Update
                        </a>
                    </div>
                </div><br>
            </div>
            <?php
                }
                ?>  
        </div>
</body>

</html>