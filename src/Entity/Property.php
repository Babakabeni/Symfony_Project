<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    const HEAT = [
        0 => 'Electrique',
        1 => 'Gaz'
    ];
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Surface = null;

    #[ORM\Column]
    private ?int $rooms = null;

    #[ORM\Column]
    private ?int $Bedrooms = null;

    #[ORM\Column]
    private ?int $Floor = null;

    #[ORM\Column]
    private ?int $Price = null;
    public function formattedPrice()
    {
        return number_format($this->Price, 0, '', ' ');
    }

    #[ORM\Column]
    private ?int $Heat = null;

    #[ORM\Column(length: 255)]
    private ?string $City = null;

    #[ORM\Column(length: 255)]
    private ?string $Adress = null;

    #[ORM\Column(length: 255)]
    private ?string $Postal_code = null;

    #[ORM\Column]
    private ?bool $Sold = false;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Created_at = null;
    public function __construct()
    {
        $this->Created_at = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getSlug()
    {
       // return (new Slugify())->slugify($this->Title);
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->Surface;
    }

    public function setSurface(int $Surface): static
    {
        $this->Surface = $Surface;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): static
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->Bedrooms;
    }

    public function setBedrooms(int $Bedrooms): static
    {
        $this->Bedrooms = $Bedrooms;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->Floor;
    }

    public function setFloor(int $Floor): static
    {
        $this->Floor = $Floor;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getHeatType(): string
    {
        return self::HEAT[$this->Heat];
    }

    public function getHeat(): ?int
    {
        return $this->Heat;
    }

    public function setHeat(int $Heat): static
    {
        $this->Heat = $Heat;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): static
    {
        $this->City = $City;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): static
    {
        $this->Adress = $Adress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->Postal_code;
    }

    public function setPostalCode(string $Postal_code): static
    {
        $this->Postal_code = $Postal_code;

        return $this;
    }

    public function isSold(): ?bool
    {
        return $this->Sold;
    }

    public function setSold(bool $Sold): static
    {
        $this->Sold = $Sold;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeInterface $Created_at): static
    {
        $this->Created_at = $Created_at;

        return $this;
    }
}
