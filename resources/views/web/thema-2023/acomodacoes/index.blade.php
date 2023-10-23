@extends("web.{$configuracoes->template}.master.master")

@section('content')

<section class="breadcrumb-area overlay-dark-2 bg-3" style="background-image:url({{url('frontend/'.$configuracoes->template.'/assets/images/header.jpg')}})">	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-text text-center">
					<h2>Apartamentos</h2>
					<p>&nbsp;</p>
					<div class="breadcrumb-bar">
						<ul class="breadcrumb">
							<li><a href="{{route('web.home')}}">Início</a></li>
							<li>Apartamentos</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="room-area pt-90">
    <?php
       $pag = (empty($_GET['pag']) ? '1' : $_GET['pag']);
       $maximo = 12;
       $inicio = ($pag * $maximo) - $maximo;
	   $readApartamentos = read('apartamentos',"WHERE status = '1' ORDER BY data DESC LIMIT $inicio,$maximo");
       foreach($readApartamentos as $apartamentos1);
       if(!$apartamentos1):
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="section-title text-center">
                    <div class="alert alert-info">Desculpe, não encontramos Apartamentos Cadastrados</div>
                </div>
            </div>
        </div>
    </div>       
    <?php   
       else:
    ?>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <?php    
       foreach($readApartamentos as $apartamentos):
       extract($apartamentos); 
    ?>
    <div class="room-list">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <?php
                   if($img == ''):
                        echo '<a href="'.BASE.'/pagina/apartamento/'.$url.'"><img src="'.BASE.'/tim.php?src='.PATCH.'/images/image.jpg&w=470&h=340&q=100&zc=1" alt="'.$apart_nome.'"/></a>';
                   else:
                        echo '<a href="'.BASE.'/pagina/apartamento/'.$url.'"><img src="'.BASE.'/tim.php?src='.BASE.'/uploads/apartamentos/capas/'.$img.'&w=470&h=340&q=100&zc=1" alt="'.$apart_nome.'"/></a>';
                   endif;
                ?>
            </div>
            <div class="col-md-7 col-sm-6">
                <div class="room-list-text">
                    <h3><a href="<?= BASE.'/pagina/apartamento/'.$url;?>"><?= $apart_nome;?></a></h3>
                    <p style="min-height: 75px;"><?= lmWord($descricao,300);?></p>
                    <h4>Disponível no apartamento</h4>
                    <div class="room-service">
                        <?php
                       $checkExplode = $acessorios;            
                       $checkAcessorios = explode(',',$checkExplode);
                       
                       echo '<p>';
                       foreach($checkAcessorios as $acessorio):                       
                          $readAcessorios = read('apart_acessorio',"WHERE id = '$acessorio'");  
                          if($readAcessorios){                                
                            foreach($readAcessorios as $ass):                                    
                            echo ' '.$ass['ass_nome'].',';
                            endforeach;
                          }                                                                                                                         
                        endforeach;
                        echo '</p>';
                    ?>
                        <a href="<?= BASE.'/pagina/apartamento/'.$url;?>"><div class="p-amount">
                            <span>Ver +</span>
                            <span class="count">&nbsp;</span>
                        </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php   
       endforeach;
    ?>
    </div>
        <div class="col-md-12 fix" style="margin-top: 20px;margin-bottom: 30px;">
            <div class="pagination-content text-center">
                <ul class="pagination">
                    <?php
                      $link = BASE.'/pagina/apartamentos&pag=';
                      readPaginatorSite('apartamentos',"WHERE status = '1' ORDER BY data DESC", $maximo, $link, $pag);
                    ?>
                </ul>
            </div>
        </div>
    </div>
    </div> 
    <?php    
       endif;
    ?>   

    <section id="services" class="services-area pt-120 pb-90">  
        <div class="container">        
            <div class="row">
                @foreach($acomodacoes as $apartamento)
                    <div class="col-xl-4 col-md-6">
                        <div class="single-services mb-30">
                            <div class="services-thumb">
                                <a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">
                                <img height="350" src="{{$apartamento->cover()}}" alt="{{$apartamento->titulo}}">
                                </a>
                            </div>
                            <div class="services-content"> 
                                <div class="day-book">
                                    <ul>
                                        @if ($apartamento->exibir_valores == 1)
                                            <li>R$ {{$apartamento->valor_cafe}}</li>
                                        @endif                                        
                                        <li><a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">Reservar</a></li>
                                    </ul>
                                </div>
                                <h4><a href="{{route('web.acomodacao', ['slug' => $apartamento->slug])}}">{{$apartamento->titulo}}</a></h4>    
                                {!!\App\Helpers\Renato::Words($apartamento->content, 15)!!}                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>   	
@endsection

@section('css')
    
@endsection

@section('js')
    
@endsection