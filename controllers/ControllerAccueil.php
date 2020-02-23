<?php

require_once ('views/View.php');


class ControllerAccueil
{
    private $_lotManager;
    private $_gamerManager;
    private $_form;
    private $_view;

    public function __construct()
    {
        if(isset($url) && count((array) $url) > 2)
            throw new Exception('Page introuvable ');
    }

    public function index()
    {
        $this->_lotManager = new LotManager();
         $lots = $this->_lotManager->getLots();

         $this->_view = new View('Lot');
         $this->_view->generate(array('lots'=> $lots));
    }

    public function participation()
    {
        $this->_gamerManager = new GamerManager();
        $game = $this->_gamerManager->getInsert();

        $this->_view = new View('Lot');
        $this->_view->generate(array('game'=> $game));
    }
}