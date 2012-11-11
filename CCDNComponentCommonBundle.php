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

namespace CCDNComponent\CommonBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use CCDNComponent\CommonBundle\DependencyInjection\Compiler\MenuBuilderCompilerPass;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class CCDNComponentCommonBundle extends Bundle
{
	
	/**
	 *
	 * @access public
	 */
	public function boot()
	{
		$twig = $this->container->get('twig');	
		$twig->addGlobal('ccdn_component_common', array(
			'header' => array(
				'header_bar_links' => $this->container->getParameter('ccdn_component_common.header.header_bar_links'),
				'accont_route' => $this->container->getParameter('ccdn_component_common.header.account_route'),
				'logout_route' => $this->container->getParameter('ccdn_component_common.header.logout_route'),
				'account_route' => $this->container->getParameter('ccdn_component_common.header.account_route'),
				'profile_route' => $this->container->getParameter('ccdn_component_common.header.profile_route'),
				'logout_route' => $this->container->getParameter('ccdn_component_common.header.logout_route'),
				'registration_route' => $this->container->getParameter('ccdn_component_common.header.registration_route'),
				'login_route' => $this->container->getParameter('ccdn_component_common.header.login_route'),
			),
		));
	}
}
