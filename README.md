# intervention-for-codeigniter
Image Intervention for Codeigniter

This is a Codeigniter library for using Image intervention package ( official [Documentation](http://image.intervention.io/getting_started/introduction) 
(github)[https://github.com/Intervention/image]


##Requirements :

You need to use composer installed  and your codeigniter should autoload  composer autoload.php files.
php v > 5.4

Intrvention's 
(github)[https://github.com/Intervention/image]

##Installation :

- add

        "require": {
                    "intervention/image": "dev-master",

in your composer.json file.
 
also add this if you are intending to use image cache . 
 
    "require": {
      "intervention/image": "dev-master",
      "intervention/imagecache": "dev-master",
      
once required dependencies are installed.
Copy the above file in your Codeigniter library folder.
and that's it !!!.

Note : if you are using cache : make sure vendor/Intervention/image/ImageCache/"storage/cache" folders have  0777 premissons.
Note : in Some instances  you  might have to create  in your project root  storage/cache folders with 0777 access.

##Usage :

In Any controller load library 

        $this->load->library('imageinter');
		        $path = BASEPATH.'../assets/images/xxxxxxxx';
			
			echo($this->imageinter->cache_wrapper($path, 500, null,true)->greyscale()->response());
			
example 2 

             $this->imageinter->imageChain('http://logo.png',500,null,true);
    
##Functions :

imageChain - this accepts certain params  and additionally  you can chain  any method call to it , just add response() method for out put.

image - this is basic accepts - basic  image resize with options of upscaling or having aspect ration  , just call this method with image path.

cache_warpper : this  is similar to Imagechain  but will cache the image for your , you can specify time you want the image to be chached.

##TODO :

Not the best lib , will work for now.

add other functions too.


##Licence :

##The MIT License (MIT)

Copyright (c) 2015 <kora.jayaram@gmail.com> jaiwalker

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.




    


