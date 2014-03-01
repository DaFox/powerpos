<?php
namespace Powerpos;

use Exception;
use Flex\Crypt\KeyGenerator\OpenSSLGenerator;
use Flex\Crypt\Rijandel256Crypt;

/**
 * Class Installation
 *
 * @package Powerpos
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class Installation {

    /**
     * @param string $path
     * @param array $config
     * @throws Exception
     */
    public function saveInstallation($path, array $config) {
        if(!is_writable($path)) {
            throw new Exception("path is not writeable for installation: {$path}");
        }

        // write file with secret
        $key = new OpenSSLGenerator();
        $key = $key->generate(64);

        if(!file_put_contents("{$path}/installation.secret", $key)) {
            throw new Exception("unable to write installation.secret");
        }

        // write installation
        $crypt = new Rijandel256Crypt($key);

        if(!file_put_contents("{$path}/installation.dat", $crypt->encrypt(serialize($config)))) {
            throw new Exception("unable to write installation.dat");
        }
    }

    /**
     * @param string $path
     * @return array|bool
     */
    public function readInstallation($path) {
        if(!file_exists("{$path}/installation.secret")) {
            return false;
        }

        if(!file_exists("{$path}/installation.dat")) {
            return false;
        }

        if(!$key = file_get_contents("{$path}/installation.secret")) {
            return false;
        }

        if(!$encrypted = file_get_contents("{$path}/installation.dat")) {
            return false;
        }

        $crypt = new Rijandel256Crypt($key);
        @$decrypted = unserialize($crypt->decrypt($encrypted));

        return $decrypted;
    }
}