$(document).ready(function() {

    $(".btn-success").click(function(){
        var html = $(".parent").html();
        $(".increment").after(html);
    });

    $("body").on("click",".btn-danger",function(){
        $(this).parents(".form-group").remove();
    });

});

// jQuery('iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");
jQuery(".stop-button").click(function() {
    // changes the iframe src to prevent playback or stop the video playback in our case
    $('.youtube-iframe').each(function(index) {
        $(this).attr('src', $(this).attr('src'));
        return false;
    });

});
$(document).ready(function() {
    $('#play-mp3').on('click', function(ev) {

        $("#mp3")[0].src += "&autoplay=1";
        ev.preventDefault();

    });
});

$("#play-mp3").one(function(){
    //as noted in addendum, check for querystring exitence
    var symbol = $("#mp3")[0].src.indexOf("?") > -1 ? "&" : "?";
    //modify source to autoplay and start video
    // $("#mp3")[0].src += symbol + "autoplay=1";
});

$(document).ready(function () {
    var ownVideos = $("iframe");
    $.each(ownVideos, function (i, video) {
        var frameContent = $(video).contents().find('body').html();
        if (frameContent) {
            $(video).contents().find('body').html(frameContent.replace("autoplay", ""));
        }
    });
});
function playPrevious() {
    audioElement.pause();

    currentAudioIndex--;

    if (currentAudioIndex < 0) {
        currentAudioIndex = audios.length - 1;
    }

    console.log(currentAudioIndex);
    audioElement.src = audios[currentAudioIndex].src;

    audioElement.play();
}
var activeSong;

function play(id){
    activeSong = document.getElementById(id);
    activeSong.play();
    var percentageOfVolume = activeSong.volume / 1;
    var percentageOfVolumeMeter = document.getElementById('volumeMeter').offsetWidth * percentageOfVolume;
    document.getElementById('volumeStatus').style.width = Math.round(percentageOfVolumeSlider) + "px";
}