<?php
require_once ('views/View.php');
class Router
{
    private $_ctrl;
    private $_vieuw;

    public function routeReq()
    {
        try {
            // CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function ($class) {
                require_once('models/' . $class . '.php');
            });
            $url = '';
            $action = '';
            //LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEIR
            if (isset($_GET['url'])) {
                //$url = explode('/', ($_GET['url']));
                $url = $_GET['url'];

                $url = ucfirst(strtolower($url));
                $pos = strpos($url, '/');
                $controller = substr($url,0,$pos);
                $action = substr(($url), $pos+1);

                $controllerClass = "controller" .$controller;
                $controllerFile  = "controllers/".$controllerClass. ".php";

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                    $this->_ctrl->$action();
                }
                else
                    throw new Exception ('page introuvable');
            }
            else{
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAccueil($url);
            }
        }
            // GESTION DES ERREUR
        catch (Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_vieuw = new View('Error');
            $this->_vieuw->generate(array('errorMsg' =>$errorMsg));
        }
    }

}