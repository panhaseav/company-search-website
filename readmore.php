<?php include "navigation.php";?>
<?php include "connection.php";?>


<?php
global $connection;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet"  href="./css/bootstrap.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <style>
        .navbar {
            background:white;
        }
        body{
            background-color:rgba(48, 119, 108, 0.83);
            background-size:cover;
            margin:auto;
        }
        .container{
            background-color:white;
        padding:50px;
            margin-top: 50px;
        }
        h2{
             text-align: center;
             font-size: 100px;
        }
.tags{
    text-align: center;
    font-size: 20px;
    
}
.size{
    text-align: left;
    font-size: 15px;
    font-weight: bold;
}
.url{
    text-align: left;
    font-size: 15px;
    font-weight: bold;
}
.country{
    text-align: left;
     font-size: 15px;
     font-weight: bold;
    
}
.phone{
    text-align: left;
        font-size: 15px;
        font-weight: bold;
}
.descr{   text-align: left;
     font-size: 15px;
     font-weight: bold;}

    </style>
</head>
<body>


</body>
</html>

<?php
global $connection;
?>
<?php
$query = "SELECT * FROM company WHERE id =" .$_GET['companyid'];
$result = mysqli_query($connection,$query);

$row = mysqli_fetch_assoc($result);
?>



                <div class = "container">

                <!-- First Blog Post -->
                <h2>
                   <?=$row['company_name']?>
                </h2>
<p class="tags">Tag:<?=$row['company_tags']?></p><br><br>
                <p class = "size">
                Company size: <?= $row['company_size'] ; ?>
                </p><br>
                <p class = "country">
                Company Location: <?= $row['country'] ; ?>
                </p><br>
                <p class = "url">
                Company URL: <?= $row['company_url'] ; ?>
                </p><br>
                <p class = "phone">
                Company Phone No: <?= $row['company_phone'] ; ?>
                </p><br>

               <p class="descr">
                  Company detail<br><br> <?=$row['company_description']?>

               </p>
               </div>
               
