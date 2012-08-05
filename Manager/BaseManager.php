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

namespace CCDNComponent\CommonBundle\Manager;

use Symfony\Component\DependencyInjection\ContainerAware;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class BaseManager extends ContainerAware
{

    protected $doctrine;

    protected $entityManager;

    protected $container;

    public function __construct($doctrine, $container)
    {
        $this->doctrine = $doctrine;
        $this->entityManager = $doctrine->getEntityManager();

        $this->container = $container;
    }

    public function persist($persist)
    {
        $this->entityManager->persist($persist);

        return $this;
    }

    public function remove($remove)
    {
        $this->entityManager->remove($remove);

        return $this;
    }

    public function flushNow()
    {
        $this->entityManager->flush();

        return $this;
    }

    public function refresh($entity)
    {
        $this->entityManager->refresh($entity);

        return $this;
    }

}
