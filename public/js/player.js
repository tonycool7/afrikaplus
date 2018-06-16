function player(args) {
    if (!(this instanceof player)) {
        return new player(args);
    }
    this.current_row = "";
    this.audioElement = document.getElementById(args.audio);
    this.audiosource = document.getElementById(args.source);
    this.playlist = args.playlist;
    this.playerImage = $('.album__image');
    this.player_title = $('.album-music__title');
    this.player_artist = $('.album-music__artist');
    this.album_item = args.table ? 'tr' : 'li';
    this.album_item_first = args.table ? 'tr:first' : 'li:first';
    this.album_item_active = args.table ? 'tr.active' : 'li.active';
    this.playBtn = args.play ? $(args.play) : $('.album-play');
    this.nextBtn = args.next ? $(args.next) : $('.album-next');
    this.prevBtn = args.prev ? $(args.prev) : $('.album-prev');
    this.title = args.title ? $(args.title) : $('.album-title');
    this.album_list = args.list ? $(args.list) : $('.album-list');
    this.repeatBtn = args.repeatBtn ? $(args.repeatBtn) : $('.album-repeat');
    this.currentLengthDiv = args.currentLengthDiv ? $(args.currentLengthDiv) : $('.current-length');
    this.bufferedLengthDiv = args.bufferedLengthDiv ? $(args.bufferedLengthDiv) : $('.loaded-length');
    var self = this;
    $(document).ready(function () {
        self.reloadPlayer(false);
    });

    this.audioElement.addEventListener('timeupdate', function () {
        self.updateBufferedLength();
        self.updateCurrentTimeLength();
        self.setTime();
    });

    this.audioElement.addEventListener('loadedmetadata', function() {
        self.setTime();
    });

    this.nextBtn.on('click', function () {
        self.next();
    });

    this.album_list.on('click', function () {
        $('.album-content').slideToggle();
    });

    this.repeatBtn.on('click', function () {
        self.repeatMusic();
    });

    this.prevBtn.on('click', function () {
        self.prev();
    });

    this.playBtn.on('click', function () {
        console.log(self.audioElement.paused);
        if (self.audioElement.paused) {
            self.play(self.current_row);
        } else {
            self.pause(self.current_row);
        }
    });

    this.audioElement.addEventListener('ended', function () {
        self.next();
    });
}

player.prototype = {
    constructor: player,

    setAndReloadPlayer: function setAndReloadPlayer(args) {
        this.audiosource.src = "/storage/music/" + args.music;
        this.playerImage.css('background-image', 'url(/storage/images/'+args.image+')');
        this.player_title.text(args.title);
        this.player_artist.text(args.artist);
        this.audioElement.load();
        if (args.play) this.play(args.row);
    },

    setTime: function(){
        $('.loading .music-item__length').html(((this.audioElement.duration - this.audioElement.currentTime)/100).toFixed(2).replace('.', ':'))
        this.playlist.find(this.album_item_active).find('.music-item__length').html(((this.audioElement.duration - this.audioElement.currentTime)/100).toFixed(2).replace('.', ':'));
    },

    reloadPlayer: function reloadPlayer(play) {
        this.playlist.find(this.album_item).removeClass('active');
        var first = this.playlist.find(this.album_item_first);
        first.addClass('active');
        var args = {
            music : first.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : first.data('img'),
            title : first.data('title'),
            artist : first.data('artist'),
            play: play,
            row: first
        };
        this.current_row = first;
        this.setAndReloadPlayer(args);
    },

    next: function next() {
        current = this.playlist.find(this.album_item_active);
        var next = current.next();
        if (next.length == 0) {
            current.removeClass('active')
                .removeClass('music-border-active')
                .removeClass('music-active-pause');
            this.reloadPlayer(true);
            return;
        }

        var args = {
            music : next.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : next.data('img'),
            title : next.data('title'),
            artist : next.data('artist'),
            play: true,
            row: current.next()
        };

        this.current_row = current.next();
        this.setActiveStyling(current,next);

        this.setAndReloadPlayer(args);
    },

    prev: function prev() {
        var current = this.playlist.find(this.album_item_active);
        var prev = current.prev();
        if (prev.length == 0) {
            current.removeClass('active')
                .removeClass('music-border-active')
                .removeClass('music-active-pause');
            this.reloadPlayer(true);
            return;
        }

        var args = {
            music : prev.data('value'),
            image : this.playlist.data('thumbnail') ? this.playlist.data('thumbnail') : prev.data('img'),
            title : prev.data('title'),
            artist : prev.data('artist'),
            play: true,
            row: current.prev()
        };
        this.current_row = current.prev();

        this.setActiveStyling(current,prev);

        this.setAndReloadPlayer(args);
    },

    setActiveStyling: function(current, nextorprev){
        if(this.album_item == "tr"){
            nextorprev.addClass('active');
            current.removeClass('active');
        }else if(this.album_item == "li"){
            nextorprev.addClass('music-border-active')
                .addClass('active')
                .addClass('music-active-pause');
            current.removeClass('music-active-pause')
                .removeClass('active')
                .removeClass('music-border-active');
        }

    },

    setAndPlay: function setAndPlay(args) {
        this.playlist.find(this.album_item).removeClass('active');
        args.row.addClass('active');
        this.current_row = args.row;
        this.audiosource.src = "/storage/music/" + args.music;
        this.playerImage.css('background-image', 'url(/storage/images/'+args.image+')');
        this.player_title.text(args.title);
        this.player_artist.text(args.artist);
        this.audioElement.load();
        if (args.play) this.play(args.row);
    },

    play: function play(el) {
        this.setPlayIcon(el);
        this.audioElement.play();
    },

    pause: function pause(el) {
        this.setPauseIcon(el);
        this.audioElement.pause();
    },

    setPauseIcon: function setPauseIcon(el) {
        var play = this.playBtn.find('i');
        $('.play-icon').removeClass('fa-pause').addClass('fa-play-circle');
        el.find('.play-icon').removeClass('fa-pause').addClass('fa-play-circle');
        play.removeClass('fa-pause');
        play.addClass('fa-play-circle');
    },

    setPlayIcon: function setPlayIcon(el) {
        var play = this.playBtn.find('i');
        $('.play-icon').removeClass('fa-pause').addClass('fa-play-circle');
        el.find('.play-icon').removeClass('fa-play-circle').addClass('fa-pause');
        play.removeClass('fa-play-circle');
        play.addClass('fa-pause');
    },

    updateCurrentTimeLength: function updateCurrentTimeLength() {
        var currentTime = this.audioElement.currentTime / this.audioElement.duration;
        this.currentLengthDiv.css('width', currentTime * 100 + "%");
    },

    updateBufferedLength: function updateBufferedLength() {
        var buffered = (this.audioElement.buffered.end(0) + this.audioElement.buffered.start(0)) / this.audioElement.duration;
        this.bufferedLengthDiv.css('width', buffered * 100 + "%");
    },

    repeatMusic: function repeatMusic() {
        this.audioElement.load();
        this.audioElement.play();
    },

    changePlaylist: function changePlaylist(playlist) {
        this.playlist = $(playlist);
        this.reloadPlayer(true);
    }
};