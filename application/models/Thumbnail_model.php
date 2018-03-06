<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class thumbnail_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		define('THUMBNAIL_IMAGE_MAX_WIDTH', 676);
		define('THUMBNAIL_IMAGE_MAX_HEIGHT', 460);
	}


	public function generate_image_thumbnail($source_image_path, $thumbnail_image_path)
	{
		list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
		switch ($source_image_type) {
			case IMAGETYPE_GIF:
				$source_gd_image = imagecreatefromgif($source_image_path);
				break;
			case IMAGETYPE_JPEG:
				$source_gd_image = imagecreatefromjpeg($source_image_path);
				break;
			case IMAGETYPE_PNG:
				$source_gd_image = imagecreatefrompng($source_image_path);
            break;
		}
		if ($source_gd_image === false) {
			return false;
		}
		$source_aspect_ratio = $source_image_width / $source_image_height;
		$thumbnail_aspect_ratio = THUMBNAIL_IMAGE_MAX_WIDTH / THUMBNAIL_IMAGE_MAX_HEIGHT;
		if ($source_image_width <= THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= THUMBNAIL_IMAGE_MAX_HEIGHT) {
			$thumbnail_image_width = $source_image_width;
			$thumbnail_image_height = $source_image_height;
		} elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
			$thumbnail_image_width = (int) (THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
			$thumbnail_image_height = THUMBNAIL_IMAGE_MAX_HEIGHT;
		} else {
			$thumbnail_image_width = THUMBNAIL_IMAGE_MAX_WIDTH;
			$thumbnail_image_height = (int) (THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
		}
		$thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
		imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
	
	
	
		$img = imagecreatetruecolor(THUMBNAIL_IMAGE_MAX_WIDTH,THUMBNAIL_IMAGE_MAX_HEIGHT);
		imagesavealpha($img, true);
		$color = imagecolorallocatealpha($img, 0, 0, 0, 127);
		imagefill($img, 0, 0, $color);
		imagecopy($img, $thumbnail_gd_image, (imagesx($img)/2)-(imagesx($thumbnail_gd_image)/2), (imagesy($img)/2)-(imagesy($thumbnail_gd_image)/2), 0, 0, imagesx($thumbnail_gd_image), imagesy($thumbnail_gd_image));
		imagepng($img, $thumbnail_image_path);
		imagedestroy($source_gd_image);
		imagedestroy($thumbnail_gd_image);
		imagedestroy($img);
		return true;
}
}
?>