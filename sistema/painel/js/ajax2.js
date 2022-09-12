/* Salvar calculos civeis*/

$("#formCiveis").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);
   
    
    $.ajax({
        url: 'paginas/' + pag + "/salvar.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            $('#mensagem').text('');
            $('#mensagem').removeClass()
            if (mensagem.trim() == "Salvo com Sucesso") {
                
               
            }

            else {

                $('#mensagem').addClass('text-danger')
                $('#mensagem').text(mensagem)
            } 
        },

        cache: false,
        contentType: false,
        processData: false,

    });  

$('.salvarLinha').prop('disabled', true); 

});