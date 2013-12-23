<?php
   $uid = rand();
   $prefix = 'base-follow';

   $html = '';
   $html .= '<div class="' . $prefix . '" id="' . $prefix . $uid . '">';
   if (!empty($title)) $html .= '<h3 class="' . $prefix . '-title">' . $title . '</h3>';
   if (!empty($description)) $html .= '<p class="' . $prefix . '-description">' . $description . '</p>';
   $html .= '<div class="row"><div class="span4"><div class="alignright">';
   if (!empty($fb))  $html .= '<a class="' . $prefix . '-facebook"    title="Facebook"   href="' . $fb . '"  target="_blank"></a>';
   if (!empty($tt))  $html .= '<a class="' . $prefix . '-twitter"     title="Twitter"    href="' . $tt . '"  target="_blank"></a>';
   if (!empty($gp))  $html .= '<a class="' . $prefix . '-googleplus"  title="Google+"    href="' . $gp . '"  target="_blank"></a>';
   if (!empty($in))  $html .= '<a class="' . $prefix . '-linkedin"    title="LinkedIn"   href="' . $in . '"  target="_blank"></a>';
   if (!empty($yt))  $html .= '<a class="' . $prefix . '-youtube"     title="YouTube"    href="' . $yt . '"  target="_blank"></a>';
   if (!empty($ss))  $html .= '<a class="' . $prefix . '-slideshare"  title="SlideShare" href="' . $ss . '"  target="_blank"></a>';
   if (!empty($fr))  $html .= '<a class="' . $prefix . '-flickr"      title="Flickr"     href="' . $fr . '"  target="_blank"></a>';
   if (!empty($rss)) $html .= '<a class="' . $prefix . '-rss"         title="RSS"        href="' . $rss . '" target="_blank"></a>';
   $html .= '</div></div></div>';
   $html .= '</div>';

   echo $html;
