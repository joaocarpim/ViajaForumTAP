@extends('layouts.header_footer')

@section('content')
    
    <div class="container">
        <div class="titlePost">
            <h1 style="margin-top: 50px; background: #285ec2; margin-left: 50px; ">Posts de Viagem</h1>
        </div>
        <div class="containerAllPosts" style="background: #285ec2; border-radius: 20px;">
        <div class="row" style="margin-top: 50px; margin-left: 50px;">
            <div class="col-md-12" style="margin-bottom: 100px; ">
                <div class="user-list" style="background: #fff; border-radius: 10px; margin-bottom: 10px;"></div>
                <div class="textPost">
                    <h2>Aventura na Patagônia</h2>
                    <h4>Por: Ana Silva</h4>
                    <p>Uma incrível aventura pela Patagônia, explorando suas paisagens deslumbrantes e montanhas imponentes.</p>
                    <p>Conheça os segredos escondidos das geleiras e vivencie uma experiência única de contato com a natureza.</p>
                    <p>Ideal para quem busca adrenalina e paisagens de tirar o fôlego.</p>
                    <p>Tags: #Patagônia, #Aventura, #Geleiras, #Montanhas</p>
                </div>
            </div>

            <div class="col-md-12" style="margin-bottom: 100px; ">
                <div class="user-list" style="background: #fff; border-radius: 10px; margin-bottom: 10px;"></div>
                <div class="textPost">
                    <h2>Cultura e História em Roma</h2>
                    <h4>Por: Carlos Oliveira</h4>
                    <p>Explore as ruas milenares de Roma, mergulhe na história do Império Romano e descubra tesouros arqueológicos únicos.</p>
                    <p>Desfrute da culinária italiana e da atmosfera vibrante das praças históricas.</p>
                    <p>Ideal para quem aprecia cultura, arte e gastronomia.</p>
                    <p>Tags: #Roma, #Cultura, #História, #Arte, #Gastronomia</p>
                </div>
            </div>

            <div class="col-md-12" style="margin-bottom: 100px;">
                <div class="user-list" style="background: #fff; border-radius: 10px; margin-bottom: 10px;"></div>
                <div class="textPost">
                    <h2>Surf e Relaxamento em Bali</h4>
                    <h4>Por: Maria Fernandes</h4>
                    <p>Descubra as praias paradisíacas de Bali, perfeitas para surfistas e amantes do sol e mar.</p>
                    <p>Relaxe em resorts de luxo e explore a rica cultura balinesa.</p>
                    <p>Ideal para quem busca um refúgio tropical com aventura e tranquilidade.</p>
                    <p>Tags: #Bali, #Surf, #Praias, #CulturaBalinesa, #Luxo</p>
                </div>
            </div>
        </div>
    </div>
@endsection
