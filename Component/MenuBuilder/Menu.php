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

namespace CCDNComponent\CommonBundle\Component\MenuBuilder;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class Menu
{

    /**
     *      
	 * @access public
	 * @return array
     */
    public function buildMenu($builder)
    {
		$builder
			->arrayNode('layout')
				->arrayNode('footer')
					->arrayNode('graphics_courtesy')
						->htmlNode('graphics_courtesy_header', '<div class="footer_block"><h6>Contributions</h6>')->end()
						->unorderedListNode('sections')
							->linkNode('Contribute on Github', 'http://github.com/codeconsortium', array(
								'rel' => 'friend',
								'target' => '_blank',
							))->end()
							->linkNode('Glyphicons', 'http://glyphicons.com/glyphicons-licenses/', array(
								'rel' => 'friend',
								'target' => '_blank',
							))->end()
							->linkNode('Pc.de Icons', 'http://pc.de/', array(
								'rel' => 'friend',
								'target' => '_blank',
							))->end()
							->linkNode('FreeSmileys', 'http://www.freesmileys.org/copyright.php', array(
								'rel' => 'friend',
								'target' => '_blank',
							))->end()
						->end()
						->htmlNode('graphics_courtesy_footer', '</div>')->end()
					->end()
				->end()
			->end();	
    }

}
