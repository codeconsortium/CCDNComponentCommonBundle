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
class TruncDotExtension extends \Twig_Extension
{
    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'truncDot' => new \Twig_Function_Method($this, 'truncDot'),
        );
    }

    /**
     *
     * Truncates string if longer than needed and appends '...' to signify shorthand, otherwise returns original string.
     *
     * @access public
     * @param  int $numerator, int $denominator
     * @return int
     */
    public function truncDot($text, $length)
    {
        return ((strlen($text) > $length) ? (substr($text, 0, $length) . '...') : $text);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'truncDot';
    }
}
