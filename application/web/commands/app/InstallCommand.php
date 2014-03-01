<?php
namespace PowerposApplication\App;

use Flex\Application\Command\WebCommand;
use Powerpos\Application;

/**
 * Class InstallCommand
 *
 * @package PowerposApplication
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class InstallCommand extends WebCommand {

    /**
     * @return void
     */
    public function dispatch() {
        $application = new Application();
        $configuration = $application->readConfiguration(realpath('spool'));

        if($configuration !== false) {
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
                $application = new Application();
                $application->saveConfiguration(realpath('spool'), array(
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