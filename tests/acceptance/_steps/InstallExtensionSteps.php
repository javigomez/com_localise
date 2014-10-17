<?php
/**
 * @package     Joomla
 * @subpackage  Step Class
 * @copyright   Copyright (C) 2012 - 2014 All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace AcceptanceTester;

/**
 * Class InstallExtensionSteps
 *
 * @package  AcceptanceTester
 *
 * @link     http://codeception.com/docs/07-AdvancedUsage#StepObjects
 *
 * @since    1.4
 */
class InstallExtensionSteps extends \AcceptanceTester
{
	/**
	 * Function to Install RedShop1, inside Joomla 3
	 *
	 * @return void
	 */
	public function installExtension()
	{
		$I = $this;
		$this->acceptanceTester = $I;
		$I->amOnPage(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$URL);
		$config = $I->getConfig();
		$I->click('Install from Directory');
		$I->fillField(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$extensionDirectoryPath, $config['folder']);
		$I->click(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$installButton);
		$I->waitForElement(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$installSuccessMessage, 60);
		$I->seeElement(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$installSuccessMessage);
	}
}
