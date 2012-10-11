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

namespace CCDNComponent\CommonBundle\Extension;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class AlertKeyExtension extends \Twig_Extension
{

    /**
     *
     * @access protected
     */
    protected $translator;

    /**
     *
 	 * @access public
 	 * @param $container
     */
    public function __construct($translator)
    {
		$this->translator = $translator;
    }

    /**
     *
     * @access public
     * @return Array()
     */
    public function getFunctions()
    {
        return array(
            'alert_key' => new \Twig_Function_Method($this, 'alertKey'),
        );
    }

    /**
     *
     * @access public
	 * @param $str
	 * @return String
     */
    public function alertKey($str)
    {
        $key = explode('_', $str);

        switch ($key[0]) {
            case 'notice':
                $selector = 'ccdn_component_common.flash.notice';
                break;
            case 'success':
                $selector = 'ccdn_component_common.flash.success';
                break;
            case 'warning':
                $selector = 'ccdn_component_common.flash.warning';
                break;
            case 'error':
                $selector = 'ccdn_component_common.flash.error';
                break;
            default:
                $selector = 'ccdn_component_common.flash.warning';
                break;
        }

        return $this->translator->trans($selector, array(), 'CCDNComponentCommonBundle');
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'alertKey';
    }

}
