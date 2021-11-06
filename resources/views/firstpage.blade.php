@extends('layouts.head')
    @section('head')
    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/cover/">

    

    <!-- Bootstrap core CSS -->
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  @endsection
  @section('body')
      <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column firstpage-back" style="background:url({{ asset('images/haikei7.jpg') }}); 
background-size:cover;">
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">MOF|MaenigOfLife</h3>
      
    </div>
  </header>

  <main class="px-3 ">
    <h1>Let's share meanig of life</h1>
    <p class="lead">なぜ生きているのか。それを多くの人は考える。生きる意味を見出せない人もいれば見出せる人もいる。ここではいろいろな人の生きる意味を見て参考にしたり、共感できるサイトです。</p>

    <p class="lead">
      <a href="{{route('lops.index')}}" class="btn bg-white" style="font-weight: bold">探しに行く</a>
    </p>
  </main>

  <footer class="mt-auto text-white-50">
    
  </footer>
</div>
</body>
@endsection


