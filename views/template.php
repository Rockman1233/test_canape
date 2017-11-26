<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to site-catalog</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- 1. Подключить CSS-файл Bootstrap 3 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <!-- 2. Подключить CSS-файл библиотеки Bootstrap 3 DateTimePicker -->
    <link rel="stylesheet" href="../css/bootstrap-datetimepicker.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if($_SERVER['REQUEST_URI']=='/admin.php') echo "class=\"active\""?>><a href="../admin.php">Админка</a></li>
                <li <?php if($_SERVER['REQUEST_URI']=='/index.php') echo "class=\"active\""?>><a href="../index.php">Публичная часть</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php include_once $this->content; ?>


<!-- 3. Подключить библиотеку jQuery -->
<script src="../js/jquery-3.2.1.min.js"></script>
<!-- 4. Подключить библиотеку moment -->
<script src="../js/moment-with-locales.min.js"></script>
<!-- 5. Подключить js-файл фреймворка Bootstrap 3 -->
<script src="../js/bootstrap.min.js"></script>
<!-- 6. Подключить js-файл библиотеки Bootstrap 3 DateTimePicker -->
<script src="../js/bootstrap-datetimepicker.min.js"></script>

</body>
</html>