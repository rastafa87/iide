<?php
namespace Modules\Models;
class CdCategory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $cgid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $name_category;

    /**
     *
     * @var string
     * @Column(type="string", length=10, nullable=false)
     */
    protected $color;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $clase;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $data_creation;

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
     * Method to set the value of field name_category
     *
     * @param string $name_category
     * @return $this
     */
    public function setNameCategory($name_category)
    {
        $this->name_category = $name_category;

        return $this;
    }

    /**
     * Method to set the value of field color
     *
     * @param string $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Method to set the value of field clase
     *
     * @param string $clase
     * @return $this
     */
    public function setClase($clase)
    {
        $this->clase = $clase;

        return $this;
    }

    /**
     * Method to set the value of field data_creation
     *
     * @param string $data_creation
     * @return $this
     */
    public function setDataCreation($data_creation)
    {
        $this->data_creation = $data_creation;

        return $this;
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
     * Returns the value of field name_category
     *
     * @return string
     */
    public function getNameCategory()
    {
        return $this->name_category;
    }

    /**
     * Returns the value of field color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Returns the value of field clase
     *
     * @return string
     */
    public function getClase()
    {
        return $this->clase;
    }

    /**
     * Returns the value of field data_creation
     *
     * @return string
     */
    public function getDataCreation()
    {
        return $this->data_creation;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('cgid', 'CdSubcategory', 'cgid', ['alias' => 'CdSubcategory']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_category';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCategory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCategory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
