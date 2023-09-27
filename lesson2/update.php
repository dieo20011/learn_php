<?php
include("server.php");
if (isset($_POST['btn'])) {
    $item_name = $_POST['iname'];
    $item_quantity = $_POST['iqty'];
    $item_status = $_POST['istatus'];
    $item_date = $_POST['idate'];
    $id = $_GET['id'];

    $query = "update grocerytb SET Item_name = '$item_name', Item_quantity = '$item_quantity',
            Item_status = '$item_status', Date = '$item_date' where Id = $id
        ";

    $q = mysqli_query($conn, $query);

    header("location: index.php");
} else if (isset($_GET['id'])) {
    $query = "SELECT * FROM grocerytb WHERE Id='".$_GET['id']."'";
    $q = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($q);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Update Product</h1>
        <form method="post">
            <div class="form-group">
                <label>Item name</label>
                <input type="text" name="iname" placeholder="Item name" 
                value="<?php echo $res['Item_name']; ?>"/>
            </div>
            <div class="form-group">
                <label>Item Quantity</label>
                <input type="number" name="iqty" placeholder="Item Quantity"
                value="<?php echo $res['Item_quantity']; ?>"
                />
            </div>
            <div class="form-group">
                <label>Item status</label>
                <select class="form-control" name="istatus">
                    <?php if($res['Item_status'] == 0) { ?>
                        <option value="0" selected>PENDING</option>
                        <option value="1">BOUGHT</option>
                        <option value="2">NOT AVAILABLE</option>
                        <?php } else if ($res['Item_status'] == 1 ) {?>
                            <option value="0">PENDING</option>
                            <option value="1" selected>BOUGHT</option>
                            <option value="2">NOT AVAILABLE</option>
                        <?php } else if ($res['Item_status'] == 2) { ?>
                            <option value="0">PENDING</option>
                            <option value="1">BOUGHT</option>
                            <option value="2" selected>NOT AVAILABLE</option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" name="idate" placeholder="Date" 
                value="<?php echo $res['Date'] ?>"/>
            </div>
            <div class="form-group">
                <input type="submit" value="update" name="btn" class="btn btn-danger"/>
            </div>
        </form>
    </div>
</body>

</html>