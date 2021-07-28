<?php


namespace Interfaz\ModuleSystem;

use Exception;
use Interfaz\MenuSystem\Menu;

class Modules
{
    private static ?Modules $instance;
    /** @var Module[] */
    private array $modules = [];

    public static function instance(): Modules
    {
        if (!isset(self::$instance)) self::$instance = new Modules();
        return self::$instance;
    }

    /**
     * @return string[]
     */
    public function getModulesName(): array
    {
        return array_keys($this->modules);
    }

    public function register(string $module_class)
    {
        /** @var Module */
        $module = new $module_class();

        if ($module instanceof IModuleDependencies) {
            foreach ($module->getDependencies() as $dependency) {
                if (!key_exists($dependency, $this->modules))
                    throw new Exception("El module $module_class require el modulo $dependency");
            }
        }

        $name = get_class($module);
        if (key_exists($name, $this->modules)) throw new Exception("El modulo $module_class ya se encuentra registrado.");
        $this->modules[$name] = $module;

        if ($module instanceof IModuleBoot) $module->boot();
    }

    public function isRegistred(string $module_class): bool
    {
        return key_exists($module_class, $this->modules);
    }

    /**
     * Retorna un array con todos los permisos
     * @return Permission[]
     * @throws Exception
     */
    public function processPermissions(): array
    {
        $permissions = [];
        foreach ($this->modules as $module) {
            try {
                if ($module instanceof IModulePermissions) $permissions = array_merge($permissions, $module->getPermissions());
                $permissions = array_merge($permissions, $module->getModules()->processPermissions());
            } catch (Exception $e) {
                throw new Exception("Error al procesar permisos del modulo " . get_class($module) . " |=====> " . $e->getMessage());
            }
        }

        return $permissions;
    }

    /**
     * Retorna un array con todos los permisos
     * @return Role[]
     * @throws Exception
     */
    public function processRoles(): array
    {
        $roles = [];
        foreach ($this->modules as $module) {
            try {
                if ($module instanceof IModuleRoles) $roles = array_merge($roles, $module->getRoles());
                $roles = array_merge($roles, $module->getModules()->processRoles());
            } catch (Exception $e) {
                throw new Exception("Error al procesar roles del modulo " . get_class($module) . " |=====> " . $e->getMessage());
            }
        }
        return $roles;
    }

    public function processMenu(string $name, Menu $menu)
    {
        foreach ($this->modules as $module) {
            try {
                if ($module instanceof IModuleMenu) $module->processMenu($name, $menu);
                $module->getModules()->processMenu($name, $menu);
            } catch (Exception $e) {
                throw new Exception("Error al procesar el menu en el modulo " . get_class($module) . " |=====> " . $e->getMessage());
            }
        }
    }

    public function processRoutes(string $type)
    {
        foreach ($this->modules as $module) {
            try {
                if ($type === "web" && $module instanceof IModuleHttpRoutes) $module->getHttpRoutes();
                if ($type === "api" && $module instanceof IModuleApiRoutes) $module->getApiRoutes();
                $module->getModules()->processRoutes($type);
            } catch (Exception $e) {
                throw new Exception("Error al procesar las rutas del modulo " . get_class($module) . " |=====> " . $e->getMessage());
            }
        }
    }
}
