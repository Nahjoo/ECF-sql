<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SparePart
 *
 * @ORM\Table(name="spare_part")
 * @ORM\Entity
 */
class SparePart
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
     * @ORM\Column(name="piece_name", type="string", length=255, nullable=true, unique=false)
     */
    private $piece_name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Type_instrument", inversedBy="spareParts")
     * @ORM\JoinTable(name="spare_part_type_instrument",
     *   joinColumns={
     *     @ORM\JoinColumn(name="spare_part_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="type_instrument_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
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
     * Set pieceName
     *
     * @param string $pieceName
     *
     * @return SparePart
     */
    public function setPieceName($pieceName)
    {
        $this->piece_name = $pieceName;

        return $this;
    }

    /**
     * Get pieceName
     *
     * @return string
     */
    public function getPieceName()
    {
        return $this->piece_name;
    }

    /**
     * Add typeInstrument
     *
     * @param \AppBundle\Entity\Type_instrument $typeInstrument
     *
     * @return SparePart
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

