<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Blog Latihan</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="{{url('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{url('assets/frontend/css/blog.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted" href="#">Subscribe</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">Blog Latihan</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                            viewBox="0 0 24 24" focusable="false">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('login')}}">Sign in</a>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                @foreach ($categories as $item)
                <a class="p-2 text-muted" href="{{url('/categories')}}/{{$item->slug}}">{{$item->title}}</a>
                @endforeach
            </nav>
        </div>

        <div class="jumbotron p-4 p-md-5 text-white rounded bg-info">
            <div class="col-md-12 px-0">
                <h1 class="display-4 font-italic">{{$latest_articles->title}}</h1>
                <p class="lead my-3">{{\Illuminate\Support\Str::limit(strip_tags($latest_articles->body), 200)}}</p>
                @if (\Illuminate\Support\Str::length(strip_tags($latest_articles->body)) > 50)
                <a href="{{url('article')}}/{{$latest_articles->slug}}" class="text-white font-weight-bold">Continue
                    reading...</a>
                @endif
            </div>
        </div>
    </div>

    <main role="main" class="container">
        <div class="row">

            <div class="col-md-8 blog-main">

                <div class="blog-post">
                    <h2 class="blog-post-title">{{$article->title}}</h2>
                    <p class="blog-post-meta">{{ \Carbon\Carbon::parse($article->created_at)->format('d F Y') }} by <a
                            href="#">{{ \App\User::find($article->author_id)->name }}</a></p>
                    <p>
                        {{ strip_tags($article->body)}}

                    </p>
                </div><!-- /.blog-post -->

                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="/">Back to Home</a>
                </nav>

            </div><!-- /.blog-main -->
            <aside class="col-md-4 blog-sidebar">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">About</h4>
                    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur
                        purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Archives</h4>
                    @foreach ($groupBy as $date => $items)
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a>{{ $date }}</a>
                            @foreach ($articles as $item)
                            <ul>
                                <li>
                                    <a href="{{url('/article')}}/{{$item->slug}}">{{$item->title}}</a>
                                </li>
                            </ul>
                            @endforeach
                        </li>
                    </ul>
                    @endforeach
                </div>

                <div class="p-4">
                    <h4 class="font-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </aside><!-- /.blog-sidebar -->

        </div><!-- /.row -->

    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a
                href="https://twitter.com/mdo">@mdo</a>.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>
</body>

</html>
