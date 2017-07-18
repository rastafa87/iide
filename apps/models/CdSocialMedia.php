<?php

class CdSocialMedia extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $smid;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $facebook;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $twitter;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $google_plus;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $pinterest;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=true)
     */
    protected $instagram;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $youtube;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     * Method to set the value of field smid
     *
     * @param integer $smid
     * @return $this
     */
    public function setSmid($smid)
    {
        $this->smid = $smid;

        return $this;
    }

    /**
     * Method to set the value of field facebook
     *
     * @param string $facebook
     * @return $this
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Method to set the value of field twitter
     *
     * @param string $twitter
     * @return $this
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Method to set the value of field google_plus
     *
     * @param string $google_plus
     * @return $this
     */
    public function setGooglePlus($google_plus)
    {
        $this->google_plus = $google_plus;

        return $this;
    }

    /**
     * Method to set the value of field pinterest
     *
     * @param string $pinterest
     * @return $this
     */
    public function setPinterest($pinterest)
    {
        $this->pinterest = $pinterest;

        return $this;
    }

    /**
     * Method to set the value of field instagram
     *
     * @param string $instagram
     * @return $this
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Method to set the value of field youtube
     *
     * @param string $youtube
     * @return $this
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

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
     * Returns the value of field smid
     *
     * @return integer
     */
    public function getSmid()
    {
        return $this->smid;
    }

    /**
     * Returns the value of field facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Returns the value of field twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Returns the value of field google_plus
     *
     * @return string
     */
    public function getGooglePlus()
    {
        return $this->google_plus;
    }

    /**
     * Returns the value of field pinterest
     *
     * @return string
     */
    public function getPinterest()
    {
        return $this->pinterest;
    }

    /**
     * Returns the value of field instagram
     *
     * @return string
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Returns the value of field youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
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
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_social_media';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSocialMedia[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdSocialMedia
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
