<?php 
    $conn = mysqli_connect("localhost", "root", "", "beginer");
    if (!$conn) {
        die("Cannot connect database");
    }
    $email = "";
    $name = "";
    $phone = "";
    $address = "";
    $errorMesseger = "";
    $successMesseger = "";

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_GET["id"])) {
            header("location: index.php");
            exit;
        }
        $id = $_GET["id"];
        $sql = "SELECT * FROM clients WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($query);

        if (!$row) {
            header("location: index.php");
            exit;
        }

        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];
    } else {
        $id = $_GET["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        do {
            if ( empty($name) || empty($email) || empty($phone) || empty($address)) {
                $errorMesseger = "All fields are required";
                break;
            }
            $sql = "UPDATE clients SET name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                $errorMesseger = "Invalid query:";
                break;
            }
            $successMesseger = "Update success";
            header("location:index.php");
            exit;
        } while (true);
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>
        <?php
            if(!empty($errorMesseger)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMesseger</strong>
                    <button type='button' class='btn-close' data-bs-dismis='alert' aria-label='Close'></button>
                </div>
                
                ";
            }

        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">
                    Name
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">
                    Email
                </label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">
                    Phone
                </label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="phone" value="<?php echo $phone ?>"/>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">
                    Address
                </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address ?>"/>
                </div>
            </div>
            <?php
                if(!empty($successMesseger)){
                    echo "
                        <div class='row mb-3'>
                            <div class='offset-sm-3 col-sm-6'>
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>$successMesseger</strong>
                                    <button type='button' class='btn-close' 'data-bs-dismiss'='alert'></button>
                                </div>
                            </div>
                        </div>
                    ";
                }     
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>