<?php
namespace ps\data\package\version\requirement; 

use wcf\data\AbstractDatabaseObjectAction;

/**
 * Provides functions to handle requirements.
 * 
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class RequirementAction extends AbstractDatabaseObjectAction {

	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::$className
	 */
	protected $className = 'ps\data\package\version\requirement\RequirementEditor';

	/**
	 * @see	wcf\data\AbstractDatabaseObjectAction::validateCreate()
	 */
	public function validateCreate() {
		$this->readString('packageID', true, 'data');
		$this->readString('version', true, 'data');
		$this->readInteger('versionID', true, 'data');
	}
}
