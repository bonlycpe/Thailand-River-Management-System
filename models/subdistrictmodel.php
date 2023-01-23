<?php 
class Subdistrict{
    public $subdistrictId ;
    public $name;
    public $districtId  ;

    public function __construct($subdistrictId,$name,$districtId)
    {
        $this->subdistrictId = $subdistrictId;
        $this->name = $name;
        $this->districtId = $districtId;
    }

    public static function getAll()
    {
        $subdistrictList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM subdistrict";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $subdistrictId = $my_row["subdistrictId"];
            $name = $my_row["name"];
            $districtId = $my_row["districtId"];
            $subdistrictList[] = new Subdistrict($subdistrictId,$name,$districtId);
        }
        require("connection_close.php");
        return $subdistrictList;
    }

}

?>