<?php
	
	function getSqlCon($db_host="localhost",$db_user=MYSQL_USERNAME,$db_pwd=MYSQL_PASSWORD,$db_database=MYSQL_DATABASE){
        $con = mysql_connect($db_host,$db_user,$db_pwd);
		if (!$con) die('Could not connect: ' . mysql_error());
		$con=mysql_select_db($db_database) or die('Could not select: '. mysql_error());
		mysql_query("set character set 'utf8'");
		mysql_query("set names 'utf8'");
		return $con;
	}
	
	/*
	function getSqlCon($db_host="localhost",$db_user="root",$db_pwd="root",$db_database="sql_wnjxykapp"){
        $con = mysql_connect($db_host,$db_user,$db_pwd);
		if (!$con) die('Could not connect: ' . mysql_error());
		$con=mysql_select_db($db_database) or die('Could not select: '. mysql_error());
		mysql_query("set character set 'utf8'");
		mysql_query("set names 'utf8'");
		return $con;
	}*/
	
	//获得单个位置信息
	function getSingleVal($db_sheet,$KeyName,$KeyVal,$ValName){
		//$sql = 'SELECT `'.$ValName.'` FROM `'.$db_sheet.'` WHERE `'.$KeyName.'`=\''.$KeyVal.\'';
		$sql = "SELECT `$ValName` FROM `$db_sheet` WHERE `$KeyName`=\"$KeyVal\"";
		$result = mysql_query($sql) or die('Could not select: '. mysql_error());
		if(mysql_num_rows($result))
		{
			$rs = mysql_fetch_array($result);
			return $rs[0];
		} else {  
			mysql_error(); 
		}    
	}
	
	//更新数据表
	function updateSingleVal($con,$db_sheet,$KeyName,$KeyVal,$ValName,$ValVal){
		$sql = "UPDATE `$db_sheet` SET `$ValName`=\"$ValVal\" WHERE `$KeyName`=\"$KeyVal\"";
		$result = mysql_query($sql) or die('Could not Update: '. mysql_error());
	}
	
	//获得数据表大小
	function getMulNum($db_sheet){
		$sql = "SELECT count(*) FROM `$db_sheet` WHERE 1";
		$result = mysql_query($sql) or die('Could not select: '. mysql_error());
		if(mysql_num_rows($result))
		{
			$rs = mysql_fetch_array($result);
			return $rs[0];
		} else {  
			mysql_error(); 
		}    
	}
	
	//获得单行数据表
	function getRowWithInt($db_sheet,$KeyName,$KeyVal){
		$sql = "SELECT * FROM `$db_sheet` WHERE `$KeyName` = $KeyVal";
		$result = mysql_query($sql) or die('Could not select: '. mysql_error());
		return $result;
	}
	
	//获得数据表
	function getMulLimit($db_sheet,$ST,$Siz){
		$sql = "SELECT * FROM `$db_sheet` WHERE 1 LIMIT $ST, $Siz";
		$result = mysql_query($sql) or die('Could not select: '. mysql_error());
		return $result;
	}
	
	//执行
	function runSql($sql){
		mysql_query($sql) or die('Could not Solve: '. mysql_error());
	}
?>