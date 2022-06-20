@extends('../welcome')
@section('member')

<style>

#mainpart {
    padding-bottom: 30px;
    padding-top: 0px;
    width: 100%;
}

.profile-feature-wrapper {
    padding-bottom: 20px;
    padding-top: 66px;
    position: relative;
}

.profile-feature {
    box-shadow: none;
    background-color: hsla(0,0%,100%,.9);
    border-color: #e4e5e7 #dadbdd hsla(210,4%,80%,.8);
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    overflow: hidden;
}

.profile-feature .profile-cover {
    background-color: #fff;
    background-size: cover;
    position: relative;
    width: 100%;
}

#profile-changer_cover {
    top: 0;
}

.profile-changer {
    color: #fff;
    cursor: pointer;
    left: 0;
    padding: 10px;
    position: absolute;
    text-shadow: 0 0 4px #999;
    width: 100%;
    z-index: 9;
    opacity: 0.6;
}

.profile-changer:hover {
    opacity: 1;
}

#profile-changer_cover .p-c_wrapper {
    display: inline-block;
    padding: 4px 10px;
    background: #333;
}

.profile-feature .profile-nav {
    padding: 10px;
    position: relative;
}

.profile-nav {
    background-color: #fff;
}

.profile-feature .profile-ava-wrapper {
    bottom: 10px;
    left: 20px;
    position: absolute;
}

.profile-feature .profile-ava {
    background-color: #fff;
    border-radius: 100px;
    box-shadow: 0 0 4px #333;
    height: 150px;
    overflow: hidden;
    position: relative;
    width: 150px;
}

.profile-ava {
    border-color: #666;
    box-shadow: none;
}

#profile-changer_ava {
    bottom: 0;
    padding: 0;
    text-align: center;
    top: 70%;
    opacity: 0;
}

#profile-changer_ava:hover {
    opacity: 1;
    background: #333;
}

.profile-changer {
    color: #fff;
    cursor: pointer;
    left: 0;
    padding: 10px;
    position: absolute;
    text-shadow: 0 0 4px #999;
    width: 100%;
    z-index: 9;
}

.profile-feature .profile-cover .img-in-ratio {
    background-position: inherit;
    background-size: 100% auto;
}

.profile-feature .profile-ava img {
    display: block;
    width: 100%;
}
.profile-feature .profile-ava img, svg {
    vertical-align: middle;
}
.profile-feature .profile-ava img {
    border-style: none;
}

.profile-feature .profile-function.at-desktop {
    float: right;
    line-height: 60px;
    padding-left: 20px;
}

.button-green {
    background-color: #5cb85c;
    border-color: #4cae4c;
    color: #fff;
}

.profile-feature .profile-intro {
    color: #fff;
    padding-left: 180px;
}

.profile-feature .profile-intro_role {
    background-color: #36a189;
    border-radius: 2px;
    display: inline-block;
    font-size: 14px;
    font-weight: 700;
    padding: 2px 20px;
}

.profile-intro_name {
    color: #111;
}



</style>


<main id="mainpart" class="profile-page">
    <div class="profile-feature-wrapper">
        <div class="container">
            <div class="profile-feature">
                <div class="profile-cover">
                    <div class="fourone-ratio">
                        <div class="content img-in-ratio">
                            <img src="{{ url('/uploads/user/profile-cover.jpg') }}">
                        </div>
                    </div>
                    <div id="profile-changer_cover" class="profile-changer none block-m">
                        <div class="p-c_wrapper">
                            <i class="fas fa-camera"></i>
                            <span class="p-c_text">Yêu cầu 1100 x 300 px</span>
                        </div>
                    </div>
                    <input type="file" id="user_cover_file" style="display: none">
                    <input type="file" id="user_avatar_file" style="display: none">
                </div>
                <div class="profile-nav">
                    <div class="profile-ava-wrapper">
                        <div class="profile-ava">
                            <div id="profile-changer_ava" class="profile-changer">
                                <span class="p-c_text"><i class="fas fa-camera"></i></span>
                            </div>
                            <img src="{{ url('/uploads/user/'.$member->avatar) }}">
                        </div>
                    </div>
                    <!-- <div class="profile-function at-desktop none block-m">
                        <a href="https://ln.hako.vn/tin-nhan/moi?to=Shinokawa" class="button to-contact button-green"><i class="fas fa-paper-plane"></i> Liên hệ</a>
                    </div> -->
                    <div class="profile-intro">
                        <h3 class="profile-intro_name">
                            {{ $member->name }}
                        </h3>
                        @if($member->role == 1)
                            <span class="profile-intro_role role-mem">Admin</span>
                        @else
                            <span class="profile-intro_role role-mem">Member</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection