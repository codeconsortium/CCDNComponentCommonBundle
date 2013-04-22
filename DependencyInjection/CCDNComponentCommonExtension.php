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
 * @category CCDNComponent
 * @package  CommonBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNComponentCommonBundle
 *
 */
class CCDNComponentCommonExtension extends Extension
{
    /**
     *
     * @access public
     * @return string
     */
    public function getAlias()
    {
        return 'ccdn_component_common';
    }

    /**
     *
     * @access public
     * @param array                                                   $config
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        // Class file namespaces.
        $this
            ->getComponentSection($config, $container)
        ;

        // Configuration stuff.
        $this
            ->getServicesSection($config, $container)
            ->getHeaderSection($config, $container)
        ;

        // Load Service definitions.
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     *
     * @access private
     * @param  array                                                                        $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder                      $container
     * @return \CCDNComponent\CommonBundle\DependencyInjection\CCDNComponentCommonExtension
     */
    private function getComponentSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_component_common.component.helper.role.class', $config['component']['helper']['role']['class']);
        $container->setParameter('ccdn_component_common.component.helper.bin_si_units.class', $config['component']['helper']['bin_si_units']['class']);
        $container->setParameter('ccdn_component_common.component.pagerfanta.view.bootstrap.class', $config['component']['pagerfanta']['view']['bootstrap']['class']);
        $container->setParameter('ccdn_component_common.component.pagerfanta.view.bootstrap_translated.class', $config['component']['pagerfanta']['view']['bootstrap_translated']['class']);

        $container->setParameter('ccdn_component_common.component.twig_extension.bin_si_units.class', $config['component']['twig_extension']['bin_si_units']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.cycler.class', $config['component']['twig_extension']['cycler']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.div_ceil.class', $config['component']['twig_extension']['div_ceil']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.trunc_dot.class', $config['component']['twig_extension']['trunc_dot']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.relevant_date_format.class', $config['component']['twig_extension']['relevant_date_format']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.alert_key.class', $config['component']['twig_extension']['alert_key']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.user_role.class', $config['component']['twig_extension']['user_role']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.has_role.class', $config['component']['twig_extension']['has_role']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.abbr_number.class', $config['component']['twig_extension']['abbr_number']['class']);
        $container->setParameter('ccdn_component_common.component.twig_extension.create_profile.class', $config['component']['twig_extension']['create_profile']['class']);

        return $this;
    }

    /**
     *
     * @access private
     * @param  array                                                                        $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder                      $container
     * @return \CCDNComponent\CommonBundle\DependencyInjection\CCDNComponentCommonExtension
     */
    private function getServicesSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_component_common.component.provider.profile.class', $config['service']['provider']['profile_provider']['class']);
        $container->setParameter('ccdn_component_common.component.provider.profile.avatar_fallback', $config['service']['provider']['profile_provider']['fallback_avatar']);

        return $this;
    }

    /**
     *
     * @access private
     * @param  array                                                                        $config
     * @param  \Symfony\Component\DependencyInjection\ContainerBuilder                      $container
     * @return \CCDNComponent\CommonBundle\DependencyInjection\CCDNComponentCommonExtension
     */
    private function getHeaderSection(array $config, ContainerBuilder $container)
    {
        $container->setParameter('ccdn_component_common.header.brand.route', $config['header']['brand']['route']);
        $container->setParameter('ccdn_component_common.header.brand.label', $config['header']['brand']['label']);

        return $this;
    }
}
