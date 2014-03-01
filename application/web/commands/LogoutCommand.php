<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;

/**
 * Class LogoutCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class LogoutCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        $this->redirectToPath('/');
    }
}