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
class UserRoleExtension extends \Twig_Extension
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
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'userRole' => new \Twig_Function_Method($this, 'userRole'),
        );
    }

    /**
     *
     * Examines the roles of the user and returns the users highest role as a string so it can be used next to usernames for emblems etc.
     *
     * @access public
     * @param $user
     * @return int
     */
    public function userRole($user)
    {

        $role = $this->roleHelper->getUsersHighestRoleAsName($user->getRoles());

        $roleNoPrefix = str_replace('ROLE_', '', $role);
        $roleUnslugged = str_replace('_', '', $roleNoPrefix);

        return ucfirst(strtolower($roleUnslugged));
    }

    /**
     *
     * @access public
     * @return string
     */
    public function getName()
    {
        return 'userRole';
    }
}
