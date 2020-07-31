<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Model\Company\Jurisdiction;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class JurisdictionType extends StringIdType
{
    private const LENGTH = 16;

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL(['length' => self::LENGTH]);
    }

    public function getName(): string
    {
        return 'jurisdiction';
    }

    protected function getTypeClass(): string
    {
        return Jurisdiction::class;
    }
}
