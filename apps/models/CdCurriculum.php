<?php
namespace Modules\Models;
class CdCurriculum extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $coid;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $resumen;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     * Method to set the value of field coid
     *
     * @param integer $coid
     * @return $this
     */
    public function setCoid($coid)
    {
        $this->coid = $coid;

        return $this;
    }

    /**
     * Method to set the value of field resumen
     *
     * @param string $resumen
     * @return $this
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

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
     * Returns the value of field coid
     *
     * @return integer
     */
    public function getCoid()
    {
        return $this->coid;
    }

    /**
     * Returns the value of field resumen
     *
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
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
        $this->hasMany('coid', 'CdReferenciaCurriculum', 'coid', ['alias' => 'CdReferenciaCurriculum']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_curriculum';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCurriculum[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCurriculum
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
