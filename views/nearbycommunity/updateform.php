<br><br>
<form method="get" action ="">
    <label>แม่น้ำ<select name="rid">
         <?php foreach($river_list as $ri)
            {
                echo"<option value= $ri->rid";
                if($ri->rid==$nearbycommunity->rid){
                    echo " SELECTED='selected'";}
                echo "> $ri->rname </option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ชุมชน<select name="communityid">
        <?php 
            {
                foreach($communityList as $community)
                {
                    echo"<option value= $community->communityId";
                    if($community->communityId==$nearbycommunity->communityid){
                        echo " SELECTED='selected'";}
                    echo "> $community->name </option>";
                }
            }?>
    </select><label><br>
    <br><br>
    <label>ที่ระยะห่าง <input type="number" min="0.1" max="9999" step="0.1" name="lengthto_river"
        value="<?php echo $nearbycommunity->lengthto_river;?>"/> </label><br> 
    <input type="hidden" name="nbcid" value="<?php echo $nearbycommunity->nbcid;?>"/> 
    <input type="hidden" name="controller" value="nearbycommunity"/>
    <br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="update"class="button-32">บันทึก</button>
</form>
        