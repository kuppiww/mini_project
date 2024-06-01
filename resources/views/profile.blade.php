@extends('layouts.app')
@section('title', 'Home')
@push('style')
<style>
    body {
        background-color: #000;
        color: #fff;
        font-family: 'Arial', sans-serif;
    }

    .content {
        display: flex;
        justify-content: center;
        padding: 20px;
    }

    .main-content {
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 20px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 20px;
        padding: 20px;
        border-bottom: 1px solid #333;
    }

    .profile-header-left {
        display: flex;
        align-items: center;
    }

    .profile-pic-large {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid #fff;
    }

    .profile-details {
        margin-left: 20px;
        text-align: left;
    }

    .profile-details h2 {
        margin: 0;
        font-size: 24px;
    }

    .profile-bio {
        margin: 10px 0 0;
        color: #bbb;
    }

    .profile-stats {
        display: flex;
        justify-content: space-around;
        gap: 100px;
        margin-left: 20px;
    }

    .profile-stats div {
        text-align: center;
    }

    .edit-profile-btn {
        background-color: #fff;
        color: #000;
        border: none;
        padding: 10px 20px;
        margin-left: 20px;
        border-radius: 5px;
        cursor: pointer;
        align-self: flex-start;
    }

    .edit-profile-btn:hover {
        background-color: #ddd;
    }

    .profile-posts {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 10px;
        width: 100%;
    }

    .profile-post {
        background-color: #333;
        border-radius: 8px;
        overflow: hidden;
    }

    .profile-post img {
        width: 100%;
        height: auto;
    }
</style>
@endpush

@section('content')
<div class="content">
    <div class="main-content">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-header-left">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-large">
                    <div class="profile-details">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p class="profile-bio">Bio pengguna ditampilkan di sini.</p>
                    </div>
                </div>
                <div class="profile-stats">
                    <div>
                        <strong>100</strong>
                        <p>Postingan</p>
                    </div>
                    <div>
                        <strong>200</strong>
                        <p>Pengikut</p>
                    </div>
                    <div>
                        <strong>150</strong>
                        <p>Mengikuti</p>
                    </div>
                </div>
                <a href="{{ route('profile.edit', Auth::user()->id) }}" class="edit-profile-btn">Edit Profile</a>
            </div>

        </div>
    </div>
</div>
@endsection