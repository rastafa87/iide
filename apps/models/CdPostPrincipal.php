<?php

class CdPostPrincipal extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $ppid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=false)
     */
    protected $oder;

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
    protected $pid;

    /**
     * Method to set the value of field ppid
     *
     * @param integer $ppid
     * @return $this
     */
    public function setPpid($ppid)
    {
        $this->ppid = $ppid;

        return $this;
    }

    /**
     * Method to set the value of field oder
     *
     * @param integer $oder
     * @return $this
     */
    public function setOder($oder)
    {
        $this->oder = $oder;

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
     * Returns the value of field ppid
     *
     * @return integer
     */
    public function getPpid()
    {
        return $this->ppid;
    }

    /**
     * Returns the value of field oder
     *
     * @return integer
     */
    public function getOder()
    {
        return $this->oder;
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
        return 'cd_post_principal';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdPostPrincipal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdPostPrincipal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
