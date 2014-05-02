<?php
namespace ps\data\package;

use ps\data\package\Package; 
use wcf\data\AbstractDatabaseObjectAction;
use wcf\system\exception\UserInputException; 

/**
 * Provides functions to handle package.
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class PackageAction extends AbstractDatabaseObjectAction {

	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::$className
	 */
	protected $className = 'ps\data\package\PackageEditor';

	protected $permissionsDelete = array('admin.ps.canManagePackages'); 
	
	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::validateCreate()
	 */
	public function validateCreate() {
		$this->readString('packageID', true, 'data');
		$this->readString('packagename', false, 'data');
		$this->readString('packagedescription', false, 'data');
		$this->readBoolean('isApplication', false, 'data'); 
		$this->readString('author', false, 'data');
		$this->readString('authorurl', false, 'data');
		
		$package = new Package($this->parameters['data']['packageID']);
		
		if ($package->getObjectID() !== 0) {
			// a package like this already exists
			throw new UserInputException('packageID already exists');
		}
	}
	
	public function delete() {
		parent::delete();
		
		foreach ($this->objects as $object) {
			if (file_exists(RELATIVE_PS_DIR.Package::PACKAGE_DIR.$object->name.'/')) {
				@unlink(RELATIVE_JPS_DIR.Package::PACKAGE_DIR.$object->name.'/');
			}
		}
	}
}
