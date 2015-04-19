# intervention-for-codeigniter
Image Intervention for Codeigniter

This is a Codeigniter library for using Image intervention package ( official [Documentation](http://image.intervention.io/getting_started/introduction) 

Requirments :

You need to use composer installed  and your codeignier should autoload  composer autoload.php files.
php v > 5.4

Installation :

- add 
''' 
     "require": {
      "intervention/image": "dev-master",
'''
 in your composer.json file.
 
 also add this if you are intending to use image cache . 
 
 "require": {
      "intervention/image": "dev-master",
      "intervention/imagecache": "dev-master",
      
      
once requried dependencies are installed.

Copy the above file in your Codeigniter library folder.

and thats it !!!.

Note : if you are using cache : make sure vendor/Intervention/image/ImageCache/"storage/cache" folders have  0777 premissons.
Note : in Some instances  you  might have to create  in your project root  storage/cache folders with 0777 access.

Usage :

In Any controller load library 

$this->load->library('imageinter');
		$path = BASEPATH.'../assets/images/xxxxxxxx';
			
			echo($this->imageinter->cache_wrapper($path, 500, null,true)->greyscale()->response());
			
example 2 

    $this->imageinter->imageChain('http://omniderm.jay.dev/assets/images/onmiderm-logo.png',500,null,true);
    
Functions :

imageChain - this accepts certain params  and additionally  you can chain  any method call to it , just add response() method for out put.

image - this is basic accepts - basic  image resize with options of upscaling or having aspect ration  , just call this method with image path.

cache_warpper : this  is simillar to Imagechain  but will chace the image for your , you can specify time you want the image to be chached.


TODO :

Not the best lib , will work for now.

add other functons too.

    


