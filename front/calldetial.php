<?php  
require_once('../article/front/connect.php'); 
$page=intval($_GET['p']);
//$sql = "select * from calldetail";  
//echo "<pre>";
//print_r($_SERVER);
$sql = "select * from calldetail LIMIT ".(($page-1)*10).",10";
    $query = mysql_query($sql);  
    if($query && mysql_num_rows($query)) {  
        while($row = mysql_fetch_assoc($query)) {  
            $data[] = $row;  
        }  
    } else {  
        $data = array();  
    }  
?>  
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>管理文章</title>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta name="description" content="文章发布系统——后台管理系统">  
    <meta name="author" content="DreamBoy">  
    <link rel="stylesheet" href="../../tpl/bootstrap/css/bootstrap.css">  
    <link rel="stylesheet" href="../css/blogStyle.css">  
</head>  
<body>  
    <div class="container">  
        <div class="page-header ex-page-header">  
            <h1 class="title">文章发布系统<small>  ——后台管理系统</small></h1>  
        </div>  
  
        <div class="body-container">  
            <div class="row">  
                    <div class="col-md-2">  
                        <div class="panel panel-default">  
                            <div class="panel-heading">  
                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>  
                            </div>  
                              
                                <div class="list-group">  
                                    <a href="../article/admin/article.add.php" class="list-group-item">发布文章</a>  
                                    <a href="../article/admin/article.manage.php" class="list-group-item">管理文章</a>  
                                    <a href="calldetial.php" class="list-group-item active">通话详单</a>
                                </div>  
                        </div>  
                    </div>  
  
                    <div class="col-md-10">  
                        <div class="panel panel-default">  
                            <div class="panel-heading">  
                                <h4>个人通话详单列表</h4>  
                            </div>  
  
                            <div class="panel-body">  
                                <table class="table table-hover">  
                                    <tr>  
                                        <th>编号</th>  
                                        <th>开始时间</th>  
                                        <th>通话类型</th>
                                        <th>对方号码</th>
                                        <th>本机号码</th>
                                        <th>呼叫地</th>
                                        <th>对方呼叫地</th> 
                                        <th>话费</th> 
                                    </tr>  
  
                                    <tbody>  
                                        <?php  
                                            if(!empty($data)) {  
                                                foreach ($data as $value) {  
                                        ?>  
                                                    <tr>  
                                                        <td><?php echo $value['cd_id'];?></td>  
                                                        <td><?php echo $value['callstartime'];?></td> 
                                                        <td><?php echo $value['calltype'];?></td>
                                                        <td><?php echo $value['sidenumber'];?></td>
                                                        <td><?php echo $value['selfnumber'];?></td>
                                                        <td><?php echo $value['callarea'];?></td>
                                                        <td><?php echo $value['sidearea'];?></td>
                                                        <td><?php echo $value['subtotal'];?></td>
                                                    </tr>  
                                        <?php  
                                                }  
                                            }  
                                        ?>  
                                    </tbody>  
                                </table>  
                            </div>  
                        </div> 
                        <nav aria-label="Page navigation">
                          <ul class="pagination">
                          <li>
                            <a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."' aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                              <a href=".$_SERVER['PHP_SELF'].'?p='.($page+1)." aria-label="Next">
                                <span aria-hidden="true">&laquo;</span>
                                </a> 
                            </li>
                          </ul>
                          </nav> 
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
  
    <footer class="copyright">  
        Copyright &copyright; 1995-2016, DreamBoy.NET, All Rights Reserved  
    </footer> 
    <script src="https://code/jquery.com/jquery-1.12.4.js"></script>
    <script src="../tpl/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function(){
            $('#example').DataTable();
});
    </script> 
</body>  
</html>  
