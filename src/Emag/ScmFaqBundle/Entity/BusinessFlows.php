<?php

namespace Emag\ScmFaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusinessFlows
 *
 * @ORM\Table(name="business_flows", indexes={@ORM\Index(name="fk_business_flows_business_flow", columns={"parent_id"})})
 * @ORM\Entity
 */
class BusinessFlows
{
    /**
     * @var string
     *
     * @ORM\Column(name="flow_name", type="string", length=150, nullable=false)
     */
    private $flowName;

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
     * @var \Emag\ScmFaqBundle\Entity\BusinessFlows
     *
     * @ORM\ManyToOne(targetEntity="Emag\ScmFaqBundle\Entity\BusinessFlows")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;



    /**
     * Set flowName
     *
     * @param string $flowName
     * @return BusinessFlows
     */
    public function setFlowName($flowName)
    {
        $this->flowName = $flowName;

        return $this;
    }

    /**
     * Get flowName
     *
     * @return string 
     */
    public function getFlowName()
    {
        return $this->flowName;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return BusinessFlows
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
     * @return BusinessFlows
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
     * Set parent
     *
     * @param \Emag\ScmFaqBundle\Entity\BusinessFlows $parent
     * @return BusinessFlows
     */
    public function setParent(\Emag\ScmFaqBundle\Entity\BusinessFlows $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Emag\ScmFaqBundle\Entity\BusinessFlows 
     */
    public function getParent()
    {
        return $this->parent;
    }
}
