<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;

/**
 * Class ErrorCommand
 *
 * @package PowerposApplication
 */
class ErrorCommand extends WebCommand {

    /**
     * @return array
     */
    public function dispatch() {
        return array(
            'exception' => $this->getThrownError()
        );
    }
}