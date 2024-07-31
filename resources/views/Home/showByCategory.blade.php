<h1>Posts in {{ $category->name }}</h1>

@foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->excerpt }}</p>
        <a href="{{ url('post/' . $post->id) }}">Read more</a>
    </div>
@endforeach
