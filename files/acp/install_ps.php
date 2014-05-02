<?php
/**
 * @see https://github.com/wbbaddons/Dummy-App/blob/master/files/acp/install_de_wbbaddons_dummy_app.php
 */

// remove dependencies, as they are in the package.xml for the sole reason of installing them all
$package = $this->installation->getPackage();
$sql = "DELETE FROM        wcf".WCF_N."_package_requirement
        WHERE                packageID = ?
                AND        requirement <> ?";
$statement = wcf\system\WCF::getDB()->prepareStatement($sql);
$statement->execute(array($package->packageID, 1));

// set default page title
if (!defined('PAGE_TITLE') || !PAGE_TITLE) {
        $sql = "UPDATE        wcf".WCF_N."_option
                SET        optionValue = ?
                WHERE        optionName = ?";
        $statement = WCF::getDB()->prepareStatement($sql);
        $statement->execute(array('Package-Server', 'page_title'));
        \wcf\data\option\OptionEditor::resetCache();
}