<?php class RiverWayController{
    public function conclution(){
        $conclutionList = Conclution::getAll() ;
        require_once('views/riverway/conclution.php') ;
    }

    public function index(){
        $riverway_list = RiverWay::getAll() ;
        require_once('views/riverway/index_riverway.php') ;
    }
     
    public function search()
    {
        $key = $_GET['key'];
        $riverway_list = RiverWay::search($key);
        if($riverway_list!=NULL)
            require_once('views/riverway/index_riverway.php') ;
        else
        {
            echo "<h2 style='color:#E81E1E;'>ไม่พบข้อมูล</h2>";
            RiverWayController::index();
            require_once('views/riverway/index_riverway.php') ;
        }
    }

    public function addform()
    {
        $subdistrict_list = Subdistrict::getAll();
        $river_list = River::getAll(FALSE);
        require_once("views/riverway/addriverway.php");
    }

    public function addriverway()
    {
        $rid = $_GET["rid"];
        $subdistrictId = $_GET["subdistrictId"];
        $startpoint = $_GET["startpoint"];
        $endpoint = $_GET["endpoint"];
        
        if(floatval($endpoint)-floatval($startpoint)<=0){
            $alert="<script>alert('ระยะทางไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง');</script>";
            echo $alert;
            RiverWayController::addform();
        }
        else{
            RiverWay::add($rid,$subdistrictId,$startpoint,$endpoint);
            RiverWayController::index();
        }
    }

    public function updateform(){
        $rwid = $_GET["rwid"];
        $riverway = RiverWay::get($rwid);
        $subdistrict_list = Subdistrict::getAll();
        $river_list = River::getAll(FALSE);
        require_once("views/riverway/updateform.php");
    }

    public function update(){
        $rwid = $_GET["rwid"];
        $rid = $_GET["rid"];
        $subdistrictId = $_GET["subdistrictId"];
        $startpoint = $_GET["startpoint"];
        $endpoint = $_GET["endpoint"];

        if(floatval($endpoint)-floatval($startpoint)<=0){
            $alert="<script>alert('ระยะทางไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง');</script>";
            echo $alert;
            RiverWayController::updateform();
        }
        else{
            RiverWay::update($rwid,$rid,$subdistrictId,$startpoint,$endpoint);
            RiverWayController::index();
        }
    }

    public function deleteconfirm()
    {
        $rwid = $_GET["rwid"];
        $riverway = RiverWay::get($rwid);
        require_once("views/riverway/deleteform.php");
    }

    public function delete()
    {
        $rwid = $_GET["rwid"];
        RiverWay::delete($rwid);
        RiverWayController::index();
    }
 }
 ?>