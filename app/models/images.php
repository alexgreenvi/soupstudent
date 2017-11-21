<?php
class Images{
    private static $image = null;
    private static $image_type = null;

    public static function load($filename) {
        $image_info = getimagesize($filename);
        static::$image_type = $image_info[2];

        if( static::$image_type == IMAGETYPE_JPEG ) {
            static::$image = imagecreatefromjpeg($filename);
        } elseif( static::$image_type == IMAGETYPE_GIF ) {
            static::$image = imagecreatefromgif($filename);
        } elseif( static::$image_type == IMAGETYPE_PNG ) {
            static::$image = imagecreatefrompng($filename);
        }
    }
    public static function save($filename, $image_type=IMAGETYPE_JPEG, $compression=100, $permissions=null) {
        $filename = $_SERVER['DOCUMENT_ROOT'].'/'.$filename;

        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg(static::$image,$filename,$compression);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif(static::$image,$filename);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng(static::$image,$filename);
        }
        if( $permissions != null) {
            chmod($filename,$permissions);
        }
    }
    public static function output($image_type=IMAGETYPE_JPEG) {
        if( $image_type == IMAGETYPE_JPEG ) {
            imagejpeg(static::$image);
        } elseif( $image_type == IMAGETYPE_GIF ) {
            imagegif(static::$image);
        } elseif( $image_type == IMAGETYPE_PNG ) {
            imagepng(static::$image);
        }
    }
    public static function getWidth() {
        return imagesx(static::$image);
    }
    public static function getHeight() {
        return imagesy(static::$image);
    }
    public static function resizeToHeight($height) {
        $ratio = $height / static::getHeight();
        $width = static::getWidth() * $ratio;
        static::resize($width,$height);
    }
    public static function resizeToWidth($width) {
        $ratio = $width / static::getWidth();
        $height = static::getheight() * $ratio;
        static::resize($width,$height);
    }
    public static function resizeToWH($width,$height) {
        $resizeWidth = $width;
        $resizeHeight = $height;
        $trimWidth = $width;
        $trimHeight= $height;

        $ratio = $resizeWidth/$resizeHeight;
        $src_ratio= static::getWidth()/static::getHeight();
        if ($ratio>$src_ratio) $resizeHeight = floor($resizeWidth/$src_ratio);
        else $resizeWidth = floor($resizeHeight*$src_ratio);

        $dest_img = imagecreatetruecolor($resizeWidth, $resizeHeight);
        $white = imagecolorallocate($dest_img, 255, 255, 255);
        imagefill($dest_img, 1, 1, $white);
        imagecopyresampled($dest_img, static::$image, 0, 0, 0, 0, $resizeWidth, $resizeHeight, static::getWidth(), static::getHeight());


        $new_image = imagecreatetruecolor($trimWidth, $trimHeight);
        $bgc = imagecolorallocate($new_image, 255, 255, 255);
        imagefilledrectangle($new_image, 0, 0, $trimWidth, $trimHeight, $bgc);

        $x = round(($resizeWidth-$trimWidth)/2);
        $y = round(($resizeHeight-$trimHeight)/2);
        imagecopyresampled($new_image, $dest_img, 0, 0, $x, $y, $trimWidth, $trimHeight, $trimWidth, $trimHeight);

        static::$image = $new_image;
    }
    public static function resize($width,$height) {
        $new_image = imagecreatetruecolor($width, $height);
        $bgc = imagecolorallocate($new_image, 255, 255, 255);
        imagefilledrectangle($new_image, 0, 0, $width, $width, $bgc);

        imagecopyresampled($new_image, static::$image, 0, 0, 0, 0, $width, $height, static::getWidth(), static::getHeight());
        static::$image = $new_image;
    }
}