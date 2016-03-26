<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnsweredQuestions
 *
 * @ORM\Table(name="answered_questions", indexes={@ORM\Index(name="fk_answered_questions_question", columns={"question_id"}), @ORM\Index(name="fk_answered_questions_answer", columns={"answer_id"})})
 * @ORM\Entity
 */
class AnsweredQuestions
{
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

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
     * @var \Emag\ScmFaqBundle\Entity\Questions
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\Questions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var \Emag\ScmFaqBundle\Entity\Answers
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\Answers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="answer_id", referencedColumnName="id")
     * })
     */
    private $answer;



    /**
     * Set status
     *
     * @param string $status
     * @return AnsweredQuestions
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return AnsweredQuestions
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
     * @return AnsweredQuestions
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
     * Set question
     *
     * @param \Emag\ScmFaqBundle\Entity\Questions $question
     * @return AnsweredQuestions
     */
    public function setQuestion(\Emag\ScmFaqBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Emag\ScmFaqBundle\Entity\Questions 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param \Emag\ScmFaqBundle\Entity\Answers $answer
     * @return AnsweredQuestions
     */
    public function setAnswer(\Emag\ScmFaqBundle\Entity\Answers $answer = null)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return \Emag\ScmFaqBundle\Entity\Answers 
     */
    public function getAnswer()
    {
        return $this->answer;
    }
}
