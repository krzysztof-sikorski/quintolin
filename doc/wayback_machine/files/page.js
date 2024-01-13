var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

/*global $, window, document*/

(function () {
  "use strict";

  $("form.confirmable").submit(function (ev) {
    if (!window.confirm('Are you sure?')) {
      ev.preventDefault();
    }
  });

}());


}
/*
     FILE ARCHIVED ON 19:47:26 May 31, 2019 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 23:07:02 Jan 13, 2024.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 62.065
  exclusion.robots: 0.083
  exclusion.robots.policy: 0.072
  cdx.remote: 0.063
  esindex: 0.01
  LoadShardBlock: 28.274 (3)
  PetaboxLoader3.datanode: 89.389 (5)
  load_resource: 210.121 (2)
  PetaboxLoader3.resolve: 117.265 (2)
*/