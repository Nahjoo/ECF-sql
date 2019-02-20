<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mark
 *
 * @ORM\Table(name="mark")
 * @ORM\Entity
 */
class Mark
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mark_name", type="string", length=255, nullable=false, unique=true)
     */
    private $mark_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Type_instrument", mappedBy="mark")
     */
    private $Type_instruments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Type_instruments = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set markName
     *
     * @param string $markName
     *
     * @return Mark
     */
    public function setMarkName($markName)
    {
        $this->mark_name = $markName;

        return $this;
    }

    /**
     * Get markName
     *
     * @return string
     */
    public function getMarkName()
    {
        return $this->mark_name;
    }

    /**
     * Add typeInstrument
     *
     * @param \AppBundle\Entity\Type_instrument $typeInstrument
     *
     * @return Mark
     */
    public function addTypeInstrument(\AppBundle\Entity\Type_instrument $typeInstrument)
    {
        $this->Type_instruments[] = $typeInstrument;

        return $this;
    }

    /**
     * Remove typeInstrument
     *
     * @param \AppBundle\Entity\Type_instrument $typeInstrument
     */
    public function removeTypeInstrument(\AppBundle\Entity\Type_instrument $typeInstrument)
    {
        $this->Type_instruments->removeElement($typeInstrument);
    }

    /**
     * Get typeInstruments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTypeInstruments()
    {
        return $this->Type_instruments;
    }
}

