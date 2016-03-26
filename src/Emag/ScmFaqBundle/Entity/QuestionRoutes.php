<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionRoutes
 *
 * @ORM\Table(name="question_routes", indexes={@ORM\Index(name="fk_question_routes_question", columns={"question_id"}), @ORM\Index(name="fk_question_routes_route", columns={"route_id"})})
 * @ORM\Entity
 */
class QuestionRoutes
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Emag\ScmFaqBundle\Entity\Routes
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\Routes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="route_id", referencedColumnName="id")
     * })
     */
    private $route;

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
     * Set created
     *
     * @param \DateTime $created
     * @return QuestionRoutes
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set route
     *
     * @param \Emag\ScmFaqBundle\Entity\Routes $route
     * @return QuestionRoutes
     */
    public function setRoute(\Emag\ScmFaqBundle\Entity\Routes $route = null)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return \Emag\ScmFaqBundle\Entity\Routes 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set question
     *
     * @param \Emag\ScmFaqBundle\Entity\Questions $question
     * @return QuestionRoutes
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
}
