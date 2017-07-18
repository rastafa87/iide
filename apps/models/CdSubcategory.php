<?php
namespace Modules\Models;
class CdSubcategory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $scid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $subcategoryname;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $cgid;

    /**
     * Method to set the value of field scid
     *
     * @param integer $scid
     * @return $this
     */
    public function setScid($scid)
    {
        $this->scid = $scid;

        return $this;
    }

    /**
     * Method to set the value of field subcategoryname
     *
     * @param string $subcategoryname
     * @return $this
     */
    public function setSubcategoryname($subcategoryname)
    {
        $this->subcategoryname = $subcategoryname;

        return $this;
    }

    /**
     * Method to set the value of field cgid
     *
     * @param integer $cgid
     * @return $this
     */
    public function setCgid($cgid)
    {
        $this->cgid = $cgid;

        return $this;
    }

    /**
     * Returns the value of field scid
     *
     * @return integer
     */
    public function getScid()
    {
        return $this->scid;
    }

    /**
     * Returns the value of field subcategoryname
     *
     * @return string
     */
    public function getSubcategoryname()
    {
        return $this->subcategoryname;
    }

    /**
     * Returns the value of field cgid
     *
     * @return integer
     */
    public function getCgid()
    {
        return $this->cgid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('scid', 'CdPost', 'scid', ['alias' => 'CdPost']);
        $this->belongsTo('cgid', 'CdCategory', 'cgid', ['alias' => 'CdCategory']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_subcategory';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubcategory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSubcategory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
