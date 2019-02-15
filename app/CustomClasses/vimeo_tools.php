<?php

namespace App\CustomClasses;

use Illuminate\Http\Request;
use Vimeo\Exceptions\VimeoUploadException;
use Vimeo\Laravel\Facades\Vimeo;
use Ixudra\Curl\Facades\Curl;
use Log;

class vimeo_tools
{   
    private $oembed_endpoint;

    public function __construct()
    {
        $this->oembed_endpoint = 'http://vimeo.com/api/oembed';
    }
    /**
    * Gets the video ID from a vimeo URL
    * @param string $videoPath
    * @return string $videoID
    */
    public static function Get_Vimeo_ID($item)
    {
        $videoID = str_replace('https://vimeo.com/','',$item);
        return $videoID;
    }
    /**
    * Takes a video file, uploads it to Vimeo and returns the URL
    * We need to check a bunch of settings and then attempt the upload. We should return the URL of the video
    * @param string $attachment (Path to the video being uploaded)
    * @param CourseItem $item
    * @return string $vimeoPath
    */
    
    public static function Upload_Video($attachment,$item)
    {
        $result = Vimeo::connection('main')->upload(public_path($attachment),[
            'name' => $item->name,
            'description' => $item->desc
        ]);

        $result = str_replace('/videos','https://vimeo.com',$result);
        return $result;
    }

   
    /**
    * Takes the old Vimeo URL as well as the new and replaces the existing video
    * @param string $attachement (Path to the video being uploaded)
    * @param CourseItem $item
    * @param string $old_itemPath
    */
    public static function vimeo_delete($item)
    {
        Vimeo::connection('main')->request('/videos/'.vimeo_tools::Get_Vimeo_ID($item) , array(
        ),'DELETE');
    }

    /**
    * Takes the old Vimeo URL as well as the new and replaces the existing video
    * @param string $attachement (Path to the video being uploaded)
    * @param CourseItem $item
    * @param string $old_itemPath
    */
    public static function vimeo_edit($attachment,$item,$old_itemPath)
    {        
        vimeo_tools::vimeo_delete($item);
        $result = vimeo_tools::Upload_Video($attachment,$item);
        return $result;
    }
    
    public static function parse_for_urls_single($item)
    {        
        if($item[0]->course_item_types_id == 1)
        {
              $item->embed = '<video controls><source src="'.url($item[0]->path).'"></video>';          
        }
        return $item;
    }

    /**
    * Takes a json list of course items and parses them to look for vimeo urls
    */
    public static function parse_for_urls($items)
    {
        $new_items = [];        
        foreach($items as $item)
        {   if($item->course_item_types_id == 1)
            {            
                $item_path_string = public_path().'/'.$item->path;                
                if(!file_exists($item_path_string))
                {
                    $item->embed = vimeo_tools::Get_Vimeo_Embed($item);
                }
                else{                    
                    $item->embed = '<video controls><source src="'.url($item->path).'"></video>';
                }                            
                
            }        
            $new_items[] = $item;        
        }

        return $new_items;
    }

    /** 
    * Takes the Vimeo URL and returns Embed code.
    * @param CourseItem $item
    * @return string $embedCode
    */

    public static function Get_Vimeo_Thumbnail($item)
    {        
        if(!$item->path) return false;

        $data = json_decode(file_get_contents($oembed_endpoint.'.json?url='.rawurlencode($item->path)));

        if(!$data) return false;

        return $data->thumbnail_url;
    }

    public static function Get_Vimeo_Embed($item)
    {
        $oembed_endpoint = 'http://vimeo.com/api/oembed';
        $video_path = $item->path;
        
        $json_url = $oembed_endpoint . '.json?url='.rawurlencode($video_path);        
        $response = Curl::to($json_url)->get();        
        $html_embed = json_decode($response);

        if(!is_null($html_embed))
            return $html_embed->html;
        else
            return null;
        
    }


}
