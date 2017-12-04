<div class="container">
    <div class="well well-sm">
        <strong>Категории</strong>
        <div class="btn-group">
            <ul class="nav menu nav-pills topmenu">
            <li id="list" class="btn btn-default btn-sm"><a href="../../index.php">Все</a></li>
            <?php foreach ($this->aData2 as $key => $value): ?>
            <?php if($value['status']>0): ?>
            <!-- check active page-->
            <li <?php $pattern = "~sortlist/$value[id]|'/sortlis/'/~";
            if(preg_match("$pattern",$_SERVER['REQUEST_URI'])) echo "class=\"active\""?>><a href="../../sortlist/<?php echo $value['id']?>" id="list" class="btn btn-default btn-sm" ><?php echo $value['name']?></a></li>
            <?endif;?>
            <?endforeach;?>
            </ul>
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
                                            <?php if(($value['amount']>0)&&($value['order_possible']==-1)):?>В наличии - <?php echo $value['amount']?> шт.(больше не будет)<?endif;?>
                                            <?php if(($value['amount']==0)&&($value['order_possible']==1)):?>Доступен для заказа <?php echo $value['amount']?> шт.<?endif;?>
                                            <?php if(($value['amount']==0)&&($value['order_possible']==-1)):?>Нет и не будет <?php echo $value['amount']?> шт.<?endif;?>
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="../current_good/<?php echo $value['id']?>">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>