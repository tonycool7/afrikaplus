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
                    <a class="navbar-brand" href="/">
                        <img src="/images/footer-img.png">
                    </a>
                </div>
                <div class="collapse navbar-collapse col-sm-10" id="myNavbar">
                    <div class="row">
                        <ul class="nav navbar-nav">
                            <li>
                                <form class="form search-form">
                                    <input type="text" v-model="search">
                                </form>
                            </li>
                            <li><a href="#"><i class="fa fa-bell"></i> </a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Anthony</a></li>
                            <li>
                                <a href="#" class="profile-pik-container">
                                    <span class="default-bg profile-pik" alt="avatar" :style="{ 'background-image' : 'url(/storage/avatar/'+avatar+')'}"> <i class="fa fa-caret-down profile-caret"></i></span>
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
                        <li><a href="/profile"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#"><i class="fa fa-pencil-square"></i> Events</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> Messages</a></li>
                        <li><a href="#"><i class="fa fa-picture-o"></i> Photo</a></li>
                        <li><a href="#"><i class="fa fa-map"></i> Inside Afrika</a></li>
                        <li><a href="#"><i class="fa fa-music"></i> Album</a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> Shop</a></li>
                        <li><a href="#"><i class="fa fa-music"></i> Music</a></li>
                        <li><a href="#"><i class="fa fa-video-camera"></i> Videos</a></li>
                    </ul>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-container">
                                <div class="avatar-pik default-bg" :style="{ 'background-image' : 'url(/storage/avatar/'+avatar+')'}">
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
                                <h3 class="no-margin">{{userData.username}} <span v-if="authorized" class="btn btn-custom btn-follow" title="Follow Anthony Femi - Oke">Follow</span></h3>
                                <ul class="stats-list">
                                    <li>
                                        <span>100k</span>
                                        <span>posts</span>
                                    </li>
                                    <li>
                                        <a href="/followers">
                                            <span>12</span>
                                            <span>followers</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/following">
                                            <span>12</span>
                                            <span>following</span>
                                        </a>
                                    </li>
                                </ul>
                                <p><strong>{{userData.firstname}} {{userData.lastname}}</strong> {{userData.status}}</p>
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
                                    <textarea type="text" class="form-control" id="text" v-model="text" PLACEHOLDER="Say Something.."></textarea>
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
                            </div>
                            <div class="col-sm-5">
                                <p><strong>{{userData.username}}</strong> {{viewPostData.text}}</p>
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
                authorized : !this.user.authorized,
                canEdit : this.user.authorized,
                user_id: this.user.userDetails.id,
                search : '',
                text: "",
                viewPostData : [],
                userData : this.user.userDetails,
                posts : this.user.posts,
                avatar : this.user.userDetails.image
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
                let formData = new FormData();
                formData.append('image', document.getElementById('image').files[0]);
                formData.append('text', this.text);
                formData.append('user_id', this.user_id);
                formData.append('_token', this.csrf);
                axios.post('/posts', formData).then((res) => {
                    $('#add-post').modal('hide');
                    this.fetchUserData();
                }).catch(function (error) {
                    console.log(error);
                });
            },
            viewPost(post){
                this.viewPostData = post;
                $('#view-post').modal('show');
            },
            clickAvatar(){
                $('#avatar').click();
            },
            uploadAvatar(){
                let formData = new FormData();
                formData.append('avatar', document.getElementById('avatar').files[0]);
                formData.append('_token', this.csrf);
                formData.append('user_id', this.user_id);
                axios.post('/avatar', formData).then((res) => {
                    this.fetchUserData();
                }).catch(function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
