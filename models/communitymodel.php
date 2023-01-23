<?php
class community{
    public $communityId;
    public $size;
    public $latitude;
    public $type;
    public $longitude;
    public $subdistrictId;
    public $name;
public function __construct($communityId,$size,$latitude,$longitude,$type,$subdistrictId,$name)
{
    $this->communityId=$communityId;
    $this->size=$size;
    $this->latitude=$latitude;
    $this->longitude=$longitude;
    $this->type=$type;
    $this->subdistrictId=$subdistrictId;
    $this->name=$name;
}
public static function get($id)
{
    require("connection_connect.php");
    $sql="select * from community where communityId=$id";
    $result=$conn->query($sql);
    $my_row=$result->fetch_assoc();
    $communityId=$my_row["communityId"];
    $size=$my_row["size"];
    $latitude=$my_row["latitude"];
    $longitude=$my_row["longitude"];
    $type=$my_row["type"];
    $subdistrictId=$my_row["subdistrictId"];
    $name=$my_row["name"];
    require("connection_close.php");
    
    return new community($communityId,$size,$latitude,$longitude,$type,$subdistrictId,$name);
}
public static function getAll()
{
    $communityList = [];
    require("connection_connect.php");
    $sql="select * from community as c Order by c.communityId ASC";
    $result=$conn->query($sql);
    while($my_row=$result->fetch_assoc())
    {
        $communityId=$my_row["communityId"];
        $size=$my_row["size"];
        $latitude=$my_row["latitude"];
        $longitude=$my_row["longitude"];
        $type=$my_row["type"];
        $subdistrictId=$my_row["subdistrictId"];
        $name=$my_row["name"];
        $communityList[]=new community($communityId,$size,$latitude,$longitude,$type,$subdistrictId,$name);
    }
    require("connection_close.php");
    return $communityList;
}
public static function search($key)
{
    $communityList = [];
    require("connection_connect.php");
    $sql="select * from community where name like '%$key%'";
    $result=$conn->query($sql);
    while($my_row=$result->fetch_assoc())
    {
        $communityId=$my_row["communityId"];
        $size=$my_row["size"];
        $latitude=$my_row["latitude"];
        $longitude=$my_row["longitude"];
        $type=$my_row["type"];
        $subdistrictId=$my_row["subdistrictId"];
        $name=$my_row["name"];
        $communityList[]=new community($communityId,$size,$latitude,$longitude,$type,$subdistrictId,$name);
    }
    require("connection_close.php");
    return $communityList;
}
public static function add($size,$latitude,$longitude,$type,$subdistrictId,$name)
{
    require("connection_connect.php");
    $sql="insert into community(size,latitude,longitude,type,subdistrictId,name) values ('$size','$latitude','$longitude','$type','$subdistrictId','$name')";
    $result=$conn->query($sql);
    require("connection_close.php");
    return "add success";
}
public static function update($communityId,$size,$latitude,$longitude,$type,$subdistrictId,$name)
{
    require("connection_connect.php");
    $sql="update community SET size='$size',latitude='$latitude',longitude='$longitude',type='$type',subdistrictId='$subdistrictId',name='$name' WHERE communityId='$communityId'";
    $result=$conn->query($sql);
    require("connection_close.php");
    return "update success";
}
public static function delete($id)
{
    require_once("connection_connect.php");
    $sql="Delete from community WHERE communityId='$id'";
    $result=$conn->query($sql);
    require("connection_close.php");
    return "delete success ";
}
}?>