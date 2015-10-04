
<!DOCTYPE html>
<html>
  <head>
	<meta charset="UTF-8">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link href="/favicon.ico" rel="icon" type="image/x-icon" >
    <title>CodePaste</title>
    <style>
	  .container{max-width: 82%;}
      body{padding-top:70px;}
	  cn{font-family: "微软雅黑";}
	  .inputbox{max-width : 700px;}
	  .tips{padding-left : 15px;}
    </style>
	<link rel="stylesheet" href="http://wnjxyk.cn/support/Bootstrap/css/code-style.css" type="text/css" />
  </head>
  <body>
  <div class="container">
		<? 
			include("header.php"); 
			include("mysql.php");
		?>
		<div class="page-header">
			<h1>代码列表<small id="sml">  Recent code records</small></h1>
		</div>
		<table class="table table-striped">
			<thread>
				<tr>
				<th>ID(Edit)</th>
				<th>Title(View)</th>
				<th>Author</th>
				<th>Language</th>
				<th>Length</th>
				<th>Time</th>
				</tr>
		  	</thread>
			<tbody>
				<?php
					$sql_con = getSqlCon();
					
					$page=$_GET["Page"];
					if ($page==0) $page = 1;
					$pagePost = 15;
					
					$content_Num = getMulNum('codepaste');
					$contents = getMulLimit('codepaste',($page-1)*$pagePost,$pagePost);
					
					while ($row = mysql_fetch_array($contents)){
						echo "<tr><td><a href=\"./Edit.php?ID=".$row['id']."\" >".$row['id']."</a></td><td><cn><a href=\"./Code.php?ID=".$row['id']."\" >".$row['title']."</a></cn></td><td>".$row['author']."</td><td>".$row['language']."</td><td>".$row['length']." bytes</td><td>".$row['date']."</td></tr>";
					}
	
				?>
			</tbody>
		</table>

	<div align = "center">
	  <nav>
	  	  <ul class="pagination">
			
			
			<? 
				$pageNum = ceil($content_Num/$pagePost);
				if ($page<=1) 
					echo "<li class=\"disabled\"><a>&laquo;</a></li>"; 
				else 
					echo "<li><a href=\"List.php?Page=".($page-1)."\">&laquo;</a></li>";
				
				for ($i=1;$i<=$pageNum;$i++){
					if ($page==$i) echo "<li class=\"active\">"; else echo "<li>";
					echo "<a href=\"List.php?Page=".$i."\">".$i."</a></li>";
				}

				if ($page>=$pageNum) 
					echo "<li class=\"disabled\"><a>&raquo;</a></li>"; 
				else 
					echo "<li><a href=\"List.php?Page=".($page+1)."\">&raquo;</a></li>"
			?>
			
		  </ul>
	  </nav>
	</div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
  </html>