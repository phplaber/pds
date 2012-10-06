<?php

/*
 *	 文件概要：MySQL数据库连接类
 *	 文件名称：mysql.class.php
 *	 创建作者：phplaber
 *	 创建时间：2011-9-4
 *   修改时间：2011-10-1
 */

class MysqlConnect 
{
	private $server;                #服务器名
	private $user;                  #数据库用户名
	private $password;              #数据库密码
	private $database;              #数据库名
	private $linktag;               #MYSQL连接标识符
	private $charset = "utf8";      #数据库编码,默认为UTF8

	/* 
	 * 方法:__construct
	 * 功能:构造函数
	 * 参数:$server,$user,$password,$database,$charset
	 * 返回值: 
	 * 说明:实例化时自动连接数据库
	 */
	public function __construct($server, $user, $password, $database, $charset) 
	{
		$this->server = $server;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->charset = $charset;
		$this->connect();
	}

	/* 
	 * 方法:connect
	 * 功能:连接数据库
	 * 参数:无
	 * 返回值:
	 * 说明:连接MYSQL服务器,连接数据库,设置字符编码
	 */
	public function connect() 
	{
		$this->linktag = mysql_connect($this->server, $this->user, $this->password) or die('数据库服务器连接出错!'.mysql_error());
		mysql_select_db($this->database, $this->linktag) or die('数据库连接出错!'.mysql_error());
		mysql_query("set names '$this->charset'");
	}
	
	/* 
	 * 方法:query
	 * 功能:执行SQL语句
	 * 参数:$sql
	 * 返回值:bool或数组
	 * 说明:对传过来的SQL语句执行,并返回结果$result资源标识符
	 */
	public function query($sql) 
	{
		$result = mysql_query($sql, $this->linktag);
		if (!$result) 
		{
			echo $sql . '语句执行失败!';
			return false;
		} 
		else 
		{
			return $result;
		}
	}
	
	/* 
	 * 方法:fetcharray
	 * 功能:从结果集中取一行做为数组
	 * 参数:$result资源标识符
	 * 说明:需要提供SQL语句执行返回的资源标识符
	 */
	public function fetchArray($result) 
	{
		return mysql_fetch_array($result, MYSQL_ASSOC);
	}
	
	/* 
	 * 方法:numrows
	 * 功能:统计结果集中记录数
	 * 参数:$result资源标识符
	 * 说明:统计行数
	 */
	public function getNumbers($result) 
	{
		return mysql_num_rows($result);
	}
	
	/*
	 * 方法:numfields
	 * 功能:统计结果集中字段数
	 * 参数:$result资源标识符
	 * 说明:统计字段数
	 */
	public function getFields($result)
	{
		return mysql_num_fields($result);
	}

	/*
	 * 方法:close
	 * 功能:关闭连接
	 * 参数:无
	 * 返回值:
	 * 说明:关闭非永久数据库连接
	 */
	public function close()
	{
		mysql_close($this->linktag);
	}
	
}

?>