## 伪静态

#### Apache

	<IfModule mod_rewrite.c>
	RewriteEngine On
	RewriteBase /
	RewriteRule ^mous/page/(.*)$ /index.php?mous=&page=$1
	RewriteRule ^mous/(.*)/page/(.*)$ /index.php?mous=$1&page=$2
	RewriteRule ^mous/(.*)$ /index.php?mous=$1&page=1
	RewriteRule ^pages/(.*)$ /index.php?pages=$1
	</IfModule>

#### Nginx

	rewrite ^/mous/page/(.*)$ /index.php?mous=&page=$1;
	rewrite ^/mous/(.*)/page/(.*)$ /index.php?mous=$1&page=$2;
	rewrite ^/mous/(.*)$ /index.php?mous=$1&page=1;
	rewrite ^/pages/(.*)$ /index.php?pages=$1;

## 数据库说明

#### 导入数据库

先将根目录内的 options.sql 和 contents.sql 导入数据库

#### 连接数据库
在 /require/function.php 第三行 更改为自己的数据库信息

	'mysql'=>'localhost',	//数据库地址
	'name'=>'root',		//数据库登录名
	'password'=>'',		//数据库密码
	'dbname'=>'lovewall'	//数据库名
