$('.votoPositivo').on('click', function(event){



    $.ajax({
       method: 'POST',
        url: urlVoto,
        data:{reclamacaoId: reclamacaoId,_token: token, positivo: true}
    }).done(function(){
        // update view

    })
});

$('.votoNegativo').on('click', function(event){

    $.ajax({
        method: 'POST',
        url: urlVoto,
        data:{reclamacaoId: reclamacaoId,_token: token, positivo: false}
    }).done(function(){
        // update view

    })
});
