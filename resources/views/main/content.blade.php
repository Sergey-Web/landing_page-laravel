<!--Home-->
@if($pages !== NULL)
    @foreach($pages as $keyPage => $page)
        @if($keyPage % 2 == 0)
<section id="home" class="top_cont_outer">
  <div class="hero_wrapper">
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-5 col-sm-7">
            <div class="top_left_cont zoomIn wow animated"> 
              {!! $page->text !!}
              <a href="{{ route('page', ['alias' => $page->alias]) }}" class="read_more2">Read more</a>
            </div>
          </div>
          <div class="col-lg-7 col-sm-5">
            {!! Html::image('assets/img/'.$page->images, '', ['class'=>'zoomIn wow animated']) !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
        @else
<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper">
  <div class="container">
    <h2>{{ $page->name }}</h2>
    <div class="inner_section">
    <div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
        {!! Html::image('assets/img/'.$page->images, '', ['class'=>'img-circle delay-03s animated wow zoomIn']) !!}
      </div>
        <div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
            <div class=" delay-01s animated fadeInDown wow animated">
            {!! $page->text !!}
        </div>
        <div class="work_bottom"> <span>Want to know more..</span>
            <a href="{{ route('page', ['alias' => $page->alias]) }}" class="contact_btn">Contact Us</a>
        </div>
      </div>
        
    </div>
      
      
    </div>
  </div>
</section>
        @endif
    @endforeach
@endif

<!--Service-->
@if($services !== NULL)
<section  id="service">
  <div class="container">
    <h2>Services</h2>
    <div class="service_wrapper">
    @foreach($services as $keyService => $service)
        @if($keyService == 0 || $keyService % 3 == 0)
      <div class="row {{ $keyService != 0 ? 'borderTop' : '' }}">
        @endif
        <div class="col-lg-4 {{ ($keyService % 3) != 0 ? 'borderLeft' : '' }} {{ $keyService > 2 ? 'mrgTop' : '' }}">
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon }}"></i></span> </div>
            <h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
            <p class="animated fadeInDown wow">{{ $service->text }}</p>
          </div>
        </div>
        @if(($keyService + 1) % 3 == 0)
      </div>
        @endif
    @endforeach
    </div>
  </div>
</section>
@endif
<!--Service-->

<!-- Portfolio -->
@if($portfolio !== NULL)
<section id="portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Portfolio</h2>
    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="portfolio">

    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li>
            <a id="all" href="#" data-filter="*" class="active">
                <h5>All</h5>
            </a>
        </li>
        @foreach($tags as $tag)
        <li>
           <a class="" href="#" data-filter=".{{ $tag->tags }}">
             <h5>{{ $tag->tags }}</h5>
           </a>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="isotope fadeInLeft animated wow" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
    @foreach($portfolio as $keyPortfolio => $valPortfolio)
        @php
            $countPortfolio = 0;
        @endphp
      <!-- Portfolio Item -->
      <div style="position: absolute; left: 0px; top: 0px; transform: translate3d({{ $countPortfolio < 4 ? $countPortfolio++ * 337 : $countPortfolio = 0 }}px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four {{ $valPortfolio->tags }} isotope-item">
        <div class="portfolio_img"> <img src="{{ asset('assets/img/') }}/{{ $valPortfolio->images }}"  alt="Portfolio 1"> </div>
        <div class="item_overlay">
          <div class="item_info"> 
            <h4 class="project_name">{{ $valPortfolio->name }}</h4>
          </div>
        </div>
      </div>
      <!--/Portfolio Item -->
    @endforeach
    </div>
    <!--/Portfolio Wrapper --> 
    
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
 
</section>
@endif

<!-- <section class="page_section" id="clients">page_section
  <h2>Clients</h2>
page_section
<div class="client_logos">client_logos
  <div class="container">
    <ul class="fadeInRight animated wow">
      <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo1.png') }}" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo2.png') }}" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo3.png') }}" alt=""></a></li>
      <li><a href="javascript:void(0)"><img src="{{ asset('assets/img/client_logo4.png') }}" alt=""></a></li>
    </ul>
  </div>
</div>
</section>
client_logos -->

@if($employees !== NULL)
<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>Team</h2>
    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing.</h6>
    <div class="team_section clearfix">
    @php
        $countEmployee = 3;
    @endphp
    @foreach($employees as $keyEmployee => $employee)
      <div class="team_area">
        <div class="team_box wow fadeInDown delay-0{{ $keyEmployee*3 + 3 }}s">
          <div class="team_box_shadow"><a href="javascript:void(0)"></a></div>
          <img src="{{ asset('assets/img/') }}/{{ $employee->images }}" alt="">
          <ul>
            <li><a href="javascript:void(0)" class="fa fa-twitter"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-facebook"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-pinterest"></a></li>
            <li><a href="javascript:void(0)" class="fa fa-google-plus"></a></li>
          </ul>
        </div>
        <h3 class="wow fadeInDown delay-0{{ $keyEmployee*3 + 3 }}}s">{{ $employee->name }}</h3>
        <span class="wow fadeInDown delay-0{{ $keyEmployee*3 + 3 }}}s">{{ $employee->position }}</span>
        <p class="wow fadeInDown delay-0{{ $keyEmployee*3 + 3 }}}s">{{ $employee->text }}</p>
      </div>
    @endforeach
    </div>
  </div>
</section>
@endif
<!--/Team-->