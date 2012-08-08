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

namespace CCDNComponent\CommonBundle\Component\Pagerfanta\View;

use Pagerfanta\PagerfantaInterface;
use Pagerfanta\View\TwitterBootstrapView;
use Pagerfanta\View\ViewInterface;
use Symfony\Component\Translation\TranslatorInterface;

/**
 * This view renders the twitter bootstrap view with texts translated.
 *
 * @author Pablo Díez <pablodip@gmail.com>
 * @author Reece Fowell <reece@codeconsortium.com>
 */
class TwitterBootstrapTranslatedView implements ViewInterface
{
	
	/**
	 *
	 * @access private
	 */
    private $view;

	/**
	 *
	 * @access private
	 */
    private $translator;

    /**
     * Constructor.
     *
     * @param TwitterBootstrapView $view       A twitter bootstrap view.
     * @param TranslatorInterface  $translator A translator interface.
     */
    public function __construct(TwitterBootstrapView $view, TranslatorInterface $translator)
    {
        $this->view = $view;
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function render(PagerfantaInterface $pagerfanta, $routeGenerator, array $options = array())
    {
        if (!isset($options['prev_message'])) {
            $options['prev_message'] = '&larr; '.$this->translator->trans('previous', array(), 'pagerfanta');
        }
        if (!isset($options['next_message'])) {
            $options['next_message'] = $this->translator->trans('next', array(), 'pagerfanta').' &rarr;';
        }

        return $this->view->render($pagerfanta, $routeGenerator, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'twitter_bootstrap_translated';
    }
}
