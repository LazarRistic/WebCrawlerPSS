<?php
/**
 * Created by PhpStorm.
 * User: Lazar
 * Date: 10/22/2015
 * Time: 8:18 AM
 */

namespace root;


class Dancer
{

    private $id;
    private $name;
    private $gender;
    private $link;
    private $danceClub;
    private $category;
    private $grade;
    private $partner;

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
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getDanceClub()
    {
        return $this->danceClub;
    }

    /**
     * @param mixed $danceClub
     */
    public function setDanceClub($danceClub)
    {
        $this->danceClub = $danceClub;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @param mixed $grade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;
    }

    /**
     * @return mixed
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * @param mixed $partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    function __toString()
    {
        return "Name: " . $this->getName() . " Gender: " . $this->getGender() . " Partner: " . $this->getPartner()->getName() . " Category: " .$this->getCategory() . " Grade: " . $this->getGrade();
    }


}