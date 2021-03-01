@extends('template.index')
@section('content')

<div class="col-lg-8 mb-5 mb-lg-0">
    <div class="blog_left_sidebar" >
        <div id="liste-posts" >
          @foreach($posts as $post)
              <article class="blog_item">
                  <div class="blog_item_img">
                      <img class="card-img rounded-0" src= "{{ Voyager::image( $post->image ) }}"  alt="">
                      <a href="#" class="blog_item_date">
                          <h3>{{ $post->created_at->day }}</h3>
                          <p>{{ Carbon\Carbon::parse($post->created_at)->format('M') }}</p>
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
        </div>
        <nav class="blog-pagination justify-content-center d-flex">
            <ul class="pagination">
                <li class="page-item">
                    <a href="#" id="older-posts" class="page-link" data-route="{{ route('posts.morePosts') }}" style="width: auto; padding: 0 1em;">More posts</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@section('scripts')
  <script src="{{ asset('assets/js/morePost.js') }}"></script>
@endsection

@endsection
