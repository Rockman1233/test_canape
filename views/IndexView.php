<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список товаров</title>

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
<div class="container">
    <div class="well well-sm">
        <strong>Категории</strong>
        <div class="btn-group">
            <?php foreach ($this->aData2 as $key => $value): ?>
            <a href="../<?php echo $value['id']?>" id="list" class="btn btn-default btn-sm"><?php echo $value['name']?></a>
            <?endforeach;?>
        </div>
    </div>
    <?php echo $this->pagination?>
    <div id="products" class="row list-group">
        <?php foreach ($this->aData as $key => $value): ?>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        <?php echo $value['name']?></h4>
                    <p class="group inner list-group-item-text">
                        <?php echo $value['short_descr']?></p>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead"><?php if(($value['amount']>0)&&($value['order_possible']==1)):?>В наличии - <?php echo $value['amount']?> шт.<?endif;?>
                                            <?php if(($value['amount']==0)&&($value['order_possible']==1)):?>Доступен для заказа <?php echo $value['amount']?> шт.<?endif;?>
                                            <?php if(($value['amount']==0)&&($value['order_possible']==0)):?>Нет и не будет <?php echo $value['amount']?> шт.<?endif;?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="<?php echo $value['id']?>">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?endforeach;?>





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