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
class AbbrNumberExtension extends \Twig_Extension
{
    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'abbr_number' => new \Twig_Function_Method($this, 'abbrNumber'),
        );
    }

    /**
     *
     * Converts numbers to an abbreviated form, i.e; 1,000 = 1k etc
     *
     * @access public
     * @param  int    $number
     * @return string
     */
    public function abbrNumber($number)
    {
        $postfix = array(
            'B' => 1000000000,
            'M' => 1000000,
            ''  => 1
        );

        foreach ($postfix as $p => $div) {
            if ($number >= $div) {
                $number = abs(floor(($number / $div)*10.0)/10.0) . $p;

                break;
            }
        }

        return trim($number);
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'abbr_number';
    }
}
