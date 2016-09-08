<?php
	header("Content-type:text/html;charset=utf-8");
	//判断网站是否已经安装
	if(file_exists("../install.lock")){
		die('网站已经安装过!');
	}
	
	$DB_HOST=$_POST['host'];
    $DB_NAME=$_POST['name'];
    $DB_USER=$_POST['user'];
    $DB_PWD=$_POST['password'];
    $DB_PREFIX='think_';
	$is_data='on';
	$yzdbname=$_POST['yzdbname'];
    //$DB_HOST='127.0.0.1';
    //$DB_NAME='thinkv';
    //$DB_USER="root";
    //$DB_PWD="root";
	$conn = mysql_connect($DB_HOST,$DB_USER,$DB_PWD) or die("连接数据库失败");
	  
	//设置字符集
	mysql_set_charset('utf8');
	
	if($yzdbname==1){
		//判断数据库是否存在
		if(mysql_query("use {$DB_NAME}",$conn)){
			echo 1;
			exit;
		}
		if(!(mysql_query("use {$DB_NAME}",$conn))){
			echo 0;
			exit;
		}
	}
	//删除已存在数据库
	mysql_query("drop database if exists {$DB_NAME}");
		
	//创建数据库
	if(!(mysql_query("create database {$DB_NAME}"))){
		die("数据库创建失败!");
	}
	//选择数据库
	mysql_query("use {$DB_NAME}",$conn);
		
	//读取数据库的sql文件(表结构)
	$sql=get_sql('thinkv.sql');//----->.sql文件名(可以更改)
	
	//替换表前缀
	$sql=str_replace('think_',$DB_PREFIX,$sql);
		
	//建表	-- 可以在此加入表前缀的处理
	$sql_array=explode(";",trim($sql));
	foreach($sql_array as $v){
		if(strlen(trim($v))==0){
			continue;
		}
		//提取表名,用于提示
		if(preg_match("/create\s+table\s+(.*?)[\s\(]+/is",$v,$arr)){
			//创建表
			if(!mysql_query(trim($v),$conn)){
					die("创建表".$arr[1]."失败!");
			}
		}
	}
	
	//增加管理员帐号
	//$adminuser='admin';
	//$adminpwd='admin';
	//$adminquery = "INSERT INTO `{$DB_PREFIX}admin` VALUES (1, '$adminuser', '".md5($adminpwd)."','','','0','0','1465047263','127.0.0.1');";
	//mysql_query($adminquery,$conn);
	
	//添加测试数据，先判断用户是否愿意添加
	//将以insert开头的SQL语句，用正则匹配出来，执行
	if($is_data=='on'){
		//提取测试数据
		$sql1=get_sql('thinkv.sql');
		if(preg_match("/^(insert\s+into\s+)(.*?);$/is",$sql1,$arr)){
			unset($sql_array);
			$sql_array=$arr;
		}
		//$sql_array=file('thinkv.sql');

		foreach($sql_array as $v){
			$v=trim($v);
			if(strlen($v)==0){
				continue;
			}
			//跳过不是插入数据的sql语句
			if(stripos($v,'INSERT INTO')===false){
				continue;
			}
			if((stripos($v,'think_admin')) || (stripos($v,'think_sysconfig'))){

				//替换表前缀
				$v=preg_replace("/INSERT INTO `think_(.*?)` VALUES/is","INSERT INTO `{$DB_PREFIX}\\1` VALUES",$v);

				//跳过创建管理员表中原有的信息
				//if(stripos($v,'think_admin')){continue;}
			
				if(mysql_query($v,$conn)==false){
					die('导入数据失败!');
				}
			}
		}
	}
	
	//更新配置文件
    $str="<?php \n return array( \n //'配置项'=>'配置值' \n 'DEFAULT_MODULE' => 'Ue',  \n /* 数据库设置 */ \n 'DB_TYPE' => 'mysql', // 数据库类型 \n 'DB_HOST' => '".$DB_HOST."', // 服务器地址 \n 'DB_NAME' => '".$DB_NAME."', // 数据库名 \n 'DB_USER' => '".$DB_USER."', // 用户名 \n 'DB_PWD' => '".$DB_PWD."', // 密码 \n 'DB_PORT' => '3306', // 端口 \n 'DB_PREFIX' => '".$DB_PREFIX."', // 数据库表前缀 \n );";
    $filelink=__FILE__;
    $myfile = fopen(dirname(dirname($filelink))."/Application/Common/Conf/config.php", "w") or die("文件不存在或者没有权限");
    fwrite($myfile, $str);
    fclose($myfile);
	
	//生成安装锁文件，其位置(用于前台的检测)。。。
	file_put_contents("../install.lock","安装时间：".date("Y-m-d H:i:s")."<br>版本号:ThinkV Alpha 0.98");
	
	//关闭数据库连接
	mysql_close($conn);
	
	echo '安装成功!';
	
function get_sql($file){
	$sql=file_get_contents($file);
	$arr=array("/#.*/","/--.*/","/\/\*.*?\*\//s");
	$sql=preg_replace($arr,'',$sql);
	return $sql;
}

function ReWriteConfigAuto()
{
    global $dsql;
    $configfile = DEDEDATA.'/config.cache.inc.php';
    if(!is_writeable($configfile))
    {
        echo "配置文件'{$configfile}'不支持写入，无法修改系统配置参数！";
        //ClearAllLink();
        exit();
    }
    $fp = fopen($configfile,'w');
    flock($fp,3);
    fwrite($fp,"<"."?php\r\n");
    $dsql->SetQuery("Select `varname`,`type`,`value`,`groupid` From `#@__sysconfig` order by aid asc ");
    $dsql->Execute();
    while($row = $dsql->GetArray())
    {
        if($row['type']=='number') fwrite($fp,"\${$row['varname']} = ".$row['value'].";\r\n");
        else fwrite($fp,"\${$row['varname']} = '".str_replace("'",'',$row['value'])."';\r\n");
    }
    fwrite($fp,"?".">");
    fclose($fp);
}

?>