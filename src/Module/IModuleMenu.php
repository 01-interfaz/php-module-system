<?php


namespace Interfaz\Module;

use Interfaz\MenuSystem\Menu;

interface IModuleMenu
{
    function processMenu(string $name, Menu $menu): void;
}
