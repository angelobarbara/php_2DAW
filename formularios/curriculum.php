<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Javier Ponferrada López">
    <link rel="stylesheet" href="./showCode/css/styleReadMore.css">
    <title>Actividad2</title>
    <style>
        .content{
            font-family: Arial;
            width:100%;
            height:100%;
            display: flex;
            display: -webkit-flex;
 	    align-items:center;
            flex-direction: column;

        }

        select,input{

            font-size: 1em;
            border-radius: 0px;
        }


        .campo_form{
            padding: 10px;
            border:1px solid #a4a4a4;
            margin-bottom: 20px;
            width:100%;
        }
        
        label{
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        form{
            display: flex;
            display: -webkit-flex;
            justify-content: center;

            flex-direction: column;
            padding:20px;
        }

        .check{
            width:auto;
        }

        select{
            width:100%;
        }

        .error{
            color: red;
        }
    </style>
</head>
<body>

    <div class="content">

    <?php


        $lenguajesProgramacion = array('C++','Java','Swift');
        $error =false;

        $errorName = "";
        $errorLastName = "";
        $errorProfession = "";
        $errorActitudes = "";
        $errorAcept = "";

        $name = "";
        $lastName = "";
        $profession = "";
        $leguajes =array();
        $anioNacimiento = "";
        $actitudes = [];
        $acept = "";

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if(isset($_POST['submit'])){

            if(empty($_POST['nombre'])){
                $errorName = "Nombre vacío";
                $error = true;
            }
            if(empty($_POST['apellidos'])){
                $errorLastName = "Apellidos vacío";
                $error = true;
            }
            if(count($_POST['profesion'])==0){
                $errorProfession = "Profesión sin indicar";
                $error = true;
            }
            if(empty($_POST['checkbox_condition'])){
                $errorAcept = "No has aceptado las condiciones";
                $error = true;
            }

            if($error){
                $name = test_input($_POST['nombre']);
                $lastName = test_input($_POST['apellidos']);
                $profession = test_input($_POST['profesion']);
                $leguajes =  $_POST['checkboxs'];
                $anioNacimiento =test_input($_POST['anio']);
                $acept = test_input($_POST['checkbox_condition']);
            }

        }

        //Vista
        echo '<form id="form"action="'.$_SERVER["PHP_SELF"].'" method="post">
                <div class="campo_form">
                    <label>Nombre</label>';
                    echo '<input type="text" name="nombre" value="'.$name.'"><a class="error">* '.$errorName.'</a>';

                echo '</div>
                <div class="campo_form">
                    <label>Apellidos</label>';
                    echo '<input type = "text" name = "apellidos" value="'.$lastName.'"><a class="error">* '.$errorLastName.'</a>';

                echo '</div>
                <div class="campo_form">
                    <label>Profesiones</label>
                    <input type="radio" name="profesion" value="Programador" '.(("Programador"==$profession)?"checked=checked":"").'> Programador<br>
                    <input type="radio" name="profesion" value="Diseñador" '.(("Diseñador"==$profession)?"checked=checked":"").'> Diseñador<br>
                    <a class="error">* '.$errorProfession.'</a>
                </div>
                <div class="campo_form">
                    <label>Lenguajes que conoces</label>
                    ';
                    $countLenguage = 0;

                    foreach ($lenguajesProgramacion as $lenguaje){

                        echo '<div class="campo_form check">
                                <input type="checkbox" name="checkboxs[]" value="'.$lenguaje.'" '.($lenguaje==$leguajes[$countLenguage]?"checked=checked":"").'/>'.$lenguaje.'
                        </div> ';
                        $countLenguage++;
                    }


                echo '</div>
                <div class="campo_form">
                    <label>Año nacimiento</label>
                    <select id="anio" name="anio">';

                        for ($j = 1000;$j<date('Y')+1;$j++){
                            echo '<option value = "'.$j.'"'.(("$j"==$anioNacimiento)?"selected=selected":"").'>'.$j.'</option>';


                        }

                    echo '</select>
                </div>';

                


                echo '
                <div class="campo_form">
                    <input class="button" type="checkbox" name="checkbox_condition" value="acepto" '.(("acepto"==$acept)?"checked=checked":"").'/>Hacepto todas las condiciones
                <a class="error">* '.$errorAcept.'</a>
                </div>';
                echo '<input class="button" name="submit" type="submit" value="Mostrar"/>';

                echo '<input class="button" name="reset" type="reset" class="reset_button" value="Reset"/>';


              echo '</form>';


        //Resultado
        if(isset($_POST['submit']) && !$error){
            echo '<div class="campo_form">';
                echo'<p class="label">Nombre</p>';
                echo '<p class="parrafo">'.$_POST['nombre'].'</p>';
            echo '</div>';
            echo '<div class="campo_form">';
                echo'<p class="label">Apellidos</p>';
                echo '<p class="parrafo">'.$_POST['apellidos'].'</p>';
            echo '</div>';
            echo '<div class="campo_form">';
                echo'<p class="label">Profesión</p>';
                echo '<p class="parrafo">'.$_POST['profesion'].'</p>';
            echo '</div>';
            echo '<div class="campo_form">';
                echo'<p class="label">Lenguajes que conoces</p>';

                echo '<div class="campo_form check">';
                for ($i = 0 ; $i<count($_POST['checkbox']);$i++){
                    echo '<p class="parrafo">'.$_POST['checkbox'][$i].'</p>';
                }

            echo '</div>';


            echo '</div>';

            echo '<div class="campo_form">';
                echo'<p class="label">Año de nacimiento</p>';
                echo '<p class="parrafo">'.$_POST['anio'].'</p>';
            echo '</div>';

            echo '<div class="campo_form">';
                echo'<p class="label">¿Acepta las condiciones?</p>';
                echo '<p class="parrafo">'.$_POST['checkbox_condition'].'</p>';
            echo '</div>';
        }


    ?>

</div>

</body>
<a href="verCodigo.php?src=curriculum.php"> 
        <h3>Ver código</h3> 
      </a>
</html
