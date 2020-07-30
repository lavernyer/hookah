<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\Car\CarId;

final class CarIdType extends UuidIdType
{
    public function getName(): string
    {
        return 'car_id';
    }

    protected function getTypeClass(): string
    {
        return CarId::class;
    }
}
