<?php
namespace ps\data\package\version; 

use ps\data\DatabaseObject; 
use ps\data\package\version\requirement\RequirementList; 
use ps\data\package\Package; 

/**
 * represents a package-version
 *
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class Version extends DatabaseObject {
	/**
	 * @see	wcf\data\DatabaseObject::$databaseTableName
	 */
	protected static $databaseTableName = 'package_version';

	/**
	 * @see	wcf\data\DatabaseObject::$databaseIndexName
	 */
	protected static $databaseTableIndexName = 'versionID';
	
	/**
	 * a list with all required packages for the version
	 * 
	 * @var array<\ps\data\package\version\requirement\Requirement>
	 */
	protected $requirements = null; 

	/**
	 * the package for the version 
	 * 
	 * @var \ps\data\package\Package 
	 */
	protected $package = null; 
	
	/**
	 * returns a list with all required packages for the version
	 * 
	 * @return array<\ps\data\package\version\requirement\Requirement>
	 */
	public function getRequirements() {
		if ($this->requirements === null) {
			$req = new RequirementList(); 
			$req->getConditionBuilder()->add('versionID = ?', array($this->getObjectID()));
			$req->readObjects(); 
			
			$this->requirements = $req->getObjects(); 
		}

		return $this->requirements;
	}
	
	/**
	 * returns the package for the version
	 * 
	 * @return \ps\data\package\Package
	 */
	public function getPackage() {
		if ($this->package === null) {
			$this->package = new Package($this->packageID);
		}
		
		return $this->package; 
	}
	
	/**
	 * returns the file-link
	 * 
	 * @return string
	 */
	public function getFileLink() {
		//@TODO: only support .tar ; support .tgz too 
		return RELATIVE_PS_DIR.Package::PACKAGE_DIR.$this->getPackage()->name.'/'.$this->getObjectID().'.tar'; 
	}
}