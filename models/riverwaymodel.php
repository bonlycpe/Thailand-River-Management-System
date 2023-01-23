<?php 
class RiverWay{
    public $rwid;
    public $rid ;
    public $rname ;
    public $subdistrictId ;
    public $subdistrict_name ;
    public $startpoint;
    public $endpoint ;
    public $distance ;
    public $average_hight_embarkment ;

    public function __construct($rwid,$rid,$rname,$subdistrictId,$subdistrict_name,$startpoint,$endpoint,$distance,$average_hight_embarkment)
    {
        $this->rwid = $rwid;
        $this->rid = $rid;
        $this->rname = $rname;
        $this->subdistrictId = $subdistrictId;
        $this->subdistrict_name = $subdistrict_name;
        $this->startpoint = $startpoint;
        $this->endpoint = $endpoint;
        $this->distance = $distance;
        $this->average_hight_embarkment = $average_hight_embarkment;
    }

    public static function get($rwid)
    {
        require("connection_connect.php");
        $sql = "SELECT rwid,rid,rname ,subdistrictId,subdistrict.name,startpoint,endpoint,endpoint-startpoint as distance , AVG(embankment.Embankment_Height) as average_hight_embarkment FROM 
        riverway NATURAL JOIN subdistrict  NATURAL JOIN river NATURAL JOIN embankment where rwid = $rwid GROUP by rwid,subdistrict.subdistrictId ORDER by rid and startpoint;";

        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        
        $rwid = $my_row["rwid"];
        $rid = $my_row["rid"];
        $rname = $my_row["rname"];
        $subdistrictId = $my_row["subdistrictId"];
        $subdistrict_name = $my_row["name"];
        $startpoint = $my_row["startpoint"];
        $endpoint = $my_row["endpoint"];
        $distance = $my_row["distance"];
        $average_hight_embarkment = $my_row["average_hight_embarkment"];

        require("connection_close.php");

        return new RiverWay($rwid,$rid,$rname,$subdistrictId,$subdistrict_name,$startpoint,$endpoint,$distance,$average_hight_embarkment);
    }

    public static function getAll()
    {
        $riverwayList = [];
        require("connection_connect.php");
        $sql = "SELECT rwid,rid,rname ,subdistrictId,subdistrict.name,startpoint,endpoint,endpoint-startpoint as distance , AVG(embankment.Embankment_Height) as average_hight_embarkment FROM 
        riverway NATURAL JOIN subdistrict  NATURAL JOIN river NATURAL JOIN embankment GROUP by rwid,subdistrict.subdistrictId ORDER by rname,startpoint";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $rwid = $my_row["rwid"];
            $rid = $my_row["rid"];
            $rname = $my_row["rname"];
            $subdistrictId = $my_row["subdistrictId"];
            $subdistrict_name = $my_row["name"];
            $startpoint = $my_row["startpoint"];
            $endpoint = $my_row["endpoint"];
            $distance = $my_row["distance"];
            $average_hight_embarkment = $my_row["average_hight_embarkment"];
            $riverwayList[] = new RiverWay($rwid,$rid,$rname,$subdistrictId,$subdistrict_name,$startpoint,$endpoint,$distance,$average_hight_embarkment);
        }
        require("connection_close.php");
        return $riverwayList;
    }

    public static function search($key)
    {
        require("connection_connect.php");
        $riverwayList = [];
        $sql = "SELECT rwid,rid,rname ,subdistrictId,subdistrict.name,startpoint,endpoint,endpoint-startpoint as distance , AVG(embankment.Embankment_Height) as average_hight_embarkment FROM 
        riverway NATURAL JOIN subdistrict  NATURAL JOIN river NATURAL JOIN embankment where rname='$key' GROUP by rwid,subdistrict.subdistrictId  
        ORDER BY `riverway`.`startpoint` ASC ";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $rwid = $my_row["rwid"];
            $rid = $my_row["rid"];
            $rname = $my_row["rname"];
            $subdistrictId = $my_row["subdistrictId"];
            $subdistrict_name = $my_row["name"];
            $startpoint = $my_row["startpoint"];
            $endpoint = $my_row["endpoint"];
            $distance = $my_row["distance"];
            $average_hight_embarkment = $my_row["average_hight_embarkment"];
            $riverwayList[] = new RiverWay($rwid,$rid,$rname,$subdistrictId,$subdistrict_name,$startpoint,$endpoint,$distance,$average_hight_embarkment);
        }
        require("connection_close.php");

        return $riverwayList;
    }

    public static function add($rid,$subdistrictId,$startpoint,$endpoint)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `riverway` (`rwid`, `startpoint`, `endpoint`, `subdistrictId`, `rid`) VALUES (NULL, $startpoint, $endpoint, $subdistrictId, '$rid')";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "add success";
    }

    public static function update($rwid,$rid,$subdistrictId,$startpoint,$endpoint)
    {
        require("connection_connect.php");
        $sql = "update riverway SET rid = '$rid' , subdistrictId = $subdistrictId, startpoint = $startpoint , endpoint = '$endpoint' where rwid = '$rwid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "update success";
    }

    public static function delete($rwid)
    {
        require("connection_connect.php");
        $sql = "delete from riverway where rwid = '$rwid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "delete success";
    }

}

?>