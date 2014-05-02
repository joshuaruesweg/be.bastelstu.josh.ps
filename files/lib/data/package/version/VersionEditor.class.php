<?php
namespace ps\data\package\version;

use wcf\data\DatabaseObjectEditor;

/**
 * Provides functions to edit versions.
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class VersionEditor extends DatabaseObjectEditor {

	/**
	 * @see	wcf\data\DatabaseObjectDecorator::$baseClass
	 */
	protected static $baseClass = 'ps\data\package\version\Version';

}
