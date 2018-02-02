<?php return array (
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'pbmedia/laravel-ffmpeg' => 
  array (
    'providers' => 
    array (
      0 => 'Pbmedia\\LaravelFFMpeg\\FFMpegServiceProvider',
    ),
    'aliases' => 
    array (
      'FFMpeg' => 'Pbmedia\\LaravelFFMpeg\\FFMpegFacade',
    ),
  ),
);