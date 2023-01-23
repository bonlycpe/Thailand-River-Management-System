<?php class ConclutionController{
    public function conclution(){
        $conclutionList = Conclution::conclution() ;
        require_once('views/riverway/conclution.php') ;
    }
}
?>