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
class DivCeilExtension extends \Twig_Extension
{
    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'divCeil' => new \Twig_Function_Method($this, 'divCeil'),
        );
    }

    /**
     * Divides 2 numbers and returns the rounded up number.
     *
     * @access public
     * @param  int $numerator, int $denominator
     * @return int
     */
    public function divCeil($numerator, $denominator)
    {
        return ceil($numerator / $denominator);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'divCeil';
    }
}
