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
                                    <input type="text" @change="searchFriends($event)" placeholder="Find friends">
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

        <div class="profile-container">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="left-side-menu">
                        <li><a href="/profile" title="Go to Profile Page"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="/user_events"><i class="fa fa-pencil-square"></i> Events</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Messages</a></li>
                        <li><a href="#"><i class="fa fa-picture-o"></i> Photo</a></li>
                        <li><a href="#"><i class="fa fa-map"></i> Inside Afrika</a></li>
                        <li><a href="#"><i class="fa fa-music"></i> Album</a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> Shop</a></li>
                        <li><a href="/playlist"><i class="fa fa-music"></i> Music</a></li>
                        <li><a href="#"><i class="fa fa-video-camera"></i> Videos</a></li>
                    </ul>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-container">
                                <div class="avatar-pik default-bg" :style="{ 'background-image' : 'url(/storage/avatar/'+avatar+')'}">
                                    <img src="/images/loader.gif" class="loader" v-if="avatarLoader" height="80px" width="auto">
                                    <form method="post">
                                        <input type="file" id="avatar" style="display: none" @change="uploadAvatar()" class="form-control">
                                    </form>
                                    <a class="btn btn-block btn-edit" href="" v-if="canEdit" @click.prevent="clickAvatar()">Edit</a>
                                </div>
                                <br/>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="users-info">
                                <h3 class="no-margin">{{(event) ? event.title : userData.username}} <span v-if="authorized" class="btn btn-custom btn-follow" title="" >Follow</span><a :href="'/profile/'+this.user.userDetails.id+'/edit'" v-else class="btn btn-default" title="" >Edit <i class="fa fa-support"></i></a></h3>
                                <ul class="stats-list row">
                                    <li class="col-4">
                                        <div>
                                            <span>100k</span>
                                            <span>posts</span>
                                        </div>
                                    </li>
                                    <li class="col-4">
                                        <div>
                                            <a href="/followers">
                                                <span>12</span>
                                                <span>followers</span>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="col-4">
                                        <div>
                                            <a href="/following">
                                                <span>12</span>
                                                <span>following</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                <p><strong>{{(event) ? event.title : userData.firstname}} {{(event) ? event.title : userData.lasttname}}</strong> {{userData.status}}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="divider"/>
                </div>
            </div>
        </div>
        <div class="profile-container">
            <div class="row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-10">
                    <div class="posts-container row">
                        <div class="col-md-12">
                            <span v-if="canEdit" class="add-post" title="Add post">
                                <i class="fa fa-plus-square-o" data-toggle="modal" data-target="#add-post"></i>
                            </span>
                        </div>
                        <img src="/images/loader.gif" title="Just a momment" class="loader" v-if="postsLoader" height="100px" width="auto">
                        <div class="col-sm-4" v-for="post in posts">
                            <a href="#" title="View Post" @click.prevent="viewPost(post)" class="posts" :style="{'background-image': 'url(/storage/posts/'+post.image+')'}">
                                <span class="posts-icons-container">
                                    <i class="fa fa-heart"></i>
                                    <i class="fa fa-comment"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popup for adding posts-->
        <div class="modal fade" id="add-post" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Post</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" @submit.prevent="addPost()">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="text">Text:</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" id="text" v-model="text" PLACEHOLDER="Say Something.." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="image">Upload Image:</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-follow btn-custom">Add Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Popup for viewing post-->
        <div class="modal fade" id="view-post" role="dialog">
            <div class="modal-dialog view-post-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Post</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="post-img" :style="{'background-image' : 'url(/storage/posts/'+viewPostData.image+')'}">

                                </div>
                                <i class="fa fa-heart fa-post" @click="likePost(viewPostData.id)"></i> {{this.likesTotal}}
                                <i class="fa fa-comment fa-post"></i>{{commentsTotal}}
                                <form class="form form-horizontal" @submit.prevent="addComment()">
                                    <textarea v-model="comment" class="form-control post-comment" autocomplete="off" autocorrect="off" placeholder="Add Comment..."></textarea>
                                    <br/>
                                    <input type="submit" class="btn btn-black">
                                </form>
                            </div>
                            <div class="col-sm-5">
                                <p><strong>{{userData.username}}</strong> {{viewPostData.text}}</p>
                                <h4 class="comment-heading">Comments</h4>
                                <hr class="comment-hr"/>
                                <div class="comments-container">
                                    <p v-for="comment in comments">
                                        <strong>{{comment.username}}</strong> {{comment.comment}}
                                    </p>
                                </div>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return ({
                event : this.user.event,
                non_user : (this.user.authUser == null) ? true : false,
                authorized : !this.user.authorized,
                canEdit : this.user.authorized,
                user_id: this.user.userDetails.id,
                authUser: this.user.authUser,
                text: "",
                comment : "",
                logout : false,
                comments: [],
                commentsTotal : '',
                likesTotal: '',
                viewPostData : [],
                userData : this.user.userDetails,
                posts : this.user.posts,
                authavatar : (this.user.authUser != null) ? this.user.authUser.image : "",
                avatar : this.user.userDetails.image,
                avatarLoader : false,
                postsLoader : false,
            })
        },
        props : ['csrf', 'user'],
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
            addPost(){
                this.postsLoader = true;
                $('#add-post').modal('hide');
                let formData = new FormData();
                formData.append('image', document.getElementById('image').files[0]);
                formData.append('text', this.text);
                formData.append('user_id', this.user_id);
                formData.append('_token', this.csrf);
                axios.post('/posts', formData).then((res) => {
                    this.fetchUserData();
                    this.postsLoader = false;
                }).catch(function (error) {
                    console.log(error);
                });
            },

            viewPost(post){
                this.viewPostData = post;
                this.fetchLikes(post.id);
                this.fetchComments(post.id);
                $('#view-post').modal('show');
            },

            likePost(post_id){
                if(this.authUser != null) {
                    let formData = new FormData();
                    formData.append('post_id', post_id);
                    formData.append('user_id', this.user_id);
                    formData.append('_token', this.csrf);
                    axios.post('/likes', formData).then((res) => {
                        this.likesTotal = res.data.likes;
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },

            fetchLikes(post_id){
                axios.get('/likes/' + post_id).then((res) => {
                    this.likesTotal = res.data.total;
                }).catch((err) => console.error(err));
            },

            fetchComments(id){
                axios.get('/posts/' + id).then((res) => {
                     this.comments = res.data.comments;
                    this.commentsTotal = this.comments.length;
                }).catch((err) => console.error(err));
            },

            addComment(){
                if(this.authUser != null){
                    let formData = new FormData();
                    formData.append('comment', this.comment);
                    formData.append('user_id', this.authUser.id);
                    formData.append('post_id', this.viewPostData.id);
                    formData.append('_token', this.csrf);
                    axios.post('/comments', formData).then((res) => {
                        this.fetchComments(this.viewPostData.id);
                        this.comment = "";
                    }).catch(function (error) {
                        console.log(error);
                    });
                }else{
                    alert("Only registered users can comment on posts, pls register")
                }

            },

            toggleLogout(){
              this.logout = !this.logout;
            },
            clickAvatar(){
                $('#avatar').click();
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
