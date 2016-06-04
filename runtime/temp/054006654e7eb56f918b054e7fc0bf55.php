<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/data/web_data/tp_web/public/../application/admin/view/article/add.html";i:1465026083;}*/ ?>
<?php include(VIEW_PATH.CONTROLLER_NAME.'/header.html');?>

<p>添加文章</p>
<form method="post" action="/admin/article/modify_ajax">
    文章标题：<input type="text" name="title" value=""> <br/>
    作者：<input type="text" name="author" value=""> <br/>
    内容：
<textarea rows="3" cols="20" name="content">
在w3school，你可以找到你所需要的所有的网站建设教程。
</textarea>
    <input type="hidden" value="add" name ="type">
    <input type="submit" value="添加">
</form>

<?php include(VIEW_PATH.CONTROLLER_NAME.'/footer.html');?>

