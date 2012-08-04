<?php

/*
 * This file is part of the CCDN CommonBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNComponent\CommonBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

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

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $this->getHeaderSection($container, $config);
    }

    /**
     *
     * @access private
     * @param $container, $config
     */
    private function getHeaderSection($container, $config)
    {
        $container->setParameter('ccdn_component_common.header.registration_route', $config['header']['registration_route']);
        $container->setParameter('ccdn_component_common.header.login_route', $config['header']['login_route']);
        $container->setParameter('ccdn_component_common.header.logout_route', $config['header']['logout_route']);
        $container->setParameter('ccdn_component_common.header.account_route', $config['header']['account_route']);
        $container->setParameter('ccdn_component_common.header.profile_route', $config['header']['profile_route']);

        $container->setParameter('ccdn_component_common.header.header_bar_links', $config['header']['header_bar_links']);

    }

}
