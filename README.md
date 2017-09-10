## 伪静态

#### Apache

    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^mous/page/(.*)$ /index.php?mous=&page=$1
    RewriteRule ^mous/(.*)/page/(.*)$ /index.php?mous=$1&page=$2
    RewriteRule ^mous/(.*)$ /index.php?mous=$1&page=1
    </IfModule>

#### Nginx

	rewrite ^/mous/page/(.*)$ /index.php?mous=&page=$1;
	rewrite ^/mous/(.*)/page/(.*)$ /index.php?mous=$1&page=$2;
	rewrite ^/mous/(.*)$ /index.php?mous=$1&page=1;
