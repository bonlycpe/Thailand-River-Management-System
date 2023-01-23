<?php
$controllers = array('pages'=>['home','error'],
                    'river'=>['index','search','addform','addriver','updateform','update','deleteconfirm','delete'],
                    'riverway'=>['conclution','index','search','addform','addriverway','updateform','update','deleteconfirm','delete'],
                    'nearbycommunity'=>['index','search','addform','addnearbycommunity','updateform','update','deleteconfirm','delete'],
                );
function call($controller, $action){
    require_once("controllers/".$controller."_controller.php");
    switch($controller)
    {
        case "pages": $controller = new PagesController();
                      break;
                      
        case "river" :  require_once("models/rivermodel.php") ;
                        require_once("models/subdistrictmodel.php") ;
                        $controller = new RiverController() ;
                        break;

        case "riverway" :   require_once("models/rivermodel.php") ;
                            require_once("models/riverwaymodel.php") ;
                            require_once("models/subdistrictmodel.php") ;
                            require_once("models/conclutionmodel.php") ;
                            $controller = new RiverWayController() ;
                            break;

        case "nearbycommunity" :    require_once("models/rivermodel.php") ;
                                    require_once("models/riverwaymodel.php") ;
                                    require_once("models/subdistrictmodel.php") ;
                                    require_once("models/nearbycommunitymodel.php") ;
                                    require_once("models/communitymodel.php") ;
                                    $controller = new NearByCommunityController() ;
                                    break;
    }
    $controller->{$action}();
}

if(array_key_exists($controller,$controllers))
{
    if(in_array($action,$controllers[$controller]))
    {
        call($controller,$action);
    }
    else
    {
        call('pages','error');
    }
}
else
{
    call('pages','errors');
}


?>