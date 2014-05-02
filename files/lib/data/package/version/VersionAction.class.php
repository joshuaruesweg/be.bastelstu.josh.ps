<?php
namespace ps\data\package\version; 

use wcf\data\AbstractDatabaseObjectAction;

/**
 * Provides functions to handle versions.
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class VersionAction extends AbstractDatabaseObjectAction {

	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::$className
	 */
	protected $className = 'ps\data\package\version\VersionEditor';

	/**
	 * @see \wcf\data\AbstractDatabaseObjectAction::$permissionDelete
	 */
	protected $permissionsDelete = array('admin.ps.canManagePackages');
	
	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::validateCreate()
	 */
	public function validateCreate() {
		$this->readString('packageID', true, 'data');
		$this->readString('version', true, 'data');
		$this->readInteger('date', true, 'data');
	}
	
	/**
	 * @see \wcf\data\AbstractDatabaseObjectAction::delete()
	 */
	public function delete() {
		parent::delete();
		
		// after delete versions on the database try to delete files
		foreach ($this->objects as $object) {
			if (file_exists($object->getFileLink())) @unlink($object->getFileLink());
		}
	}
}
