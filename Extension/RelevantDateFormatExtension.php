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

namespace CCDNComponent\CommonBundle\Extension;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class RelevantDateFormatExtension extends \Twig_Extension
{


	/**
	 * 
	 * @access public
	 * @return Array()
	 */
	public function getFunctions()
	{
		return array(
			'relevantDateFormat' => new \Twig_Function_Method($this, 'relevantDateFormat'),
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
	public function relevantDateFormat($date)
	{
		$now = new \DateTime('now');
		
		$interval = $date->diff($now);
		
		$diff = $interval->format('%a');
		
		if ($diff > 365)
		{
			return $date->format('Y-m-d H:i');
		}
		if ($diff > 31)
		{
			return $date->format('M d H:i');
		}
		if ($diff > 1)
		{
			return $date->format('M d H:i'); 
		}
		if ($diff == 1)
		{
			return $date->format('H:i \Y\e\s\t\e\r\d\a\y');
		}
		if ($diff == 0)
		{
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