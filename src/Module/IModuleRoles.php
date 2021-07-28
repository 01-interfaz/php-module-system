<?php


namespace Interfaz\Module;


use App\Core\Module\Permission\Role;

interface IModuleRoles
{
    /**
     * @return Role[]
     */
    function getRoles(): array;
}
