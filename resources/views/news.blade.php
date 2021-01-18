@extends('main')

@section('title', 'Акции')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="css/news.css">
@endsection

@section('content')


    <div class="container" style="max-width: 1200px;">
      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i></a></li>
        <li><a href="/delivery">Акции</a></li>
      </ul>
        <div class="row mb-2">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">Акция дня</strong>
                  <h3 class="mb-0" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->title }}</h3>
                  <div class="mb-1 text-muted">
                    <p href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->created_at }}</p><br/>
                    </div>
                  <p class="card-text mb-auto" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->excerpt }}<br/></p>
                  <a href="#{{ $news[0]->id }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img class="aa_class" src="{{ productImage($news[0]->image) }}">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">Акция недели</strong>
                  <h3 class="mb-0"href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->title }}</h3>
                  <div class="mb-1 text-muted"><p href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->created_at }}</p><br/></div>
                  <p class="mb-auto" href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->excerpt }}<br/></p>
                  <a href="#{{ $news[2]->id }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                  <img class="aa_class" src="{{ productImage($news[1]->image) }}">
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">Акция месяца</strong>
                  <h3 class="mb-0" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->title }}</h3>
                  <div class="mb-1 text-muted">
                    <p href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->created_at }}</p><br/>
                    </div>
                  <p class="card-text mb-auto" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->excerpt }}<br/></p>
                  <a href="#{{ $news[1]->id }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/> --}}
                    <img class="aa_class" src="{{ productImage($news[2]->image) }}">
                    {{-- <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-success">Новость месяца</strong>
                  <h3 class="mb-0"href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->title }}</h3>
                  <div class="mb-1 text-muted"><p href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->created_at }}</p><br/></div>
                  <p class="mb-auto" href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->excerpt }}<br/></p>
                  <a href="#{{ $news[3]->id }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  {{-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                  <img class="aa_class" src="{{ productImage($news[3]->image) }}">
                </div>
              </div>
            </div>
          </div>
        <div class="articles">
        <div class="row">
            <div class="col-md-8 news-main">
            <h3  class="pb-4 mb-4 font-italic border-bottom">Лента новостей</h3>

            <div class="news-post">
                <h2 id="{{ $news[0]->id }}" class="news-post-title" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->title }}<br/></h2>
                <p class="news-post-meta" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->created_at }}</p>

                <p class="lead my-3" href="{{ route('news.index', ['id' => $news[0]->id]) }}">{{ $news[0]->excerpt }}<br/></p><hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <h2>Heading</h2>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <pre><code>Example code block</code></pre>
                <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
                <h3>Sub-heading</h3>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <ul>
                <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                <li>Donec id elit non mi porta gravida at eget metus.</li>
                <li>Nulla vitae elit libero, a pharetra augue.</li>
                </ul>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
                <ol>
                <li>Vestibulum id ligula porta felis euismod semper.</li>
                <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
                </ol>
                <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p><hr>
            </div><!-- /.blog-post -->

            <div class="news-post">
                <h2 id="{{ $news[1]->id }}" class="blog-post-title" href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->title }}<br/></h2>
                <p class="news-post-meta" href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->created_at }}</p>

                <p class="lead my-3" href="{{ route('news.index', ['id' => $news[1]->id]) }}">{{ $news[1]->excerpt }}<br/></p><hr>
                <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
                <blockquote>
                <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </blockquote>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p><hr>
            </div><!-- /.blog-post -->

            <div class="news-post">
                <h2 id="{{ $news[2]->id }}" class="news-post-title" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->title }}<br/></h2>
                <p class="news-post-meta" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->created_at }}</p>

                <p class="lead my-3" href="{{ route('news.index', ['id' => $news[2]->id]) }}">{{ $news[2]->excerpt }}<br/></p><hr>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <ul>
                <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                <li>Donec id elit non mi porta gravida at eget metus.</li>
                <li>Nulla vitae elit libero, a pharetra augue.</li>
                </ul>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p><br/><hr>
            </div><!-- /.blog-post -->
            <div class="news-post">
                <h2 id="{{ $news[3]->id }}" class="news-post-title" href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->title }}<br/></h2>
                <p class="news-post-meta" href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->created_at }}</p>

                <p class="lead my-3" href="{{ route('news.index', ['id' => $news[3]->id]) }}">{{ $news[3]->excerpt }}<br/></p><hr>
                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                <ul>
                <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
                <li>Donec id elit non mi porta gravida at eget metus.</li>
                <li>Nulla vitae elit libero, a pharetra augue.</li>
                </ul>
                <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p><br/>
            </div><!-- /.blog-post -->
            </div><!-- /.blog-main -->
        </div>
            <aside class="news-sidebar">
            <div class="up-arrow">
                {{-- <a href='#'><img src="/img/up-arrow.png" alt="up"></a> --}}
            </div>
            </aside><!-- /.blog-sidebar -->
        </div><!-- row -->
      </div>
    </div>
@endsection

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
@endsection
