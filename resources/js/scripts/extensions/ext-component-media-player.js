$(function () {
  'use strict';

  const players = Array.from(document.querySelectorAll("audio[id^=my-music-]")).map(p => new Plyr(p));

});
