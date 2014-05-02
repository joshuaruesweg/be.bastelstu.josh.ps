<?php
namespace ps\data\package\version\requirement; 

use ps\data\DatabaseObject; 

/**
 * represents a package-requirement
 *
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class Requirement extends DatabaseObject {
	/**
	 * @see	wcf\data\DatabaseObject::$databaseTableName
	 */
	protected static $databaseTableName = 'package_version_requirement';

	/**
	 * @see	wcf\data\DatabaseObject::$databaseIndexName
	 */
	protected static $databaseTableIndexName = 'requirementID';
}