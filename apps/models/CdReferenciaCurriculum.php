<?php

class CdReferenciaCurriculum extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $reid;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $coid;

    /**
     * Method to set the value of field reid
     *
     * @param integer $reid
     * @return $this
     */
    public function setReid($reid)
    {
        $this->reid = $reid;

        return $this;
    }

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
     * Returns the value of field reid
     *
     * @return integer
     */
    public function getReid()
    {
        return $this->reid;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('coid', 'CdCurriculum', 'coid', ['alias' => 'CdCurriculum']);
        $this->belongsTo('reid', 'CdReferencia', 'reid', ['alias' => 'CdReferencia']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_referencia_curriculum';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdReferenciaCurriculum[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdReferenciaCurriculum
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
