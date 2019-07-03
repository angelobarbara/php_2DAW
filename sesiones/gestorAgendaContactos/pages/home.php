<?php
    function mostrarDiezPrimerosContactos(){
        if(isset($_SESSION['contactos'])){
            $count = 0;
            foreach ($_SESSION['contactos'] as $contacto){
                if($count==10){
                    break;
                }

                echo '
                   <div class="contact">
                        <div class="content_imgavatar">
                          <img class="imgavatar" src="img/avatar.png" alt="">
                        </div>
                        <p class="nombreContacto"> '.$contacto['nombre'].'</p>
                        <div class="content_imgModify">
                            <a href="'.$_SERVER['PHP_SELF'].'?action=modify&cid='.$contacto["cod"].'">
                                <img class="imgModify" src="img/modify.png" alt="">
                            </a>
                        </div>
                    </div> 
                ';
                $count++;
            }
        }
    }


    function mostrarNombreContactos($nombre){
        $regex = '/.*'.strtolower($nombre).'.*/';
        if(isset($_SESSION['contactos'])){
            foreach ($_SESSION['contactos'] as $contacto){
                if(preg_match($regex,strtolower($contacto['nombre']))){
                    echo '
                       <div class="contact">
                            <div class="content_imgavatar">
                               
                                <img class="imgavatar" src="img/avatar.png" alt="">
                                
                            </div>
                            <p class="nombreContacto"> '.$contacto['nombre'].'</p>
                            <div class="content_imgModify">
                                <a href="'.$_SERVER['PHP_SELF'].'?action=modify&cid='.$contacto["cod"].'">
                                    <img class="imgModify" src="img/modify.png" alt="">
                                </a>
                            </div>
                        </div> 
                    ';
                }

            }
        }
    }
    $msgbusqueda = "";
    if(isset($_POST['btnbuscar'])){
        $msgbusqueda = 'Buscaste: "'.$_POST['text_buscar'].'"';
    }

    echo '
        <form class="formBuscar" action="'.$_SERVER["PHP_SELF"].'" method="POST">
            <input id="Buscar" type="text" name="text_buscar" value="" placeholder="Buscar">
            <input class="submit" type="submit" name="btnbuscar" value="Buscar">
        </form>
        
        
    ';

    echo '
        <div class="content_list_contact">
            <p class="title_content_list_contact">
                Contactos
            </p>
            <p class="msgBusquedaResult">'.$msgbusqueda.'</p>
            <div class="contacts">';

                if(!isset($_POST['btnbuscar'])){
                    mostrarDiezPrimerosContactos();
                }else{
                    mostrarNombreContactos($_POST['text_buscar']);
                }
               
           echo' </div>
        </div>
    ';


?>



