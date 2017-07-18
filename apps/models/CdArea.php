<?php
namespace Modules\Models;
class CdArea extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $areid;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $icon;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $status;


    /**
     * Method to set the value of field areid
     *
     * @param integer $areid
     * @return $this
     */
    public function setAreid($areid)
    {
        $this->areid = $areid;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field icon
     *
     * @param string $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the value of field areid
     *
     * @return integer
     */
    public function getAreid()
    {
        return $this->areid;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_area';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdArea[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdArea
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
