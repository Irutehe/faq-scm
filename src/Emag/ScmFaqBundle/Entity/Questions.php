<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Questions
{
    /**
     * @var string
     *
     * @ORM\Column(name="short_version_question", type="string", length=250, nullable=false)
     */
    private $shortVersionQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="long_version_question", type="text", nullable=true)
     */
    private $longVersionQuestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="asked_by_user_id", type="integer", nullable=true)
     */
    private $askedByUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set shortVersionQuestion
     *
     * @param string $shortVersionQuestion
     * @return Questions
     */
    public function setShortVersionQuestion($shortVersionQuestion)
    {
        $this->shortVersionQuestion = $shortVersionQuestion;

        return $this;
    }

    /**
     * Get shortVersionQuestion
     *
     * @return string 
     */
    public function getShortVersionQuestion()
    {
        return $this->shortVersionQuestion;
    }

    /**
     * Set longVersionQuestion
     *
     * @param string $longVersionQuestion
     * @return Questions
     */
    public function setLongVersionQuestion($longVersionQuestion)
    {
        $this->longVersionQuestion = $longVersionQuestion;

        return $this;
    }

    /**
     * Get longVersionQuestion
     *
     * @return string 
     */
    public function getLongVersionQuestion()
    {
        return $this->longVersionQuestion;
    }

    /**
     * Set askedByUserId
     *
     * @param integer $askedByUserId
     * @return Questions
     */
    public function setAskedByUserId($askedByUserId)
    {
        $this->askedByUserId = $askedByUserId;

        return $this;
    }

    /**
     * Get askedByUserId
     *
     * @return integer 
     */
    public function getAskedByUserId()
    {
        return $this->askedByUserId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Questions
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Questions
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
