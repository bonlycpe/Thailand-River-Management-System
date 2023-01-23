<?php class NearByCommunityController{
    public function index(){
        $nearbycommunity_list = NearByCommunity::getAll() ;
        require_once('views/nearbycommunity/index_nearbycommunity.php') ;
    }

    public function search()
    {
        $key = $_GET['key'];
        $nearbycommunity_list = NearByCommunity::search($key);
        if($nearbycommunity_list!=NULL)
        require_once('views/nearbycommunity/index_nearbycommunity.php') ;
        else
        {
            echo "<h2 style='color:#E81E1E;'>ไม่พบข้อมูล</h2>";
            NearByCommunityController::index();
            require_once('views/nearbycommunity/index_nearbycommunity.php') ;
        }
    }

    public function addform()
    {
        $communityList = community::getAll();
        $river_list = River::getAll(FALSE);
        require_once("views/nearbycommunity/addnearbycommunity.php");
    }

    public function addnearbycommunity()
    {
        $lengthto_river = $_GET["lengthto_river"];
        $communityid = $_GET["communityid"];
        $rid = $_GET["rid"];
        NearByCommunity::add(NULL,$lengthto_river,$communityid,$rid);
        NearByCommunityController::index();
    }

    public function updateform(){
        $nbcid = $_GET["nbcid"];
        $nearbycommunity = NearByCommunity::get($nbcid);
        $communityList = community::getAll();
        $river_list = River::getAll(FALSE);
        require_once("views/nearbycommunity/updateform.php");
    }

    public function update(){
        $nbcid = $_GET["nbcid"];
        $rid = $_GET["rid"];
        $communityid = $_GET["communityid"];
        $lengthto_river = $_GET["lengthto_river"];
        NearByCommunity::update($nbcid,$lengthto_river,$communityid,$rid);
        NearByCommunityController::index();
    }

    public function deleteconfirm()
    {
        $nbcid = $_GET["nbcid"];
        $nearbycommunity = NearByCommunity::get($nbcid);
        require_once("views/nearbycommunity/deleteform.php");
    }

    public function delete()
    {
        $nbcid = $_GET["nbcid"];
        NearByCommunity::delete($nbcid);
        NearByCommunityController::index();
    }


 }
 ?>