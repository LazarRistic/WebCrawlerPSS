<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 10/23/2015
 * Time: 5:21 PM
 */

namespace root;


class DanceType
{
    private $id;
    private $type;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    function __toString()
    {
        return " Type: " . $this->getType();
    }


}