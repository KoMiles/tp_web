<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"/data/web_data/tp_web/public/../application/admin/view/article/list.html";i:1465026085;}*/ ?>
<?php include(VIEW_PATH.CONTROLLER_NAME.'/header.html');?>
<?php echo VIEW_PATH;?>
<p>文章列表</p>
<table stype="border-collapse:collapse;" border="1px" bordercolor="#666666" cellspacing="0px" width="960px" height="800px" >
    <tr><td>编号</td><td>作者</td><td>标题</td><td>内容</td><td>状态</td><td>创建时间</td><td>操作</td></tr>
    <?php foreach($article_list as $row) {?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['author'];?></td>
        <td><a href="/article/detail/id/<?php echo $row['id']?>"><?php echo $row['title'];?></a></td>
        <td><?php echo $row['content'];?></td>
        <td><?php echo $row['statusCn'];?></td>
        <td><?php echo $row['date'];?></td>
        <td><a href="/admin/article/view/op/edit/id/<?php echo $row['id']?>/">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/admin/article/view/op/delete/id/<?php echo $row['id']?>">删除</a></td>
    </tr>
    <?php }?>
</table>
<?php echo $page_string;?>
<br>
<?php include(VIEW_PATH.CONTROLLER_NAME.'/footer.html');?>
