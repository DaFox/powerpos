<?php
namespace PowerposApplication\App;

use Flex\Application\Command\WebCommand;
use Flex\Crypt\Rijandel256Crypt;
use Flex\Registry;
use Zend\Config\Config;

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
        $errors = null;

        $crypt = new Rijandel256Crypt(Registry::get('installCryptKey'));
        $adminUsername = null;
        $adminPassword = null;

        // check if spool folder is writeable
        if(!is_writable('spool')) {
            $errors[] = 'Spool Folder ist nicht schreibbar';
        }

        if($this->getRequest()->isPost()) {
            $adminUsername = $this->getRequest()->getPost('adminUsername');
            $adminPassword = $this->getRequest()->getPost('adminPassword');

            if(empty($adminUsername)) {
                $errors[] = 'Bitte Admin Username eintragen';
            }

            if(empty($adminPassword)) {
                $errors[] = 'Bitte Admin Passwort eintragen';
            }

            if(empty($errors)) {
                $config = new Config(array(
                    'adminUsername' => $adminUsername,
                    'adminPassword' => $adminPassword
                ));

                file_put_contents('spool/installation.dat', $crypt->encrypt(serialize($config->toArray())));
            }
        }

        return array(
            'adminUsername' => $adminUsername,
            'adminPassword' => $adminPassword,
            'errors' => $errors
        );
    }
}