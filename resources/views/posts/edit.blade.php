<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Return to Dashboard</a>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="visibility">Visibility:</label>
                <select name="visibility" class="form-control">
                    <option value="1" {{ $post->visibility ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ !$post->visibility ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
