@php
    echo "<table class='table align-items-center'>";
    echo "<tr>";
    echo "<th>Cantidad</th>";
    echo "<th>Producto</th>";
    echo "<th>Precio</th>";
    echo "</tr>";
    $total_comida=0;
    foreach($comida as $com){
        if($com->numero_mesa == $num) {
            echo "<tr>";
            echo "<td>";
            echo $com->cantidad;
            echo "</td>";
            echo "<td>";
            echo $com->nombre;
            echo "</td>";
            echo "<td>";
            echo "$".$com->precio*$com->cantidad;
            echo "</td>";	
            echo "</tr>\n";	
            $total_comida = $total_comida + $com->precio*$com->cantidad;		
        }
    }
    $total_bebida=0;
    foreach($bebiditas as $bebi){
        if($bebi->numero_mesa == $num) {
            echo "<tr>";
            echo "<td>";
            echo $bebi->cantidad;
            echo "</td>";
            echo "<td>";
            echo $bebi->nombre;
            echo "</td>";
            echo "<td>";
            echo "$".$bebi->precio*$bebi->cantidad;
            echo "</td>";	
            echo "</tr>\n";	
            $total_bebida = $total_bebida + $bebi->precio*$bebi->cantidad;		
        }
    }
    $total_pastel=0;
    foreach($pastelitos as $past){
        if($past->numero_mesa == $num) {
            echo "<tr>";
            echo "<td>";
            echo $past->cantidad;
            echo "</td>";
            echo "<td>";
            echo $past->nombre;
            echo "</td>";
            echo "<td>";
            echo "$".$past->precio*$past->cantidad;
            echo "</td>";	
            echo "</tr>\n";	
            $total_pastel = $total_pastel + $past->precio*$past->cantidad;		
        }
    }
    $total_cafe=0;
    foreach($cafeteria as $cof){
        if($cof->numero_mesa == $num) {
            echo "<tr>";
            echo "<td>";
            echo $cof->cantidad;
            echo "</td>";
            echo "<td>";
            echo $cof->nombre;
            echo "</td>";
            echo "<td>";
            echo "$".$cof->precio*$cof->cantidad;
            echo "</td>";	
            echo "</tr>\n";	
            $total_cafe = $total_cafe + $cof->precio*$cof->cantidad;		
        }
    }
    echo "<tr>";
    echo "<th>Total:</th>";
    echo "<th></th>";
    echo "<th>";
    echo "$";
    echo $total_bebida + $total_cafe + $total_comida + $total_pastel;
    echo "</th>";
    echo "</tr>";
    echo "</table>";
    echo "";
    
@endphp

<script>
    window.print();
    window.close();
</script>