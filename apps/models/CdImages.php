<?php
namespace Modules\Models;
class CdImages extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $original_name;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $size;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $type;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=false)
     */
    protected $url;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $description;

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
     * Method to set the value of field original_name
     *
     * @param string $original_name
     * @return $this
     */
    public function setOriginalName($original_name)
    {
        $this->original_name = $original_name;

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
     * Method to set the value of field size
     *
     * @param string $size
     * @return $this
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Returns the value of field original_name
     *
     * @return string
     */
    public function getOriginalName()
    {
        return $this->original_name;
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
     * Returns the value of field size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('imgid', 'CdGalleryImages', 'imgid', ['alias' => 'CdGalleryImages']);
        $this->hasMany('imgid', 'CdMemesImage', 'imgid', ['alias' => 'CdMemesImage']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_images';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdImages[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdImages
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
