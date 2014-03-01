<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Powerpos\Installation;

/**
 * Class IndexCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class IndexCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        $installation = new Installation();
        $installation = $installation->readInstallation(realpath('spool'));

        if($installation === false) {
            $this->redirectToPath('/install');
        }
    }
}