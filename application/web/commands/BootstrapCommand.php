<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Flex\Registry;

/**
 * Class BootstrapCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class BootstrapCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        Registry::set('installCryptKey', 'bd1869bb27fe5a348db8790c841893f5e700a5d78422cfa4c86f77e41e0780dd');
    }
}