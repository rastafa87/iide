<?php
namespace Modules\Models;
class CdLaw extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $laid;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=false)
     */
    protected $law;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $file;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $coid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $clid;

    /**
     * Method to set the value of field laid
     *
     * @param integer $laid
     * @return $this
     */
    public function setLaid($laid)
    {
        $this->laid = $laid;

        return $this;
    }

    /**
     * Method to set the value of field law
     *
     * @param string $law
     * @return $this
     */
    public function setLaw($law)
    {
        $this->law = $law;

        return $this;
    }

    /**
     * Method to set the value of field file
     *
     * @param string $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

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
     * Method to set the value of field clid
     *
     * @param integer $clid
     * @return $this
     */
    public function setClid($clid)
    {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Returns the value of field laid
     *
     * @return integer
     */
    public function getLaid()
    {
        return $this->laid;
    }

    /**
     * Returns the value of field law
     *
     * @return string
     */
    public function getLaw()
    {
        return $this->law;
    }

    /**
     * Returns the value of field file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
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
     * Returns the value of field clid
     *
     * @return integer
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('coid', 'CdCountry', 'coid', ['alias' => 'CdCountry']);
        $this->belongsTo('clid', 'CdCategoryLaw', 'clid', ['alias' => 'CdCategoryLaw']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_law';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdLaw[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdLaw
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}