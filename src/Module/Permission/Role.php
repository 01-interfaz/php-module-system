<?php


namespace Interfaz\Module\Permission;


class Role
{
    private string $name;
    private array $permissions;

    /**
     * Role constructor.
     * @param string $name
     * @param Permission[] $permissions
     */
    public function __construct(string $name, array $permissions)
    {
        $this->name = $name;
        $this->permissions = $permissions;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Permission[]
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @return string[]
     */
    public function getPermissionsNames(): array
    {
        $names = [];
        foreach ($this->permissions as $permission) $names[] = $permission->getName();
        return $names;
    }


}
