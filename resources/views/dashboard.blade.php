<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome, {{ Auth::user()->username }}</h1>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('logout') }}" class="btn btn-danger" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <h2>Posts</h2>
        @if (Auth::user()->role && Auth::user()->role->role_name == 'admin')
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Visibility</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->category_name }}</td>
                        <td>{{ $post->visibility ? 'Published' : 'Draft' }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                            @if (Auth::user()->role && Auth::user()->role->role_name == 'admin')
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</body>
</html>
