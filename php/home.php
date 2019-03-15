<?php

    require_once("functions.php");
    $info = getProfile();

    if($info == "INVALID TOKEN"){

        echo "<script> alert('INVALID TOKEN!'); location.href='../index.php';</script>";

    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">My Profile</h1>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px;">
            <div class="card text-center">
                <img class="card-img-top" src="../img/<?php echo $info['picture'] ?>" alt="Card image" width=50% alt="No image found">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $info['fname'] ?> <?php echo $info['lname'] ?></h2>
                    <p class="card-text">
                    <?php echo $info['gender'] ?> <br>
                    <?php echo $info['address'] ?> <br>
                    <?php echo $info['contact'] ?>
                    </p>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>