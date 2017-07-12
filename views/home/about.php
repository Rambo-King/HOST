
<div id="main-about" class="main-about">
    <div id="description" class="description"><?= $model->note ?></div>
</div>

<div id="list-main" class="list-main">
    <table class="list-table" width="60%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody><tr>
            <td valign="middle" height="50" align="left">选择后路哥的理由：</td>
        </tr>
        <tr>
            <td style="padding:50px; line-height:35px;" valign="middle" height="auto" bgcolor="#FFFFFF" align="left">
                <?= $model->content ?>
            </td>
        </tr>
        </tbody></table>

</div>