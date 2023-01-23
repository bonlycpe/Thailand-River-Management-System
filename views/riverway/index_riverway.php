

<form method="get" action="">
    <br>
    <input type="text" name="key">
    <input type="hidden" name="controller" value="riverway" class="inputx"/>
    <button type="submit" name="action" value="search" class="button-32">
    ค้นหา</button>
    <br>
    <br><a style="color:#000000;"> เพิ่มข้อมูลเส้นทางแม่น้ำ </a><a href=?controller=riverway&action=addform class="button-x">กดที่นี่</a><br>
    <table class="center">
        <tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>ตำบล</td>
            <td>เริ่มต้นกิโลเมตรที่</td>
            <td>สิ้นสุดกิโลเมตรที่</td>
            <td>ความสูงเฉลี่ยคันกั้นน้ำ (เมตร)</td>
            <td>ระยะทาง (กิโลเมตร)</td>
            <td>แก้ไขข้อมูล</td>
            <td>ลบข้อมูล</td>
        </tr>
        <?php
            foreach($riverway_list as $riverway)
            {
                $rdistance = round($riverway->distance,2);
                echo "<tr><td>$riverway->rname</td>
                <td>$riverway->subdistrict_name</td>
                <td>$riverway->startpoint</td>
                <td>$riverway->endpoint</td>
                <td>$riverway->average_hight_embarkment</td>
                <td>$rdistance</td>
                <td bgcolor='yellow'>
                    <a href=?controller=riverway&action=updateform&rwid=$riverway->rwid>แก้ไข</a>
                </td>
                <td bgcolor='orange'>
                    <a href=?controller=riverway&action=deleteconfirm&rwid=$riverway->rwid>ลบ</a>
                 </td>
                ";
                
            }
            echo"</table>";
        ?>
    
</form>