<br>
<br>
<form method="get" action="">
    <label>ชุมชน<select name="communityid">
        <?php foreach($communityList as $community)
            {
                echo"<option value = $community->communityId>
                    $community->name</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ใกล้กับแม่น้ำ<select name="rid">
         <?php foreach($river_list as $river)
            {
                echo"<option value = $river->rid >
                    $river->rname</option>";
            }
        ?>
    </select><label><br>
    <br><br>
    <label>ที่ระยะห่าง <input type="number" min="0.1" max="9999" step="0.1" name="lengthto_river"/></label><br>
    <br><br>
    <input type="hidden" name="controller" value="nearbycommunity"/>
    <br><br>
    <button type="submit" name="action" value="index"class="button-32">ย้อนกลับ</button>
    <button type="submit" name="action" value="addnearbycommunity"class="button-32">บันทึก</button>
</form>