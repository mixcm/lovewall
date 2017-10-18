<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" id="container">
      <div class="row">
        <table class="table table-hover">
          <tr>
            <th>id</th>
            <th>单身狗</th>
            <th>单身狗的咆哮</th>
            <th>单身狗的qq</th>
            <th>单身狗的狗粮</th>
          </tr>
<?php
      include 'page.php';
      @$allNum = allNews();
      @$pageSize = 15; //约定没页显示几条信息
      @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
      @$endPage = ceil($allNum/$pageSize); //总页数
      @$array = news($pageNum,$pageSize);
      foreach($array as $key=>$values){
 ?>
         <tr>
            <td class="success"><?php echo $values->id; ?></td>
            <td class="warning"><?php echo $values->name;?></td>
            <td class="danger"><?php echo $values->text; ?></td>
            <td class="info"><?php echo $values->qq; ?></td>
            <td class="info"><?php echo date('Y-m-d',$values->date); ?></td>
            <td><button type="button" data="<?php echo $values->id; ?>" class="btn btn-danger">删除</button></td>
          </tr>
<?php } ?>
        </table>

<?php

?>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-offset-4">
          <ul class="pagination">
            <li><a href="?pageNum=1">首页</a></li>
            <li><a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a></li>
            <li><a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a></li>
            <li><a href="?pageNum=<?php echo $endPage?>">尾页</a></li>
          </ul>
        </div> 
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
      $(function(){
        $("button").click(function(){
          var self = $(this).parent().parent();
          var id = $(this).attr('data');
            $.post("delete.php", 
              { id: id } ,
              function(data){
                if(data.err != 0){
                  self.remove();
                }else{
                  alert('删除失败');
                }
            },'json');
        });
      });
    </script>
  </body>
</html>