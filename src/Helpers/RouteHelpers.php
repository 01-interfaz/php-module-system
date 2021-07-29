<?php
namespace Interfaz\ModuleSystem\Helpers;

use Interfaz\ModuleSystem\IModuleApiRoutes;

class RouteHelpers
{
    public static function getApiRoute(IModuleApiRoutes $module, string $prefix)
    {
        return "/v".$module->getApiVersion() ."/". $prefix;
    }
}