<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title ?? "title here "}}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    
</head>
<body>
<x-nav/>
<x-post-form />

@php
    $posts = [
        [
            'id' => 1,
            'username' => 'user1',
            'userProfile' => 'assets/images/default.jfif',
            'timeAgo' => '1 hr ago',
            'caption' => 'Lorem ipsum dolor sit amet...',
            'mainImage' => 'assets/images/default.jfif',
            'thumbnails' => [
                'assets/images/default.jfif',
                'assets/images/pexels-derwin-edwards-20415864.jpg',
                'assets/images/pexels-edka-k-20308702.jpg',
                'assets/images/pexels-ákos-szűcs-20367982.jpg',
            ],
            'comments' => [
                [
                    'username' => 'Nabin',
                    'userProfile' => 'assets/images/default.jfif',
                    'text' => 'Nice picture!',
                ],
                [
                    'username' => 'ALish',
                    'userProfile' => 'assets/images/default.jfif',
                    'text' => 'Great post!',
                ],
                [
                    'username' => 'Avishek',
                    'userProfile' => 'assets/images/default.jfif',
                    'text' => 'Great post!',
                ],
                [
                    'username' => 'ALish',
                    'userProfile' => 'assets/images/default.jfif',
                    'text' => 'Great post!',
                ],
                // Add more comments as needed
            ],
            'liked' => false, // or true based on the initial like status
        ],
        // Add more posts as needed
    ];
@endphp

@foreach ($posts as $post)
    <x-post 
        :id="$post['id']" 
        :username="$post['username']" 
        :userProfile="$post['userProfile']"
        :timeAgo="$post['timeAgo']" 
        :caption="$post['caption']" 
        :mainImage="$post['mainImage']" 
        :thumbnails="$post['thumbnails']" 
        :comments="$post['comments']"
        :liked="$post['liked']">
        <x-slot name="script">
            <script>
                function changeMainImage(element, mainImageId) {
                    const mainImage = document.getElementById(mainImageId);
                    mainImage.src = element.src;
                }

                function toggleLike(button) {
                    button.classList.toggle('liked');
                    
                    // You can add an AJAX request here to update the like status in the database
                }
            </script>
        </x-slot>
    </x-post>
@endforeach

</body>

</html>