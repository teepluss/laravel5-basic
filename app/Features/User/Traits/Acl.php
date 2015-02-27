<?php namespace App\Features\User\Traits;

trait Acl {

    public function can(array $permissions = [])
    {
        if ($permissions)
        {
            return (bool) $this->checkPermission($permissions);
        }

        return false;
    }

    public function inGroup(array $groups = [])
    {
        $groups = array_map('strtolower', $groups);

        $havingGroups = $this->getGroups();

        return (bool) count(array_intersect($havingGroups, $groups));
    }

    public function canAccessRoute($route)
    {
        // Wating to implement.
    }

    public function getGroups()
    {
        return $this->groups->fetch('name')->toArray();
    }

    public function getPermissions()
    {
        $havingPermissions = [];

        foreach ($this->groups as $group)
        {
            $havingPermissions = $havingPermissions + $group->permissions;
        }

        return $havingPermissions;
    }

    protected function checkPermission(array $permissions)
    {
        $havingPermissions = $this->getPermissions();

        $havingPermissions = array_filter($havingPermissions);

        return count(array_intersect_key($havingPermissions, array_flip($permissions)));
    }

}