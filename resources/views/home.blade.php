@extends('layouts.app')

@section('content')

<style type="text/css">
  .centered{
    text-align: center;
  }

  .scope{
    max-width: 35px;
    max-height: 35px;
  }

  .fonte{
    font-size:
  }

  .justificado{
    text-align: justify;
  }

  .exclamacao{
    width: 155px;
    padding-top: 50px;
  }

</style>

<div class="container fonte">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">

            <div class="jumbotron centered">
                <h4>Bem vindo ao</h4>

                <div class="col-md-12">
                  <h1>L<img src="http://outdoorhill.com/wp-content/uploads/2015/06/4.png" alt="" class="scope" />oneta</h1>

                </div>


                <div>
                  <h4><strong>Você possui alguma reclamação sobre o estado de sua cidade? </strong> </h4>
                  <h5>Seja sobre ruas, calçadas, iluminação ou qualquer coisa que gostaria que fosse resolvido, o Looneta é o lugar certo para você expor suas queixas!</h5>
                </div>

            </div>

            <div class="">
              <div class="jumbotron col-md-5 justificado">
                <h3><strong>Objetivo</strong></h3>
                <h5>O objetivo do site é prover um lugar onde você pode expor suas reclamações sobre a cidade. Além de reclamar você pode votar em reclamações de outras pessoas.</h5>
              </div>

              <!--AQUI TA A EXCLAMAÇÃO SE QUISER TIRAR-->
              <div class=" col-md-1">
                <img src="https://www.vappingo.com/word-blog/wp-content/uploads/2011/02/exclamation_mark.png" alt="" class="exclamacao" />
              </div>
              <!----------------->

              <div class="jumbotron col-md-5 col-md-offset-1 justificado">
                <h3><strong>Participe!</strong></h3>
                <h5>Cadastre-se no Looneta para ter acesso às reclamações. Nelas voce pode votar e deixar sua opinião, assim voce está contribuindo para um melhor desenvolvimento de sua cidade</h5>
              </div>
            </div>

            <div class="jumbotron col-md-12">
              <h3 class="centered"><strong>Como funciona?</strong></h3>

              <br>

              <h4><strong>Reclamações</strong></h4>
              <h5 class="justificado">
                Após realizar seu cadastro serão disponibilizadas as reclamações para serem visualizadas.
                Clique em uma que tenha interesse para acessá-la.
                Na página da reclamação em si voce tem a possibilidade de votar se concorda com a reclamação e acha que ela deve ser resolvida,
                ou é contrário e acha que ela não é importante. Além de votar você pode comentar a respeito deixando assim sua opinião.
                Não esqueça de votar antes de deixar um comentário!
              </h5>

              <br><br>

              <h4><strong>Reclame!</strong></h4>
              <h5 class="justificado">
                Não fique apenas esperando que alguém faça a reclamação do que você quer que seja resolvido. Reclame você também!
                Clique em "Reclamar" e preencha o formulário afim de expor sua indignação para que ela seja acessada por outros usuários e eles também possam votar e comentar.
              </h5>

              <br><br>

              <h4><strong>Mas de que isso adianta?</strong></h4>
              <h5>
                Quando uma reclamação recebe votos positivos suficientes, assim indicando sua necessidade de ser atendida,
                um email é enviado aos orgãos responsáveis para que eles tomem as devidas providencias.
              </h5>

              <br><br>

              <h4><strong>Não abuse!</strong></h4>
              <h5>
                Reclamações e comentários indevidos serão removidos e usuários punidos por moderadores da equipe Looneta. Portanto exponha reclamações sérias
                e comentários que agreguem algum valor à discussão apresentada. Não ofenda pessoas ou poste coisas indevidas no site!
              </h5>
            </div>

        </div>

    </div>
</div>
@endsection
