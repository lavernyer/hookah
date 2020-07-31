<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $position;

    public function __construct(OfficerId $id, string $name, string $position)
    {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
    }
}
