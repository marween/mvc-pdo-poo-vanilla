<?php


class Gamers
{
    private $_id;
    private $_firstname;
    private $_lastname;
    private $_email;

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
    // SETTERS
    public function setId($id)
    {
        $id = (int) $id;
        if($id > 0)
            $this->_id = $id;
    }

    public function setFirstname($firstname)
    {
        if (is_string($firstname)) {
            $this->_firstname = $firstname;
        }
    }

    public function setLastname($lastname)
    {
        if (is_string($lastname)) {
            $this->_lastname = $lastname;
        }
    }

    public function setEmail($email)
    {
        if (is_string($email)) {
            $this->_email = $email;
        }
    }

    //GETTERS
    public function Id()
    {
        return $this->_id;
    }
    public function Firstname()
    {
        return $this->_firstname;
    }
    public function Lastname()
    {
        return $this->_lastname;
    }
    public function Email()
    {
        return $this->_email;
    }
}