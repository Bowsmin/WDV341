<?php
session_start();
$url = "loginToHomepage.php"
?>
<!DOCTYPE html>

<html>

     <head>

        <meta charset="UTF-8">
        <title>Login Homepage</title>
        <meta name="author" content ="Josiah Anderson">



          <style>

              @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&family=Source+Code+Pro&display=swap');

              body {
                  background-image: url(../../images/homeback.jpg);
              }

              h1{
                  font-family: 'Cairo', sans-serif;
                  color: darkorange;
              }

              h2{
                  color: cornsilk
              }

              a{
                  text-decoration: none;
              }

              a.homelink{
                  color: yellow;
              }

            .topnav {

                background-color:firebrick;
                width: 300px;
                height: auto;
                overflow: hidden;

            }


            .topnav a {
                float: left;
                color: black;
                text-align: center;
                padding: 14px 16px;
                font-size: 20px;

            }

            .topnav a.Active {

                color: darkgrey;


            }


             .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

              ul {

                  list-style-type: disc;
                  font-size: 45px;
                  padding: 20px;
                  margin: 35px;
                  color: burlywood

              }

        </style>


    </head>

    <body>
        <?php
            if ($_SESSION['validUser'] == "yes"){
            
        ?>
        <h1>Homepage</h1>
        <h2><a href=logoutHomepage.php>Logout</a></h2>
        <?php
            }
            else {
                header('Location: '.$url);
                die();
        }
        ?>

    </body>
</html>
