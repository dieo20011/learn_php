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
        <h1>Add Grocery List</h1>
        <form action="add.php" method="POST">
            <div class="form-group">
                <label>Item name</label>
                <input type="text" class="form-control" placeholder="Item name" name="iname" />
            </div>

            <div class="form-group">
                <label>Item quantity</label>
                <input type="text" class="form-control" placeholder="Item quantity" name="iqty" />
            </div>

            <div class="form-group">
                <label>Item status</label>
                <select class="form-control" name="istatus">
                    <option value="0">
                        PENDING
                    </option>
                    <option value="1">
                        BOUGHT
                    </option>
                    <option value="2">
                        NOT AVAILABLE
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" class="form-control" placeholder="Date" name="idate">
            </div>
            <div class="form-group">
                <input type="submit" value="Add" class="btn btn-danger" name="btn">
            </div>
        </form>
    </div>

    <?php   
        if(isset($_POST['btn'])){
            include("server.php");
            $item_name = $_POST["iname"];
            $item_quantity = $_POST["iqty"];
            $item_status = $_POST["istatus"];
            $item_date = $_POST["idate"];

            $query = "INSERT INTO grocerytb (Item_name, Item_quantity, Item_status, Date)
                values ('$item_name', $item_quantity, '$item_status', '$item_date')
            ";

            mysqli_query($conn, $query);

            header("location: index.php");
        }
    ?>
</body>

</html>