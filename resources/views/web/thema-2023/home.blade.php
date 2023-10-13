@extends("web.{$configuracoes->template}.master.master")

@section('content')

    @if (!empty($slides) && $slides->count() > 0)
        <section class="slider-area">	
            <div class="slider-wrapper">
                @foreach ($slides as $key => $slide)
                    <div class="single-slide" style="background-image: url({{$slide->getimagem()}});">
                        <div class="banner-content overlay">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="text-content-wrapper slide-two">
                                            <div class="text-content text-center">
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{--
                    //echo '<div class="item">';
                //    echo '    <div class="details">';
                //    echo '<div class="title"><span>'.$slide['titulo'].'</span></div>';
                //    if(!$slide['link']):
                //       echo ''; 
                //    else:
                //       echo '<div class="buttoncontainer"><a href="'.$slide['link'].'" class="button"><span data-hover="Conhe&ccedil;a mais">Conhe&ccedil;a mais</span></a></div>'; 
                //    endif;        
                //    echo '    </div>';
                //    echo '    <img alt="" src="'.BASE.'/tim.php?src='.BASE.'/uploads/banners/'.$slide['imagem'].'&w=1800&h=800&q=100&zc=1" width="1800" height="800" />';
                //    echo '</div>';--}}
                @endforeach
            </div>
        </section>
    @endif

    <section class="about-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post" class="search-form">
                        <div class="form-container fix">
                            <div class="box-select">
                                <div class="select date">
                                    <input type="text" id="j_data" name="checkini" autocomplete="off" placeholder="Checkin" />
                                </div>
                                <div class="select date">
                                    <input type="text" id="j_data1" name="checkouti" autocomplete="off" placeholder="Checkout" />
                                </div>
                                <div class="select arrow">
                                    <select name="apart_id">
                                        @if(!empty($acomodacoes) && $acomodacoes->count() > 0)
                                            <option value="">Selecione</option>
                                            @foreach($acomodacoes as $apartamento)
                                                <option value="{{$apartamento->id}}" {{(!empty($dadosForm) && $dadosForm['apart_id'] == $apartamento->id ? 'selected' : '')}}>{{$apartamento->titulo}}</option>
                                            @endforeach                                                                        
                                        @endif
                                    </select>
                                </div>                                    
                            </div>
                            <button type="submit" class="search default-btn" name="SendReserva">Pré-reserva</button>
                        </div>
                    </form> 
                </div>
            </div>
            
           <div class="row">
                <div class="col-md-7">
                    <div class="video-wrapper mt-90">
                        <div class="video-overlay">
                            <img src="" alt=""/>                                
                        </div>                            
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="about-text">
                        <div class="section-title">
                            <h3>titulo</h3>
                            content 750
                        </div>
                        <div class="about-links">
                            <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                            <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="#"><i class="zmdi zmdi-rss"></i></a>
                            <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                            <a href="#"><i class="zmdi zmdi-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                          
        </div>
    </section>







































    @if (!empty($apartamentos) && $apartamentos->count() > 0)
        <section class="room-area pt-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h3>Apartamentos</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">  
                @foreach($apartamentos as $apartamento) 
                    <div class="single-room">
                        <img height="422" src="{{$apartamento->cover()}}" alt="{{$apartamento->cover()}}" title="{{$apartamento->titulo}}"/>
                        <div class="room-hover text-center">
                            <div class="hover-text">
                                <h3 style="font-size: 22px;"><a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">{{$apartamento->titulo}}</a></h3>
                                <p>&nbsp;</p>
                                <div class="room-btn">
                                    <a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}" class="default-btn">Ver Detalhes</a>
                                </div>
                            </div>                        
                        </div>
                    </div>
                @endforeach     
            </div>
        </section>
    @endif

    @if (!empty($artigos) && $artigos->count() > 0)
        <section id="blog" class="blog-area p-relative fix pt-90 pb-90">
            <div class="animations-02"><img src="img/bg/an-img-06.png" alt="contact-bg-an-05"></div>
            <div class="container">
                <div class="row align-items-center"> 
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>
                                Blog
                            </h2>
                        </div>               
                    </div>
                </div>
                <div class="row">
                    @foreach($artigos as $artigo)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="blog-thumb2">
                                    <a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">
                                        <img width="241" src="{{$artigo->cover()}}" alt="{{$artigo->titulo}}">
                                    </a>
                                </div>                    
                                <div class="blog-content2">    
                                    <h4><a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">{{$artigo->titulo}}</a></h4> 
                                    {!!\App\Helpers\Renato::Words($artigo->content, 15)!!}
                                    <div class="blog-btn"><a href="{{route('web.blog.artigo', ['slug' => $artigo->slug])}}">Leia +</a></div>                         
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>        
    @endif

    <section id="video" class="video-area pt-150 pb-150 p-relative" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/bg-gallery.jpg')}}); background-repeat: no-repeat; background-position: center bottom; background-size:cover;">
        <!-- Lines -->
                   <div class="content-lines-wrapper2">
                       <div class="content-lines-inner2">
                           <div class="content-lines2"></div>
                       </div>
                   </div>
                  <!-- Lines -->
       <div class="container">                   
            <div class="row">
               <div class="col-12">
                   <div class="s-video-wrap">
                       <div class="s-video-content">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1spt-BR!2sbr!4v1488893723237!6m8!1m7!1sF%3A-hNOO3QBnDs4%2FWJtai4KscMI%2FAAAAAAAAEJs%2FB_Qh4lC_tTAGJL50IBdEP-e3tWMjIMveQCLIB!2m2!1d-23.43332223874241!2d-45.07221445441246!3f150.19085246815183!4f-0.20905841325189556!5f0.7820865974627469" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0;width: 80%;" height="450" allowfullscreen></iframe>
                       </div>
                   </div>                   
               </div>
               
           </div>
       </div>
   </section>
@endsection

@section('js')
    
@endsection