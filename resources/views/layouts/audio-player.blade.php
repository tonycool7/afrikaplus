<main class="afrika-audio" >
    <audio controls id="audio">
        <source id="audioSource" src="" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    <div class="audio-head">
        <ul class="main-controls">
            <li class="album-prev"><i class="fa fa-step-backward fa-3x"></i></li>
            <li class="album-play"><i class="fa fa-play-circle fa-3x"></i></li>
            <li class="album-next"><i class="fa fa-step-forward fa-3x"></i></li>
            <li class="album-list"><i class="fa fa-list fa-3x"></i></li>
            <li class="album-img__container">
                <span class="album__image default-bg"></span>
            </li>
            <li class="album-descr">
                <div class="album-music__title"></div>
                <div class="album-music__artist"></div>
            </li>
            <li class="album-volume"><i class="fa fa-volume-up fa-3x"></i></li>
            <li class="album-add"><i class="fa fa-plus fa-3x"></i></li>
            <li class="album-repeat"><i class="fa fa-repeat fa-3x"></i></li>
            {{--<li class="album-shuffle"><i class="fa fa-random"></i></li>--}}
        </ul>
        <div class="loading">
            <div class="current-length"></div>
            <div class="loaded-length"></div>
            <div class="total-length">
            </div>
        </div>
    </div>
    <div class="audio-body">
        <div id="album-img">
            <img class="img-thumbnail" src="">
        </div>
        <p class="album-title">Wizkid - closer</p><span class="player-time">1:25</span>

        <ol class="album-content col-md-3 col-lg-3 col-xs-6 col-sm-6"></ol>
    </div>
</main>