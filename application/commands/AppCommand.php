<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Flex\Auth\CryptCookie;

/**
 * Class AppCommand
 *
 * @package PowerposApplication
 */
class AppCommand extends WebCommand {

    public function init() {
        $this->getViewManager()->getLayout()->setTemplate('layouts/app.phtml');
    }

    /**
     * @return void
     */
    public function dispatch() {
        $cookie = new CryptCookie('user_auth', $this->getApplication()->getConfig()->user_auth_secret);

        if(!$cookie->read()) {
            $this->redirectToPath('/');
        }
    }
}