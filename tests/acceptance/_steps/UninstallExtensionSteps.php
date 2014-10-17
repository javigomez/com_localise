<?php
/**
 * @package     Joomla
 * @subpackage  Step Class
 * @copyright   Copyright (C) 2012 - 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace AcceptanceTester;
/**
 * Class UninstallExtensionSteps
 *
 * @package  AcceptanceTester
 *
 * @link     http://codeception.com/docs/07-AdvancedUsage#StepObjects
 *
 * @since    1.4
 */
class UninstallExtensionSteps extends \AcceptanceTester
{
	/**
	 * Function to Uninstall Extension
	 *
	 * @param   String  $extensionName  Name of the Extension
	 *
	 * @return void
	 */
	public function uninstallExtension($extensionName)
	{
		$I = $this;
		$I->amOnPage(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$URL);
		$I->click("Manage");
		$I->fillField(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$extensionSearch, $extensionName);
		$I->click(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$searchButton);
		$I->click(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$extensionNameLink);
		$name = $I->grabTextFrom(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$extensionTable);

		while (strtolower($name) != strtolower($extensionName))
		{
			$I->click(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$firstCheck);
			$I->click("Uninstall");
			$I->seeElement(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$uninstallSuccessMessage);
			$name = $I->grabTextFrom(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$extensionTable);
		}

		$I->click(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$firstCheck);
		$I->click("Uninstall");
		$I->seeElement(\joomla3\administrator\isis\extensions\ExtensionManagerPage::$uninstallComponentSuccessMessage);
	}
}
