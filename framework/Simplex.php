<?php

namespace Framework;

use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;

class Simplex
{
    protected $urlMatcher;
    protected $controllerResolver;
    protected $argumentResolver;

    public function __construct(UrlMatcher $urlMatcher, ControllerResolver $controllerResolver, ArgumentResolver $argumentResolver)
    {
        $this->urlMatcher = $urlMatcher;
        $this->controllerResolver = $controllerResolver;
        $this->argumentResolver = $argumentResolver;
    }


    public function handle(Request $request)
    {
        $this->urlMatcher->getContext()->fromRequest($request);
        try {
            $request->attributes->add($this->urlMatcher->match($request->getPathInfo()));
            $controller = $this->controllerResolver->getController($request);
            $arguments = $this->argumentResolver->getArguments($request, $controller);

            $response = call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            $response = new Response("La page demandée n'existe pas", 404);
        } catch (Exception $e) {
            var_dump([$e->getMessage(),$e->getFile(),$e->getLine(),$e->getTrace()]);
            $response = new Response("Une erreur est survenue", 500);
        }
        return $response;
    }

}