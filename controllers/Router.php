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

            //LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEIR
            if (isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'],
                    FILTER_SANTIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "controller" .$controller;
                $controllerFile  = "controllers/".$controllerClass. ".php";

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->_ctr = new $controllerClass($url);
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

