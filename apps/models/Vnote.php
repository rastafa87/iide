<?php
namespace Modules\Models;

class Vnote extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $image;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $permalink;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    protected $summary;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $content;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $visits;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_public;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $last_name;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $photo;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    protected $cargo;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $second_name;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $subcategoryname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $cgid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $name_category;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $color;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $clase;

    /**
     * Method to set the value of field pid
     *
     * @param integer $pid
     * @return $this
     */
    public function setPid($pid)
    {
        $this->pid = $pid;

        return $this;
    }

    /**
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field permalink
     *
     * @param string $permalink
     * @return $this
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Method to set the value of field summary
     *
     * @param string $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field visits
     *
     * @param integer $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

        return $this;
    }

    /**
     * Method to set the value of field date_public
     *
     * @param string $date_public
     * @return $this
     */
    public function setDatePublic($date_public)
    {
        $this->date_public = $date_public;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field last_name
     *
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field photo
     *
     * @param string $photo
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Method to set the value of field cargo
     *
     * @param string $cargo
     * @return $this
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Method to set the value of field second_name
     *
     * @param string $second_name
     * @return $this
     */
    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;

        return $this;
    }

    /**
     * Method to set the value of field subcategoryname
     *
     * @param string $subcategoryname
     * @return $this
     */
    public function setSubcategoryname($subcategoryname)
    {
        $this->subcategoryname = $subcategoryname;

        return $this;
    }

    /**
     * Method to set the value of field cgid
     *
     * @param integer $cgid
     * @return $this
     */
    public function setCgid($cgid)
    {
        $this->cgid = $cgid;

        return $this;
    }

    /**
     * Method to set the value of field name_category
     *
     * @param string $name_category
     * @return $this
     */
    public function setNameCategory($name_category)
    {
        $this->name_category = $name_category;

        return $this;
    }

    /**
     * Method to set the value of field color
     *
     * @param string $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Method to set the value of field clase
     *
     * @param string $clase
     * @return $this
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Returns the value of field pid
     *
     * @return integer
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Returns the value of field summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Returns the value of field date_public
     *
     * @return string
     */
    public function getDatePublic()
    {
        return $this->date_public;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Returns the value of field cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Returns the value of field second_name
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * Returns the value of field subcategoryname
     *
     * @return string
     */
    public function getSubcategoryname()
    {
        return $this->subcategoryname;
    }

    /**
     * Returns the value of field cgid
     *
     * @return integer
     */
    public function getCgid()
    {
        return $this->cgid;
    }

    /**
     * Returns the value of field name_category
     *
     * @return string
     */
    public function getNameCategory()
    {
        return $this->name_category;
    }

    /**
     * Returns the value of field color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Returns the value of field clase
     *
     * @return string
     */
    public function getClase()
    {
        return $this->clase;
    }


    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vnote';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vnote[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vnote
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
