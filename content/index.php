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
            <?php get_require_content("content"); ?>
        </div>
        <div id="footer">
            <?php do_html_footer(); ?>
        </div>
    </body>

</html>