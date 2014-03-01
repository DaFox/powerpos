<?php
namespace PowerposApplication\App;

use Flex\Application\Command\WebCommand;
use Flex\Auth\CryptCookie;

/**
 * Class RunCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class RunCommand extends WebCommand {

    public function init() {
        $this->getViewManager()->getLayout()->setTemplate('layouts/app.phtml');
    }

    /**
     * @return void
     */
    public function dispatch() {
//        $cookie = new CryptCookie('user_auth', $this->getApplication()->getConfig()->user_auth_secret);
//
//        if(!$cookie->read()) {
//            $this->redirectToPath('/');
//        }
    }
}