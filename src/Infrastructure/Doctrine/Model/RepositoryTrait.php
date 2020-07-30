<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

trait RepositoryTrait
{
    private EntityManagerInterface $em;
    private string $className;

    private function createQueryBuilder(string $alias): QueryBuilder
    {
        return $this->em
            ->createQueryBuilder()
            ->select($alias)
            ->from($this->className, $alias)
        ;
    }

    private function getRepository(): EntityRepository
    {
        /** @var EntityRepository $repo */
        $repo = $this->em->getRepository($this->className);

        return $repo;
    }
}
