<br><br>
<h2 style="color:#F72100;" >คุณแน่ใจรึไม่ที่จะลบเส้นทางแม่น้ำนี้ออกจากระบบ !</h2>
<table class="center">
<tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>ตำบล</td>
            <td>เริ่มต้นกิโลเมตรที่</td>
            <td>สิ้นสุดกิโลเมตรที่</td>
            <td>ความสูงเฉลี่ยคันกั้นน้ำ (เมตร)</td>
            <td>ระยะทาง (กิโลเมตร)</td>
        </tr>
        <?php
                echo "<tr><td>$riverway->rname</td>
                <td>$riverway->subdistrict_name</td>
                <td>$riverway->startpoint</td>
                <td>$riverway->endpoint</td>
                <td>$riverway->average_hight_embarkment</td>
                <td>$riverway->distance</td>
                ";
            echo"</table>";
        ?>

<form method="get" action="">
    <input type="hidden" name="rwid" value="<?php echo $riverway->rwid;?>"/> 
    <input type="hidden" name="controller" value="riverway"/>
    <br><br>

    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="delete"class="button-32">ลบ</button>
</form>
