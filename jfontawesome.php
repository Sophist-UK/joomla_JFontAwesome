<?php

/**
 * @package     Extly.Plugins
 * @subpackage  JFontAwesome - Font Awesome for Joomla
 *
 * @author      Prieco S.A. <support@extly.com>
 * @copyright   Copyright (C) 2007 - 2014 Prieco, S.A. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 * @link        http://www.extly.com http://support.extly.com
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * PlgSystemJFontAwesome class.
 *
 * @package     Extly.Plugins
 * @subpackage  System.jfontawesome
 * @since       1.0
 */
class PlgSystemJFontAwesome extends JPlugin
{
	/**
	 * onAfterRoute
	 *
	 * @return	void
	 */
	public function onAfterRoute()
	{
		if ((!$this->params->get('activateatbackend')) && (JFactory::getApplication()->isAdmin()))
		{
				return;
		}

		$value = $this->params->get('embedjfontawe');

		if ($value)
		{
			$minimified = $this->params->get('minimified');
			$version = $this->params->get('version', 4);

			$document = JFactory::getDocument();

			if ($value == 1)
			{
				if ($minimified)
				{
					$minimified = '.min';
				}
				else
				{
					$minimified = '';
				}

				$document->addStyleSheet(JUri::root() . "media/plg_JFontAwesome/font-awesome-{$version}/css/font-awesome{$minimified}.css");
			}
			elseif ($value == 2)
			{
				$document->addStyleSheet($this->params->get('jfontawecdnpath'));
			}
		}
	}
}
