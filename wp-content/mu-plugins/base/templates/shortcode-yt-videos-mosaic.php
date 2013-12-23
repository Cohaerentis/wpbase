<?php

define('YTV_YOUTUBE_API',           'https://gdata.youtube.com/feeds/api');
define('YTV_CACHE_GROUP',           'ytv');
define('YTV_EXPIRE_TIME',           86400);
define('YTV_PLAYER_WIDTH',          640);
define('YTV_PLAYER_HEIGHT',         390);

define('YTV_PLAYER_AUTOPLAY',       '0');
define('YTV_PLAYER_SHOWINFO',       '0');
define('YTV_PLAYER_MODESTBRANDING', '1');
define('YTV_PLAYER_ENABLEJSAPI',    '1');
define('YTV_PLAYER_CONTROLS',       '2');
define('YTV_PLAYER_REL',            '0');
define('YTV_PLAYER_AUTOHIDE',       '1');

function yt_info_get($url) {
   $key = sha1($url);
   $json = wp_cache_get($key, YTV_CACHE_GROUP);
   if ($json === false) {
      $json = @file_get_contents($url);
      if (!empty($json)) {
         $result = wp_cache_set($key, $json, YTV_CACHE_GROUP, YTV_EXPIRE_TIME);
      }
   }

   if (empty($json)) return false;
   return json_decode($json);
}

function yt_videos_get($user, $n) {
   $url = YTV_YOUTUBE_API . "/users/{$user}/uploads?v=2&alt=json&max-results=${n}";

   $yt = yt_info_get($url);
   if (empty($yt->feed->entry)) return false;

   return $yt->feed->entry;
}

function yt_video_views_get($id) {
   // This function uses google youtube API version 2.
   // Hopefully it doesn't get deprecated...
   // Oh, and thanks to http://stackoverflow.com/questions/3331176/how-to-get-number-of-video-views-with-youtube-api
   $url = YTV_YOUTUBE_API . "/videos/{$id}?v=2&alt=json";

   $yt = yt_info_get($url);
   if (!isset($yt->{'entry'}->{'yt$statistics'}->{'viewCount'})) return false;

   return $yt->{'entry'}->{'yt$statistics'}->{'viewCount'};
}

function yt_video_id_get($url) {
   // Thanks to http://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id
   if (preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches)) {
      return $matches[0];
   }
   return '';
}

function yt_video_thumbnail_get($id) {
   // This link is one of youtube's default thumbnail URL's.
   // If this stops working, please reffer to the google youtube API.
   return "http://img.youtube.com/vi/${id}/default.jpg";
}

function yt_video_iframe_src_get($id) {
   // This link is one of youtube's default thumbnail URL's.
   // If this stops working, please reffer to the google youtube API.

   return "http://www.youtube.com/embed/{$id}";
}

$html = '';

$html .= '<div id="yt-video-mosaic" class="row"><div class="span8">';
if (!empty($ytuser)) {
   $videos = yt_videos_get($ytuser, $n);
   if (!empty($videos)) {
      foreach($videos as $video) {
         $params = explode(":", $video->id->{'$t'});
         $id = end($params);
         $url = $video->link[0]->href;
         $img = yt_video_thumbnail_get($id);
         $long_title = $video->title->{'$t'};
         $short_title = substr($long_title, 0, $title_crop);
         if (strlen($long_title) > $title_crop) $short_title .= '...';
         $nviews = yt_video_views_get($id);
         if (function_exists('pll__')) {
            $str_views = pll__('views');
         } else {
            $str_views = __('views', 'base');
         }

         $player_options = 'width="' . YTV_PLAYER_WIDTH . 'px" height="' . YTV_PLAYER_HEIGHT . 'px" frameborder="0"';
         $player_src  = yt_video_iframe_src_get($id);
         $player_src .= '?autoplay=' .       YTV_PLAYER_AUTOPLAY;
         $player_src .= '&showinfo=' .       YTV_PLAYER_SHOWINFO;
         $player_src .= '&modestbranding=' . YTV_PLAYER_MODESTBRANDING;
         $player_src .= '&enablejsapi=' .    YTV_PLAYER_ENABLEJSAPI;
         $player_src .= '&controls=' .       YTV_PLAYER_CONTROLS;
         $player_src .= '&rel=' .            YTV_PLAYER_REL;
         $player_src .= '&autohide=' .       YTV_PLAYER_AUTOHIDE;

         $html .= '<div class="yt-video">';
         $html .= '<a href="#yt-video-' . $id . '" title="' . $long_title . '" data-toggle="modal">';
         $html .= '<img src="' . $img . '" alt="' . $long_title . '">';
         $html .= '</a>';
         $html .= '<div class="yt-video-name">' . $short_title . '</div>';
         $html .= '<div class="yt-video-views">' . $nviews . ' ' . $str_views . '</div>';
         $html .= '</div>';

         $html .= '<div id="yt-video-' . $id . '" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="' . $long_title . '" aria-hidden="true">';
         $html .= '<div class="modal-header">';
         $html .= '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';
         $html .= '<span id="yt-video-modal-title">' . $long_title . '</span>';
         $html .= '</div>';
         $html .= '<div class="yt-modal-body">';

         $html .= '<iframe id="yt-modal-player-' . $id . '" type="text/html" src="' . $player_src . '" ' . $player_options . ' ></iframe>';

         $html .= '</div>';
         $html .= '</div>';


      }
   } else {
      $html .= 'No videos found';
   }
} else {
   $html .= 'User is empty (ytuser is mandatory)';
}
$html .= '</div></div>'; // #yt-video-mosaic

echo $html;
