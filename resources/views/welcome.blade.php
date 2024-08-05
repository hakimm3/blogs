<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Blogs</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ms-auto" role="search">
                <a href="{{ route('login') }}" class="me-2">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container mt-5">
       <div class="row">
        @foreach ($posts as $post)
       <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }} {{ $post->date }}</h6>
          <p class="card-text">{{ $post->content }}</p>
        </div>
      </div>
       @endforeach
       </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>