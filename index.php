<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="size, inch, tamaño, pantalla, calc, calculator, dpi, screen">
        <meta name="author" content="edur">
        <title>Calculadora de tamaño de pantalla</title>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Lobster);
            
            body{
                background-image: url(fondo.jpg);
                background-position: center top;
            }
            
            h1{
                font-family: 'Lobster', cursive;
                text-align: center;
                font-size: 4em;
            }
            div#comparacion{
                display: none;
            }
            
            div#cm{
                background: blue;
                color: white;
                text-align: center;
                width: 1cm;
                height: 1cm;
                opacity: 0.5;
            }
            
            div#comparacion1{
                background: red;
            }
            
            div#contenido{
                margin-left: auto;
                margin-right: auto;
                width: 320px;
            }
            
            input, button, select{
                height: 3em;
                margin: 0.5em;
                -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
                -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
                box-shadow:inset 0px 1px 0px 0px #ffffff;
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );
                background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
                background-color:#ededed;
                -webkit-border-top-left-radius:25px;
                -moz-border-radius-topleft:25px;
                border-top-left-radius:25px;
                -webkit-border-top-right-radius:25px;
                -moz-border-radius-topright:25px;
                border-top-right-radius:25px;
                -webkit-border-bottom-right-radius:25px;
                -moz-border-radius-bottomright:25px;
                border-bottom-right-radius:25px;
                -webkit-border-bottom-left-radius:25px;
                -moz-border-radius-bottomleft:25px;
                border-bottom-left-radius:25px;
                text-indent:0px;
                border:3px solid #dcdcdc;
                display:inline-block;
                color:#777777;
                font-family:arial;
                font-size:19px;
                font-weight:bold;
                font-style:normal;
                height:51px;
                line-height:51px;
                text-decoration:none;
                text-align:center;
                text-shadow:1px 1px 0px #ffffff;
        }
        input:hover, button:hover {
                background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
                background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
                background-color:#dfdfdf;
                    }
        </style>
    </head>
    <body>
        
        <h1 id="titulo">Screen Size Calculator</h1>
        <div id="contenido">
        <?php
            $pulgadas2 =  0.0;
            if(isset($_POST['pulgadas'])){
                
                $pulgadas=$_POST['pulgadas'];
                $formato=$_POST['formato'];
                
                //Calculamos el angulo en radianes
                $angulo=  atan($formato);
                
                $PULGADAS_EN_CM = 2.54;
                $diagonalEnCm = $PULGADAS_EN_CM * $pulgadas;
                $alto = sin($angulo) * $diagonalEnCm;
                $ancho = cos($angulo) * $diagonalEnCm;
            }
        ?>
        <form action="" method="post">
            
            <label for="pulgadas">Diagonal size(inch):</label>
            <input name="pulgadas" id="pulgadas" type="number" min="0" step="0.1" 
                   value="<?php echo $pulgadas;/*Obtiene el ultimo valor*/ ?>" 
                   max="9999">
            <br>
            <label for="formato">Display Format:</label>
            <select name="formato" id="formato">
                <option value="1.77777777">16:9 HD Phones</option>
                <option value="1.5">3:2 (iPhone, 480x320)</option>
                <option value="1.33333333">4:3 (iPad, Galaxy Y, 320*240)</option>
                <option value="1.66666666">16:10 (Galaxy S, 800*480)</option>
                <option value="1.25">5:4 (Monitor 1280x1024)</option> 
            </select>
            <br>
            <button type="button" onclick="comprobarVisibildad()">Compare 2 screens</button>
            <br>
            
            <div id="comparacion">
                <label for="pulgadas2">Diagonal size(inch):</label>
                <input name="pulgadas2" id="pulgadas2" type="number" min="0" step="0.1" 
                       value="<?php echo $pulgadas2;/*Obtiene el ultimo valor*/ ?>" 
                       max="9999">
                <br>
                <label for="formato2">Display Format:</label>
                <select name="formato2" id="formato2">
                    <option value="1.77777777">16:9 HD Phones</option>
                    <option value="1.5">3:2 (iPhone, 480x320)</option>
                    <option value="1.33333333">4:3 (iPad, Galaxy Y, 320*240)</option>
                    <option value="1.66666666">16:10 (Galaxy S, 800*480)</option>
                    <option value="1.25">5:4 (Monitor 1280x1024)</option>
                </select>
                <br>
            </div>
            
            <input type="submit" id="enviar" value="Calcule Size">
        </form>
        </div>
        <?php            
                
            if(isset($_POST['pulgadas'])){
                echo "<div><a>Size: </a>".redondeo($alto, 2)." x ".redondeo($ancho,2)
                        ." cm</div>";
                
                //Mostramos un div del tamño de la pantalla
                if(isset($_POST['pulgadas2'])){
                //if(false){    
                    $pulgadas2=$_POST['pulgadas2'];
                    $formato2=$_POST['formato2'];

                    //Calculamos el angulo en radianes
                    $angulo2=  atan($formato2);

                    $diagonalEnCm2 = $PULGADAS_EN_CM * $pulgadas2;
                    $alto2 = sin($angulo2) * $diagonalEnCm2;
                    $ancho2 = cos($angulo2) * $diagonalEnCm2;
                    
                    echo "<div id=\"comparacion1\" style=\"width: ".$ancho."cm; height: ".$alto.
                            "cm;\"><div id=\"cm\" style=\"width: ".$ancho2.
                            "cm; height: ".$alto2."cm;\"></div></div>";
                }else{
                    echo "<div id=\"comparacion1\" style=\"width: ".$ancho."cm; height: ".$alto.
                            "cm;\"><div id=\"cm;\">1 cm</div></div>";
                }
            }
            
            function redondeo ($numero, $decimales) { 
                $factor = pow(10, $decimales); 
                return (round($numero*$factor)/$factor); 
            }
            
        ?>
        <script>
            function comprobarVisibildad(){
                if(document.getElementById("comparacion").style.display === "none"){
                    document.getElementById("comparacion").style.display = "block";
                }else{
                    document.getElementById("comparacion").style.display = "none";
                }
            }
        </script>
    </body>
</html>
