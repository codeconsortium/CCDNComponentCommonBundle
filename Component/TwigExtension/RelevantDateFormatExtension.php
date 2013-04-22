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
class RelevantDateFormatExtension extends \Twig_Extension
{
    /**
     *
     * @access public
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'relevantDateFormat' => new \Twig_Function_Method($this, 'relevantDateFormat'),
        );
    }

    /**
     *
     * Provides fuzzy timestamps.
     *
     * @access public
     * @param $date
     * @return int
     */
    public function relevantDateFormat($date)
    {
        $now = new \DateTime('now');

        $interval = $date->diff($now);

        $diffDays = $interval->format('%a');
        $diffHours = ($diffDays  < 1) ? $interval->format('%h') : $diffDays * 24;
        $diffMins = ($diffDays < 1) ? $interval->format('%i') : $diffHours * 60;

        // return $date->format('Y-m-d H:i');

        //
        // Number of minutes
        //
        if ($diffMins < 1) {
            return 'less then a minute ago';
        }
        if ($diffMins < 59) {
            return $diffMins . ' minutes ago';
        }

        //
        // Number of hours
        //
        if ($diffHours < 1) {
            return '1 hour ago';
        }
        if ($diffHours < 24) {
            return $diffHours . ' hours ago';
        }

        //
        // Number of days
        //
        //if ($diff > 365)
        if ($now->format('Y') > $date->format('Y')) {
            return $date->format('Y-m-d H:i');
        }
        if ($diffDays > 31) {
            return $date->format('M d H:i');
        }
        if ($diffDays > 1) {
            return $date->format('M d H:i');
        }
        if ($diffDays == 1) {
            return $date->format('H:i \Y\e\s\t\e\r\d\a\y');
        }
        if ($diffDays == 0) {
            return $date->format('H:i \T\o\d\a\y');
        }

        return $date->format('Y-m-d H:i');
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'relevantDateFormat';
    }
}
