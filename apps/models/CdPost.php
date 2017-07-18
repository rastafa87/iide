<?php
namespace Modules\Models;
class CdPost extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $pid;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $title;

    /**
     *
     * @var string
     * @Column(type="string", length=75, nullable=false)
     */
    protected $image;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $permalink;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    protected $summary;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $content;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $status;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $visits;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $date_creation;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $date_public;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=true)
     */
    protected $ur_video;

    /**
     *
     * @var string
     * @Column(type="string", length=1, nullable=false)
     */
    protected $is_gallery;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $breaking_new_time_start;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $breacking_new_time_end;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $p_facebook;

    /**
     *
     * @var integer
     * @Column(type="integer", length=4, nullable=true)
     */
    protected $p_twitter;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $uid;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $scid;

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
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field permalink
     *
     * @param string $permalink
     * @return $this
     */
    public function setPermalink($permalink)
    {
        $this->permalink = $permalink;

        return $this;
    }

    /**
     * Method to set the value of field summary
     *
     * @param string $summary
     * @return $this
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

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
     * Method to set the value of field visits
     *
     * @param integer $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

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
     * Method to set the value of field date_public
     *
     * @param string $date_public
     * @return $this
     */
    public function setDatePublic($date_public)
    {
        $this->date_public = $date_public;

        return $this;
    }

    /**
     * Method to set the value of field ur_video
     *
     * @param string $ur_video
     * @return $this
     */
    public function setUrVideo($ur_video)
    {
        $this->ur_video = $ur_video;

        return $this;
    }

    /**
     * Method to set the value of field is_gallery
     *
     * @param string $is_gallery
     * @return $this
     */
    public function setIsGallery($is_gallery)
    {
        $this->is_gallery = $is_gallery;

        return $this;
    }

    /**
     * Method to set the value of field breaking_new_time_start
     *
     * @param string $breaking_new_time_start
     * @return $this
     */
    public function setBreakingNewTimeStart($breaking_new_time_start)
    {
        $this->breaking_new_time_start = $breaking_new_time_start;

        return $this;
    }

    /**
     * Method to set the value of field breacking_new_time_end
     *
     * @param string $breacking_new_time_end
     * @return $this
     */
    public function setBreackingNewTimeEnd($breacking_new_time_end)
    {
        $this->breacking_new_time_end = $breacking_new_time_end;

        return $this;
    }

    /**
     * Method to set the value of field p_facebook
     *
     * @param integer $p_facebook
     * @return $this
     */
    public function setPFacebook($p_facebook)
    {
        $this->p_facebook = $p_facebook;

        return $this;
    }

    /**
     * Method to set the value of field p_twitter
     *
     * @param integer $p_twitter
     * @return $this
     */
    public function setPTwitter($p_twitter)
    {
        $this->p_twitter = $p_twitter;

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
     * Returns the value of field pid
     *
     * @return integer
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field permalink
     *
     * @return string
     */
    public function getPermalink()
    {
        return $this->permalink;
    }

    /**
     * Returns the value of field summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
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
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
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
     * Returns the value of field date_public
     *
     * @return string
     */
    public function getDatePublic()
    {
        return $this->date_public;
    }

    /**
     * Returns the value of field ur_video
     *
     * @return string
     */
    public function getUrVideo()
    {
        return $this->ur_video;
    }

    /**
     * Returns the value of field is_gallery
     *
     * @return string
     */
    public function getIsGallery()
    {
        return $this->is_gallery;
    }

    /**
     * Returns the value of field breaking_new_time_start
     *
     * @return string
     */
    public function getBreakingNewTimeStart()
    {
        return $this->breaking_new_time_start;
    }

    /**
     * Returns the value of field breacking_new_time_end
     *
     * @return string
     */
    public function getBreackingNewTimeEnd()
    {
        return $this->breacking_new_time_end;
    }

    /**
     * Returns the value of field p_facebook
     *
     * @return integer
     */
    public function getPFacebook()
    {
        return $this->p_facebook;
    }

    /**
     * Returns the value of field p_twitter
     *
     * @return integer
     */
    public function getPTwitter()
    {
        return $this->p_twitter;
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
     * Returns the value of field scid
     *
     * @return integer
     */
    public function getScid()
    {
        return $this->scid;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('pid', 'CdGalleryImages', 'pid', ['alias' => 'CdGalleryImages']);
        $this->hasMany('pid', 'CdGalleryTags', 'pid', ['alias' => 'CdGalleryTags']);
        $this->hasMany('pid', 'CdPostPrincipal', 'pid', ['alias' => 'CdPostPrincipal']);
        $this->hasMany('pid', 'CdSettingsPost', 'pid', ['alias' => 'CdSettingsPost']);
        $this->belongsTo('scid', 'CdSubcategory', 'scid', ['alias' => 'CdSubcategory']);
        $this->belongsTo('uid', 'CdUser', 'uid', ['alias' => 'CdUser']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cd_post';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdPost[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CdPost
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
