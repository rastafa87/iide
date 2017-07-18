<?php
namespace Modules\Models;
class CdCountry extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=100, nullable=false)
     */
    protected $country;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $abbreviation;


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
     * Method to set the value of field country
     *
     * @param string $country
     * @return $this
     */
    public function setTitle($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Method to set the value of field abbreviation
     *
     * @param string $abbreviation
     * @return $this
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

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
     * Returns the value of field country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Returns the value of field abbreviation
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_country';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCountry[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdCountry
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
