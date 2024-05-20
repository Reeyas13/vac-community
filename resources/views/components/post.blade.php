@props(['id', 'username', 'userProfile', 'timeAgo', 'caption', 'mainImage', 'thumbnails', 'comments', 'liked'])

<div class="content">
    <div class="post_owner">
        <img src="{{ asset($userProfile) }}" width="60px" height="60px" alt="">
        <div>
            <p>{{ $username }}</p>
            <p>{{ $timeAgo }}</p>
        </div>
    </div>
    <div class="post_caption">
        <p>{{ $caption }}</p>
        <div class="gallery">
            <div class="main-container">
                <img src="{{ asset($mainImage) }}" alt="" id="main-image-{{ $id }}" class="main">
            </div>
            @if (!empty($thumbnails))
                <div class="thumbnails">
                    @foreach ($thumbnails as $thumbnail)
                        <img src="{{ asset($thumbnail) }}" alt="" class="sub" onclick="changeMainImage(this, 'main-image-{{ $id }}')">
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="post_interaction">
        <button class="like_button {{ $liked ? 'liked' : '' }}" onclick="toggleLike(this)">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="currentColor"/>
            </svg>
        </button>
    </div>

    <div class="comments_section">
        <div class="comments_container">
            @foreach ($comments as $comment)
                <div class="comment">
                    <img src="{{ asset($comment['userProfile']) }}" width="40px" height="40px" alt="" class="comment_profile">
                    <p><strong>{{ $comment['username'] }}:</strong> {{ $comment['text'] }}</p>
                </div>
            @endforeach
        </div>
        <textarea class="comment_input" placeholder="Add a comment..."></textarea>
    </div>
</div>
{{ $script ?? '' }}
