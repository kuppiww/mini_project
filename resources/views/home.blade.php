@extends('layouts.app')
@section('title', 'Home')
@push('style')
<style>

</style>
@endpush

@section('content')
<div class="content">
    <div class="main-content">
        <div class="logo-container">
            <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo" width="50">
        </div>

        <div class="button-container">
            <button class="btn btn-custom">For You</button>
            <button class="btn btn-custom">Following</button>
        </div>
    </div>

    <div class="recommendations">
        <h2>Siapa yang harus diikuti</h2>
        <small>Orang yang mungkin Anda kenal</small>
        @foreach ($recommendations as $user)
        <div class="recommendation-item">
            <span>{{ $user->name }}</span>
            <a href="{{ route('follow', $user->id) }}" class="btn btn-custom">Follow</a>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Function to handle posting content
    function postContent() {
        // Get the posted content
        var postText = document.getElementById('post-text').value;
        // Create a new post element
        var postElement = document.createElement('div');
        postElement.classList.add('post');
        // Set the inner HTML of the post element
        postElement.innerHTML = '<div class="account-info"><img src="{{ asset("images/profile.png") }}" alt="Profile Picture" class="profile-pic-small"><div class="account-name">{{ Auth::user()->name }}</div></div><div class="post-content">' + postText + '</div>';
        // Append the new post element to the posts container
        document.querySelector('.posts').appendChild(postElement);
        // Clear the textarea
        document.getElementById('post-text').value = '';
        // Scroll to the bottom of the posts container
        document.querySelector('.posts').scrollTop = document.querySelector('.posts').scrollHeight;
        // Save the posted content to localStorage
        localStorage.setItem('postedContent', postText);
    }

    // Function to load posted content from localStorage
    function loadPostedContent() {
        // Get the posted content from localStorage
        var postedContent = localStorage.getItem('postedContent');
        // Check if there is posted content
        if (postedContent) {
            // Create a new post element
            var postElement = document.createElement('div');
            postElement.classList.add('post');
            // Set the inner HTML of the post element
            postElement.innerHTML = '<div class="account-info"><img src="{{ asset("images/profile.png") }}" alt="Profile Picture" class="profile-pic-small"><div class="account-name">{{ Auth::user()->name }}</div></div><div class="post-content">' + postedContent + '</div>';
            // Append the new post element to the posts container
            document.querySelector('.posts').appendChild(postElement);
        }
    }

    // Call the loadPostedContent function when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        loadPostedContent();
    });
</script>

@endsection