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
                    <input type="checkbox" class="form-control-static" name="<? echo $value['id'] ?>"><?php echo $value['name']?>
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