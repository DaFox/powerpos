<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;

/**
 * Class AppCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class AppCommand extends WebCommand {

    public function init() {
        $this->getViewManager()->getLayout()->setTemplate('layouts/app.phtml');
    }

    /**
     * @return void
     */
    public function dispatch() {
    }
}