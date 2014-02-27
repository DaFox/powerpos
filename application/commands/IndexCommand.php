<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Flex\Auth\CryptCookie;

/**
 * Class IndexCommand
 *
 * @package PowerposApplication
 */
class IndexCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        $cookie = new CryptCookie('user_auth', $this->getApplication()->getConfig()->user_auth_secret);

        if($cookie->read()) {
            $this->redirectToPath('/app');
        }

        if($this->getRequest()->isPost()) {
            $email = $this->getRequest()->getPost('email');
            $password = $this->getRequest()->getPost('password');

            // validate
            // write cookie
            $cookie->write(array('user_id' => 1));
            $this->redirectToPath('/app');
        }
    }
}