<?php 
class River{
    public $rid;
    public $rname;
    public $startsubdistrict_id ;
    public $startsubdistrict_name ;
    public $endsubdistrict_id ;
    public $endsubdistrict_name ;
    public $riverconnectionid ;
    public $riverconnectionname ;

    public function __construct($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid,$startsubdistrict_name,$endsubdistrict_name,$riverconnectionname)
    {
        $this->rid = $rid;
        $this->rname = $rname;
        $this->startsubdistrict_id = $startsubdistrict_id;
        $this->endsubdistrict_id = $endsubdistrict_id;
        $this->riverconnectionid = $riverconnectionid;
        $this->startsubdistrict_name = $startsubdistrict_name;
        $this->endsubdistrict_name = $endsubdistrict_name;
        $this->riverconnectionname = $riverconnectionname;
    }

    public static function get($rid)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM 
        ( select rid,rname,river.startsubdistrict_id,subdistrict.name as startsubdistrict_name from river natural join subdistrict where river.startsubdistrict_id = subdistrict.subdistrictId)as a 
        natural JOIN
        ( 
        SELECT rid,rname,endsubdistrict_id, endsubdistrict_name , riverconnectionid ,riverconnectname FROM 
        ((select rid,rname,river.endsubdistrict_id,subdistrict.name as endsubdistrict_name , riverconnectionid from river natural join subdistrict  where river.endsubdistrict_id = subdistrict.subdistrictId 
        )as c 
        inner JOIN
        (SELECT rid as rd,rname as riverconnectname from river ) as d on c.riverconnectionid = d.rd
        ))as b where rid = '$rid'";

        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        
        $rname = $my_row["rname"];
        $startsubdistrict_id = $my_row["startsubdistrict_id"];
        $endsubdistrict_id = $my_row["endsubdistrict_id"];
        $riverconnectionid = $my_row["riverconnectionid"];
        $startsubdistrict_name = $my_row["startsubdistrict_name"];
        $endsubdistrict_name = $my_row["endsubdistrict_name"];
        $riverconnectionname = $my_row["riverconnectname"];

        require("connection_close.php");

        return new River($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid,$startsubdistrict_name,$endsubdistrict_name,$riverconnectionname);
    }

    public static function getAll($sea)
    {
        $riverList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM 
        ( select rid,rname,river.startsubdistrict_id,subdistrict.name as startsubdistrict_name from river natural join subdistrict where river.startsubdistrict_id = subdistrict.subdistrictId)as a 
        natural JOIN
        ( 
        SELECT rid,rname,endsubdistrict_id, endsubdistrict_name , riverconnectionid ,riverconnectname FROM 
        ((select rid,rname,river.endsubdistrict_id,subdistrict.name as endsubdistrict_name , riverconnectionid from river natural join subdistrict  where river.endsubdistrict_id = subdistrict.subdistrictId 
        )as c 
        inner JOIN
        (SELECT rid as rd,rname as riverconnectname from river ) as d on c.riverconnectionid = d.rd
        ))as b";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $rid = $my_row["rid"];
            $rname = $my_row["rname"];
            $startsubdistrict_id = $my_row["startsubdistrict_id"];
            $endsubdistrict_id = $my_row["endsubdistrict_id"];
            $riverconnectionid = $my_row["riverconnectionid"];
            $startsubdistrict_name = $my_row["startsubdistrict_name"];
            $endsubdistrict_name = $my_row["endsubdistrict_name"];
            $riverconnectionname = $my_row["riverconnectname"];
            $riverList[] = new River($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid,$startsubdistrict_name,$endsubdistrict_name,$riverconnectionname);
        }
        if($sea)
        {
            $riverList[] = new River("1","ทะเล",NULL,NULL,NULL,NULL,NULL,NULL);
        }
        require("connection_close.php");
        return $riverList;
    }

    public static function search($key)
    {
        require("connection_connect.php");
        $riverList = [];
        $sql = "SELECT * FROM( select rid,rname,river.startsubdistrict_id,subdistrict.name as startsubdistrict_name from river natural join subdistrict where river.startsubdistrict_id = subdistrict.subdistrictId)as a 
        natural JOIN( SELECT rid,rname,endsubdistrict_id, endsubdistrict_name , riverconnectionid ,riverconnectname FROM ((select rid,rname,river.endsubdistrict_id,subdistrict.name as endsubdistrict_name , riverconnectionid from river 
        natural join subdistrict  where river.endsubdistrict_id = subdistrict.subdistrictId)as c inner JOIN(SELECT rid as rd,rname as riverconnectname from river ) as d on c.riverconnectionid = d.rd))as b 
        where rname = '$key'";
        $result = $conn->query($sql);
        while($my_row=$result->fetch_assoc())
        {
            $rid = $my_row["rid"];
            $rname = $my_row["rname"];
            $startsubdistrict_id = $my_row["startsubdistrict_id"];
            $endsubdistrict_id = $my_row["endsubdistrict_id"];
            $riverconnectionid = $my_row["riverconnectionid"];
            $startsubdistrict_name = $my_row["startsubdistrict_name"];
            $endsubdistrict_name = $my_row["endsubdistrict_name"];
            $riverconnectionname = $my_row["riverconnectname"];
            $riverList[] = new River($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid,$startsubdistrict_name,$endsubdistrict_name,$riverconnectionname);
        }
        require("connection_close.php");

        return $riverList;
    }

    public static function add($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `river` (`rid`, `rname`, `startsubdistrict_id`, `endsubdistrict_id`, `riverconnectionid`) VALUES 
        (NULL, '$rname', '$startsubdistrict_id', '$endsubdistrict_id', '$riverconnectionid')";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "add success";
    }

    public static function update($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid)
    {
        require("connection_connect.php");
        $sql = "update river SET rname = '$rname' , startsubdistrict_id = $startsubdistrict_id, endsubdistrict_id = $endsubdistrict_id , riverconnectionid = '$riverconnectionid' where rid = '$rid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "update success";
    }

    public static function delete($rid)
    {
        require("connection_connect.php");
        $sql = "delete from river where rid = '$rid'";
        $result = $conn->query($sql);
        require("connection_close.php");

        return "delete success";
    }

}

?>