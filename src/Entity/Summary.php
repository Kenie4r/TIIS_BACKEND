<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Summary
 *
 * @ORM\Table(name="summary")
 * @ORM\Entity
 */
class Summary
{
    /**
     * @var int
     *
     * @ORM\Column(name="summary_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $summaryId;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=200, nullable=false)
     */
    private $fileName;

    /**
     * @var int
     *
     * @ORM\Column(name="rows_num", type="integer", nullable=false)
     */
    private $rowsNum;

    /**
     * @var int
     *
     * @ORM\Column(name="male_people", type="integer", nullable=false)
     */
    private $malePeople;

    /**
     * @var int
     *
     * @ORM\Column(name="female_people", type="integer", nullable=false)
     */
    private $femalePeople;

    /**
     * @var int
     *
     * @ORM\Column(name="others_people", type="integer", nullable=false)
     */
    private $othersPeople;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="date", nullable=false)
     */
    private $createdAt;

    public function getSummaryId(): ?int
    {
        return $this->summaryId;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): static
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getRowsNum(): ?int
    {
        return $this->rowsNum;
    }

    public function setRowsNum(int $rowsNum): static
    {
        $this->rowsNum = $rowsNum;

        return $this;
    }

    public function getMalePeople(): ?int
    {
        return $this->malePeople;
    }

    public function setMalePeople(int $malePeople): static
    {
        $this->malePeople = $malePeople;

        return $this;
    }

    public function getFemalePeople(): ?int
    {
        return $this->femalePeople;
    }

    public function setFemalePeople(int $femalePeople): static
    {
        $this->femalePeople = $femalePeople;

        return $this;
    }

    public function getOthersPeople(): ?int
    {
        return $this->othersPeople;
    }

    public function setOthersPeople(int $othersPeople): static
    {
        $this->othersPeople = $othersPeople;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
   

    public function setSummaryId(int $othersPeople): static
    {
        $this->othersPeople = $othersPeople;

        return $this;
    }

}
