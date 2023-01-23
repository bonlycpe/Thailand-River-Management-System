<br><br>
<form method="get" action ="">
    <label>ชื่อแม่น้ำ <input type="text" name="rname"
        value="<?php echo $river->rname;?>"/> </label><br>
    <br><br>
    <label>เริ่มต้นที่ตำบล<select name="startsubdistrict_id">
        <?php 
        {
            foreach($subdistrict_list as $sub)
            {
                echo"<option value= $sub->subdistrictId";
                if($sub->subdistrictId==$river->startsubdistrict_id){
                    echo " SELECTED='selected'";}
                echo "> $sub->name </option>";
            }
            
        }?>
        </select></label><br>

        <br><br>

    <label>สิ้นสุดที่ตำบล<select name="endsubdistrict_id">
        <?php 
        {
            foreach($subdistrict_list as $sub)
            {
                echo"<option value= $sub->subdistrictId";
                if($sub->subdistrictId==$river->endsubdistrict_id){
                    echo " SELECTED='selected'";}
                echo "> $sub->name </option>";
            }
        }?>
    </select></label><br>
    <br><br>
    <label>ไหลลงสู่<select name="riverconnectionid">
        <?php 
        {
            foreach($river_list as $ri)
            {
                echo"<option value= $ri->rid";
                if($ri->rid==$river->riverconnectionid){
                    echo " SELECTED='selected'";}
                echo "> $ri->rname </option>";
            }
        }?>
    </select><label><br>
    <br><br>
    <input type="hidden" name="rid" value="<?php echo $river->rid;?>"/> 
    <input type="hidden" name="beforername" value="<?php echo $river->rname;?>"/> 
    <input type="hidden" name="controller" value="river"/>
    <br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="update"class="button-32">บันทึก</button>
</form>
        