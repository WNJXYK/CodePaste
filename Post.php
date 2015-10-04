<meta charset="utf-8">
<?
	function getRandChar($length){
   		$str = null;
   		$strPol = "0123456789abcdefghijklmnopqrstuvwxyz";
   		$max = strlen($strPol)-1;
   		for($i=0;$i<$length;$i++)
    		$str.=$strPol[rand(0,$max)];
   		return $str;
  	}

	include("mysql.php");
	
	$id=$_POST['id'];
	$title=$_POST["title"];
	$author=$_POST["author"];
	$langv=$_POST["langv"];
	$code=$_POST["code"];
	$password=$_POST['password'];
	$delete=$_POST['delete'];
	$length = strlen($code);
	
	$table_change = array('"'=>'&double_quoteee','\''=>'&single_quoteee');
	$code = strtr($code,$table_change);
	//die($code);
	if ($length<=30) die("<h1>代码过短！需要大于30B</h1>");	
	
	
	if ($id<=0){
		$sql_con = getSqlCon();
		$sql = "INSERT INTO `codepaste`(`title`, `code`, `language`, `author`, `password`, `length`) VALUES (\"$title\",\"$code\",\"$langv\",\"$author\",\"$password\",$length)";
		runSql($sql);
		header("Location: List.php"); 
	}else{
		$sql_con = getSqlCon();
		if (getSingleVal('codepaste','id',$id,'password')!=$password && $password!='CodePaste_Root') die ("<h1>Access Denied！(Wrong Password)</h1>");
		if ($delete != "Delete"){
			$sql = 'UPDATE `codepaste` SET `title`="'.$title.'",`code`="'.$code.'",`language`="'.$langv.'",`author`="'.$author.'",`length`='.$length.' WHERE `id` = '.$id;
			runSql($sql);
			header("Location: Code.php?ID=".$id); 
		}else{
			$sql = "DELETE FROM `codepaste` WHERE `id` = $id";
			runSql($sql);
			header("Location: index.php"); 
		}
	}
?>