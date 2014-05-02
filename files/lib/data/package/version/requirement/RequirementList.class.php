<?php
namespace ps\data\package\version\requirement;

use wcf\data\DatabaseObjectList;

/**
 * provides a requirement-list
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class RequirementList extends DatabaseObjectList {

	/**
	 * @see	wcf\data\DatabaseObjectList::$className
	 */
	public $className = 'ps\data\package\version\requirement\Requirement';
}