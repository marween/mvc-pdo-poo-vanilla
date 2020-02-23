<?php


class Form
{
    private $_data;

    public function __construct($_data = array())
    {
        $this->_data = $_data;
    }


    public function input ($name)
    {
        return '<p><input type="text" name="' .$name. '"></p> <br>';
    }

    public function submit()
    {
        return '<button type="submit"> Envoyer </button>  ';

    }

    public function email($email)
    {
        return '<p><input type="email" name="' .$email. '"></p> <br>';
    }

}