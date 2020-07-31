<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @ORM\Entity()
 */
final class Officer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="officer_id", unique=true)
     */
    private OfficerId $id;

    /**
     * Many features have one product. This is the owning side.
     * @ManyToOne(targetEntity="App\Domain\Model\Company\Company", inversedBy="officers", cascade={"persist"})
     * @JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private Company $company;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $position;

    public function __construct(Company $company, string $name, string $position)
    {
        $this->id = OfficerId::create();
        $this->company = $company;
        $this->name = $name;
        $this->position = $position;
    }
}
