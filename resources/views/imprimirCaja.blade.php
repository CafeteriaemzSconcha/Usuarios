<html>
 
<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}" defer></script>
 
</head>
 
<body>
    <div class='ticket'>
    <center>
        <img class='pequeña' src="{{ asset('img/logo.png') }}">
    </center>
@php
    
    echo "<p class='centrado'>Mesa Nº$nummesa";
      echo "<br>".date("d-m-Y H:i:s");
      echo "</p>";
    echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='cantidad'>Cant.</th>";
        echo "<th class='producto'>Prod.</th>";
        echo "<th class='precio'>Precio</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $total_comida=0;
    foreach($comida as $com){
        if($com->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $com->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $com->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$com->precio*$com->cantidad*(1-($com->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_comida = $total_comida + $com->precio*$com->cantidad*(1-($com->descuento/100));		
        }
    }
    $total_bebida=0;
    foreach($bebiditas as $bebi){
        if($bebi->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $bebi->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $bebi->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$bebi->precio*$bebi->cantidad;
            echo "</td>";	
            echo "</tr>\n";	
            $total_bebida = $total_bebida + $bebi->precio*$bebi->cantidad*(1-($com->descuento/100));		
        }
    }

    $total_pastel=0;
    foreach($pastelitos as $past){
        if($past->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $past->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $past->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$past->precio*$past->cantidad*(1-($past->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_pastel = $total_pastel + $past->precio*$past->cantidad*(1-($past->descuento/100));		
        }
    }
    $total_cafe=0;
    foreach($cafeteria as $cof){
        if($cof->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $cof->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $cof->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$cof->precio*$cof->cantidad*(1-($cof->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_cafe = $total_cafe + $cof->precio*$cof->cantidad*(1-($cof->descuento/100));		
        }
    }
    $total_agregados=0;
    foreach($agregaditos as $agr){
        if($agr->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo "1";
            echo "</td>";
            echo "<td class='producto'>";
            echo $agr->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$agr->precio*(1-($agr->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_agregados = $total_agregados + $agr->precio*(1-($agr->descuento/100));		
        }
    }
    $total_desayuno=0;
    foreach($desayunitos as $des){
        if($des->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $des->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $des->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$des->precio*$des->cantidad*(1-($des->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_desayuno = $total_desayuno + $des->precio*$des->cantidad*(1-($des->descuento/100));		
        }
    }
    $total_helados=0;
    foreach($heladitos as $hel){
        if($hel->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $hel->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $hel->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$hel->precio*$hel->cantidad*(1-($hel->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_helados = $total_helados + $hel->precio*$hel->cantidad*(1-($hel->descuento/100));		
        }
    }
    $total_postre=0;
    foreach($postresitos as $pos){
        if($pos->numero_mesa == $nummesa) {
            echo "<tr>";
            echo "<td class='cantidad'>";
            echo $pos->cantidad;
            echo "</td>";
            echo "<td class='producto'>";
            echo $pos->nombre;
            echo "</td>";
            echo "<td class='precio'>";
            echo "$".$pos->precio*$pos->cantidad*(1-($pos->descuento/100));
            echo "</td>";	
            echo "</tr>\n";	
            $total_postre = $total_postre + $pos->precio*$pos->cantidad*(1-($pos->descuento/100));		
        }
    }
    $total=$total_bebida + $total_cafe + $total_pastel + $total_comida + $total_agregados + $total_postre + $total_helados + $total_desayuno;
    $prop=$total*0.1;
    echo "<tr>";
    echo "<th>Total:</th>";
    echo "<th></th>";
    echo "<th>";
    echo "$";
    echo $total;
    echo "</th>";
    echo "</tr>";
    if($desc !=0){
        $total=$total*(1-($desc/100));
        $prop = $total*0.1;
        echo "<tr>";
        echo "<th>%Desc:</th>";
        echo "<th></th>";
        echo "<th>";
        echo $desc;
        echo "%";
        echo "</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Total c/desc:</th>";
        echo "<th></th>";
        echo "<th>";
        echo "$";
        echo $total;
        echo "</th>";
        echo "</tr>";
    }
    echo "<tr>";
    echo "<th>Prop sugerida:</th>";
    echo "<th></th>";
    echo "<th>";
    echo "$";
    echo $prop;
    echo "</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Total c/propina:</th>";
    echo "<th></th>";
    echo "<th>";
    echo "$";
    echo $total + $prop;
    echo "</th>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo ""; 
@endphp
<p class="centrado">¡Gracias por su visita!
<br>http://cafeteriaemz.cl</p>
<button class="oculto-impresion" onclick='imprimir()'>Imprimir</button> 
  
</body>
 
</html>


    
    
    
    

