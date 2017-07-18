<?php
namespace Modules\Models;
class CdCategoryLaw extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $clid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $nameCategoryLaw;

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
     * Method to set the value of field nameCategoryLaw
     *
     * @param string $nameCategoryLaw
     * @return $this
     */
    public function setNameCategoryLaw($nameCategoryLaw)
    {
        $this->nameCategoryLaw = $nameCategoryLaw;

        return $this;
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
     * Returns the value of field nameCategoryLaw
     *
     * @return string
     */
    public function getNameCategoryLaw()
    {
        return $this->nameCategoryLaw;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('clid', 'CdLaw', 'clid', ['alias' => 'CdLaw']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_category_law';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCategoryLaw[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCategoryLaw
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
}