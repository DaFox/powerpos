<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;

/**
 * Class ErrorCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
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