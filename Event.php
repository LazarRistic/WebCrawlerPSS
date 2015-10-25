<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 10/23/2015
 * Time: 5:23 PM
 */

namespace root;


class Event
{
    private $id;
    private $name;
    private $date;
    private $town;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    function __toString()
    {
        return "Name: " . $this->getName() . " Date: " . $this->getDate() . " Town: " . $this->getTown();
    }


}