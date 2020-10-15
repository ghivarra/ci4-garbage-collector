<?php namespace App\Controllers;

/**
 * CodeIgniter Manual Garbage Collector Cron
 *
 * Created with love and proud by Ghivarra Senandika Rushdie
 *
 * @package CodeIgniter 4
 *
 * @var https://facebook.com/bcvgr
 * @var https://github.com/ghivarra
 *
**/

use CodeIgniter\Controller;
use Config\App;

class Garbage extends Controller
{
    public function delete()
    {
        $pass = 'YOUR_CRON_TOKEN';

        $request = \Config\Services::request();
        $token   = $request->get('token');

        if(!isset($token) OR $token !== $pass)
        {
            exit('Nothing has been done');
        }

        $conf = new App();
        $name = $conf->sessionCookieName;
        $time = $conf->sessionExpiration;
        $path = $conf->sessionSavePath . '/';

        // cari sesi
        $sesi = glob($path . $name . '*');

        $n = 0;

        foreach($sesi as $item):

            $calc = time() - filemtime($item);

            if($calc > $time)
            {
                unlink($item);

                $n++;
            }

        endforeach;

        if($n > 0)
        {
            exit('Expired session has been deleted');
        }

        exit('No expired session');
    }
        
    //----------------------------------------------
}