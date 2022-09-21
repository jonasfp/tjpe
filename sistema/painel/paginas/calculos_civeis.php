<?php 

@session_start();
require_once('verificar.php');
require_once('../conexao.php');

$pag = 'calculos_civeis';

?>

<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />


<form method="post" id="formCiveis">

    <table class="table table-hover">
        <thead>
            <tr>
              <th class="text-left" style="width:15%">NÚMERO DO PROCESSO </th>
              <th class="text-left" style="width:15%">VARA</th>          
              <th class="text-left" style="width:10%">EXEQUENTE</th>
              <th class="text-left" style="width:10%">EXECUTADO</th>        


          </tr>
      </thead>

      <tbody>
        <tr>

            <td>

                <input type="text" class="form-control" id="processo" name="processo" placeholder="Número do processo">             
            </td>

            <td>

                <input type="text" class="form-control" id="vara" name="vara" placeholder="Vara">             
            </td>

            <td>

                <input type="text" class="form-control" id="exequente" name="exequente" placeholder="Exequente">             
            </td>

            <td>

                <input type="text" class="form-control" id="executado" name="executado" placeholder="Executado">             
            </td>


        </tr>

    </tbody>
</table>




<table class="table" >
    <thead>
        <tr>
          <th class="text-left" style="">ÍNDICE DE CORREÇÃO MONETÁRIA </th>      
          <th class="text-left" style="">TERMO FINAL DA CORREÇÃO MONETÁRIA </th>
                <th class="text-left" style="">TIPO DE JUROS DE MORA </th>
          <th class="text-left" style="">TERMO INICIAL DOS JUROS DE MORA</th>      
          <th class="text-left" style="">TERMO FINAL DOS JUROS DE MORA</th>               

      </tr>
  </thead>
  
  <tbody>             

    <tr>

        <td>

           <form>
             
             <select id="selectindicecorrecao" name="selectindicecorrecao" class="form-control">
               <option value="Encoge">ENCOGE</option>
               <option value="Igpm">IGPM</option>
               <option value="Ipca">IPCA</option>
               <option value="Poupança">POUPANÇA</option>
               <option value="Tr">TR</option>          
           </select>
             
           </form>

        </td>

        <td>

            <input placeholder="Data final" type="text" id="datafinalcorrecao" name="datafinalcorrecao" class="form-control"></div>    

        </td>

        <td>

            <form>
             
             <select id="selecttipojuros" name="selecttipojuros" class="form-control">
            <option value="jurossimplesconstante">1% am durante todo o período</option>
            <option value="jurossimplesvariavel">0,5% am até 11/02/2003 e 1% am após</option>

           </select>
             
           </form>

        </td>

        <td>

            <div>
                <input placeholder="Data inicial" type="text" id="datainicialjuros" name="datainicialjuros" class="form-control"></div>

        </td>

            <td>

                <div>
                    <input placeholder="Data final" type="text" id="datafinaljuros" name="datafinaljuros" class="form-control"></div>

                </td>

            </tr>

        </tbody>

    </table>



    <table class="table table-hover" id="jonas">
        <thead>
            <tr>

              <th class="text-left" style="width:8%">DATA</th>
              <th class="text-left">HISTÓRICO</th>
              <th class="text-left" style="width:10%">VALOR (R$)</th>
              <th class="text-left" style="width:15%">CORREÇÃO MONETÁRIA</th>
              <th class="text-left" style="width:15%">JUROS MORATÓRIOS (Nº DIAS)</th>
              <th class="text-left" style="width:15%">TOTAL (R$)</th>
              <th class="text-center" style="width:10%">AÇÃO</th>

          </tr>
      </thead>



      <tbody id="modelo-linha">

        <tr class="linha-lancamento">  

            <td>

                <input placeholder="Data" type="text" id="dataevento" name="dataevento" class="form-control">

            </td>

            <td>

                <input type="text" class="form-control" id="historico" name="historico" placeholder="Histórico">             
            </td>

            <td>

                <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">             
            </td>

            <td>

                <input type="text" class="form-control" id="indicecorrecao" name="indicecorrecao" placeholder="Correção Monetária">             
            </td>

            <td>

                <input type="text" class="form-control" id="juros" name="juros" placeholder="Juros Moratórios">             
            </td>

            <td>

                <input type="text" class="form-control" id="total" name="total" placeholder="Total">             
            </td>

            <td>

                <div class="btn-group btn-group-sm">
                    <button type="button" form="formCiveis" id="inserirLinha" name="inserirLinha"><i class="fa fa-plus" aria-hidden="true" title="Inserir linha"></i></button>
                </div>

                <div class="btn-group btn-group-sm">
                    <button type="button" form="formCiveis" id="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true" title="Atualizar linha"></i></button>    
                </div>

                <div class="btn-group btn-group-sm">
                    <button type="button" form="formCiveis" id="removerLinha" ><i class="fa fa-minus" aria-hidden="true" title="Remover linha"></i></button>
                </div>
                <div class="btn-group btn-group-sm">
                    <button type="submit" id="salvarLinha" class="salvarLinha"><i class="fa fa-save" title="Salvar linha"></i></button>
                </div>

            </td>            

        </tbody>

    </table>


<!--**************************Honorários*****************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold">HONORÁRIOS SUCUMBENCIAIS:</h5>
    <select id="honorarios" name="honorarios" onclick="honorarios()" class="form-control" style="margin-left:0.50em">
            <option selected>Escolha</option>

            <option value="condenacao">Sobre o valor da condenação</option>
            <option value="causa">Sobre o valor da causa</option>
            <option value="valor">Valor determinado</option>
            <option value="semhonorarios">Sem honorários</option>
            
    </select>

    <input type="text" placeholder="Histórico" id="historicocondenacao" class="form-control">
    <input type="text" placeholder="Percentual (%)" id="percentualcondenacao" class="form-control" >
    <input type="text" placeholder="Histórico" id="historicocausa" class="form-control">
    <input type="text" placeholder="Valor da Causa" id="valorcausa" class="form-control">
    <input type="text" placeholder="Percentual(%)" id="percentualcausa" class="form-control">
    <input type="text" placeholder="Data da distribuição" id="datadistribuicaocausa" class="form-control">
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorarioscausa" class="form-control">
    <input type="text" placeholder="Histórico" id="historicovalor" class="form-control">
    <input type="text" placeholder="Valor determinado" id="valordeterminado" class="form-control">       
    <input type="text" placeholder="Data da distribuição" id="datadistribuicaovalor" class="form-control">
    <input type="text" placeholder="Índice de correcao" id="indicedecorrecaohonorariosvalor" class="form-control">

</form>

<!--******************************************************************--> 


<!--***********************Custas*************************************-->

  <form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold;margin-top:2.0em;">CUSTAS PROCESSUAIS:</h5>
    <select id="custas" name="custas" onclick="custas()" class="form-control" style="margin-left:0.50em">
            <option selected>Escolha</option>

            <option value="custasiniciais">Iniciais</option>
            <option value="custascomplementar">Complementares</option>
            <option value="custascumprimento">Cumprimento de sentença</option>
            <option value="custasapelacao">Apelação</option>
            <option value="custasoutros">Outros</option>
            
    </select>

    <input type="text" placeholder="Data" id="custasdata" class="form-control">
    <input type="text" placeholder="Histórico" id="custashistorico" class="form-control">    
    <input type="text" placeholder="Valor" id="custasvalor" class="form-control">    
    <input type="text" placeholder="Índice correção" id="custasindice" class="form-control">
    <input type="text" placeholder="Custas atualizadas" id="custasatualizadas" class="form-control">    

</form>

<!--*******************************************************************-->  
<!--*******************Honorários+Art.523*****************************-->

<form class="form-inline">
    <h5 style="font-family:arial;margin-bottom:0.67em; margin-left:0.50em; font-weight:bold; margin-top:2.0em;">HONORÁRIOS + MULTA ART. 523</h5>
    <select id="honorariosmultaart523" name="honorariosmultaart523" onclick="honorariosmulta()" class="form-control" style="margin-left:0.50em">
            <option selected>Escolha</option>

            <option value="honorariosmultaart523">Honorários + Multa Art. 523</option>          
          
    </select>

    <input type="text" placeholder="Histórico" id="historicoart523" class="form-control">
    <input type="text" placeholder="Percentual (%)" id="percentualart523" class="form-control" >
    
</form>

<!--******************************************************************-->


    <input type="hidden" name = "id">

    <small><div id="mensagem" align="center"></div></small>               

     <div class="modal-footer">

    <button type="submit" id="salvar" class="btn btn-primary">Salvar</button>

    </div>

</form>


<script type="text/javascript">

    var pag = "<?=$pag?>"  

</script>

<script src = "js/ajax2.js"></script>

<script>

    var count = 1
    
    $('#jonas').on('click','#inserirLinha', function () {

     count++

     $(this).closest(".linha-lancamento").after('<tr id = "campo'+count+'" class = "linha-lancamento"> <td><input placeholder="Data" type="text" id="dataevento'+count+'" name="dataevento" class="form-control"></td> <td><input type="text" class="form-control" id="historico'+count+'" name="historico" placeholder="Histórico"></td> <td><input type="text" class="form-control" id="valor'+count+'" name="valor" placeholder="Valor"></td> <td><input type="text" class="form-control" id="indicecorrecao'+count+'" name="indicecorrecao" placeholder="Correção Monetária"></td> <td><input type="text" class="form-control" id="juros'+count+'" name="juros" placeholder="Juros Moratórios"></td> <td><input type="text" class="form-control" id="total'+count+'" name="total" placeholder="Total"></td> <td><div class="btn-group btn-group-sm"><button type="button" id="inserirLinha"><i class="fa fa-plus" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm"><button type="button" id="atualizarLinha"><i class="fa fa-refresh" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm"><button type="button" id = "'+count+'"class= "removerLinha" ><i class="fa fa-minus" aria-hidden="true"></i></button></div> <div class="btn-group btn-group-sm"><button type="submit" id="salvarLinha" class = "salvarLinha"><i class="fa fa-save"></i></button></div></td></tr>')
     
     


 /***************************************************inicio*****************************************************/
$(document).ready(function(){
       /* 
        var jonas = document.getElementById("juros").value
        document.getElementById("juros"+count).value = jonas*/

        var juros = $("#juros").val()
        $('#juros'+count).val(juros);


       // $('#datainicialjuros'+count+',#datafinaljuros'+count+',#datafinalcorrecao'+count+',#dataevento'+count).

        $('#dataevento'+count).datepicker({
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            dateFormat: 'dd-mm-yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        })

       
        $('#datafinaljuros').change(function() {

           var count1 = count

            while(count>=2){

            var juros = $("#juros").val()            
            $('#juros'+count).val(juros)
            var juros = $('#juros'+count).val()*0.01/30
            var indice = $('#indicecorrecao'+count).val()
            var valor = parseFloat($('#valor'+count).val())
            var totallinha = indice*(1+juros)*valor
            $('#total'+count).val(totallinha.toFixed(2))
            count--

            }
            
           count = count*count1


        })

        $('#datainicialjuros').change(function() {
          
          var count1 = count

            while(count>=2){

            var juros = $("#juros").val()           
            $('#juros'+count).val(juros)
            var juros = $('#juros'+count).val()*0.01/30
            var indice = $('#indicecorrecao'+count).val()
            var valor = parseFloat($('#valor'+count).val())
            var totallinha = indice*(1+juros)*valor
            $('#total'+count).val(totallinha.toFixed(2))
            count-- 

             }
            
           count = count*count1


            })

    //})
    

    $('#indicecorrecao'+count).prop('readonly',true);
    $('#juros'+count).prop('readonly', true);    
    $('#total'+count).prop('readonly', true);




    $('#dataevento'+count).change(function(){

        var count1 = count

        
        while(count>=2){

            const encoge = new Map([

            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         

            ]);

        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()

        var start = $('#dataevento'+count).datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))          
        $('#indicecorrecao'+count).val(result.toFixed(7));

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2)) 

        count--

        }

        count = count*count1

    })


    $('#datafinalcorrecao').change(function(){

        const encoge = new Map([

            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         

            ]);

        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()

        var count1 = count

        while(count>=2){    
        
        var start = $('#dataevento'+count).datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
        $('#indicecorrecao'+count).val(result.toFixed(7));

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))

        count--

        }
        
        count = count*count1

        
    })

    $('#valor'+count).change(function() {

        var juros = $('#juros'+count).val()*0.01/30
        var indice = $('#indicecorrecao'+count).val()
        var valor = parseFloat($('#valor'+count).val())
        var totallinha = indice*(1+juros)*valor
        $('#total'+count).val(totallinha.toFixed(2))
        

    })


 /************************fim************************************/ 

 })

    $('#jonas').on('click','.removerLinha',function(){
        var button_id = $(this).attr("id")
        $('#campo'+button_id).remove()
    })   

})

</script>

<script>

    $(document).ready(function() {

        $("#datainicialjuros,#datafinaljuros,#datafinalcorrecao,#dataevento").datepicker({
            changeMonth: true,
            changeYear: true,
            firstDay: 1,
            dateFormat: 'dd-mm-yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        })

        $( "#datainicialjuros" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#datafinaljuros" ).datepicker({ dateFormat: 'dd-mm-yy' });

        $('#datafinaljuros').change(function() {
            var start = $('#datainicialjuros').datepicker('getDate');
            var end   = $('#datafinaljuros').datepicker('getDate');

            if (start<end) {
                var juros   = (end - start)/1000/60/60/24;                 
                $('#juros').val(juros);
                var juros = $('#juros').val()*0.01/30
                var indice = $('#indicecorrecao').val()
                var valor = parseFloat($('#valor').val())
                var totallinha = indice*(1+juros)*valor

                $('#total').val(totallinha.toFixed(2)) 
            }
            else {
                alert ("Operação não permitida!");
                $('#datainicialjuros').val("");
                $('#datafinaljuros').val("");
                $('#juros').val("");
            }
        });

        $('#datainicialjuros').change(function() {
            var start = $('#datainicialjuros').datepicker('getDate');
            var end   = $('#datafinaljuros').datepicker('getDate');

            if (start<end) {
                var juros   = (end - start)/1000/60/60/24;    
                $('#juros').val(juros);
                var juros = $('#juros').val()*0.01/30
                var indice = $('#indicecorrecao').val()
                var valor = parseFloat($('#valor').val())
                var totallinha = indice*(1+juros)*valor
                $('#total').val(totallinha.toFixed(2))
            }
        })
    })
    

    $('#indicecorrecao').prop('readonly',true);
    $('#juros').prop('readonly', true);    
    $('#total').prop('readonly', true);

    $('#dataevento').change(function(){

        const encoge = new Map([

            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         

            ]);

        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#dataevento').datepicker({dateFormat: 'dd-MM-yyyy'}).val()        
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))          
        $('#indicecorrecao').val(result.toFixed(7));

        var juros = $('#juros').val()*0.01/30
        var indice = $('#indicecorrecao').val()
        var valor = parseFloat($('#valor').val())
        var totallinha = indice*(1+juros)*valor
        $('#total').val(totallinha.toFixed(2)) 

    })


    $('#datafinalcorrecao').change(function(){

        const encoge = new Map([

            ['01-01-2021','1.1528566'],
            ['01-02-2021','1.1497523'],
            ['01-03-2021','1.1404010'],
            ['01-04-2021','1.1306772'],
            ['01-05-2021','1.1263969'],
            ['01-06-2021','1.1156863'],
            ['01-07-2021','1.1090321'],
            ['01-08-2021','1.0978342'],
            ['01-09-2021','1.0882575'],
            ['01-10-2021','1.0753533'],
            ['01-11-2021','1.0630222'],
            ['01-12-2021','1.0541672'],
            ['01-01-2022','1.0465270'],
            ['01-02-2022','1.0395625'],
            ['01-03-2022','1.0292698'],
            ['01-04-2022','1.0119652'],
            ['01-05-2022','1.0015491'],
            ['01-06-2022','0.9970623'],
            ['01-07-2022','0.9909186'],
            ['01-08-2022','0.9969000'],
            ['01-09-2022','1.0000000']         

            ]);

        var end = $('#datafinalcorrecao').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var start = $('#dataevento').datepicker({dateFormat: 'dd-MM-yyyy'}).val()
        var resultStart = encoge.get(start)
        var resultEnd = encoge.get(end)
        var result = (encoge.get(start)/encoge.get(end))      
        $('#indicecorrecao').val(result.toFixed(7));

        var juros = $('#juros').val()*0.01/30
        var indice = $('#indicecorrecao').val()
        var valor = parseFloat($('#valor').val())
        var totallinha = indice*(1+juros)*valor
        $('#total').val(totallinha.toFixed(2)) 

    })

    $('#valor').change(function() {

        var juros = $('#juros').val()*0.01/30
        var indice = $('#indicecorrecao').val()
        var valor = parseFloat($('#valor').val())
        var totallinha = indice*(1+juros)*valor
        $('#total').val(totallinha.toFixed(2))        

    })

/****************************Honorários********************************/
            
            $('#historicocondenacao').hide()
            $('#percentualcondenacao').hide()
            $('#historicovalor').hide()
            $('#valordeterminado').hide()
            $('#datadistribuicaovalor').hide()
            $('#indicedecorrecaohonorariosvalor').hide()               
            $('#historicocausa').hide()
            $('#valorcausa').hide()
            $('#percentualcausa').hide()
            $('#datadistribuicaocausa').hide()
            $('#indicedecorrecaohonorarioscausa').hide() 

    $("#honorarios").click(function(){

        var honorarios = document.getElementById('honorarios').value        
          
           if(honorarios=="causa"){ 

               $('#historicocondenacao').hide()
               $('#percentualcondenacao').hide()
               $('#historicovalor').hide()
               $('#valordeterminado').hide()
               $('#datadistribuicaovalor').hide()
               $('#indicedecorrecaohonorariosvalor').hide()
               
               $('#historicocausa').show()
               $('#valorcausa').show()
               $('#percentualcausa').show()
               $('#datadistribuicaocausa').show()
               $('#indicedecorrecaohonorarioscausa').show()                                                               

           } else if(honorarios == "condenacao"){

               $('#historicocausa').hide()
               $('#valorcausa').hide()
               $('#percentualcausa').hide()
               $('#datadistribuicaocausa').hide()                
               $('#indicedecorrecaohonorarioscausa').hide()               

               $('#historicovalor').hide()
               $('#valordeterminado').hide()
               $('#datadistribuicaovalor').hide()
               $('#indicedecorrecaohonorariosvalor').hide()

               $('#historicocondenacao').show()
               $('#percentualcondenacao').show()               


           } else if(honorarios == "valor"){

               $('#historicocausa').hide()
               $('#valorcausa').hide()
               $('#percentualcausa').hide()
               $('#datadistribuicaocausa').hide()                
               $('#indicedecorrecaohonorarioscausa').hide()               

               $('#historicovalor').show()
               $('#valordeterminado').show()
               $('#datadistribuicaovalor').show()
               $('#indicedecorrecaohonorariosvalor').show()

               $('#historicocondenacao').hide()
               $('#percentualcondenacao').hide()     


           } else {


               $('#historicocausa').hide()
               $('#valorcausa').hide()
               $('#percentualcausa').hide()
               $('#datadistribuicaocausa').hide()                
               $('#indicedecorrecaohonorarioscausa').hide()               

               $('#historicovalor').hide()
               $('#valordeterminado').hide()
               $('#datadistribuicaovalor').hide()
               $('#indicedecorrecaohonorariosvalor').hide()

               $('#historicocondenacao').hide()
               $('#percentualcondenacao').hide() 

           }    
  })

/***********************************************************************/

/*********************************Custas********************************/
            
            $('#custasdata').hide()
            $('#custashistorico').hide()
            $('#custasvalor').hide()
            $('#custasindice').hide()
            $('#custasatualizadas').hide()           

    
    $("#custas").click(function(){

        var custas = document.getElementById('custas').value      
          
           if(custas=="custasiniciais" || custas=="custascomplementar" ||custas=="custasapelacao" || custas =="custascumprimento" || custas =="custasoutros"){ 

            $('#custasdata').show()
            $('#custashistorico').show()
            $('#custasvalor').show()
            $('#custasindice').show()
            $('#custasatualizadas').show() 

           } else {

            $('#custasdata').hide()
            $('#custashistorico').hide()
            $('#custasvalor').hide()
            $('#custasindice').hide()
            $('#custasatualizadas').hide() 

           }   
  })

/***********************************************************************/
  
/*********************Honorários+Multa Art. 523*************************/
            
            $('#historicoart523').hide()
            $('#percentualart523').hide()                   

    
    $("#honorariosmultaart523").click(function(){

        var honorariosmultaart523 = document.getElementById('honorariosmultaart523').value      
          
           if(honorariosmultaart523=="honorariosmultaart523"){ 

            $('#historicoart523').show()
            $('#percentualart523').show()
             

           } else {

            $('#historicoart523').hide()
            $('#percentualart523').hide()
            

           }   
  })

/***********************************************************************/  













</script>

<script> /* $(document).ready(function(){$("#dataevento").mask("99/99/9999");});*/</script>










