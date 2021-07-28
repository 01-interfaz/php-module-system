<?php


namespace Interfaz\ModuleSystem;


class Module
{
    protected Modules $modules;

    public function __construct()
    {
        $this->modules = new Modules();
    }

    public function getModules(): Modules
    {
        return $this->modules;
    }
}
