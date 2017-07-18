<?php

class CdReferencia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $reid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $cargo;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $empresa;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $periodo;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $ciudad;

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
     * Method to set the value of field empresa
     *
     * @param string $empresa
     * @return $this
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Method to set the value of field periodo
     *
     * @param string $periodo
     * @return $this
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Method to set the value of field ciudad
     *
     * @param string $ciudad
     * @return $this
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

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
     * Returns the value of field cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Returns the value of field empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Returns the value of field periodo
     *
     * @return string
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Returns the value of field ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('reid', 'CdReferenciaCurriculum', 'reid', ['alias' => 'CdReferenciaCurriculum']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_referencia';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdReferencia[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdReferencia
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
