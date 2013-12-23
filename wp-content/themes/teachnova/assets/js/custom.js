/* Author:

*/

$.noConflict();
jQuery(document).ready(function($) {
   $('#yt-video-mosaic .modal-header button.close').click(function() {
      var $this = $(this);
      var $parent = $this.closest('.modal');
      $parent.find('iframe').each(function() {
         this.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      });
   });

   $('.mosaic-item').mouseover(function(e){
      var $this = $(this);
      $this.find('.hide').stop().fadeTo(300, 1.0);
      e.preventDefault();
   });

   $('.mosaic-item').mouseout(function(e){
      var $this = $(this);
      $this.find('.hide').stop().fadeTo(300, 0);
      e.preventDefault();
   });
});

