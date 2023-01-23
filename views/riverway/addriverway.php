
<form method="get" action="">
    <br>
    <label>แม่น้ำ<select name="rid">
         <?php foreach($river_list as $river)
            {
                echo"<option value = $river->rid >
                    $river->rname</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ผ่านตำบล<select name="subdistrictId">
        <?php foreach($subdistrict_list as $sub)
            {
                echo"<option value = $sub->subdistrictId>
                    $sub->name</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>เริ่มต้นกิโลเมตรที่ <input type="number" min="0" max="1000" step="0.1" name="startpoint"/></label>
    <br><br><br>
    <label>สิ้นสุดกิโลเมตรที่ <input type="number" min="0" max="1000" step="0.1" name="endpoint"/></label><br>
    <br>
    <input type="hidden" name="controller" value="riverway"/>
    <br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="addriverway"class="button-32">บันทึก</button>
</form>