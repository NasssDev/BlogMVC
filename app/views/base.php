<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title><?= $_pageTitle ?></title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>
        <link rel="stylesheet" href="/views/assets/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
    <header class="header-bar">
        <div style="display: flex">
            <?php
            if (!$_logStatut){
                echo "<a id='head_btn' style=' text-decoration:none' href='/login'>Login</a>";
            }else{
                echo "<a id='head_btn' style=' text-decoration:none' href='/logout'>Logout</a>";
                echo "<a id='head_btn' style=' text-decoration:none;'  href='/admin'>Admin</a>";
            }
            ?>
            <a id='head_btn' style=' text-decoration:none; ' href='/'>Home</a>
        </div>
    </header>
    <div style="width: 100%; display: flex">
        <?= $_pageContent ?>
    </div>
    <footer class="footer-bar">


    </footer>

        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script  src="/views/assets/script.js"></script>
    </body>
    <footer>
    </footer>
</html>