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
class HasRoleExtension extends \Twig_Extension
{

    /**
     *
     * @access protected
     */
    protected $container;

	/**
	 *
	 * @access protected
	 */
	protected $roleHelper;
	
    /**
     *
 	 * @access public
 	 * @param $roleHelper
     */
    public function __construct($roleHelper)
    {
        $this->roleHelper = $roleHelper;
    }

    /**
     *
     * @access public
     * @return Array()
     */
    public function getFunctions()
    {
        return array(
            'hasRole' => new \Twig_Function_Method($this, 'hasRole'),
        );
    }

    /**
     *
     * Examines the roles of the user and returns true if the user has the role.
     *
     * @access public
     * @param $user
     * @return Int
     */
    public function hasRole($user, $role)
    {
		return $this->roleHelper->hasRole($user, $role);		
    }

    /**
     *
     * @access public
     * @return String
     */
    public function getName()
    {
        return 'hasRole';
    }

}
