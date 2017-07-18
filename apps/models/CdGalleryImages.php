<?php
namespace Modules\Models;
class CdGalleryImages extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pid;

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $imgid;

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
     * Returns the value of field pid
     *
     * @return integer
     */
    public function getPid()
    {
        return $this->pid;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('imgid', 'CdImages', 'imgid', ['alias' => 'CdImages']);
        $this->belongsTo('pid', 'CdPost', 'pid', ['alias' => 'CdPost']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_gallery_images';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdGalleryImages[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdGalleryImages
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
