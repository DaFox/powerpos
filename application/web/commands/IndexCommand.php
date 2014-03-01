<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Powerpos\Application;

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
        $application = new Application();
        $configuration = $application->readConfiguration(realpath('spool'));

        if($configuration === false) {
            $this->redirectToPath('/app/install');
        }

//        $cookie = new CryptCookie('user_auth', $this->getApplication()->getConfig()->user_auth_secret);
//
//        if($cookie->read()) {
//            $this->redirectToPath('/app');
//        }
//
//        if($this->getRequest()->isPost()) {
//            $email = $this->getRequest()->getPost('email');
//            $password = $this->getRequest()->getPost('password');
//
//            // validate
//            // write cookie
//            $cookie->write(array('user_id' => 1));
//            $this->redirectToPath('/app');
//        }
    }
}