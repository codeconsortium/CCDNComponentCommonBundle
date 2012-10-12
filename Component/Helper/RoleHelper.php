<?php

/*
 * This file is part of the CCDNComponent CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CommonBundle\Component\Helper;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class RoleHelper extends ContainerAware
{

	/**
	 *
	 * @access protected
	 */
	protected $container;
	
   /**
	 *
	 * @access protected
	 */
	protected $availableRoles;

   /**
	 *
	 * @access protected
	 */
	protected $availableRoleKeys;

	/**
	 *
	 * @access public
	 * @param ServiceContainer $serviceContainer
	 */	
	public function __construct($serviceContainer)
	{
		
		$this->container = $serviceContainer;
		
		if (! $this->availableRoles || count($this->availableRoles) < 1) {
			$this->availableRoles = $this->container->getParameter('security.role_hierarchy.roles');
			
			// default role is array is empty.
			if (count($this->availableRoles) < 1) {
				$this->availableRoles[] = 'ROLE_USER';
			}
		}
		
		if (! $this->availableRoleKeys || count($this->availableRoleKeys) < 1) {
			
			// Remove the associate arrays.
			$this->availableRoleKeys = array_keys($this->availableRoles);
		}
	}

	/**
	 *
	 * @access public
	 * @return Array() $availableRoles
	 */
	public function getAvailableRoles()
	{		
		return $this->availableRoles;
	}
		
	/**
	 *
	 * @access public
	 * @return Array() $availableRoles
	 */
	public function getAvailableRoleKeys()
	{		
		return $this->availableRoleKeys;
	}

	/**
	 *
	 * @access public
	 * @param $user
	 * @return Boolean
	 */
	public function hasRole($user, $role)
	{
		foreach($this->availableRoles as $aRoleKey => $aRole) {
			if ($user->hasRole($aRoleKey)) {
				if (in_array($role, $aRole) || $role == $aRoleKey) {
					return true;
				}
			}
		}
		
		return false;
	}

	/**
	 *
	 * @access public
	 * @param Array() $userRoles
	 * @return int $highestUsersRoleKey
	 */
	public function getUsersHighestRole($usersRoles)
	{
		$usersHighestRoleKey = 0;

		// Compare (A)vailable roles against (U)sers roles.		
		foreach($this->availableRoleKeys as $aRoleKey => $aRole) {
			foreach($usersRoles as $uRoleKey => $uRole) {
				if ($uRole == $aRole && $aRoleKey > $usersHighestRoleKey) {
					$usersHighestRoleKey = $aRoleKey;
					
					break; // break because once uRole == aRole we know we cannot match anything else.
				}
			}			
		}
		
		return $usersHighestRoleKey;
	}
	
	/**
	 *
	 * @access public
	 * @param Array() $userRoles
	 * @return String $role
	 */
	public function getUsersHighestRoleAsName($usersRoles)
	{
		$usersHighestRoleKey = $this->getUsersHighestRole($usersRoles);
		
		$roles = $this->availableRoleKeys;
		
		if (array_key_exists($usersHighestRoleKey, $roles)) {
			return $roles[$usersHighestRoleKey]; 			
		} else {
			return 'ROLE_USER';
		}
	}
}