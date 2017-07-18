<?php
namespace Modules\Models;

class Vusers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $name;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $last_name;

    /**
     *
     * @var string
     * @Column(type="string", length=45, nullable=true)
     */
    protected $second_name;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    protected $sex;

    /**
     *
     * @var string
     * @Column(type="string", length=15, nullable=true)
     */
    protected $phone;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $username;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $email;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $rol;

    /**
     *
     * @var string
     * @Column(type="string", length=200, nullable=true)
     */
    protected $photo;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var string
     * @Column(type="string", length=300, nullable=true)
     */
    protected $cargo;

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
     * Method to set the value of field last_name
     *
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Method to set the value of field second_name
     *
     * @param string $second_name
     * @return $this
     */
    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;

        return $this;
    }

    /**
     * Method to set the value of field sex
     *
     * @param string $sex
     * @return $this
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field rol
     *
     * @param string $rol
     * @return $this
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Method to set the value of field photo
     *
     * @param string $photo
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

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
     * Method to set the value of field cargo
     *
     * @param string $cargo
     * @return $this
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

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
     * Returns the value of field uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
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
     * Returns the value of field last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field second_name
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * Returns the value of field sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Returns the value of field photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
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
     * Returns the value of field cargo
     *
     * @return string
     */
    public function getCargo()
    {
        return $this->cargo;
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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vusers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vusers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vusers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
