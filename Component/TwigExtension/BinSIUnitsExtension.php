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

namespace CCDNComponent\CommonBundle\Component\TwigExtension;

/**
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
class BinSIUnitsExtension extends \Twig_Extension
{
    /**
     *
     * @access protected
     */
    protected $container;

    /**
     *
      * @access public
      * @param $container
     */
    public function __construct($units)
    {
        $this->units = $units;
    }

    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'binSIUnits' => new \Twig_Function_Method($this, 'binSIUnits'),
        );
    }

    /**
     * returns the requested file size in an appropriate SI Unit format.
     *
     * @access public
     * @param $size
     * @return string
     */
    public function binSIUnits($size)
    {
        return $this->units->formatToSIUnit($size, null, true);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'binSIUnits';
    }
}
