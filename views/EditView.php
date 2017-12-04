<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Категория: <?php echo $this->aData['cur_cat']->name ?> ID: <?php echo $this->aData['cur_cat']->id ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 ">
                            <form action="../<?php echo $this->aData['cur_cat']->id ?>/<? echo get_class($this->aData['cur_cat'])?>" method="post">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Название категории:</td>
                                        <td><input type="text" class="form-control-static" name="name" placeholder="<?php echo $this->aData['cur_cat']->name ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Редактировать краткое описание:</td>
                                        <p><b>Краткое описание:</b><?php echo $this->aData['cur_cat']->short_descr ?></p>
                                        <td><input type="text" class="form-control-static" name="short_descr" placeholder="<?php echo $this->aData['cur_cat']->short_descr ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Редактировать полное описание:</td>
                                        <p><b>Полное описание:</b><?php echo $this->aData['cur_cat']->full_descr ?></p>
                                        <td><input type="text" class="form-control-static" name="full_descr" placeholder="<?php echo $this->aData['cur_cat']->full_descr ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Активность</td>
                                        <td><input type="text" class="form-control-static" name="status" placeholder="<?php echo $this->aData['cur_cat']->status ?>"></td>
                                    </tr>
                                    <? if(get_class($this->aData['cur_cat'])=='Goods'):?>
                                    <tr>
                                        <td>Количество</td>
                                        <td><input type="text" class="form-control-static" name="amount" placeholder="<?php echo $this->aData['cur_cat']->amount ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Возможность заказа</td>
                                        <td><input type="text" class="form-control-static" name="order_possible" placeholder="<?php echo $this->aData['cur_cat']->order_possible ?>"></td>
                                    </tr>
                                    <? endif; ?>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-default">Редактировать</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>