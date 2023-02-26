<?php

declare(strict_types=1);

namespace App\Service\ApiDoc\Describer;

final class ClassInfo
{
    public function __construct(
        public string $class,
        public array $props,
    ) {
    }
}
