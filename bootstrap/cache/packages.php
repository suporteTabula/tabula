<?php return array (
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'vimeo/laravel' => 
  array (
    'providers' => 
    array (
      0 => 'Vimeo\\Laravel\\VimeoServiceProvider',
    ),
    'aliases' => 
    array (
      'Vimeo' => 'Vimeo\\Laravel\\Facades\\Vimeo',
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
  'ixudra/curl' => 
  array (
    'providers' => 
    array (
      0 => 'Ixudra\\Curl\\CurlServiceProvider',
    ),
    'aliases' => 
    array (
      'Curl' => 'Ixudra\\Curl\\Facades\\Curl',
    ),
  ),
);