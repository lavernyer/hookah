<?php

declare(strict_types=1);

namespace App\Bridge\Symfony\Controller\Rest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class TestController
{
    /**
     * @Route("/", methods={"GET","HEAD"}, name="test")
     */
    public function test(): JsonResponse
    {
        return new JsonResponse();
    }
}
