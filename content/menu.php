<div class="menu">
    <div class="container">
        <nav>
            <a href="/" <?php if(Mous == "" && Pages == ""){ echo 'class="active"';}?>>首页</a>
            <a href="/mous/0" <?php if(Mous == "0"){ echo 'class="active"';}?>>实名</a>
            <a href="/mous/1" <?php if(Mous == "1"){ echo 'class="active"';}?>>匿名</a>
            <a href="/pages/showlove" <?php if(Pages == "showlove"){ echo 'class="active"';}?>>表白</a>
        </nav>
    </div>
</div>