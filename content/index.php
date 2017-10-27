<!DOCTYPE html>
<html>
    <?php get_require_function("content-function"); ?>
    <head>
        <?php do_html_head(""); ?>
        <?php echo get_static_css ("i"); ?>
    </head>
    <body>
        <div id="header">
            <?php get_require_content("header"); ?>
            <?php get_require_content("menu"); ?>
        </div>
        <div id="content">
            <?php 
            if(Pages==""){
                get_require_content("content");
            }else{
                get_require_content("pages/".Pages);
            }
            ?>
            <!-- 请不要更改此处内容 -->
            <?php do_html_footer(); ?>
            <!-- 请不要更改此处内容 -->
        </div>
        <div id="footer">
            <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
            <?php echo get_static_js ("i"); ?>
        </div>
    </body>

</html>