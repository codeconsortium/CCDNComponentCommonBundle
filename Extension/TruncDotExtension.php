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
class TruncDotExtension extends \Twig_Extension
{

    /**
     *
     * @access public
     * @return Array()
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
     * @param $numerator, $denominator
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
