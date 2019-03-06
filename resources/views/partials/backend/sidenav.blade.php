<div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
        CT
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Creative Tim
    </a>
</div>
<div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
        <li class="">
            <a href="{{ route('users.edit', Auth::user()->id) }}">
                <i class="now-ui-icons users_single-02"></i>
                <p>User Profile</p>
            </a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}">
                <i class="now-ui-icons business_bulb-63"></i>
                <p>Posts</p>
            </a>
        </li>
        <li>
            <a href="{{ route('tags.index') }}">
                <i class="now-ui-icons shopping_tag-content"></i>
                <p>Tags</p>
            </a>
        </li>
    </ul>
</div>
