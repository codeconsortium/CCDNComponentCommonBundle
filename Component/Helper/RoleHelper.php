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
	 * @access public
	 * @param ServiceContainer $serviceContainer
	 */	
	public function __construct($serviceContainer)
	{
		
		$this->container = $serviceContainer;
	}
	
	/**
	 *
	 * @access public
	 * @return Array() $availableRoles
	 */
	public function getAvailableRoles()
	{
		if (! $this->availableRoles || count($this->availableRoles) < 1) {
			$roles = $this->container->getParameter('security.role_hierarchy.roles');		
			
			// Remove the associate arrays.
			$this->availableRoles = array_keys($roles);
		}
		
		return $this->availableRoles;
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
		foreach($this->getAvailableRoles() as $aRoleKey => $aRole) {
			foreach($usersRoles as $uRoleKey => $uRole) {
				if ($uRole == $aRole && $aRoleKey > $usersHighestRoleKey) {
					$usersHighestRoleKey = $aRoleKey;
					
					break;
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
		
		$roles = $this->getAvailableRoles();
		
		return $roles[$usersHighestRoleKey]; 
	}
}