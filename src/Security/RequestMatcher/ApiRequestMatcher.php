<?php

namespace App\Security\RequestMatcher;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestMatcherInterface;

class ApiRequestMatcher implements RequestMatcherInterface
{
    public function matches(Request $request): bool
    {
        return str_starts_with($request->getPathInfo(), '/api');
    }
}