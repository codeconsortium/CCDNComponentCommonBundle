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
class CyclerExtension extends \Twig_Extension
{


	/**
	 * 
	 * @access private
	 */
	private static $iterator;
	
	
	/**
	 *
	 * @access public
	 */
	public function __construct()
	{
		$this::$iterator = array();
	}
	
	
	/**
	 * 
	 * @access public
	 * @return Array()
	 */
	public function getFunctions()
	{
		return array(
			'cycler' => new \Twig_Function_Method($this, 'cycler'),
		);
	}
	
	
	/**
	 * Takes an array of choices, determines which one to return based on
	 * an iterator stored in the static iterator array, using $name as a key.
	 *
	 * @access public
	 * @param Array() $choices, $name
	 * @return int
	 */
	public function cycler($choices = array(), $name)
	{
		if (isset($this::$iterator[$name]))
		{		
			$this::$iterator[$name]['iterator']++;			
		}
		else
		{
			$this::$iterator[$name]['choice_count'] = count($choices);
			$this::$iterator[$name]['iterator'] = 0;
		}
		
		if ($this::$iterator[$name]['iterator'] == $this::$iterator[$name]['choice_count']) 
		{
			$this::$iterator[$name]['iterator'] = 0;
		}
		
		return $choices[($this::$iterator[$name]['iterator'])];
	}
	
	
	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getName()
	{
		return 'cycler';
	}
	
}