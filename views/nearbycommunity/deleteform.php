<br><br>
<h2 style="color:#F72100;" >คุณแน่ใจรึไม่ที่จะลบพื้นที่ย่อยต่อไปนี้ออกจากระบบ !</h2>
<table class="center">
<tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>ชุมชน</td>
            <td>ตำบล</td>
            <td>รูปแบบพื้นที่</td>
            <td>ระยะห่างจากแม่น้ำ (กิโลเมตร)</td>
        </tr>
        <?php
                echo "<tr>
                <td>$nearbycommunity->rname</td>
                <td>$nearbycommunity->communityname</td>
                <td>$nearbycommunity->subdistrict_name</td>
                <td>$nearbycommunity->type</td>
                <td>$nearbycommunity->lengthto_river</td>
                ";
            echo"</table>";
        ?>

<form method="get" action="">
    <input type="hidden" name="nbcid" value="<?php echo $nearbycommunity->nbcid;?>"/> 
    <input type="hidden" name="controller" value="nearbycommunity"/><br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="delete"class="button-32">ลบ</button>
</form>
