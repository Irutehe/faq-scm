<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answers
 *
 * @ORM\Table(name="answers")
 * @ORM\Entity
 */
class Answers
{
    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text", nullable=false)
     */
    private $answer;

    /**
     * @var integer
     *
     * @ORM\Column(name="voted_up", type="smallint", nullable=false)
     */
    private $votedUp;

    /**
     * @var integer
     *
     * @ORM\Column(name="voted_down", type="smallint", nullable=false)
     */
    private $votedDown;

    /**
     * @var integer
     *
     * @ORM\Column(name="response_by_user_id", type="integer", nullable=true)
     */
    private $responseByUserId;

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
     * Set answer
     *
     * @param string $answer
     * @return Answers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set votedUp
     *
     * @param integer $votedUp
     * @return Answers
     */
    public function setVotedUp($votedUp)
    {
        $this->votedUp = $votedUp;

        return $this;
    }

    /**
     * Get votedUp
     *
     * @return integer 
     */
    public function getVotedUp()
    {
        return $this->votedUp;
    }

    /**
     * Set votedDown
     *
     * @param integer $votedDown
     * @return Answers
     */
    public function setVotedDown($votedDown)
    {
        $this->votedDown = $votedDown;

        return $this;
    }

    /**
     * Get votedDown
     *
     * @return integer 
     */
    public function getVotedDown()
    {
        return $this->votedDown;
    }

    /**
     * Set responseByUserId
     *
     * @param integer $responseByUserId
     * @return Answers
     */
    public function setResponseByUserId($responseByUserId)
    {
        $this->responseByUserId = $responseByUserId;

        return $this;
    }

    /**
     * Get responseByUserId
     *
     * @return integer 
     */
    public function getResponseByUserId()
    {
        return $this->responseByUserId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Answers
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
     * @return Answers
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
