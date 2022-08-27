<?php  

require_once("verificar.php");
    require_once("../conexao.php");
    $id_usuario = $_SESSION['id'];

    $query = $pdo->query("SELECT * from usuarios where id = '$id_usuario'");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);

    if ($total_reg > 0) {
        $nome_usuario = $res[0]['nome'];
        $email_usuario = $res[0]['email'];
        $cfp_usuario = $res[0]['cpf'];
        $nivel_usuario = $res[0]['nivel'];
    }


?>

<!DOCTYPE HTML>
        <html>
        <head>
        <title>Nome do sistema</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />

        <!-- font-awesome icons CSS -->
        <link href="css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons CSS-->

        <!-- side nav css file -->
        <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
        <!-- //side nav css file -->
         
         <!-- js-->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/modernizr.custom.js"></script>

        <!--webfonts-->
        <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <!--//webfonts--> 

        <!-- chart -->
        <script src="js/Chart.js"></script>
        <!-- //chart -->

        <!-- Metis Menu -->
        <script src="js/metisMenu.min.js"></script>
        <script src="js/custom.js"></script>
        <link href="css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->
        <style>
        #chartdiv {
          width: 100%;
          height: 295px;
        }
        </style>
        

            
        </head> 
        <body class="cbp-spmenu-push">
            <div class="main-content">
            <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                <!--left-fixed -navigation-->
                <aside class="sidebar-left">
              <nav class="navbar navbar-inverse">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="index.html"><span class="fa fa-calculator"></span> Sistema<span class="dashboard_text">Cálculos Judiciais</span></a></h1>
                  </div>
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="sidebar-menu">
                      <li class="header">MENU DE NAVEGAÇÃO</li>
                      <li class="treeview">
                        <a href="index.php">
                        <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                      </li>
                      
                    </ul>
                  </div>

                  <!-- /.navbar-collapse -->

              </nav>
            </aside>
            </div>
                <!--left-fixed -navigation-->
                
                <!-- header-starts -->
                <div class="sticky-header header-section ">
                    <div class="header-left">
                        <!--toggle button start-->
                        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                        <!--toggle button end-->
                        <div class="profile_details_left"></div>
                       
                        <div class="clearfix"> </div>
                    </div>
                    <div class="header-right">                      
                        
                                              
                        <div class="profile_details">       
                            <ul>
                                <li class="dropdown profile_details_drop">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <div class="profile_img">   
                                            <span class="prfil-img"><img src="" alt=""> </span> 
                                            <div class="user-name">
                                                <p><?php echo $nome_usuario ?></p>
                                                <span><?php echo $nivel_usuario ?></span>
                                            </div>
                                            <i class="fa fa-angle-down lnr"></i>
                                            <i class="fa fa-angle-up lnr"></i>
                                            <div class="clearfix"></div>    
                                        </div>  
                                    </a>
                                    <ul class="dropdown-menu drp-mnu">
                                        <li> <a href="#"><i class="fa fa-cog"></i> Configurações</a> </li> 
                                        <li> <a href="#"><i class="fa fa-user"></i> Minha conta</a> </li>                                        
                                        <li> <a href="../index.php"><i class="fa fa-sign-out"></i> Sair</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>               
                    </div>
                    <div class="clearfix"> </div>   
                </div>
                <!-- //header-ends -->
                <!-- main content start-->

                
                <div id="page-wrapper">
                    
                   
                   <h3 class="title1">Relatório de cálculos :</h3>
                   <div class="form-three widget-shadow">
                    <form class="form-horizontal">
                       
                       
                        <div class="form-group">
                            <label for="radio" class="col-sm-2 control-label">Escolha uma opção:</label>
                            <div class="col-sm-8">
                                <div class="radio-inline"><label><input type="radio"> Cíveis</label></div>
                                <div class="radio-inline"><label><input type="radio" > Sucessões</label></div>
                                <div class="radio-inline"><label><input type="radio" > Família</label></div>
                                <div class="radio-inline"><label><input type="radio" > Fazenda</label></div>
                                <div class="radio-inline"><label><input type="radio" > Criminal</label></div>
                                <div class="radio-inline"><label><input type="radio" > Custas</label></div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Selecione a vara:</label>
                            <div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>
                                <option>Tribunal de Justiça de Pernambuco</option>                                     
                            </select></div>
                        </div>

                        <div class="form-group">
                            <label for="datetimepicker6" class="col-sm-2 control-label">Escolha o período:</label>
                           <div class='col-md-2'>
                              <div class="form-group">
                                 <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class='col-md-2'>
                              <div class="form-group">
                                 <div class='input-group date' id='datetimepicker7'>
                                    <input type='text' class="form-control" />
                                    <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <script type="text/javascript">
                           $(function () {
                               $('#datetimepicker6').datetimepicker();
                               $('#datetimepicker7').datetimepicker({
                           useCurrent: false //Important! See issue #1075
                           });
                               $("#datetimepicker6").on("dp.change", function (e) {
                                   $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                               });
                               $("#datetimepicker7").on("dp.change", function (e) {
                                   $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                               });
                           });
                        </script>


                        <div class="form-group"> <div class="col-sm-offset-2"> <button type="submit" class="btn btn-default">Pesquisar</button></div>



                </div>
              

                          
            
            <!-- Classie --><!-- for toggle left push menu script -->
                <script src="js/classie.js"></script>
                <script>
                    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
                        showLeftPush = document.getElementById( 'showLeftPush' ),
                        body = document.body;
                        
                    showLeftPush.onclick = function() {
                        classie.toggle( this, 'active' );
                        classie.toggle( body, 'cbp-spmenu-push-toright' );
                        classie.toggle( menuLeft, 'cbp-spmenu-open' );
                        disableOther( 'showLeftPush' );
                    };
                    

                    function disableOther( button ) {
                        if( button !== 'showLeftPush' ) {
                            classie.toggle( showLeftPush, 'disabled' );
                        }
                    }
                </script>
            <!-- //Classie --><!-- //for toggle left push menu script -->
                
            <!--scrolling js-->
            <script src="js/jquery.nicescroll.js"></script>
            <script src="js/scripts.js"></script>
            <!--//scrolling js-->
            
            <!-- side nav js -->
            <script src='js/SidebarNav.min.js' type='text/javascript'></script>
            <script>
              $('.sidebar-menu').SidebarNav()
            </script>
            <!-- //side nav js -->           
                       
            
            <!-- Bootstrap Core JavaScript -->
           <script src="js/bootstrap.js"> </script>
            <!-- //Bootstrap Core JavaScript -->
            
        </body>
        </html>