<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="description" content="size, inch, tamaño, pantalla, calc, calculator, dpi, screen">
        <meta name="author" content="edur">
        <title>Calculadora de tamaño de pantalla</title>
        <style>
            
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
            
        </style>
    </head>
    <body>
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
            <label for="formato">Formato de pantalla:</label>
            <select name="formato" id="formato">
                <option value="1.77777777">16:9 HD Phones</option>
                <option value="1.5">3:2 (iPhone, 480x320)</option>
                <option value="1.33333333">4:3 (iPad, Galaxy Y, 320*240)</option>
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
                <label for="formato2">Formato de pantalla:</label>
                <select name="formato2" id="formato2">
                    <option value="1.77777777">16:9 HD Phones</option>
                    <option value="1.5">3:2 (iPhone, 480x320)</option>
                    <option value="1.33333333">4:3 (iPad, Galaxy Y, 320*240)</option>
                </select>
                <br>
            </div>
            
            <input type="submit" id="enviar" value="Calcule Size">
        </form>
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
