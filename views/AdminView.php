<div class="container">
<div class="form-group">
    <div class-lg-12>
        <div class="row">
            <div class="col-xs-3">
                <form action="CreateCategory" method="post">
                    <p class="form">
                    <p><input type="text" class="form-control-static" name="name" placeholder="Название категории"></p>
                    <p><input type="text" class="form-control-static" name="short_descr" placeholder="Короткое описание"></p>
                    <p><textarea name="full_descr" cols="40" rows="5" placeholder="Полное описание"></textarea></p>
                    <p><input type="checkbox" class="form-control-static" name="status" > - Активная</p>
                    <button type="submit" class="btn btn-default">Добавить категорию</button>
                </form>
            </div>
            <div class="col-xs-3">
                <form action="CreateGood" method="post">
                    <p class="form">
                    <p><input type="text" class="form-control-static" name="name" placeholder="Название товара"></p>
                    <p><input type="text" class="form-control-static" name="short_descr" placeholder="Короткое описание"></p>
                    <?php foreach ($this->aData as $key => $value): ?>
                    <?php if($value['status']==1): ?><input type="checkbox" class="form-control-static" name="<? echo $value['id'] ?>"><?php echo $value['name']?><? endif;?>
                    <? endforeach; ?>
                    <p><textarea name="full_descr" cols="40" rows="5" placeholder="Полное описание"></textarea></p>
                    <p><input type="number" class="form-control-static" name="amount" placeholder="Количество"></p>
                    <p><input type="checkbox" class="form-control-static" name="order"> - На заказ</p>
                    <p><input type="checkbox" class="form-control-static" name="status"> - Активен</p>
                    <button type="submit" class="btn btn-default">Добавить товар</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a href="#goods">Список товаров</a>
<h3>Список всех категорий:</h3>
<div class="container">
    <table class="table table-bordered">
        <?php foreach ($this->aData as $key => $value): ?>
        <thead>
        <tr>
            <th>ID Категории</th>
            <th>Категория</th>
            <th>Краткое описание</th>
            <th>Полное описание</th>
            <th>Активность</th>
            <th>Редактировать</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['short_descr'] ?></td>
            <td><?php echo $value['full_descr'] ?></td>
            <td><?php echo $value['status'] ?></td>
            <td><a href="../edit/<?php echo $value['id'] ?>/Category"><span class="glyphicon glyphicon-list fa-2x"></a></td>
        </tr>
        </tbody>
        <? endforeach; ?>
    </table>
</div>

<hr id="goods" style="height:5px;border:none;color:#333;background-color:red;" />

<h3 >Список всех Товаров:</h3>
<div class="container">
    <table class="table table-bordered">
        <?php foreach ($this->aData2 as $key => $value): ?>
            <thead>
            <tr>
                <th>ID Товара</th>
                <th>Категория</th>
                <th>Краткое описание</th>
                <th>Полное описание</th>
                <th>Активность</th>
                <th>Количество</th>
                <th>Возможность заказа</th>
                <th>Редактировать</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $value['id'] ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['short_descr'] ?></td>
                <td><?php echo $value['full_descr'] ?></td>
                <td><?php echo $value['status'] ?></td>
                <td><?php echo $value['amount'] ?></td>
                <td><?php echo $value['order_possible'] ?></td>
                <td><a href="../edit/<?php echo $value['id'] ?>/Goods"><span class="glyphicon glyphicon-list fa-2x"></a></td>
            </tr>
            </tbody>
        <? endforeach; ?>
    </table>
</div>