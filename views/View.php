<?php

class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file =  'views/view' .$action. '.php';
    }

    // GéNéERE ET AFFICHE LA VUE
    public function generate($data)
    {
        // PARTIE SPéCIFIQUE DE LA VUE
        $content = $this->generateFile($this->_file, $data);
        // TEMPLATE
        $view = $this->generateFile('views/template.php', array ('t' => $this->_t,'content' =>$content));

        echo $view;
    }

    // GéNéERE UN FICHIER VUE ET RENVOIE LE RESULTAT PRODUIT
    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);
            ob_start();
            //INCLUS LE FICHIER VUE
            require $file;
            return ob_get_clean();
        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }
}
