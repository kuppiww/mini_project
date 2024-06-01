<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{


    public function home()
    {
        $posts = Posts::all();
        $recommendations = User::where('id', '!=', auth()->id())->get();

        return view('home', [
            'posts' => $posts,
            'recommendations' => $recommendations
        ]);
    }

    public function explore()
    {
        $recommendations = User::where('id', '!=', Auth::id())->take(5)->get();
        return view('explore', compact('recommendations'));
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function loginUser(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil, arahkan ke halaman home
            return redirect()->route('home');
        }

        // Autentikasi gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['msg' => 'Login failed']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    // Komentar
    public function storeComment(Request $request, $postId)
    {
        $request->validate(['content' => 'required']);
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'content' => $request->content,
        ]);
        return redirect()->back();
    }

    // Like
    public function storeLike($postId)
    {
        Like::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
        ]);
        return redirect()->back();
    }

    public function follow($id)
    {
        $userToFollow = User::find($id);

        if ($userToFollow) {
            auth()->user()->following()->attach($userToFollow);
            return redirect()->back()->with('success', 'Anda telah mengikuti ' . $userToFollow->name);
        }

        return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
    }

    public function unfollow($userId)
    {
        Follow::where('user_id', $userId)->where('follower_id', auth()->id())->delete();
        return redirect()->back();
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function showEdit()
    {
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->bio = $request->input('bio');

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $imagePath;
        }

        $user->save();

        Auth::user()->update([
            'bio' => $request->input('bio'),

        ]);

        return redirect()->back()->with('status', 'Profile updated!');

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }


    public function showPostForm()
    {
        return view('post');
    }

    public function storePost(Request $request)
    {
        // Validasi dan simpan postingan
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'required|image|max:2048', // Contoh validasi gambar
        ]);

        $request->validate(['content' => 'required']);
        Posts::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);
        return redirect()->back();

        // Simpan logika di sini, misalnya:
        // $post = new Post();
        // $post->description = $request->description;
        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('public/posts');
        //     $post->image_path = $path;
        // }
        // $post->user_id = auth()->id();
        // $post->save();

        return redirect()->route('home')->with('success', 'Post created successfully');
    }

    public function notifications()
    {
        // Contoh data notifikasi
        $notifications = [
            [
                'type' => 'follow',
                'user' => 'User1',
                'message' => 'mulai mengikuti Anda',
                'profile_pic' => 'images/profile1.png'
            ],
            [
                'type' => 'like',
                'user' => 'User2',
                'message' => 'menyukai postingan Anda',
                'profile_pic' => 'images/profile2.png'
            ],
            [
                'type' => 'comment',
                'user' => 'User3',
                'message' => 'mengomentari postingan Anda',
                'profile_pic' => 'images/profile3.png'
            ]
        ];

        return view('notifications', compact('notifications'));
    }
}
