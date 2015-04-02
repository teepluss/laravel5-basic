<?php namespace App\Models\Traits;

trait Acl {

    /**
     * Check user permission.
     *
     * @param  array  $permissions
     * @return boolean
     */
    public function can(array $permissions = array())
    {
        if ($permissions)
        {
            return (bool) $this->checkPermission($permissions);
        }

        return false;
    }

    /**
     * Check user in group.
     *
     * @param  array  $groups
     * @return boolean
     */
    public function inGroup(array $groups = array())
    {
        $groups = array_map('strtolower', $groups);

        $havingGroups = $this->getGroups();

        return (bool) count(array_intersect($havingGroups, $groups));
    }

    /**
     * Get user group.
     *
     * @return array
     */
    public function getGroups()
    {
        return $this->groups->fetch('name')->toArray();
    }

    /**
     * Get user merge permission.
     *
     * @return array
     */
    public function getPermissions()
    {
        $havingPermissions = [];

        foreach ($this->groups as $group)
        {
            $havingPermissions = $havingPermissions + $group->permissions;
        }

        return $havingPermissions;
    }

    /**
     * Check user permission.
     *
     * @param  array  $permissions
     * @return interger
     */
    protected function checkPermission(array $permissions)
    {
        $havingPermissions = $this->getPermissions();

        $havingPermissions = array_filter($havingPermissions);

        return count(array_intersect_key($havingPermissions, array_flip($permissions)));
    }

}