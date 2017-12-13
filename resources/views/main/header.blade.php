  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="{{ asset('assets/img/logo.png') }}" alt="logo"></a></div>
      <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div id="main-nav" class="collapse navbar-collapse navStyle">
          <ul class="nav navbar-nav" id="mainNav">
            @foreach($menu as $key => $item)
            @if($key === 0)
            <li class="active"><a href="#{{ $item['alias'] }}" class="scroll-link">{{ $item['title'] }}</a></li>
            @else
            <li><a href="#{{ $item['alias'] }}" class="scroll-link">{{ $item['title'] }}</a></li>
            @endif
            @endforeach
          </ul>
      </div>
     </nav>
    </div>
  </div>
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if (session('status'))
    <div class="alert alert-success">
      <span>{{ session('status') }}</span>
    </div>
  @endif