<!doctype html>
<?php include 'config.php';?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title><?php echo $collegeName; ?></title>
        <link rel="stylesheet" href="themes/Bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap2.css">
        <link rel="stylesheet" href="css/jquery.mobile.structure-1.4.0.min.css" />
        <link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.mobile-1.4.0.min.js"></script>
    </head>
    <body>
        <div data-role="page" data-theme="a">
            <div data-role="header" data-position="inline">
                <h1><b><?php echo $collegeName; ?></b></h1>
                
            </div>
            <div data-role="content" data-theme="a">
               <?php
session_start();
include 'db_config.php';
if (isset($_POST["Uname"])&&isset($_POST["Upass"])) {
    $uname = $_POST['Uname'];
    $upass = $_POST['Upass'];

    // get a product from products table
    $result = mysql_query("SELECT * FROM stu_login WHERE UNAME = '$uname' AND UPASS='$upass'");

    if (!empty($result)) {
        // check for empty result
                if (mysql_num_rows($result) > 0) {
$result = mysql_fetch_array($result);

        $_SESSION['username'] = $result['UNAME'];
            ?>

<script type="text/javascript">
    window.location.href="profile.php"
</script>
            <?php
                   
                } else {
                  ?>
<script type="text/javascript">
    window.location.href="index.php?message=wrong"
</script>
                  <?php
                }
    } else {
         ?>
<script type="text/javascript">
    window.location.href="index.php?message=wrong"
</script>
                  <?php
    }
} else {
    ?>
<script type="text/javascript">
    window.location.href="index.php?message=missing"
</script>
<?php
}

?> 
                <center><img src="img/<?php echo $collegeName; ?>_large.png" width="160" height="150" />
                                
                <h3>Placement,<br>
                Student Profile<br>
                Attendence</h3></center>
                <div class="ui-block"><a href="login_test.php">
                <button data-theme="d" class="ui-btn ui-btn-d ui-shadow ui-corner-all btn-success">Continue..</button>
                </a></div>
                <!--<a data-role="button" data-icon="star"><center>Sponsors</center></a>-->
                <br>
                <hr>
                <br>
                <!-- <div class="ui-block"><center>Mobile App done by <a href="http://www.verifnews.org/" class="external-link">www.verifnews.org</a>
                and Developed by <?php echo $collegeName; ?> University, Kanchipuram, Tamil Nadu.
                </center>
                </div>-->
            </div>
        </div>
        

    </body>
</html>
