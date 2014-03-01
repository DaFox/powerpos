<?php
namespace Powerpos;

use Exception;
use Flex\Crypt\KeyGenerator\OpenSSLGenerator;
use Flex\Crypt\Rijandel256Crypt;

/**
 * Class Application
 *
 * @package Powerpos
 * @author Jan Thönneßen <jeff.tunessen@gmail.com>
 */
class Application {

    /**
     * @param string $path
     * @param array $config
     * @throws Exception
     */
    public function saveConfiguration($path, array $config) {
        if(!is_writable($path)) {
            throw new Exception("path is not writeable for configuration: {$path}");
        }

        // write file with secret
        $key = new OpenSSLGenerator();
        $key = $key->generate(64);

        if(!file_put_contents("{$path}/configuration.secret", $key)) {
            throw new Exception("unable to write configuration.secret");
        }

        // write configuration
        $crypt = new Rijandel256Crypt($key);

        if(!file_put_contents("{$path}/configuration.dat", $crypt->encrypt(serialize($config)))) {
            throw new Exception("unable to write configuration.dat");
        }
    }

    /**
     * @param string $path
     * @return array|bool
     * @throws Exception
     */
    public function readConfiguration($path) {
        if(!file_exists("{$path}/configuration.secret")) {
            throw new Exception("unable to read configuration.secret");
        }

        if(!file_exists("{$path}/configuration.dat")) {
            throw new Exception("unable to read configuration.dat");
        }

        if(!$key = file_get_contents("{$path}/configuration.secret")) {
            throw new Exception("missing configuration.secret");
        }

        if(!$encrypted = file_get_contents("{$path}/configuration.dat")) {
            throw new Exception("missing configuration.dat");
        }

        $crypt = new Rijandel256Crypt($key);
        @$decrypted = unserialize($crypt->decrypt($encrypted));

        return $decrypted;
    }
}