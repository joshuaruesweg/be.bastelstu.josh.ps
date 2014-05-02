<?php
namespace ps\data\package\version;

use wcf\data\DatabaseObjectList;

/**
 * provides a version-list
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class VersionList extends DatabaseObjectList {

	/**
	 * @see	wcf\data\DatabaseObjectList::$className
	 */
	public $className = 'ps\data\package\version\Version';

	/**
	 * @see	wcf\data\DatabaseObjectList::$sqlOrderBy
	 */
	public $sqlOrderBy = "package_version.versionID DESC";

}