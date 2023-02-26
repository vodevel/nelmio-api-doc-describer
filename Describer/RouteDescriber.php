<?php

declare(strict_types=1);

namespace App\Service\ApiDoc\Describer;

use Nelmio\ApiDocBundle\RouteDescriber\RouteDescriberInterface;
use OpenApi\Annotations\OpenApi;
use ReflectionMethod;
use Symfony\Component\Routing\Route;

final class RouteDescriber implements RouteDescriberInterface
{
    public function __construct(
        private readonly ResponseBodyDescriber $responseDescriber,
        private readonly RequestBodyDescriber $requestDescriber,
    ) {
    }

    public function describe(OpenApi $api, Route $route, ReflectionMethod $reflectionMethod)
    {
        $this->requestDescriber->describe($api, $route, $reflectionMethod);
        $this->responseDescriber->describe($api, $route, $reflectionMethod);
    }
}
