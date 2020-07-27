@extends('dashboardTemplate.main')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-lg-10 col-md-10">
      <div class="page-content">
        <img src="{{ asset('asset/landing/forum-banner.svg') }}" alt="" class="img-fluid">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/forum') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Forum Guidelines</li>

          </ol>
        </nav>

        <ol class="nav-style f-guidelines">
          <li class="order-item">This discussion forum is for educational purposes. Shared knowledge helps us all to learn more.</li>
          <li class="order-item">Respect what others think and believe</li>
          <li class="order-item">Be friendly to other members</li>
          <li class="order-item">Give credit to others if you used their ideas or words</li>
          <li class="order-item">Think about what you’re posting – this is a dialogue about ideas, not people</li>
          <li class="order-item">Never post inappropriate, obscene, offensive or provocative content</li>
          <li class="order-item">Never personally attack or troll other members</li>
          <li class="order-item">Never post abusive, harassing, insulting or threatening content</li>
          <li class="order-item">Never create posts that might incite hatred – or are discriminatory on the basis of race, religion, gender, nationality, sexuality, ability or other personal characteristics</li>
          <p class="mt-5">If you have any concerns please <a href="">contact us!</a></p>
        </ol>

      </div>
    </div>
  </div>
</div>
@endsection
