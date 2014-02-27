<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Flex\Auth\CryptCookie;

/**
 * Class LogoutCommand
 *
 * @package PowerposApplication
 */
class LogoutCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        $cookie = new CryptCookie('user_auth', $this->getApplication()->getConfig()->user_auth_secret);
        $cookie->clear();

        $this->redirectToPath('/');
    }
}