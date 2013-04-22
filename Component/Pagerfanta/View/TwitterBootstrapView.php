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

namespace CCDNComponent\CommonBundle\Component\Pagerfanta\View;

use Pagerfanta\PagerfantaInterface;
use Pagerfanta\View\ViewInterface;

/**
 * TwitterBootstrapView.
 *
 * View that can be used with the pagination module
 * from the Twitter Bootstrap CSS Toolkit
 * http://twitter.github.com/bootstrap/
 *
 * @category CCDNComponent
 * @package  CommonBundle
 *
 * @author   Pablo Díez <pablodip@gmail.com>
 * @author   Jan Sorgalla <jsorgalla@gmail.com>
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNComponentCommonBundle
 *
 * @api
 */
class TwitterBootstrapView implements ViewInterface
{
    /**
     *
     * {@inheritdoc}
     */
    public function render(PagerfantaInterface $pagerfanta, $routeGenerator, array $options = array())
    {
        $options = array_merge(array(
            'proximity'           => 3,
            'prev_message'        => '&larr;',
            'prev_disabled_href'  => '',
            'next_message'        => '&rarr;',
            'next_disabled_href'  => '',
            'dots_message'        => '&hellip;',
            'dots_href'           => '',
            'css_container_class' => 'btn-group',
            'css_page_class'	  => 'btn',
            'css_prev_class'      => 'btn',
            'css_next_class'      => 'btn',
            'css_disabled_class'  => 'disabled',
            'css_dots_class'      => 'disabled',
            'css_active_class'    => 'active',
        ), $options);

        $currentPage = $pagerfanta->getCurrentPage();

        $startPage = $currentPage - $options['proximity'];
        $endPage = $currentPage + $options['proximity'];

        if ($startPage < 1) {
            $endPage = min($endPage + (1 - $startPage), $pagerfanta->getNbPages());
            $startPage = 1;
        }
        if ($endPage > $pagerfanta->getNbPages()) {
            $startPage = max($startPage - ($endPage - $pagerfanta->getNbPages()), 1);
            $endPage = $pagerfanta->getNbPages();
        }

        $pages = array();

        // previous
        $class = $options['css_prev_class'];
        $url   = $options['prev_disabled_href'];
        if (!$pagerfanta->hasPreviousPage()) {
            $class .= ' '.$options['css_disabled_class'];
        } else {
            $url = $routeGenerator($pagerfanta->getPreviousPage());
        }

        $pages[] = sprintf('<a class="%s" href="%s">%s</a>', $class, $url, $options['prev_message']);

        // first
        if ($startPage > 1) {
            $pages[] = sprintf('<a class="%s" href="%s">%s</a>', $options['css_page_class'], $routeGenerator(1), 1);
            if (3 == $startPage) {
                $pages[] = sprintf('<a class="%s" href="%s">%s</a>', $options['css_page_class'], $routeGenerator(2), 2);
            } elseif (2 != $startPage) {
                $pages[] = sprintf('<a class="%s" href="%s">%s</a>', $options['css_dots_class'], $options['dots_href'], $options['dots_message']);
            }
        }

        // pages
        for ($page = $startPage; $page <= $endPage; $page++) {
            $class = '';
            if ($page == $currentPage) {
                $class = sprintf(' class="%s %s"',  $options['css_page_class'], $options['css_active_class']);
            } else {
                $class = sprintf(' class="%s"', $options['css_page_class']);
            }

            $pages[] = sprintf('<a %s href="%s">%s</a>', $class, $routeGenerator($page), $page);
        }

        // last
        if ($pagerfanta->getNbPages() > $endPage) {
            if ($pagerfanta->getNbPages() > ($endPage + 1)) {
                if ($pagerfanta->getNbPages() > ($endPage + 2)) {
                    $pages[] = sprintf('<a class="%s %s" href="%s">%s</a>',  $options['css_page_class'], $options['css_dots_class'], $options['dots_href'], $options['dots_message']);
                } else {
                    $pages[] = sprintf('<a class="%s" href="%s">%s</a>',  $options['css_page_class'], $routeGenerator($endPage + 1), $endPage + 1);
                }
            }

            $pages[] = sprintf('<a class="%s" href="%s">%s</a>',  $options['css_page_class'], $routeGenerator($pagerfanta->getNbPages()), $pagerfanta->getNbPages());
        }

        // next
        $class = $options['css_next_class'];
        $url   = $options['next_disabled_href'];
        if (!$pagerfanta->hasNextPage()) {
            $class .= ' '.$options['css_disabled_class'];
        } else {
            $url = $routeGenerator($pagerfanta->getNextPage());
        }

        $pages[] = sprintf('<a class="%s" href="%s">%s</a>', $class, $url, $options['next_message']);

        return sprintf('<div class="%s">%s</div>', $options['css_container_class'], implode('', $pages));
    }

    /**
     *
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twitter_bootstrap';
    }
}
