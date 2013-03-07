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

namespace CCDNComponent\CommonBundle\Component\Provider\Profile;

use Symfony\Component\Security\Core\User\UserInterface;

class SimpleProfileProvider implements ProfileProviderInterface
{
	/** @var $container */
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

	/**
	 *
	 * @access public
	 * @param UserInterface $user
	 * @return Profile $profile
	 */
    public function transform(UserInterface $user = null)
    {
        $profile = new Profile();

		// Set user object.
		$profile->setUser($user);
		
		// Choose username, wether canonical or email or some other field.
        if (null !== $user) {
            $profile->setUsername($user->getUsername());
        } else {
            $profile->setUsername('Guest');
        }

		// Set avatar.
        $asset = $this->container->get('templating.helper.assets');

        $fallbackAvatar = $asset->getUrl($this->container->getParameter('ccdn_component_common.component.provider.profile.avatar_fallback'));
        $profile->setAvatarFallback($fallbackAvatar);

		// Set role badges.
        $profile->autoSetRoleBadge();

        return $profile;
    }
}
