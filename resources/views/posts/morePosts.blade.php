@foreach($posts as $post)
    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src= "{{Voyager::image( $post->image )}}"  alt="">
            <a href="#" class="blog_item_date">
                <h3>{{ $post->created_at->day }}</h3>
                <p>{{ \Carbon\Carbon::parse($post->created_at)->format('M') }}</p>
            </a>
        </div>
        <div class="blog_details">
            <a class="d-inline-block" href="{{ route('posts.show', ['post'=> $post->id, 'slug'=>Str::slug($post->title, '-' )]) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <p>{!! html_entity_decode($post->excerpt) !!}</p>
            <ul class="blog-info-link">
                <li><a href="#"><i class="fa fa-user"></i>
                @foreach ($post->tags as $tag)
                <li>{{ $tag->name }}</li>
                @endforeach
                </a>
                </li>
            </ul>
        </div>
    </article>
@endforeach
