<?php


namespace Interfaz\Module;


use App\Core\Module\Permission\Permission;

interface IModulePermissions
{
    /**
     * @return Permission[]
     */
    function getPermissions(): array;
}
