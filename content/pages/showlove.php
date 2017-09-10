<div class="container">
    <div class="pages">
        <h2>你想说的话</h2>
        <textarea id="say" placeholder="你想说的话" style="min-height: 120px;"></textarea>
        <h2>QQ（不匿名时用于显示头像）</h2>
        <input id="qq" placeholder="QQ" <?php if(isset($_COOKIE["qq"])){echo 'value="'.$_COOKIE["qq"].'"';} ?>>
        <h2>名称（不匿名时显示）</h2>
        <input id="name" placeholder="名称" <?php if(isset($_COOKIE["name"])){echo 'value="'.$_COOKIE["name"].'"';} ?>>
        <h2>性别</h2>
        <div class="radio">
        <input type="radio" name="sex" value="0" <?php if(isset($_COOKIE["sex"])&&$_COOKIE["sex"]=="0"){echo 'checked="checked"';} ?>><label>秀吉</label>
        <input type="radio" name="sex" value="1" <?php if(isset($_COOKIE["sex"])&&$_COOKIE["sex"]=="1"){echo 'checked="checked"';} ?>><label>汉纸</label>
        <input type="radio" name="sex" value="2" <?php if(isset($_COOKIE["sex"])&&$_COOKIE["sex"]=="2"){echo 'checked="checked"';} ?>><label>妹纸</label>
        </div>
        <h2>是否匿名</h2>
        <input id="n3" type="radio" name="ismous" value="1">
        <label for="n3">开启</label>
        <input id="n4" type="radio" name="ismous" value="0" checked="checked">
        <label for="n4">不开启</label>
        <button type="submit" onclick="save();">发布表白</button>
    </div>
</div>