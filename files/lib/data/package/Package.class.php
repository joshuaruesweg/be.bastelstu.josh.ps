<?php
namespace ps\data\package; 

use ps\data\DatabaseObject; 
use ps\data\package\version\VersionList;

/**
 * represents a package for the package-server
 *
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class Package extends DatabaseObject {
	/**
	 * @see	wcf\data\DatabaseObject::$databaseTableName
	 */
	protected static $databaseTableName = 'package';

	/**
	 * @see	wcf\data\DatabaseObject::$databaseIndexName
	 */
	protected static $databaseTableIndexName = 'packageID';

	/**
	 * Cotains the user-object which executed the statement.
	 * @var	wcf\data\user\User
	 */
	protected $versions = null;

	const PACKAGE_DIR = 'packages/';
	const DEFAULT_VERSION = '0.0.0';
	
	/**
	 * Returns the user-object which executed this statement.
	 * @return	wcf\data\user\User
	 */
	public function getVersions() {
		if ($this->versions === null) {
			$versions = new VersionList(); 
			$versions->getConditionBuilder()->add('packageID = ?', array($this->getObjectID()));
			$versions->readObjects(); 
			
			$this->versions = $versions->getObjects(); 
		}

		return $this->versions;
	}
	
	public function getRecentVersion() {
		$versions = $this->getVersions(); 
		
		// there are no versions, return default-versions
		if (count($versions) < 0) {
			return self::DEFAULT_VERSION; 
		}
		$recent = array_pop($versions); 
		
		foreach ($versions AS $version) {
			if (\wcf\data\package\Package::compareVersion($version->version, $recent->version) == 1) {
				$recent = $version; 
			}
		}
		
		return $recent; 
	}
}