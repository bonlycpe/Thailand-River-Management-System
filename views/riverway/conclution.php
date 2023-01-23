<h1>สรุปข้อมูลแม่น้ำในประเทศไทย</h1>

<form method="get" action="">
    <br>
    <table class="center">
        <tr style="color: #fff; background: purple ;font-size: 18;">
            <td>ชื่อแม่น้ำ</td>
            <td>จำนวนตำบลที่ไหลผ่าน</td>
            <td>ระยะทางเฉลี่ย ( กิโลเมตร )</td>
        </tr>
        <?php
            foreach($conclutionList as $conclution)
            {
                $avgdistance = round($conclution->avgdistance,2);
                echo "<tr><td>$conclution->rname</td>
                <td>$conclution->subdistrictCount</td>
                <td>$avgdistance</td>
                ";
                
            }
            echo"</table>";
        ?>
    
</form>

