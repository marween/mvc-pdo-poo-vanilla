<?php

class Lots
{
    private $_id;
    private $_title;
    private $_description;
    private $_start;
    private $_end;

    // constructeur
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    // HYDRATATION
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' . ucfirst ($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    //SETTEURS
    public function setId($id)
    {
        $id = (int) $id;
        if($id > 0)
            $this->_id = $id;

    }
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }
    }
    public function setDescription($description)
    {
        if (is_string($description)) {
            $this->_description = $description;
        }
    }

    public function setStart($start)
    {
        if (is_string($start)) {
            $this->_start = $start;
        }
    }

    public function setEnd($end)
    {
        if (is_string($end)) {
            $this->_end = $end;
        }
    }
    // GETTERS

    public function id()
    {
        $this->id = $id;
    }
    public function title()
    {
        return $this->_title;
    }
    public function description()
    {
        return $this->_description;
    }
    public function start()
    {
        return $this->_start;
    }
    public function end()
    {
        return $this->_end;
    }

}