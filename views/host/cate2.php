
<div class="k-cover">
    <img src="<?= empty($model->cover) ? '/images/demo.jpg' : $model->cover ?>">
    <div class="k-desc">
        <?= $model->description ?>
    </div>
</div>

<div id="de-dsc" class="de-dsc"><?= $model->note ?></div>

<div id="datacenter" class="datacenter">
    <ul>
        <?php foreach($categories as $val): ?>
            <li><a href="/host/cate/<?= $val->category_id ?>" target="_self"><?= $val->name ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<div id="icon" class="k-icon">
    <div id="icon1" class="icon1"><ul><li><img src="/images/icon-global.gif" width="149" height="149"></li><li>节点分布广</li><li></li></ul></div>
    <div id="icon2" class="icon2"><ul><li><img src="/images/icon-safe.gif" width="149" height="149"></li><li>硬件配置高</li><li></li></ul></div>
    <div id="icon3" class="icon3"><ul><li><img src="/images/icon-server.gif" width="149" height="149"></li><li>按需设定方案</li><li></li></ul></div>
    <div id="icon4" class="icon4"><ul><li><img src="/images/icon-support.gif" width="149" height="149"></li><li>全天候服务</li><li></li></ul></div>
</div>

<div id="world-map" class="de-dsc"><img src="/images/map.jpg" width="1000" height="625"></div>

<div id="notes2" class="notes2"><?= $model->summary ?></div>