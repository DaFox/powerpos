<?php
namespace PowerposApplication;

use Flex\Application\Command\WebCommand;
use Powerpos\Installation;

/**
 * Class InstallCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class InstallCommand extends WebCommand {

    /**
     * @return array
     */
    public function dispatch() {
        $installation = new Installation();
        $installation = $installation->readInstallation(realpath('spool'));

        if($installation !== false) {
            $this->redirectToPath('/');
        }

        $errors = null;

        $adminUsername = null;
        $adminPassword = null;

        if($this->getRequest()->isPost()) {
            $adminUsername = $this->getRequest()->getPost('adminUsername');
            $adminPassword = $this->getRequest()->getPost('adminPassword');

            if(empty($adminUsername)) {
                $errors[] = 'Please enter Admin Username';
            }

            if(empty($adminPassword)) {
                $errors[] = 'Please enter Admin Password';
            }

            if(empty($errors)) {
                $installation = new Installation();
                $installation->saveInstallation(realpath('spool'), array(
                    'adminUsername' => $adminUsername,
                    'adminPassword' => $adminPassword
                ));

                $this->redirectToPath('/');
            }
        }

        return array(
            'adminUsername' => $adminUsername,
            'adminPassword' => $adminPassword,
            'errors' => $errors
        );
    }
}