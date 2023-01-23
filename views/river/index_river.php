
<form method="get" action="">
    <br>
    <input type="text" name="key">
    <input type="hidden" name="controller" value="river"/>
    <button type="submit" name="action" value="search" class="button-32">
    ค้นหา</button>

    <br><br> เพิ่มข้อมูลแม่น้ำ <a href=?controller=river&action=addform>กดที่นี่</a><br>
    <table class="center">
    <tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>เริ่มต้นที่ตำบล</td>
            <td>สิ้นสุดที่ตำบล</td>
            <td>ไหลลงสู่</td>
            <td>แก้ไขข้อมูล</td>
            <td>ลบข้อมูล</td>
        </tr>
        <?php
            foreach($river_list as $river)
            {
                echo "<tr>
                <td>$river->rname</td>
                <td>$river->startsubdistrict_name</td>
                <td>$river->endsubdistrict_name</td>
                <td>$river->riverconnectionname</td>
                <td bgcolor='yellow'>
                    <a href=?controller=river&action=updateform&rid=$river->rid>แก้ไข</a>
                </td>
                <td bgcolor='orange'>
                    <a href=?controller=river&action=deleteconfirm&rid=$river->rid>ลบ</a>
                 </td>
                ";
                
            }
            echo"</table>";
        ?>
    
</form>
