<?php

use Intervention\Image\ImageManager;

/**
 *
 * @author Jaikora <kora.jayaram@gmail.com>
 *  this is an wrapper for intervention package moulded for Codeigniter usage
 */
class Imageinter_Exception extends Exception
{
}


class Imageinter
{
	var $intervention;
	var $url;
	var $final_image;
	var $cache;

	public function __construct()
	{
		if (!phpversion() > 5.4) {
			throw new Imageinter_Exception('PHP version should be grater than 5.4');
		}
		$this->ci           =& get_instance();
		$this->intervention = new ImageManager();
	}

	public function testingCache()
	{
		return $this->intervention->cache(function ($image) {
			$image->make('xxxxxx_logo.png')->resize(300, 100)->greyscale();
		}, 10, true);
	}

	private function final_image()
	{
		return $this->intervention->make($this->url);
	}

	private function make()
	{
		if (!empty($this->cache)) {
			$this->final_image = $this->cache->make($this->url);
		} else {
			$this->final_image = $this->intervention->make($this->url);
		}
	}

	# this is broken as we  have to some home pass - build into cache closer
	public function cache_wrapper($url, $width = null, $height = null, $aspect = false, $upsizing = false, $cache_time = 10)
	{
		return $this->intervention->cache(function ($image) use ($url, $width, $height, $aspect, $upsizing) {
			$this->cache = $image;
			$this->imageChain($url, $width, $height, $aspect, $upsizing);
		}, $cache_time, true);
	}

	private function resize($width, $height, $aspect = false, $upsizing = false)
	{
		//Normal Image Resizing
		if (!empty($height) && !empty($height) && empty($aspect)) {
			$this->final_image = $this->final_image->resize($width, $height);
		}

		// resize the image to a width of 300 and constrain aspect ratio (auto height)
		if ($aspect) {
			$this->final_image = $this->final_image->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
			});
		}

		// prevent possible upsizing
		if ($upsizing) {
			$this->final_image = $this->final_image->resize($width, $height, function ($constraint) {
				$constraint->aspectRatio();
				$constraint->upsize(); // Prevent Possible Upsizing
			});
		}

	}

	public function imageChain($url, $width = null, $height = null, $aspect = false, $upsizing = false)
	{

		# attaching the url or Image path
		if (!$url) {
			Throw new Imageinter_Exception ('You Need to provide url first');
		}
		$this->url = $url;

		# calling make function
		$this->make();

		# With and Height along with aspect = false ( default) upsizing = false( default)
		$this->resize($width, $height, $aspect, $upsizing);

		return $this->final_image; // just missing response - hence  you can chain what ever possible
	}


	public function image($url, $width = null, $height = null, $aspect = false, $upsizing = false)
	{
		$image = $this->imageChain($url, $width, $height, $aspect, $upsizing);

		return $image->response();
	}
}