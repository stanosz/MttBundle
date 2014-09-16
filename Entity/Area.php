<?php

namespace CanalTP\MttBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Area
 */
class Area extends AbstractEntity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var Object
     */
    private $network;

    /**
     * @var array
     */
    private $stopPoints;

    /**
     * @var Object
     */
    private $areasPdf;

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
     * Set label
     *
     * @param string $label
     * @return Area
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set network
     *
     * @param Object $network
     * @return Area
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Get network
     *
     * @return Object
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set stopPoints
     *
     * @param Object $network
     * @return Area
     */
    public function setStopPoints($network)
    {
        $this->stopPoints = $stopPoints;

        return $this;
    }

    /**
     * Get stopPoints
     *
     * @return Object
     */
    public function getStopPoints()
    {
        return $this->stopPoints;
    }

    /**
     * Set areasPdf
     *
     * @param Object $areasPdf
     * @return Area
     */
    public function setAreasPdf($areasPdf)
    {
        $this->areasPdf = $areasPdf;

        return $this;
    }

    /**
     * Get areasPdf
     *
     * @return Object
     */
    public function getAreasPdf()
    {
        return $this->areasPdf;
    }

    public function getNbStopPoints()
    {
        return count($this->stopPoints);
    }
}