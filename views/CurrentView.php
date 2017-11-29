<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $this->aData['current_good']->name ?> ID: <?php echo $this->aData['current_good']->id ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Короткое описание:</td>
                                        <td><?php echo $this->aData['current_good']->short_descr ?></td>
                                    </tr>
                                    <tr>
                                        <td>Полное описание:</td>
                                        <td><?php echo $this->aData['current_good']->full_descr ?></td>
                                    </tr>
                                    <tr>
                                        <td>Количество:</td>
                                        <td><?php echo $this->aData['current_good']->amount ?> шт.</td>
                                    </tr>
                                    <tr>
                                        <td>Возможность доп.заказа:</td>
                                        <td><?php if ($this->aData['current_good']->order_possible ==1): ?>Доступен<? else: ?>Недоступен<?endif;?></td>
                                    </tr>
                                    <tr>
                                        <td>Категории в которых представлен:</td>
                                        <td>
                                        <?php foreach ($this->aData['categories'] as $key => $value): ?>
                                        <a href="../sortlist/<?php echo $value['id']?>"><?php echo $value['name']?></a>,
                                        <? endforeach; ?>
                                        </td>
                                    </tr><?php if ($this->aData['current_good']->order_possible ==1): ?>
                                        <td>Сделать заказ:</td>
                                        <td><a href="#">Нажми</a> POST форма</td>
                                        <?endif;?>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>