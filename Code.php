
<!DOCTYPE html>
<html>
  <head>
	  
	<meta charset="UTF-8">
	<link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<link href="./favicon.ico" rel="icon" type="image/x-icon" >
    <title>CodePaste</title>
    <style>
	  .container{max-width: 82%;}
      body{padding-top:70px;}
	  cn{font-family: "微软雅黑";}
	  .inputbox{max-width : 700px;}
	  .tips{padding-left : 15px;}
    </style>
	<link rel="stylesheet" href="./Bootstrap/css/code-style.css" type="text/css" />
	<script type="text/javascript" src="scripts/shCore.js"></script>
	<script type="text/javascript" src="scripts/shBrushCpp.js"></script>
	<script type="text/javascript" src="scripts/shBrushCSharp.js"></script>
	<script type="text/javascript" src="scripts/shBrushJava.js"></script>
	<script type="text/javascript" src="scripts/shBrushPlain.js"></script>
	<script type="text/javascript" src="scripts/shBrushPython.js"></script>
	<script type="text/javascript" src="scripts/shBrushPhp.js"></script>
	<script type="text/javascript" src="scripts/shBrushXml.js"></script>
	<script type="text/javascript" src="scripts/shBrushCss.js"></script>
	<link type="text/css" rel="stylesheet" href="styles/shCoreMidnight.css"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
  </head>
  <body>
  <div class="container">
	  <? 
		include("header.php"); 
		include("mysql.php");
	  ?>
	  <?
		$sql_con = getSqlCon();
	  	$id = $_GET["ID"];
		$result = getRowWithInt('codepaste','id',$id);
		
		if (mysql_num_rows($result)>0){
			$row=mysql_fetch_array($result);
			echo "<div class=\"page-header\"><h1>Code<small id=\"sml\"> <cn>".$row['title']."</cn>  -  posted by ".$row['author']." , ".$row['date']."</small></h1></div>";
			echo "<span class=\"label label-default\">".$row['length']." bytes</span> <span class=\"label label-default\">".$row['language']."</span>";
			echo "<pre class=\"brush: ";
			if ($row['language']=="C/C++") echo "cpp";
			if ($row['language']=="C#") echo "csharp";
			if ($row['language']=="Java") echo "java";
			if ($row['language']=="Pascal") echo "plain";
			if ($row['language']=="Python") echo "py";
			if ($row['language']=="HTML") echo "xml";
			if ($row['language']=="CSS") echo "css";
			if ($row['language']=="PHP") echo "php";
			if ($row['language']=="JavaScript") echo "js";
			if ($row['language']=="Plain Text") echo "plain";
			echo ";\">";
			$recov_change = array('&double_quoteee'=>'"','&single_quoteee'=>'\'');
			$code = strtr($row['code'],$recov_change);
			$table_change = array('&'=>'&amp;','<'=>'&lt;','>'=>'&gt;');
			echo strtr($code,$table_change);
			echo "</pre>";
		}else{
			echo "<h1>没有找到代码！</h1>";
		}
	  ?>
  <div class="ds-thread" data-thread-key="<? echo "CodePaste_".$PID; ?>" data-title="<? echo $info[1]."の".$info[0] ?>" data-url="<? echo "http://wnjxyk.cn/tech/CodePaste/Code.php?PID=".$PID; ?>"></div>
  </div>
  <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
	<script type="text/javascript">
	var duoshuoQuery = {short_name:"wnjxyk"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		 || document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
	<!-- 多说公共JS代码 end -->	
  <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
  <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
  </html>