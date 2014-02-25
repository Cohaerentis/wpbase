<?php

include dirname(__FILE__) . '/phpqrcode/qrlib.php';

class TN_QR {
    static $baseurl = '/';      // Base URL for accesing QR images
    static $basepath = '/tmp';  // Base path on file system

    static public function encode($data) {
        $hash = sha1($data);
        $img = self::$basepath . '/' . $hash . '.png';
        $src = self::$baseurl . '/' . $hash . '.png';

        if (!file_exists($img)) {
            if (!is_dir(self::$basepath)) @mkdir(self::$basepath, 0777, true);
            QRcode::png($data, $img, 'H');
        }

        return $src;
    }
}