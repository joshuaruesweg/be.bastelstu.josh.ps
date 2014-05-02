<?php
namespace ps\data;

abstract class DatabaseObject extends \wcf\data\DatabaseObject {
	
	/**
	 * @see	wcf\data\IStorableObject::getDatabaseTableName()
	 */
	public static function getDatabaseTableName() {
		return 'ps'.WCF_N.'_'.static::$databaseTableName;
	}
}
