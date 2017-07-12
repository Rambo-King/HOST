
<div class="k-cover">
    <img src="<?= empty($model->cover) ? '/images/demo.jpg' : $model->cover ?>">
    <div class="k-desc">
        <?= $model->description ?>
    </div>
</div>

<div id="datacenter" class="datacenter">
    <ul>
        <?php foreach($categories as $val): ?>
            <li <?= $val->category_id == $model->category_id ? 'class="current"' : null ?>>
                <a href="/host/cate/<?= $val->category_id ?>" target="_self"><?= $val->name ?></a></li>
        <?php endforeach; ?>

    </ul>
</div>

<div id="list-main" class="list-main">
    <table class="list-table" width="95%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
        <?php foreach($products as $val): ?>
            <tr>
                <?php if(isset($val->type)): ?><td height="50" bgcolor="#DCF8FE">型号</td><?php endif; ?>
                <?php if(isset($val->cpu)): ?><td height="50" bgcolor="#DCF8FE">CPU</td><?php endif; ?>
                <?php if(isset($val->memory)): ?><td height="50" bgcolor="#DCF8FE">内存</td><?php endif; ?>
                <?php if(isset($val->disk)): ?><td height="50" bgcolor="#DCF8FE">磁盘</td><?php endif; ?>
                <?php if(isset($val->bandwidth)): ?><td height="50" bgcolor="#DCF8FE">带宽</td><?php endif; ?>
                <?php if(isset($val->ip_count)): ?><td height="50" bgcolor="#DCF8FE">IP数量</td><?php endif; ?>
                <?php if(isset($val->operating_system)): ?><td height="50" bgcolor="#DCF8FE">操作系统</td><?php endif; ?>
                <?php if(isset($val->has_ipmi)): ?><td height="50" bgcolor="#DCF8FE">IPMI</td><?php endif; ?>
                <?php if(isset($val->price)): ?><td height="50" bgcolor="#DCF8FE">价格</td><?php endif; ?>
                <?php if(isset($val->position) && !empty($val->position)): ?><td height="50" bgcolor="#DCF8FE">机房/位置</td><?php endif; ?>
                <td bgcolor="#DCF8FE">操作<td>
            </tr>
        <?php break; endforeach; ?>
        <?php foreach($products as $key=>$val): ?>
        <tr>
            <?php if(isset($val->type)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->type ?></td><?php endif; ?>
            <?php if(isset($val->cpu)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->cpu ?></td><?php endif; ?>
            <?php if(isset($val->memory)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->memory ?></td><?php endif; ?>
            <?php if(isset($val->disk)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->disk ?></td><?php endif; ?>
            <?php if(isset($val->bandwidth)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->bandwidth ?></td><?php endif; ?>
            <?php if(isset($val->ip_count)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->ip_count ?></td><?php endif; ?>
            <?php if(isset($val->operating_system)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->operating_system ?></td><?php endif; ?>
            <?php if(isset($val->has_ipmi)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->has_ipmi == 1 ? '有' : '无' ?></td><?php endif; ?>
            <?php if(isset($val->price)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->price ?></td><?php endif; ?>
            <?php if(isset($val->position) && !empty($val->position)): ?><td height="80" bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><?= $val->position ?></td><?php endif; ?>
            <td bgcolor="<?= $key%2==0 ? '#FFFFFF' : '#F2FFF4' ?>"><a href="<?= $val->uri ?>" target="_blank"><img src="/images/bt-order.png" alt="order" width="59" height="32" border="0"></a></td>
        </tr>
        <?php endforeach; ?>
        </tbody></table>
</div>

<div id="test-ip-iij" class="test-ip"><?= $model->test_ip ?></div>

<div id="notes" class="notes"><?= $model->note ?></div>

<div id="notes2" class="notes2"><?= $model->summary ?></div>