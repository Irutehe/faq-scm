<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessFlowQuestions
 *
 * @ORM\Table(name="business_flow_questions", indexes={@ORM\Index(name="fk_business_flow_questions_business_flow", columns={"business_flow_id"}), @ORM\Index(name="fk_business_flow_questions_question", columns={"question_id"})})
 * @ORM\Entity
 */
class BusinessFlowQuestions
{
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
     * @var \Emag\ScmFaqBundle\Entity\BusinessFlows
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\BusinessFlows")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="business_flow_id", referencedColumnName="id")
     * })
     */
    private $businessFlow;



    /**
     * Set created
     *
     * @param \DateTime $created
     * @return BusinessFlowQuestions
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
     * @return BusinessFlowQuestions
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
     * @return BusinessFlowQuestions
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
     * Set businessFlow
     *
     * @param \Emag\ScmFaqBundle\Entity\BusinessFlows $businessFlow
     * @return BusinessFlowQuestions
     */
    public function setBusinessFlow(\Emag\ScmFaqBundle\Entity\BusinessFlows $businessFlow = null)
    {
        $this->businessFlow = $businessFlow;

        return $this;
    }

    /**
     * Get businessFlow
     *
     * @return \Emag\ScmFaqBundle\Entity\BusinessFlows 
     */
    public function getBusinessFlow()
    {
        return $this->businessFlow;
    }
}
