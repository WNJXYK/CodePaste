

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
		<? include("header.php"); ?>
		
		<div align="center"><div class="jumbotron" style="width:688px;">
		  <h1>CodePaste</h1>
		  <hr />
		    <script>
			  function jump()
			  {
				  window.location="./Code.php?ID=" + document.getElementById("pid").value;
			  }
			  function send()
			  {
				window.location="./Edit.php";
			  }
			  function hall()
			  {
			    window.location="./List.php";
			  }
			</script>
			<div class="input-group enter">
			  <input type="text" class="form-control" id="pid" name="id" placeholder="输入编号查看代码" onkeydown='if(event.keyCode==13){jump();}' autofocus></input>
			  <span class="input-group-btn">
			    <button class="btn btn-default" id="etbtn" onClick="jump();">Enter</button>
		      </span>
			</div>
			<br />
			<p>
			  <button class="btn btn-lg btn-info" onClick="send();" style="width:30%;"><cn>  贴代码  </cn></button>
			  <button class="btn btn-lg btn-info" onClick="hall();" style="width:30%;"><cn>最近的代码</cn></button>
			</p>
		</div></div>
	</div>
    <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </body>
 <html>