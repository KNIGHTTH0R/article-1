<?php
    require_once('../front/connect.php');
    $id=intval($_GET['id']);
    $deletesql="delete from blog where id=$id";
    if(mysql_query($deletesql)){
        echo "<script>alert('删除文章成功');window.location.href='article.manage.php'</script>";
    }else{
        echo "<script>alert('删除文章失败');window.location.href='article.manage.php'</script>";
    }
?>
