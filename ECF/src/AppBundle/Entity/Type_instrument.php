<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type_instrument
 *
 * @ORM\Table(name="type_instrument")
 * @ORM\Entity
 */
class Type_instrument
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
     * @ORM\Column(name="instrument_name", type="string", length=255, precision=0, scale=0, nullable=false, unique=true)
     */
    private $instrument_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\SparePart", mappedBy="Type_instruments")
     */
    private $spareParts;

    /**
     * @var \AppBundle\Entity\Family_instrument
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Family_instrument", inversedBy="Type_instruments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="family_instrument_id", referencedColumnName="id")
     * })
     */
    private $family_instrument;

    /**
     * @var \AppBundle\Entity\Mark
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mark", inversedBy="Type_instruments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mark_id", referencedColumnName="id")
     * })
     */
    private $mark;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->spareParts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set instrumentName
     *
     * @param string $instrumentName
     *
     * @return Type_instrument
     */
    public function setInstrumentName($instrumentName)
    {
        $this->instrument_name = $instrumentName;

        return $this;
    }

    /**
     * Get instrumentName
     *
     * @return string
     */
    public function getInstrumentName()
    {
        return $this->instrument_name;
    }

    /**
     * Add sparePart
     *
     * @param \AppBundle\Entity\SparePart $sparePart
     *
     * @return Type_instrument
     */
    public function addSparePart(\AppBundle\Entity\SparePart $sparePart)
    {
        $this->spareParts[] = $sparePart;

        return $this;
    }

    /**
     * Remove sparePart
     *
     * @param \AppBundle\Entity\SparePart $sparePart
     */
    public function removeSparePart(\AppBundle\Entity\SparePart $sparePart)
    {
        $this->spareParts->removeElement($sparePart);
    }

    /**
     * Get spareParts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpareParts()
    {
        return $this->spareParts;
    }

    /**
     * Set familyInstrument
     *
     * @param \AppBundle\Entity\Family_instrument $familyInstrument
     *
     * @return Type_instrument
     */
    public function setFamilyInstrument(\AppBundle\Entity\Family_instrument $familyInstrument = null)
    {
        $this->family_instrument = $familyInstrument;

        return $this;
    }

    /**
     * Get familyInstrument
     *
     * @return \AppBundle\Entity\Family_instrument
     */
    public function getFamilyInstrument()
    {
        return $this->family_instrument;
    }

    /**
     * Set mark
     *
     * @param \AppBundle\Entity\Mark $mark
     *
     * @return Type_instrument
     */
    public function setMark(\AppBundle\Entity\Mark $mark = null)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return \AppBundle\Entity\Mark
     */
    public function getMark()
    {
        return $this->mark;
    }
}

