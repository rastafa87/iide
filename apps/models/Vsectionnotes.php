<?php
namespace Modules\Models;
class Vsectionnotes extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $visits;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_public;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $subcategoryname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $cgid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $name_category;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=true)
     */
    protected $color;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $clase;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $important;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $gallery;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $order_slider;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $header;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $home;

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
     * Method to set the value of field important
     *
     * @param integer $important
     * @return $this
     */
    public function setImportant($important)
    {
        $this->important = $important;

        return $this;
    }

    /**
     * Method to set the value of field gallery
     *
     * @param integer $gallery
     * @return $this
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Method to set the value of field order_slider
     *
     * @param integer $order_slider
     * @return $this
     */
    public function setOrderSlider($order_slider)
    {
        $this->order_slider = $order_slider;

        return $this;
    }

    /**
     * Method to set the value of field header
     *
     * @param integer $header
     * @return $this
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Method to set the value of field home
     *
     * @param integer $home
     * @return $this
     */
    public function setHome($home)
    {
        $this->home = $home;

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
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
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
     * Returns the value of field date_public
     *
     * @return string
     */
    public function getDatePublic()
    {
        return $this->date_public;
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
     * Returns the value of field important
     *
     * @return integer
     */
    public function getImportant()
    {
        return $this->important;
    }

    /**
     * Returns the value of field gallery
     *
     * @return integer
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Returns the value of field order_slider
     *
     * @return integer
     */
    public function getOrderSlider()
    {
        return $this->order_slider;
    }

    /**
     * Returns the value of field header
     *
     * @return integer
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Returns the value of field home
     *
     * @return integer
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vsectionnotes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vsectionnotes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vsectionnotes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
