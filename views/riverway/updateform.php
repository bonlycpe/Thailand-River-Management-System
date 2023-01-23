<br><br>
<form method="get" action ="">
    <label>แม่น้ำ<select name="rid">
         <?php foreach($river_list as $ri)
            {
                echo"<option value= $ri->rid";
                if($ri->rid==$riverway->rid){
                    echo " SELECTED='selected'";}
                echo "> $ri->rname </option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ผ่านตำบล<select name="subdistrictId">
        <?php 
        {
            foreach($subdistrict_list as $sub)
            {
                echo"<option value= $sub->subdistrictId";
                if($sub->subdistrictId==$riverway->subdistrictId){
                    echo " SELECTED='selected'";}
                echo "> $sub->name </option>";
            }
        }?>
    </select></label><br>
    <br><br>
    <label>เริ่มต้นกิโลเมตรที่ <input type="number" min="0" max="1000" step="0.1"  name="startpoint"
        value="<?php echo $riverway->startpoint;?>"/> </label><br>
    <br><br>
    <label>สิ้นสุดกิโลเมตรที่ <input type="number" min="0" max="1000" step="0.1"  name="endpoint"
        value="<?php echo $riverway->endpoint;?>"/> </label><br>
    <input type="hidden" name="rwid" value="<?php echo $riverway->rwid;?>"/> 
    <input type="hidden" name="controller" value="riverway"/>

    <br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="update"class="button-32">บันทึก</button>
</form>
        