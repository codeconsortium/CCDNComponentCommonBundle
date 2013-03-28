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

use CCDNComponent\CommonBundle\Component\Provider\User\UserProviderInterface;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class SimpleUserProvider implements UserProviderInterface
{
	protected $entityClass = 'CCDNUser\UserBundle\Entity\User';
	
	/**
	 *
	 * @access protected
	 * @var \Doctrine\Bundle\DoctrineBundle\Registry $doctrine
	 */
	protected $doctrine;
	
	/**
	 *
	 * @access protected
	 * @var \Doctrine\ORM\EntityManager $em $em
	 */
	protected $em;
	
	/**
	 *
	 * @access public
	 * @param \Doctrine\Bundle\DoctrineBundle\Registry $doctrine
	 */
	public function __construct(Registry $doctrine)
	{
		$this->doctrine = $doctrine;
		$this->em = $doctrine->getEntityManager();
	}

	/**
	 *
	 * @access public
	 * @param int $userId
	 * @return \Symfony\Component\Security\Core\User\UserInterface
	 */
	public function findOneUserById($userId)
	{
		if (null == $userId || ! is_numeric($userId) || $userId == 0) {
			throw new \Exception('User ID "' . $userId . '" is invalid!');
		}
		
		$qb = $this->em->createQueryBuilder();
		
		$qb
			->select('u')
			->from($this->entityClass, 'u')
			->where('u.id = :userId')
			->setParameters(array(':userId' => $userId))
			->setMaxResults(1)
		;
		
		try {
			return $qb->getQuery()->getSingleResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}
		
	/**
	 *
	 * @access public
	 * @param string $username
	 * @return \Symfony\Component\Security\Core\User\UserInterface
	 */
	public function findOneUserByUsername($username)
	{
		if (null == $username || ! is_string($username) || $username == 0) {
			throw new \Exception('Username "' . $username . '" is invalid!');
		}
		
		$qb = $this->em->createQueryBuilder();
		
		$qb
			->select('u')
			->from($this->entityClass, 'u')
			->where('u.username = :username')
			->setParameters(array(':username' => $username))
			->setMaxResults(1)
		;
		
		try {
			return $qb->getQuery()->getSingleResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}
	
	/**
	 *
	 * @access public
	 * @param Array() $usernames
	 * @return \Doctrine\Common\Collections\ArrayCollection
	 */
	public function findTheseUsersByUsername(array $usernames = array())
	{
		if (null == $usernames || count($usernames) < 1) {
			throw new \Exception('Username "' . $userId . '" is invalid!');
		}
		
		$qb = $this->em->createQueryBuilder();
		
		$qb
			->select('u')
			->from($this->entityClass, 'u')
			->where($qb->expr()->in('u.username', $usernames))
		;
		
		try {
			return $qb->getQuery()->getResult();
		} catch (\Doctrine\ORM\NoResultException $e) {
			return null;
		}
	}
}