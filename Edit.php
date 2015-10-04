
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
	<link rel="stylesheet" href="./Bootstrap/css/code-style.css" type="text/css" />
  </head>
  <body>
  <div class="container">
		<? 
			include("header.php");
			include("mysql.php");
		?>
		
		<?
			$sql_con = getSqlCon();
			$id=$_GET['ID'];
			$row = null;
			if ($id>0) {
				$result = getRowWithInt('codepaste','id',$id);
				if (mysql_num_rows($result)<=0) die("<h1>没有找到需要编辑的代码！</h1>");
				$row=mysql_fetch_array($result);
				$recov_change = array('&double_quoteee'=>'"','&single_quoteee'=>'\'');
				$code = strtr($row['code'],$recov_change);
			}
		?>
		<div class="page-header">
			<h1>Paste<small id="sml"> <cn>上传您的代码/文本</cn></small></h1>
		</div>
		<form id="mainForm" method="post" action="Post.php">
		
		<p><div class="input-group  inputbox">
			<span class="input-group-addon">ID</span>
			<input id="id" class="form-control" name="id" placeholder="ID发布后分配" maxlength="20" <? if ($id>0) echo 'value='.$row['id']; ?> readonly>
		</div>
		<p class="tips bg-success inputbox"><cn>代码ID</cn></p></p>
		
		<p><div class="input-group  inputbox">
			<span class="input-group-addon">Title</span>
			<input id="author" class="form-control" name="title" placeholder="Example Code" maxlength="20" <? if ($id>0) echo 'value='.$row['title']; ?> required="required">
		</div>
		<p class="tips bg-success inputbox"><cn>标题/备注</cn></p></p>
		
		<p><div class="input-group  inputbox">
			<span class="input-group-addon">Poster</span>
			<input id="author" class="form-control" name="author" placeholder="Your name" maxlength="10" <? if ($id>0) echo 'value='.$row['author']; ?> required="required" autofocus>
		</div>
		<p class="tips bg-success inputbox"><cn>填写您的署名</cn></p></p>
		
		<p><div class="input-group  inputbox">
			<span class="input-group-addon">Password</span>
			<input id="password" class="form-control" name="password" placeholder="Your Password" maxlength="20" required="required">
		</div>
		<p class="tips bg-success inputbox"><cn>用于修改/删除的密码</cn></p></p>
		
		<input id="langu" name="langu" style="display:none;"></input>
		<input id="langz" name="langv" style="display:none;" value="<? if ($id>0) echo $row['language']; else echo "Plain Text"; ?>"></input>
		<p><div style="display:inline-block;">选择语言</div>
		<div class="btn-group" style="display:inline-block;">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				<div style="display:inline-block;" id="chosen"><? if ($id>0) echo $row['language']; else echo "Plain Text"; ?></div> <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#" onClick="chosen.innerHTML='Plain Text'; langz.value='Plain Text'; langu.value='';">文本(不使用高亮)</a></li>
				<li class="divider"></li>
				<li><a href="#" onClick="chosen.innerHTML='C/C++'; langz.value='C/C++'; langu.value='prettyprint lang-cpp' ">C/C++</a></li>
				<li><a href="#" onClick="chosen.innerHTML='C#'; langz.value='C#'; langu.value='prettyprint lang-cs'">C#</a></li>
				<li><a href="#" onClick="chosen.innerHTML='Java'; langz.value='Java'; langu.value='prettyprint lang-java';">Java</a></li>
				<li><a href="#" onClick="chosen.innerHTML='Pascal'; langz.value='Pascal'; langu.value='prettyprint';">Pascal</a></li>
				<li><a href="#" onClick="chosen.innerHTML='Python'; langz.value='Python'; langu.value='prettyprint lang-py'">Python</a></li>
				<li><a href="#" onClick="chosen.innerHTML='HTML'; langz.value='HTML'; langu.value='prettyprint lang-html'">HTML</a></li>
				<li><a href="#" onClick="chosen.innerHTML='CSS'; langz.value='CSS'; langu.value='prettyprint lang-css'">CSS</a></li>
				<li><a href="#" onClick="chosen.innerHTML='PHP'; langz.value='PHP'; langu.value='prettyprint lang-php'">PHP</a></li>
				<li><a href="#" onClick="chosen.innerHTML='JavaScript'; langz.value='JavaScript'; langu.value='prettyprint lang-js'">JavaScript</a></li>
			</ul>
		</div>
		
		</p>
		<p>
		<textarea class="form-control" rows="10" name="code" id="codearea" placeholder="paste your code or text here"><? if ($id>0) echo $code; ?></textarea></p>
		<p><select class="form-control" name="delete">
			<option>New/Edit</option>
			<option>Delete</option></select></p>
		<button type="button submit" class="btn btn-success btn-lg">Paste!</button>
		<button type="button reset" class="btn btn-warning btn-lg" onClick="clearit();">Reset</button>
		</form>
	</div>
	<script>
	function clearit(){
		document.getElementById("codearea").value = "";
		document.getElementById("author").value = "";
	}
  </script>
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
  </html>
  