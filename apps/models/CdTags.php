<?php

class CdTags extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $tid;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $name_tag;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     * Method to set the value of field tid
     *
     * @param integer $tid
     * @return $this
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Method to set the value of field name_tag
     *
     * @param string $name_tag
     * @return $this
     */
    public function setNameTag($name_tag)
    {
        $this->name_tag = $name_tag;

        return $this;
    }

    /**
     * Method to set the value of field date_creation
     *
     * @param string $date_creation
     * @return $this
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Method to set the value of field uid
     *
     * @param integer $uid
     * @return $this
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Returns the value of field tid
     *
     * @return integer
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Returns the value of field name_tag
     *
     * @return string
     */
    public function getNameTag()
    {
        return $this->name_tag;
    }

    /**
     * Returns the value of field date_creation
     *
     * @return string
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Returns the value of field uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('tid', 'CdGalleryTags', 'tid', ['alias' => 'CdGalleryTags']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_tags';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdTags[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdTags
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
