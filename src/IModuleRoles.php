<?php


namespace Interfaz\ModuleSystem;


use App\Core\Module\Permission\Role;

interface IModuleRoles
{
    /**
     * @return Role[]
     */
    function getRoles(): array;
}
