@extends('layouts.app')
@section('title', 'Bookmarks')

@push('style')
<style>
    .bookmarks-container {
        padding: 20px;
    }

    .bookmark-item {
        background-color: #222;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 8px;
        color: #fff;
        display: flex;
        align-items: center;
    }

    .bookmark-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .bookmark-item .bookmark-info {
        flex: 1;
    }

    .bookmark-item .bookmark-info h4 {
        margin: 0;
        font-size: 1.1em;
    }

    .bookmark-item .bookmark-info p {
        margin: 5px 0 0;
        font-size: 0.9em;
    }
</style>
@endpush

@section('content')
<div class="content">
    <div class="main-content">
        <div class="bookmarks-container">
            <h2>Bookmarks</h2>
            <div id="bookmarks-list">

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadBookmarks();
    });

    function loadBookmarks() {

        const bookmarks = [{
                name: 'John Doe',
                profilePic: '{{ asset("images/profile.png") }}',
                description: 'This is a bookmarked post.',
            },
            {
                name: 'Jane Smith',
                profilePic: '{{ asset("images/profile.png") }}',
                description: 'Another bookmarked post.',
            },
        ];

        const bookmarksList = document.getElementById('bookmarks-list');

        bookmarks.forEach(bookmark => {
            const bookmarkItem = document.createElement('div');
            bookmarkItem.classList.add('bookmark-item');

            bookmarkItem.innerHTML = `
                <img src="${bookmark.profilePic}" alt="Profile Picture">
                <div class="bookmark-info">
                    <h4>${bookmark.name}</h4>
                    <p>${bookmark.description}</p>
                </div>
            `;

            bookmarksList.appendChild(bookmarkItem);
        });
    }
</script>
@endpush