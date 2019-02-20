<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Family_instrument
 *
 * @ORM\Table(name="family_instrument")
 * @ORM\Entity
 */
class Family_instrument
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
     * @ORM\Column(name="family_name", type="string", length=255, nullable=false, unique=true)
     */
    private $family_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Type_instrument", mappedBy="family_instrument")
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
     * Set familyName
     *
     * @param string $familyName
     *
     * @return Family_instrument
     */
    public function setFamilyName($familyName)
    {
        $this->family_name = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * Add typeInstrument
     *
     * @param \AppBundle\Entity\Type_instrument $typeInstrument
     *
     * @return Family_instrument
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

