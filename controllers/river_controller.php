<?php class RiverController{
    public function index(){
        $river_list = River::getAll(FALSE) ;
        require_once('views/river/index_river.php') ;
    }
     
    public function search()
    {
        $key = $_GET['key'];
        $river_list = River::search($key);
        if($river_list!=NULL)
        {    require_once('views/river/index_river.php'); 
        }
        else
        {
            echo "<h2 style='color:#E81E1E;'>ไม่พบข้อมูล</h2>";
            RiverController::index();
            require_once('views/river/index_river.php') ;
        }
    }

    public function addform()
    {
        $subdistrict_list = Subdistrict::getAll();
        $river_list = River::getAll(TRUE);
        require_once("views/river/addriver.php");
    }


    public function addriver()
    {
        $rname = $_GET["rname"];
        $startsubdistrict_id = $_GET["startsubdistrict_id"];
        $endsubdistrict_id = $_GET["endsubdistrict_id"];
        $riverconnectionid = $_GET["riverconnectionid"];
        $river_list = River::getAll(TRUE) ;
        foreach($river_list as $river)
            if($river->rname==$_GET["rname"]){ 
                $alert="<script>alert('แม่น้ำ $river->rname นั้นมีอยู่แล้วกรุณากรอกใหม่');</script>";
                echo $alert;
                RiverController::addform();
                return;
            }
        River::add(NULL,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid);
        RiverController::index();
        return;
    }

    public function updateform(){
        $rid = $_GET["rid"];
        $river = River::get($rid);
        $subdistrict_list = Subdistrict::getAll();
        $river_list = River::getAll(TRUE);
        require_once("views/river/updateform.php");
    }

    public function update(){
        $rid = $_GET["rid"];
        $rname = $_GET["rname"];
        $startsubdistrict_id = $_GET["startsubdistrict_id"];
        $endsubdistrict_id = $_GET["endsubdistrict_id"];
        $riverconnectionid = $_GET["riverconnectionid"];
        $river_list = River::getAll(TRUE) ;
        foreach($river_list as $river)
            if($river->rname==$_GET["rname"]&&$river->rname!=$_GET["beforername"]){ 
                $alert="<script>alert('ไม่สามารถอัพเดตได้เนื่องจากชื่อแม่น้ำ $river->rname นั้นมีอยู่แล้วกรุณากรอกใหม่');</script>";
                echo $alert;
                RiverController::updateform();
                return;
            }
        River::update($rid,$rname,$startsubdistrict_id,$endsubdistrict_id,$riverconnectionid);
        RiverController::index();
        return;
    }

    public function deleteconfirm()
    {
        $rid = $_GET["rid"];
        $river = River::get($rid);
        require_once("views/river/deleteform.php");
    }

    public function delete()
    {
        $rid = $_GET["rid"];
        River::delete($rid);
        RiverController::index();
    }
 }
 ?>