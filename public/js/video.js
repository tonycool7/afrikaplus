function videoPlayer(args) {
    if (!(this instanceof videoPlayer)) {
        return new videoPlayer(args);
    }
    this.current_video = null;
    this.videoElement = document.getElementById(args.video);
    this.videosource = document.getElementById(args.source);
    this.videoImage = $('.thumbnail');
    this.video_title = $('.video__title');
    this.video_artist = $('.video__artist');
    this.videoVolume = $('.volume-range');
    this.video_item = 'li';
    this.mainPlayIcon = $('.video-play-icon');
    this.video_item_first = 'li:first';
    this.video_item_active = 'li.active';
    this.currentTimeBtn = $('.loaded-time');
    this.totalTimeBtn = $('.video-length');
    this.playBtn = args.play ? $(args.play) : $('.video-play');
    this.skipBtn = args.skip ? $(args.skip) : $('.skip-btn');
    this.nextBtn = args.next ? $(args.next) : $('.video-next');
    this.prevBtn = args.prev ? $(args.prev) : $('.video-prev');
    this.title = args.title ? $(args.title) : $('.video-title');
    this.video_list = args.list ? $(args.list) : $('.video-list');
    this.repeatBtn = args.repeatBtn ? $(args.repeatBtn) : $('.video-repeat');
    this.videoLengthDiv = args.currentLengthDiv ? $(args.currentLengthDiv) : $('.loading-container');
    this.currentLengthDiv = args.currentLengthDiv ? $(args.currentLengthDiv) : $('.loaded-video');
    this.bufferedLengthDiv = args.bufferedLengthDiv ? $(args.bufferedLengthDiv) : $('.buffered-video');
    let self = this;
    $(document).ready(function () {
        self.reloadvideo(false);
    });

    this.videoLengthDiv.on('click', function(e){
        self.scrub(e);
        // console.log((e.offsetX / self.videoLengthDiv[0].offsetWidth) * self.videoElement.duration);
        // self.videoElement.currentTime = (e.offsetX / self.videoLengthDiv[0].offsetWidth) * self.videoElement.duration;
    });

    this.videoElement.addEventListener('timeupdate', function () {
        self.updateBufferedLength();
        self.updateCurrentTimeLength();
        self.setTime();
    });

    this.videoElement.addEventListener('loadedmetadata', function() {
        self.totalTimeBtn.html((self.videoElement.duration/100).toFixed(2).replace('.', ':'));
        self.setTime();
    });

    this.videoElement.addEventListener('click', function() {
        self.play();
    });

    this.videoElement.addEventListener('play', function() {
        self.setPlayIcon();
    });

    this.videoElement.addEventListener('pause', function() {
        self.setPlayIcon();
    });

    this.videoVolume.on('change', function () {
        self.updateVolume();
    });

    this.nextBtn.on('click', function () {
        self.next();
    });

    this.skipBtn.on('click', function () {
        self.skip();
    });

    this.video_list.on('click', function () {
        $('.video-content').slideToggle();
    });

    this.repeatBtn.on('click', function () {
        self.repeatMusic();
    });

    this.prevBtn.on('click', function () {
        self.prev();
    });

    this.playBtn.on('click', function () {
        self.play();
    });

    this.mainPlayIcon.on('click', function () {
        self.play();
    });

    this.videoElement.addEventListener('ended', function () {
        self.next();
    });
}

videoPlayer.prototype = {
    constructor: videoPlayer,

    setAndReloadvideo: function setAndReloadvideo(args) {
        this.videosource.src = "/storage/video/" + args.music;
        this.videoImage.css('background-image', 'url(/storage/images/'+args.image+')');
        this.video_title.text(args.title);
        this.video_artist.text(args.artist);
        this.videoElement.load();
        if (args.play) this.play(args.row);
    },

    setTime: function(){
        this.currentTimeBtn.html(((this.videoElement.duration - this.videoElement.currentTime)/100).toFixed(2).replace('.', ':'));
    },

    reloadvideo: function reloadvideo(play) {
        this.playlist.find(this.video_item).removeClass('active');
        let first = this.playlist.find(this.video_item_first);
        first.addClass('active');
        let args = {
            music : first.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : first.data('img'),
            title : first.data('title'),
            artist : first.data('artist'),
            play: play,
            row: first
        };
        this.current_row = first;
        this.setAndReloadvideo(args);
    },

    next: function next() {
        current = this.playlist.find(this.video_item_active);
        let next = current.next();
        if (next.length == 0) {
            current.removeClass('active')
                .removeClass('music-border-active')
                .removeClass('music-active-pause');
            this.reloadvideo(true);
            return;
        }

        let args = {
            music : next.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : next.data('img'),
            title : next.data('title'),
            artist : next.data('artist'),
            play: true,
            row: current.next()
        };

        this.current_row = current.next();
        this.setActiveStyling(current,next);

        this.setAndReloadvideo(args);
    },

    scrub : function (e) {
        console.log(this.videoElement.currentTime);
        let pos = (e.pageX  - (this.videoLengthDiv.offsetLeft + this.videoLengthDiv.offsetParent.offsetLeft)) / this.videoLengthDiv.offsetWidth;
        this.videoElement.currentTime = pos * this.videoElement.duration;
    },

    prev: function prev() {
        let current = this.playlist.find(this.video_item_active);
        let prev = current.prev();
        if (prev.length == 0) {
            current.removeClass('active')
                .removeClass('music-border-active')
                .removeClass('music-active-pause');
            this.reloadvideo(true);
            return;
        }

        let args = {
            music : prev.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : prev.data('img'),
            title : prev.data('title'),
            artist : prev.data('artist'),
            play: true,
            row: current.prev()
        };
        this.current_row = current.prev();

        this.setActiveStyling(current,prev);

        this.setAndReloadvideo(args);
    },

    setActiveStyling: function(current, nextorprev){
        if(this.video_item == "tr"){
            nextorprev.addClass('active');
            current.removeClass('active');
        }else if(this.video_item == "li"){
            nextorprev.addClass('music-border-active')
                .addClass('active')
                .addClass('music-active-pause');
            current.removeClass('music-active-pause')
                .removeClass('active')
                .removeClass('music-border-active');
        }

    },

    skip : function () {
        console.log(this.skipBtn.data('skip'));
        this.videoElement.currentTime += parseFloat(this.skipBtn.data('skip'));
    },

    setAndPlay: function setAndPlay(args) {
        this.playlist.find(this.video_item).removeClass('active');
        args.row.addClass('active');
        this.current_row = args.row;
        this.videosource.src = "/storage/music/" + args.music;
        this.videoImage.css('background-image', 'url(/storage/images/'+args.image+')');
        this.video_title.text(args.title);
        this.video_artist.text(args.artist);
        this.videoElement.load();
        if (args.play) this.play(args.row);
    },

    play: function play() {
        this.videoElement[this.videoElement.paused ? 'play':'pause']();
    },

    setPlayIcon: function setPlayIcon() {
        console.log(this.videoElement.paused);
        if(this.videoElement.paused){
            this.playBtn.addClass('fa-play').removeClass('fa-pause');
            this.mainPlayIcon.css('opacity', '1');
        }else{
            this.playBtn.removeClass('fa-play').addClass('fa-pause');
            this.mainPlayIcon.css('opacity', 0);
        }
    },

    updateVolume : function () {
        this.videoElement.volume = this.videoVolume.val();
        console.log(this.videoElement.volume);
    },

    updateCurrentTimeLength: function updateCurrentTimeLength() {
        let currentTime = this.videoElement.currentTime / this.videoElement.duration;
        this.currentLengthDiv.css('width', currentTime * 100 + "%");
    },

    updateBufferedLength: function updateBufferedLength() {
        let buffered = (this.videoElement.buffered.end(0) + this.videoElement.buffered.start(0)) / this.videoElement.duration;
        this.bufferedLengthDiv.css('width', buffered * 100 + "%");
    },

    repeatMusic: function repeatMusic() {
        this.videoElement.load();
        this.videoElement.play();
    },

    changePlaylist: function changePlaylist(playlist) {
        this.playlist = $(playlist);
        this.reloadvideo(true);
    }
};/**
 * Created by tonycool on 6/13/2018.
 */
