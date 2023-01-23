
<form method="get" action="">
    <br>
    <input type="text" name="key">
    <input type="hidden" name="controller" value="nearbycommunity"/>
    <button type="submit" name="action" value="search" class="button-32">
    ค้นหา</button>
    <br><br> เพิ่มข้อมูลพื้นที่ย่อยใกล้แม่น้ำ <a href=?controller=nearbycommunity&action=addform>กดที่นี่</a><br>
    <table class="center">
        <tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>ชุมชน</td>
            <td>ตำบล</td>
            <td>รูปแบบพื้นที่</td>
            <td>ระยะห่างจากแม่น้ำ (กิโลเมตร)</td>
            <td>แก้ไขข้อมูล</td>
            <td>ลบข้อมูล</td>
        </tr>
        <?php
            foreach($nearbycommunity_list as $nearbycommunity)
            {
                echo "<tr>
                <td>$nearbycommunity->rname</td>
                <td>$nearbycommunity->communityname</td>
                <td>$nearbycommunity->subdistrict_name</td>
                <td>$nearbycommunity->type</td>
                <td>$nearbycommunity->lengthto_river</td>
                <td bgcolor='yellow'>
                    <a href=?controller=nearbycommunity&action=updateform&nbcid=$nearbycommunity->nbcid>แก้ไข</a>
                </td>
                <td bgcolor='orange'>
                    <a href=?controller=nearbycommunity&action=deleteconfirm&nbcid=$nearbycommunity->nbcid>ลบ</a>
                 </td>
                ";
                
            }
            echo"</table>";
        ?>
    
</form>

