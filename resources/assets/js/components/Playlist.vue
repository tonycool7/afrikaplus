<template>
    <div>
        <nav class="navbar navbar-inverse">
            <div class="profile-container">
                <div class="row">
                    <div class="navbar-header col-sm-2">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/" title="Go to Afrika+ welcome page">
                            <img src="/images/footer-img.png">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse col-sm-10" id="myNavbar">
                        <div class="row">
                            <ul class="nav navbar-nav">
                                <li>
                                    <form class="form search-form">
                                        <input type="text" v-model="search" placeholder="Find friends">
                                    </form>
                                </li>
                                <li><a href="#"><i class="fa fa-bell"></i> </a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">{{(authUser != null) ? authUser.firstname : ""}}</a></li>
                                <li v-if="non_user"><a href="/login">Login</a></li>
                                <li v-if="non_user"><a v-if="non_user" href="/register">Register</a></li>
                                <li v-else>
                                    <a href="#" class="profile-pik-container dropdown">
                                    <span class="default-bg profile-pik" @click="toggleLogout()" alt="avatar" :style="{ 'background-image' : 'url(/storage/avatar/'+authavatar+')'}">
                                        <i class="fa fa-caret-down profile-caret"></i>
                                        <div v-if="logout" class="profile-setting">
                                            <form action="/logout" method="post" class="logout-form">
                                                <input type="hidden" name="_token" :value="csrf">
                                                <input type="submit" class="btn btn-block btn-default" value="logout">
                                            </form>

                                            <form action="/user" method="post" class="logout-form">
                                                <input type="hidden" name="_token" :value="csrf">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="submit" class="btn btn-block btn-default" value="Delete Profile">
                                            </form>
                                        </div>

                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        data(){
            return ({
                non_user : (this.user.authUser == null) ? true : false,
                authorized : !this.user.authorized,
                canEdit : this.user.authorized,
                user_id: this.user.userDetails.id,
                logout : false,
                search : '',
                authUser: this.user.authUser,
                userData : this.user.userDetails,
                authavatar : (this.user.authUser != null) ? this.user.authUser.image : "",
                avatar : this.user.userDetails.image,
                avatarLoader : false,
            })
        },
        props : ['csrf', 'user', 'playlist'],
        mounted() {
            console.log('Component mounted.')
        },
        created : function () {
            console.log('');
        },
        methods : {
            fetchUserData(){
                axios.get('/fetch_user/' + this.user.userDetails.username).then((res) => {
                    this.posts = res.data.user.posts;
                    this.avatar = res.data.user.userDetails.image;
                }).catch((err) => console.error(err));
            },
            clickAvatar(){
                $('#avatar').click();
            },
            toggleLogout(){
                this.logout = !this.logout;
            },
            uploadAvatar(){
                this.avatarLoader = true;
                let formData = new FormData();
                formData.append('avatar', document.getElementById('avatar').files[0]);
                formData.append('_token', this.csrf);
                formData.append('user_id', this.user_id);
                axios.post('/avatar', formData).then((res) => {
                    this.fetchUserData();
                    this.avatarLoader = false;
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
