<?php


namespace Interfaz\ModuleSystem;

use Interfaz\MenuSystem\Menu;

interface IModuleMenu
{
    function processMenu(string $name, Menu $menu): void;
}
