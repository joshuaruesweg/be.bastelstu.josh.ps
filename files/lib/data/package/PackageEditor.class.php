<?php
namespace ps\data\package;

use wcf\data\DatabaseObjectEditor;

/**
 * Provides functions to edit packages
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class PackageEditor extends DatabaseObjectEditor {

	/**
	 * @see	wcf\data\DatabaseObjectDecorator::$baseClass
	 */
	protected static $baseClass = 'ps\data\package\Package';

}
