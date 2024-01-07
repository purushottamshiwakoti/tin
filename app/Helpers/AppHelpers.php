<?php
/**
 * Created by PhpStorm.
 * User: nbin
 * Date: 7/9/18
 * Time: 2:25 PM
 */

use function Clue\StreamFilter\fun;
use function foo\func;
use Illuminate\Support\Str;


if (! function_exists('public_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function public_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}

if (! function_exists('random_password')) {
    /**
     * @param int $length
     * @return bool|string
     */
    function random_password( $length = 8 ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()=+";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
}

if (!function_exists('menu')) {
    function menu($menuName, $type = null, array $options = [])
    {
        return \App\Data\Models\Menu::display($menuName, $type, $options);
    }
}

if (!function_exists('setting')) {
    function setting($key,$default = null)
    {
        return settings()->get($key)??$default;
    }
}


if(!function_exists('stringType')){
    function stringType($content){
        if (preg_match('/(\.jpg|\.png|\.bmp)$/', $content)) {
            return "image";
// check if there is youtube.com in string
        } elseif (strpos($content, "youtube.com") !== false) {
            return "youtube";
// check if there is vimeo.com in string
        } elseif (strpos($content, "vimeo.com") !== false) {
            return "vimeo";
        } else {
            return "text";
        }
    }
}

if(!function_exists('isImage')){
    function isImage($content)
    {
        return stringType($content)=='image';
    }
}

if(!function_exists('append_currency'))
{
    function append_currency($price)
    {
        return '$ '.$price.' AUD';
    }
};

if(!function_exists('addon_value'))
{
    function addon_value($addOns,$key)
    {
        return config('constants.'.$key.'.'.$addOns->where('title',$key)->pluck('key')->first());
    }
}

if(!function_exists('pages_parallax'))
{
    function pages_parallax()
    {
//        return '?w=1366&h=450&fit=crop';
//        return '?w=1366&h=400';
    }
}

if(!function_exists('availability_icon')){
  function availability_icon($status)
  {
      $s = strtolower($status);
      if(in_array($s,['no','booked']))
      {
          return 'booked';
      }elseif (in_array($s,['guaranteed','available']))
      {
          return 'available';
      }else{
          return 'limited';
      }


  }
}

function snake_to_camel($field)
{
    $relation = lcfirst(ucwords(str_replace('_','',$field)));
}

function mce_image($file, $default = '')
{
    if (!empty($file)) {
        return \Illuminate\Support\Facades\Storage::disk('public')->url($file);
    }

    return $default;
}

function can_show_flight_offer($trip)
{
    $checkables = ['short-break','day-tour'];
    $slug =$trip->tripable_type=='region'?$trip->tripable->activity->slug:$trip->tripable->slug;
    return !in_array($slug,$checkables);

}

if(!function_exists('str_slug')){
    function str_slug($name){
        return Str::slug($name);
    }
}

if(!function_exists('makeDepartureArchives')){
    function makeDepartureArchives($dateArray) {
        $newDate = array();
        foreach($dateArray as $date)
        {

            $newDate[] = $date->start_date->format('F Y');

        }
        $newDate = array_unique($newDate);
        $archives = [];
        foreach ($newDate as $d)
        {
            $archives[] = ['title'=>$d,'slug'=>str_replace(' ','-',$d)];
        }
        return $archives;
    }
}

if(!function_exists('readDuration')){
Str::macro('readDuration', function(...$text) {
    $totalWords = str_word_count(implode(" ", $text));
    $minutesToRead = round($totalWords / 200);

    return (int)max(1, $minutesToRead);
});

// echo Str::readDuration($post->text). ' min read';
}