<?php
namespace Modules\Models;
class CdUserDirection extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $udid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $street;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $colony;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $num;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $mid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     * Method to set the value of field udid
     *
     * @param integer $udid
     * @return $this
     */
    public function setUdid($udid)
    {
        $this->udid = $udid;

        return $this;
    }

    /**
     * Method to set the value of field street
     *
     * @param string $street
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Method to set the value of field colony
     *
     * @param string $colony
     * @return $this
     */
    public function setColony($colony)
    {
        $this->colony = $colony;

        return $this;
    }

    /**
     * Method to set the value of field num
     *
     * @param integer $num
     * @return $this
     */
    public function setNum($num)
    {
        $this->num = $num;

        return $this;
    }

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
     * Returns the value of field udid
     *
     * @return integer
     */
    public function getUdid()
    {
        return $this->udid;
    }

    /**
     * Returns the value of field street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Returns the value of field colony
     *
     * @return string
     */
    public function getColony()
    {
        return $this->colony;
    }

    /**
     * Returns the value of field num
     *
     * @return integer
     */
    public function getNum()
    {
        return $this->num;
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
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_user_direction';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdUserDirection[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdUserDirection
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
