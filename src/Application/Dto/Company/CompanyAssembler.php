<?php

declare(strict_types=1);

namespace App\Application\Dto\Company;

use App\Domain\Matcher\MatchedCompany;
use App\Domain\Model\Company\Agent;
use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\Company;
use App\Domain\Model\Company\Location;

final class CompanyAssembler
{
    public function toViewAskedCompanyDto(AskedCompany $askedCompany): ViewAskedCompanyDto
    {
        $dto = new ViewAskedCompanyDto();
        $dto->id = $askedCompany->getId()->toString();
        $dto->externalId = $askedCompany->getExternalId();
        $dto->jurisdiction = $askedCompany->getJurisdiction()->toString();
        $dto->name = $askedCompany->getName();

        return $dto;
    }

    public function toViewCompanyDto(Company $company): ViewCompanyDto
    {
        $dto = new ViewCompanyDto();
        $dto->id = $company->getId()->toString();
        $dto->askedCompanyId = $company->getAskedCompanyId()->toString();
        $dto->name = $company->getName();
        $dto->number = $company->getNumber();
        $dto->status = $company->getStatus();
        $dto->inactive = $company->isInactive();
        $dto->createdAt = $company->getCreatedAt();
        $dto->location = $this->toLocationDto($company->getLocation());
        $dto->agent = $this->toAgentDto($company->getAgent());

        return $dto;
    }

    public function toLocationDto(Location $location): LocationDto
    {
        $dto = new LocationDto();
        $dto->jurisdiction = $location->getJurisdiction()->toString();
        $dto->address = $location->getAddress();
        $dto->locality = $location->getLocality();
        $dto->region = $location->getRegion();
        $dto->postalCode = $location->getPostalCode();
        $dto->country = $location->getCountry();

        return $dto;
    }

    public function toAgentDto(Agent $agent): AgentDto
    {
        $dto = new AgentDto();
        $dto->name = $agent->getName();
        $dto->address = $agent->getAddress();

        return $dto;
    }

    public function toMatchedCompanyDto(MatchedCompany $matchedCompany): MatchedCompanyDto
    {
        $dto = new MatchedCompanyDto();
        $dto->id = $matchedCompany->getId();
        $dto->jurisdiction = $matchedCompany->getJurisdiction();

        return $dto;
    }
}
