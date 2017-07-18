<?php
namespace Modules\Models;
class CdMagazine extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $mid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name_image;

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
     * Method to set the value of field mid
     *
     * @param integer $mid
     * @return $this
     */
    public function setMid($mid)
    {
        $this->mid = $mid;

        return $this;
    }

    /**
     * Method to set the value of field name_image
     *
     * @param string $name_image
     * @return $this
     */
    public function setNameImage($name_image)
    {
        $this->name_image = $name_image;

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
     * Returns the value of field mid
     *
     * @return integer
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Returns the value of field name_image
     *
     * @return string
     */
    public function getNameImage()
    {
        return $this->name_image;
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
        $this->hasMany('mid', 'CdMagazineGallery', 'mid', ['alias' => 'CdMagazineGallery']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_magazine';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMagazine[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMagazine
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
