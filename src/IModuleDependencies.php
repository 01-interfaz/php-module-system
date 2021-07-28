<?php


namespace Interfaz\ModuleSystem;


interface IModuleDependencies
{
    /**
     * @return string[]
     */
    function getDependencies(): array;
}
