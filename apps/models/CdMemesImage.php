<?php
namespace Modules\Models;
class CdMemesImage extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $imgid;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $meid;

    /**
     * Method to set the value of field imgid
     *
     * @param integer $imgid
     * @return $this
     */
    public function setImgid($imgid)
    {
        $this->imgid = $imgid;

        return $this;
    }

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
     * Returns the value of field imgid
     *
     * @return integer
     */
    public function getImgid()
    {
        return $this->imgid;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('meid', 'CdMemes', 'meid', ['alias' => 'CdMemes']);
        $this->belongsTo('imgid', 'CdImages', 'imgid', ['alias' => 'CdImages']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_memes_image';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMemesImage[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdMemesImage
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
