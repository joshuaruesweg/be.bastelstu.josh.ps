<?php
namespace ps\system;
use wcf\system\application\AbstractApplication;
use wcf\system\breadcrumb\Breadcrumb;
use wcf\system\menu\page\PageMenu;
use wcf\system\request\LinkHandler;
use wcf\system\WCF;

/**
 * Application core.
 *
 * @author          Joshua Rüsweg
 * @copyright       2014 Joshua Rüsweg
 * @package         be.bastelstu.josh.ps
 */
class JPSCore extends AbstractApplication {
        /**
         * @see        \wcf\system\application\AbstractApplication::$abbreviation
         */
        protected $abbreviation = 'ps';
        
        /**
         * @see \wcf\system\application\AbstractApplication::__run()
         */
        public function __run() {
                if (!$this->isActiveApplication()) {
                        return;
                }
                
                PageMenu::getInstance()->setActiveMenuItem('ps.header.menu.index');
                WCF::getBreadcrumbs()->add(new Breadcrumb(
                        WCF::getLanguage()->get('jps.header.menu.index'), 
                        LinkHandler::getInstance()->getLink('Index', array(
                                'application' => 'ps'
                        ))
                ));
        }
}