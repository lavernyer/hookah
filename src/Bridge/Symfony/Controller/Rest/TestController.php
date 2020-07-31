<?php

declare(strict_types=1);

namespace App\Bridge\Symfony\Controller\Rest;

use App\Application\Service\Company\GetCompany;
use App\Application\Service\Company\GetCompanyService;
use App\Application\Service\Company\ScanCompany;
use App\Application\Service\Company\ScanCompanyService;
use App\Application\Service\Company\SearchCompany;
use App\Application\Service\Company\SearchCompanyService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class TestController
{
    /**
     * @Route("/", methods={"GET","HEAD"}, name="test")
     */
    public function test(
        SearchCompanyService $searchCompanyService,
    ScanCompanyService $scanCompanyService,
    GetCompanyService $service
    ): JsonResponse
    {
        $matchedCompany = $searchCompanyService->execute(new SearchCompany('adaccd89-6cf7-4354-aa28-4cc78879421d'));
        $scanCompanyService->execute(new ScanCompany('adaccd89-6cf7-4354-aa28-4cc78879421d', $matchedCompany->id, $matchedCompany->jurisdiction));
        return new JsonResponse();
    }
}
