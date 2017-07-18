<?php
namespace Modules\Models;
class CdMemes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $meid;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $name_meme;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_creation;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     * Method to set the value of field meid
     *
     * @param integer $meid
     * @return $this
     */
    public function setMeid($meid)
    {
        $this->meid = $meid;

        return $this;
    }

    /**
     * Method to set the value of field name_meme
     *
     * @param string $name_meme
     * @return $this
     */
    public function setNameMeme($name_meme)
    {
        $this->name_meme = $name_meme;

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
     * Returns the value of field meid
     *
     * @return integer
     */
    public function getMeid()
    {
        return $this->meid;
    }

    /**
     * Returns the value of field name_meme
     *
     * @return string
     */
    public function getNameMeme()
    {
        return $this->name_meme;
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
        $this->hasMany('meid', 'CdMemesImage', 'meid', ['alias' => 'CdMemesImage']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_memes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMemes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMemes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
