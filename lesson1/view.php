<?php
    include 'server.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $stmt = $conn->prepare('select * from images');
        $stmt->execute();
        $imageList = $stmt->fetchAll();

        foreach($imageList as $image){
            ?>
           <img src="<?=$image['image']?>"
        title="<?=$image['name'] ?>"
        width='200' height='200'>
    <?php
    }
    
    ?>
</body>
</html>