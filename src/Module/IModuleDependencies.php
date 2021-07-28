<?php


namespace Interfaz\Module;


interface IModuleDependencies
{
    /**
     * @return string[]
     */
    function getDependencies(): array;
}
