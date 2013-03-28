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

namespace CCDNComponent\CommonBundle\Component\Provider\User;

use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
interface UserProviderInterface
{
	/**
	 *
	 * @access public
	 * @param \Doctrine\Bundle\DoctrineBundle\Registry $doctrine
	 */
	public function __construct(Registry $doctrine);
	
	/**
	 *
	 * @access public
	 * @param string $username
	 * @return \Symfony\Component\Security\Core\User\UserInterface
	 */
	public function findOneUserByUsername($username);
	
	/**
	 *
	 * @access public
	 * @param Array() $usernames
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function findTheseUsersByUsername(array $usernames = array());
}