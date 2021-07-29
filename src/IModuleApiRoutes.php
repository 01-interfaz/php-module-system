<?php


namespace Interfaz\ModuleSystem;


interface IModuleApiRoutes
{
    function getApiRoutes() : void;
    function getApiVersion() : int;
}
