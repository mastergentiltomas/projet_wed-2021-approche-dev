<ul>
  @foreach ($categories as $category)
    <li>
      <a href="#" class="d-flex"><p>{{ $category->name }}</p><p>({{ count($category->posts) }})</p></a>
    </li>
  @endforeach
</ul>
