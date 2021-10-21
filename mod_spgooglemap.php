<?php
/**
 * @package     mod_spgooglemap
 * 
 * @author      SymphonyTheme <info@symphonytheme.com>
 * @copyright   Copyright (C) 2021 SymphonyTheme. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link        www.symphonytheme.com
 */

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

require ModuleHelper::getLayoutPath('mod_spgooglemap', $params->get('layout', 'default'));
