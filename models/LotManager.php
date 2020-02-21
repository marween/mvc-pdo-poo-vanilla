<?php

class LotManager extends Model
{
    public function getLots()
    {
        return $this->getAll('lots','Lots');
    }

}