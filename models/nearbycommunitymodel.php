<?php 
class NearByCommunity{
    public $nbcid;
    public $lengthto_river;
    public $communityid ;
    public $rid ;
    public $type ;
    public $rname ;
    public $communityname ;
    public $subdistrict_id ;
    public $subdistrict_name ;

    public function __construct($nbcid,$lengthto_river,$communityid,$rid,$type,$rname,$communityname,$subdistrict_id,$subdistrict_name)
    {
        $this->nbcid = $nbcid;
        $this->lengthto_river = $lengthto_river;
        $this->communityid = $communityid;
        $this->rid = $rid;
        $this->type = $type;
        $this->rname = $rname;
        $this->communityname = $communityname;
        $this->subdistrict_id = $subdistrict_id;
        $this->subdistrict_name = $subdistrict_name;
    }

    public static function get($nbcid)
    {
        require("connection_connect.php");
        $sql = "SELECT nbcid , lengthto_river ,communityid, rid,type,rname, communityname,subdistrictId as subdistrict_id, subdistrict_name  FROM 
        ( SELECT nbcid , lengthto_river ,communityid, rid,type,rname, community.name as communityname,subdistrictId FROM 
        nearbycommunity NATURAL join community NATURAL JOIN river)as a 
        inner JOIN (SELECT subdistrictId as subID , name as subdistrict_name FROM subdistrict) as c on a.subdistrictId = c.subID where nbcid = $nbcid";

        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        
        $nbcid = $my_row["nbcid"];
        $lengthto_river = $my_row["lengthto_river"];
        $communityid = $my_row["communityid"];
        $rid = $my_row["rid"];
        $type = $my_row["type"];
        $rname = $my_row["rname"];
        $communityname = $my_row["communityname"];
        $subdistrict_id = $my_row["subdistrict_id"];
        $subdistrict_name = $my_row["subdistrict_name"];

        require("connection_close.php");

        return new NearByCommunity($nbcid,$lengthto_river,$communityid,$rid,$type,$rname,$communityname,$subdistrict_id,$subdistrict_name);
    }

    public static function getAll()
    {
        $nearbycommunityList = [];
        require("connection_connect.php");
        $sql = "SELECT nbcid , lengthto_river ,communityid, rid,type,rname, communityname,subdistrictId as subdistrict_id, subdistrict_name  FROM 
        ( SELECT nbcid , lengthto_river ,communityid, rid,type,rname, community.name as communityname,subdistrictId FROM 
        nearbycommunity NATURAL join community NATURAL JOIN river)as a 
        inner JOIN (SELECT subdistrictId as subID , name as subdistrict_name FROM subdistrict) as c on a.subdistrictId = c.subID";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $nbcid = $my_row["nbcid"];
            $lengthto_river = $my_row["lengthto_river"];
            $communityid = $my_row["communityid"];
            $rid = $my_row["rid"];
            $type = $my_row["type"];
            $rname = $my_row["rname"];
            $communityname = $my_row["communityname"];
            $subdistrict_id = $my_row["subdistrict_id"];
            $subdistrict_name = $my_row["subdistrict_name"];
            $nearbycommunityList[] = new NearByCommunity($nbcid,$lengthto_river,$communityid,$rid,$type,$rname,$communityname,$subdistrict_id,$subdistrict_name);
        }
        require("connection_close.php");
        return $nearbycommunityList;
    }

    public static function search($key)
    {
        require("connection_connect.php");
        $nearbycommunityList = [];
        $sql = "SELECT nbcid , lengthto_river ,communityid, rid,type,rname, communityname,subdistrictId as subdistrict_id, subdistrict_name  FROM 
        ( SELECT nbcid , lengthto_river ,communityid, rid,type,rname, community.name as communityname,subdistrictId FROM 
        nearbycommunity NATURAL join community NATURAL JOIN river)as a 
        inner JOIN (SELECT subdistrictId as subID , name as subdistrict_name FROM subdistrict) as c on a.subdistrictId = c.subID where rname = '$key'";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $nbcid = $my_row["nbcid"];
            $lengthto_river = $my_row["lengthto_river"];
            $communityid = $my_row["communityid"];
            $rid = $my_row["rid"];
            $type = $my_row["type"];
            $rname = $my_row["rname"];
            $communityname = $my_row["communityname"];
            $subdistrict_id = $my_row["subdistrict_id"];
            $subdistrict_name = $my_row["subdistrict_name"];
            $nearbycommunityList[] = new NearByCommunity($nbcid,$lengthto_river,$communityid,$rid,$type,$rname,$communityname,$subdistrict_id,$subdistrict_name);
        }
        require("connection_close.php");

        return $nearbycommunityList;
    }

    public static function add($nbcid,$lengthto_river,$communityid,$rid)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `nearbycommunity` (`nbcid`, `lengthto_river`, `communityid`, `rid`) VALUES (NULL, $lengthto_river, $communityid, $rid)";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "add success ";
    }

    public static function update($nbcid,$lengthto_river,$communityid,$rid)
    {
        require("connection_connect.php");
        $sql = "update nearbycommunity SET lengthto_river = '$lengthto_river' , communityid = $communityid, rid = $rid where nbcid = '$nbcid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "update success ";
    }

    public static function delete($nbcid)
    {
        require("connection_connect.php");
        $sql = "delete from nearbycommunity where nbcid = '$nbcid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "delete success ";
    }


}

?>