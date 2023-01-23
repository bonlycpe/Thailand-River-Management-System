<br><br>
<form method="get" action="">
    <label>ชื่อแม่น้ำ <input type="text" name="rname"/></label><br>
    <br><br>
    <label>เริ่มต้นที่ตำบล<select name="startsubdistrict_id">
        <?php foreach($subdistrict_list as $sub)
            {
                echo"<option value = $sub->subdistrictId>
                    $sub->name</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>สิ้นสุดที่ตำบล<select name="endsubdistrict_id">
         <?php foreach($subdistrict_list as $sub)
            {
                echo"<option value = $sub->subdistrictId>
                    $sub->name</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ไหลลงสู่<select name="riverconnectionid">
         <?php foreach($river_list as $river)
            {
                echo"<option value = $river->rid >
                    $river->rname</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <input type="hidden" name="controller" value="river"/>
    <br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="addriver"class="button-32">บันทึก</button>
</form>