<?php 
class Conclution{
    public $rname ;
    public $subdistrictCount ;   
    public $avgdistance ;

    public function __construct($rname,$subdistrictCount,$avgdistance)
    {
        $this->rname = $rname;
        $this->subdistrictCount = $subdistrictCount;
        $this->avgdistance = $avgdistance;
    }

    public static function getAll()
    {
        $conclutionList = [];
        require("connection_connect.php");
        $sql = "SELECT rname ,count(subdistrictId) as subdistrictCount,AVG(endpoint-startpoint) as averageDistance FROM 
        riverway NATURAL JOIN subdistrict  NATURAL JOIN river NATURAL JOIN embankment GROUP by rname";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $rname = $my_row["rname"];
            $subdistrictCount = $my_row["subdistrictCount"];
            $avgdistance = $my_row["averageDistance"];
    
            $conclutionList[] = new Conclution($rname,$subdistrictCount,$avgdistance);
        }
        require("connection_close.php");
        return $conclutionList;
    }



}

?>