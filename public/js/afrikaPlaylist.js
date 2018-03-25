function player(args) {
    if (!(this instanceof player)) {
        return new player(args);
    }
    this.audioElement = document.getElementById(args.audio);
    this.audiosource = document.getElementById(args.source);
    this.playlist = args.playlist;
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
        self.reloadPlayer();
    });

    this.audioElement.addEventListener('timeupdate', function () {
        self.updateBufferedLength();
        self.updateCurrentTimeLength();
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
            self.play();
        } else {
            self.pause();
        }
    });

    this.audioElement.addEventListener('ended', function () {
        self.next();
    });
}

player.prototype = {
    constructor: player,

    setAndReloadPlayer: function setAndReloadPlayer(music) {
        var play = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;

        this.audiosource.src = "/storage/music/" + music;
        this.title.text(music);
        this.audioElement.load();
        if (play) this.play();
    },

    reloadPlayer: function reloadPlayer() {
        var play = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : false;

        this.playlist.find(this.album_item).removeClass('active');
        var first = this.playlist.find(this.album_item_first);
        first.addClass('active');
        var music = first.data('value');
        this.pause();
        this.setAndReloadPlayer(music, play);
    },

    next: function next() {
        var current = this.playlist.find(this.album_item_active);
        var next = current.next();
        if (next.length == 0) {
            current.removeClass('active');
            this.reloadPlayer();
            return;
        }
        next.addClass('active');
        current.removeClass('active');
        var music = next.data('value');
        this.setAndReloadPlayer(music, true);
    },

    prev: function prev() {
        var current = this.playlist.find(this.album_item_active);
        var prev = current.prev();
        if (prev.length == 0) {
            current.removeClass('active');
            this.reloadPlayer();
            return;
        }
        prev.addClass('active');
        current.removeClass('active');
        var music = prev.data('value');
        this.setAndReloadPlayer(music, true);
    },

    setAndPlay: function setAndPlay(music) {
        this.audiosource.src = "/storage/music/" + music;
        this.audioElement.load();
        this.audioElement.play();
    },

    play: function play() {
        this.setPlayIcon();
        this.audioElement.play();
    },

    pause: function pause() {
        this.setPauseIcon();
        this.audioElement.pause();
    },

    setPauseIcon: function setPauseIcon() {
        var play = this.playBtn.find('i');
        play.removeClass('fa-pause');
        play.addClass('fa-play');
    },

    setPlayIcon: function setPlayIcon() {
        var play = this.playBtn.find('i');
        play.removeClass('fa-play');
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