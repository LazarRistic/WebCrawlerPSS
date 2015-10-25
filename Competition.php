<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 10/22/2015
 * Time: 8:02 PM
 */

namespace root;


class Competition
{

    private $id;
    private $name;
    private $event;

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
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param mixed $event
     */
    public function setEvent($event)
    {
        $this->event = $event;
    }

    function __toString()
    {
        return "Name: " . $this->getName() . " Event: " . $this->getEvent()->getName() . " Date: " . $this->getEvent()->getDate() . " Location: " . $this->getEvent()->getTown();
    }


}