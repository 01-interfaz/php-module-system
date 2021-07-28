<?php


namespace App\Core\Module;


use App\Core\UI\Menu\MenuNav;

interface IModuleMenu
{
    function processMenu(string $name, MenuNav $menu): void;
}
