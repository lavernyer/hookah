<?php

declare(strict_types=1);

namespace App\Application\Service\Company;

final class AskCompanies
{
    private int $page;
    private int $itemsPerPage;
    private int $location;

    public function __construct(int $page, int $itemsPerPage, int $location)
    {
        $this->page = $page;
        $this->itemsPerPage = $itemsPerPage;
        $this->location = $location;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    public function getLocation(): int
    {
        return $this->location;
    }

    public function toArray(): array
    {
        return [
            'page' => $this->page,
            'itemsPerPage' => $this->itemsPerPage,
            'location' => $this->location,
        ];
    }
}
