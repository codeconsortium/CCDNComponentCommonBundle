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

namespace CCDNComponent\CommonBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class CCDNComponentCommonExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'ccdn_component_common';
    }

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $this->getServicesSection($container, $config);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $this->getHeaderSection($container, $config);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
	private function getServicesSection($container, $config)
	{
        $container->setParameter('ccdn_component_common.component.provider.user.class', $config['service']['provider']['user_provider']['class']);
		
        $container->setParameter('ccdn_component_common.component.provider.profile.class', $config['service']['provider']['profile_provider']['class']);
        $container->setParameter('ccdn_component_common.component.provider.profile.avatar_fallback', $config['service']['provider']['profile_provider']['fallback_avatar']);
    }
	
    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getHeaderSection($container, $config)
    {
        $container->setParameter('ccdn_component_common.header.brand.route', $config['header']['brand']['route']);
	    $container->setParameter('ccdn_component_common.header.brand.label', $config['header']['brand']['label']);
    }
}
