<?php
namespace ps\data\package\version\requirement;

use wcf\data\DatabaseObjectEditor;

/**
 * Provides functions to requirements statements.
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class RequirementEditor extends DatabaseObjectEditor {

	/**
	 * @see	wcf\data\DatabaseObjectDecorator::$baseClass
	 */
	protected static $baseClass = 'ps\data\package\version\requirement\Requirement';

}
