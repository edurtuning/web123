<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora de tamaño de pantalla</title>
    </head>
    <body>
        <?php
            if(isset($_POST['pulgadas'])){
                
                $pulgadas=$_POST['pulgadas'];
                $formato=$_POST['formato'];
                
                //Calculamos el angulo en radianes
                $angulo=  atan($formato);
                
                $PULGADAS_EN_CM = 2.54;
                $diagonalEnCm = $PULGADAS_EN_CM * $pulgadas;
                $alto = sin($angulo) * $diagonalEnCm;
                $ancho = cos($angulo) * $diagonalEnCm;
                
                echo "<div>Size: ".$alto." x ".$ancho."</div>";
                
            }
        ?>
        <form action="" method="post">
            
            <label for="pulgadas">Diagonal size(inch):</label>
            <input name="pulgadas" id="pulgadas" type="number" min="0" step="0.1" max="9999999">
            <br>
            <label for="formato">Formato de pantalla:</label>
            <select name="formato" id="formato">
                <option value="1.77777777">16:9 HD Phones</option>
                <option value="1.5">3:2 (iPhone, 480x320)</option>
                <option value="1.33333333">4:3 (iPad, Galaxy Y, 320*240)</option>
            </select>
            <br>
            <input type="submit" id="enviar" value="Calcule Size">
        </form>   
    </body>
</html>
