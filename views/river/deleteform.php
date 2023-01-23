<br><br>
<h2 style="color:#F72100;" >คุณแน่ใจรึไม่ที่จะลบแม่น้ำนี้ออกจากระบบ !</h2>
<table class="center">
<tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>เริ่มต้นที่ตำบล</td>
            <td>สิ้นสุดที่ตำบล</td>
            <td>ไหลลงสู่</td>
        </tr>
        <?php
                echo "<tr>
                <td>$river->rname</td>
                <td>$river->startsubdistrict_name</td>
                <td>$river->endsubdistrict_name</td>
                <td>$river->riverconnectionname</td>
                ";
            echo"</table>";
        ?>

<form method="get" action="">
    <input type="hidden" name="rid" value="<?php echo $river->rid;?>"/> 
    <input type="hidden" name="controller" value="river"/><br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="delete"class="button-32">ลบ</button>
</form>
