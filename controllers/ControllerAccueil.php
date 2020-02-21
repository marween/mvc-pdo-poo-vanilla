<?php

require_once ('views/View.php');

class ControllerAccueil
{
    private $_lotManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count((array) $url) > 1)
            throw new Exception('Page introuvable ');
        else
            $this->lots();
    }

    private function lots()
    {
         $this->_lotManager = new LotManager;
         $lots = $this->_lotManager->getLots();

         $this->_view = new View('Lot');
         $this->_view->generate(array('lots'=> $lots));
    }
}