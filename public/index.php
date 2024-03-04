<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Symfony\Component\ErrorHandler\Debug;
=======
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
use Symfony\Component\ErrorHandler\Debug;
>>>>>>> 6f2e479 (walaa+bundles)
=======
use Symfony\Component\ErrorHandler\Debug;
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
use Symfony\Component\ErrorHandler\Debug;
>>>>>>> 8b6d46d (Rayen)
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__).'/.env');

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6f2e479 (walaa+bundles)
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
if ($_SERVER['APP_DEBUG'] ?? ('prod' !== ($_SERVER['APP_ENV'] ?? 'dev'))) {
    umask(0000);

    Debug::enable();
}

$kernel = new Kernel($_SERVER['APP_ENV'] ?? 'dev', (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== ($_SERVER['APP_ENV'] ?? 'dev'))));
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
>>>>>>> chiheb+walaa/syrinecopie_branch
=======
>>>>>>> 6f2e479 (walaa+bundles)
=======
>>>>>>> c98b2fa (walaa+chiheb integration)
=======
>>>>>>> 8b6d46d (Rayen)
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
