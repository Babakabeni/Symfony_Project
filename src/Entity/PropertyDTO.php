<?php
namespace App\Entity;

class PropertyDTO
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @var int|null
     */
    public function getMaxPrice():?int
    {
        return $this->maxPrice;
    }

    /**
     * @var int|null
     * @param PropertyDTO
     */
    public function setMaxPrice(int $maxPrice): PropertyDTO
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @var int|null
     */
    public function getMinSurface():?int
    {
        return $this->minSurface;
    }

    /**
     * @var int|null
     * @param PropertyDTO
     */
    public function setMinSurface(int $minSurface): PropertyDTO
    {
        $this->minSurface = $minSurface;
        return $this;
    }
}