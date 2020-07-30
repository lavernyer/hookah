<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
final class Agent
{
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $name;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $address;

    public function __construct(?string $name, ?string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }
}
