<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnsweredQuestionsComments
 *
 * @ORM\Table(name="answered_questions_comments", indexes={@ORM\Index(name="fk_answered_questions_comments_answered_question", columns={"answered_question_id"})})
 * @ORM\Entity
 */
class AnsweredQuestionsComments
{
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

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
     * @var \Emag\ScmFaqBundle\Entity\AnsweredQuestions
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\AnsweredQuestions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="answered_question_id", referencedColumnName="id")
     * })
     */
    private $answeredQuestion;



    /**
     * Set comment
     *
     * @param string $comment
     * @return AnsweredQuestionsComments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return AnsweredQuestionsComments
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AnsweredQuestionsComments
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
     * @return AnsweredQuestionsComments
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

    /**
     * Set answeredQuestion
     *
     * @param \Emag\ScmFaqBundle\Entity\AnsweredQuestions $answeredQuestion
     * @return AnsweredQuestionsComments
     */
    public function setAnsweredQuestion(\Emag\ScmFaqBundle\Entity\AnsweredQuestions $answeredQuestion = null)
    {
        $this->answeredQuestion = $answeredQuestion;

        return $this;
    }

    /**
     * Get answeredQuestion
     *
     * @return \Emag\ScmFaqBundle\Entity\AnsweredQuestions 
     */
    public function getAnsweredQuestion()
    {
        return $this->answeredQuestion;
    }
}
