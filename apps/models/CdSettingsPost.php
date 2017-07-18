<?php

class CdSettingsPost extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $spid;

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
    protected $order;

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
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pid;

    /**
     * Method to set the value of field spid
     *
     * @param integer $spid
     * @return $this
     */
    public function setSpid($spid)
    {
        $this->spid = $spid;

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
     * Method to set the value of field order
     *
     * @param integer $order
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

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
     * Returns the value of field spid
     *
     * @return integer
     */
    public function getSpid()
    {
        return $this->spid;
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
     * Returns the value of field order
     *
     * @return integer
     */
    public function getOrder()
    {
        return $this->order;
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
     * Returns the value of field pid
     *
     * @return integer
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('pid', 'CdPost', 'pid', ['alias' => 'CdPost']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_settings_post';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSettingsPost[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSettingsPost
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
