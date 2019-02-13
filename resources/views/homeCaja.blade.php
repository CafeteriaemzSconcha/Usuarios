@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addmesa">Ingresar comanda</button>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>   
                    @endif
                    
                    @for($i=1 ; $i<=15 ; $i++)
                        @if($i==1 || $i==6 || $i==11)
                            <div class="form-row">
                                <div class="col-1">
                                </div>
                        @endif()
                            @if($i < 10)
                                <div class="col-auto">    
                                    <button id="bmesa{{$i}}" class="btn btn-outline-dark btn-lg btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa{{$i}}" disabled="disabled">Mesa 0{{$i}}</button>
                                </div>
                            @else
                                <div class="col-auto">   
                                    <button id="bmesa{{$i}}" class="btn btn-outline-dark btn-lg btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa{{$i}}" disabled="disabled">Mesa {{$i}}</button>
                                </div>
                            @endif()
                        @if($i==5 || $i==10 || $i==15)
                            <div class="col-1">
                            </div>
                            </div>
                            <div class="form-row"><div class="col-1">
                            </div></div>
                        @endif()
                    @endfor()
                </div>
                @php
                    foreach ($lista as $listas){ 
                        echo "<script>\n";
                        echo "document.getElementById('bmesa$listas').disabled=false;\n";
                        echo "document.getElementById('bmesa$listas').className='btn btn-dark btn-lg btn-social text-center rounded-square i'";
                        echo "</script>\n";                
                    }
                @endphp 
                
            </div>
        </div>
    </div>
</div>

<div class='modal fade' id='addmesa' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog' role='document'>
		<div class='modal-content'>
		    <div class='modal-header'>
		        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
		        <span aria-hidden='true'>&times;</span>
		        </button>
		        <h4 class='modal-title' id='myModalLabel'>Ingresar Comanda. </h4>
		    </div>
            <div class='modal-body center-block'>
                {{ Form::open(array('url' => '/caja','method' => 'POST', 'onSubmit' => 'return hab_mesaG()', 'class' => "form-inline")) }}
                    {{ Form::label('Ingrese mesa', 'Ingrese mesa:') }}
                    {{ Form::number('num', 1,array('id'=>'num','min'=>'1' ,'max'=>15,'class'=>'form-control form-control-sm'))}}
                    <div class='container'>
                        <div id='divSandwich'>
                            <div class="form-row">
                                <div class="col-4"></div>
                                <div class="col-auto">
                                    <button id='minusS' type="button" onclick="destroyS()" class='btn btn-secondary btn-sm'>-</button>
                                </div>
                                <div class="col-auto">
                                    {{ Form::label('Sandwich', 'Platos calientes:') }}
                                </div>
                                <div class="col-auto">
                                    <button id='masS' type="button" onclick="duplicateS()" class='btn btn-secondary btn-sm'>+</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="form-row" id='rowSandwich'>
                                <div class="col-7">
                                    {{ Form::select('sandwich', $lista_platos ,null,['id'=>'sandwich','class'=>'form-control form-control-sm']) }}
                                </div>
                                <div class="col-3">
                                    {{ Form::number('cantS', 1,array('id'=>'cantS','min'=>'1','class'=>'form-control form-control-sm'))}}
                                </div>
                            </div>
                        </div>
                        <div id='divBebida'>
                            @php
                                $bebidas=array('0' => 'Seleccione Bebida');
                                foreach($bebida as $beb){
                                    array_push($bebidas,$beb->nombre." $".$beb->precio);
                                }
                            @endphp
                            <div class="form-row">
                                <div class="col-4"></div>
                                <div class="col-auto">
                                    <button id='minusB' type="button" onclick="destroyB()" class='btn btn-secondary btn-sm'>-</button>
                                </div>
                                <div class="col-auto">
                                {{ Form::label('Bebidas', 'Jugos y bebidas frias:') }}    
                                </div>
                                <div class="col-auto">
                                    <button id='masB' type="button" onclick="duplicateB()" class='btn btn-secondary btn-sm'>+</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="form-row" id='rowBebida'>
                                <div class="col-7">
                                    {{ Form::select('bebida', $bebidas ,null,['id'=>'bebida','class'=>'form-control form-control-sm']) }}
                                </div>
                                <div class="col-3">
                                    {{ Form::number('cantB', 1,array('id'=>'cantB','min'=>'1','class'=>'form-control form-control-sm'))}}
                                </div>
                            </div>
                        </div>
                        <div id='divCafe'>
                            @php
                                $cafes=array('0' => 'Seleccione te o cafe');
                                foreach($cafe as $caf){
                                    array_push($cafes,$caf->nombre." $".$caf->precio);
                                }
                            @endphp
                            <div class="form-row">
                                <div class="col-4"></div>
                                <div class="col-auto">
                                    <button id='minusC' type="button" onclick="destroyC()" class='btn btn-secondary btn-sm'>-</button>
                                </div>
                                <div class="col-auto">
                                    {{ Form::label('Cafe', 'Té o Cafe:') }}
                                </div>
                                <div class="col-auto">    
                                    <button id='masC' type="button" onclick="duplicateC()" class='btn btn-secondary btn-sm'>+</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="form-row" id='rowCafe'>
                                <div class="col-7">
                                    {{ Form::select('cafe', $cafes ,null,['id'=> 'cafe','class'=>'form-control form-control-sm']) }}
                                </div>
                                <div class="col-3">
                                    {{ Form::number('cantC', 1,array('id'=>'cantC','min'=>'1','class'=>'form-control form-control-sm'))}}
                                </div>
                            </div>
                        </div>
                        <div id='divPastel'>
                            @php
                                $pasteles=array('0' => 'Seleccione pastel');
                                foreach($pastel as $pas){
                                    array_push($pasteles,$pas->nombre." $".$pas->precio);
                                }
                            @endphp
                            <div class="form-row">
                                <div class="col-5"></div>
                                <div class="-auto">
                                    <button id='minusP' type="button" onclick="destroyP()" class='btn btn-secondary btn-sm'>-</button>
                                </div>
                                <div class="col-auto">    
                                    {{ Form::label('Pastel', 'Pastelería:') }}
                                </div>
                                <div class="col-auto">
                                    <button id='masP' type="button" onclick="duplicateP()" class='btn btn-secondary btn-sm'>+</button>
                                </div>
                                <div class="col-3"></div>
                            </div>
                            <div class="form-row" id='rowPastel'>
                                <div class="col-7" id='selec_pastel'>
                                    {{ Form::select('pastel', $pasteles ,null,['id'=>'pastel','class'=>'form-control form-control-sm']) }}
                                </div>
                                <div class="col-3" id='number_cant'>
                                    {{ Form::number('cantP', 1,array('id'=>'cantP','min'=>'1','class'=>'form-control form-control-sm'))}}
                                </div>
                            </div>
                        </div>
                    </div> 
                    <hr>
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-auto">
                            {{ Form::submit('Habilitar mesa', array('class' => 'btn btn-success')) }}
                        </div>
                        <div class="col-4"></div>
                    </div>
                {{ Form::close() }}
                <h3 id='ocupado'></h3>
                
            </div>
        </div>
    </div>
</div>



@php
	foreach ($lista as $nummesa){
		echo "<div class='modal fade' id='mesa$nummesa' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
		echo "<div class='modal-dialog' role='document'>\n";
		echo "<div class='modal-content'>\n";
		echo "<div class='modal-header'>\n";
		echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>\n";
		echo "<span aria-hidden='true'>&times;</span>\n";
		echo "</button>\n";
        echo "<h4 class='modal-title' id='myModalLabel'>Mesa $nummesa</h4>\n";
        echo "<form method='get' action='borrar/$nummesa' accept-charset='UTF-8' onsubmit='return alerta_borrar()'>";
        echo "<input type='submit' class='btn btn-danger' value='Eliminar mesa'></input>";
        echo "</form>";
        echo "</div>\n";
        echo "<div class='container'>";
        echo "<input type='submit' class='btn btn-primary btn-sm accordion' value='Añadir nuevo producto'></input>";
        echo "<div class='panel'>";
        echo "<form method='post' action='editA' accept-charset='UTF-8'>";
        echo "<input id='num' type='hidden' name='num' value=$nummesa>"
@endphp
            @csrf
            <div class='container'>
                
                <div id='divSandwichE'>
                    <div class="form-row">
                        <div class="col-3"></div>
                        <div class="col-auto">
                            <button id='minusS' type="button" onclick="destroySE()" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-3">
                            {{ Form::label('Sandwich', 'Platos calientes:') }}
                        </div>
                        <div class="col-auto">
                            <button id='masS' type="button" onclick="duplicateSE()" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="form-row" id='rowSandwichE'>
                        <div class="col-9">
                            {{ Form::select('sandwichE', $lista_platos ,null,['id'=>'sandwichE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-3">
                            {{ Form::number('cantSE', 1,array('id'=>'cantSE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                    </div>
                </div>
                <div id='divBebidaE'>
                    @php
                        $bebidas=array('0' => 'Seleccione Bebida');
                        foreach($bebida as $beb){
                            array_push($bebidas,$beb->nombre." $".$beb->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-3"></div>
                        <div class="col-auto">
                            <button id='minusB' type="button" onclick="destroyBE()" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-3">
                        {{ Form::label('Bebidas', 'Jugos y bebidas frias:') }}    
                        </div>
                        <div class="col-auto">
                            <button id='masB' type="button" onclick="duplicateBE()" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="form-row" id='rowBebidaE'>
                        <div class="col-9">
                            {{ Form::select('bebidaE', $bebidas ,null,['id'=>'bebidaE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-3">
                            {{ Form::number('cantBE', 1,array('id'=>'cantBE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                    </div>
                </div>
                <div id='divCafeE'>
                    @php
                        $cafes=array('0' => 'Seleccione te o cafe');
                        foreach($cafe as $caf){
                            array_push($cafes,$caf->nombre." $".$caf->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-3"></div>
                        <div class="col-auto">
                            <button id='minusC' type="button" onclick="destroyCE()" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-3">
                            {{ Form::label('Cafe', 'Té o Cafe:') }}
                        </div>
                        <div class="col-auto">    
                            <button id='masC' type="button" onclick="duplicateCE()" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="form-row" id='rowCafeE'>
                        <div class="col-9">
                            {{ Form::select('cafeE', $cafes ,null,['id'=> 'cafeE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-3">
                            {{ Form::number('cantCE', 1,array('id'=>'cantCE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                    </div>
                </div>
                <div id='divPastelE'>
                    @php
                        $pasteles=array('0' => 'Seleccione pastel');
                        foreach($pastel as $pas){
                            array_push($pasteles,$pas->nombre." $".$pas->precio);
                        }
                    @endphp
                    <div class="form-row align-items-center">
                        <div class="col-3"></div>
                        <div class="col-auto">
                            <button id='minusP' type="button" onclick="destroyPE()" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-3 align-items-center">    
                            {{ Form::label('Pastel', 'Pastelería:') }}
                        </div>
                        <div class="col-auto">
                            <button id='masP' type="button" onclick="duplicatePE()" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <div class="form-row" id='rowPastelE'>
                        <div class="col-9" id='selec_pastel'>
                            {{ Form::select('pastelE', $pasteles ,null,['id'=>'pastelE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-3" id='number_cant'>
                            {{ Form::number('cantPE', 1,array('id'=>'cantPE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-4"></div>
                    <div class="col-auto">  
                    {{ Form::submit('Añadir pedido', array('class' => 'btn btn-success')) }}
                    </div>
                    <div class="col-4"></div>
                </div>
                {{ Form::close() }}
                </div>               
@php
        echo "</form>";
        echo "</div>\n";
        echo "<input type='button' class='btn btn-warning btn-sm' value='Eliminar producto' onclick='hab_borrar($nummesa)'>";
        echo "</div>\n";
        echo "<div id='mesa-atendida$nummesa' class='modal-body'>\n";	
        echo "<table class='table align-items-center'>";
        echo "<tr>";
        echo "<th>  </th>";
        echo "<th> Cantidad </th>";
        echo "<th> Producto </th>";
        echo "<th> Precio individual </th>";
        echo "<th> Precio pedido </th>";
        echo "</tr>";
        $total_comida=0;
		foreach($comida as $com){
			if($com->numero_mesa == $nummesa) {
                echo "<tr>";
                echo "<td>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar$i' name='quitar$i' value='X'>";
                echo "</td>";
                echo "<td>";
                echo $com->cantidad;
                echo "</td>";
                echo "<td>";
                echo $com->nombre;
                echo "</td>";
                echo "<td>";
				echo "$".$com->precio;
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
			if($bebi->numero_mesa == $nummesa) {
                echo "<tr>";
                echo "<td>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar$i' name='quitar$i' value='X'>";
                echo "</td>";
                echo "<td>";
                echo $bebi->cantidad;
                echo "</td>";
                echo "<td>";
                echo $bebi->nombre;
                echo "</td>";
                echo "<td>";
				echo "$".$bebi->precio;
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
			if($past->numero_mesa == $nummesa) {
                echo "<tr>";
                echo "<td>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</td>";
                echo "<td>";
                echo $past->cantidad;
                echo "</td>";
                echo "<td>";
                echo $past->nombre;
                echo "</td>";
                echo "<td>";
				echo "$".$past->precio;
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
			if($cof->numero_mesa == $nummesa) {
                echo "<tr>";
                echo "<td>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</td>";
                echo "<td>";
                echo $cof->cantidad;
                echo "</td>";
                echo "<td>";
                echo $cof->nombre;
                echo "</td>";
                echo "<td>";
				echo "$".$cof->precio;
                echo "</td>";
                echo "<td>";
				echo "$".$cof->precio*$cof->cantidad;
                echo "</td>";	
                echo "</tr>\n";	
                $total_cafe = $total_cafe + $cof->precio*$cof->cantidad;		
			}
        }
        echo "<tr>";
        echo "<th></th>";
        echo "<th>Total:</th>";
        echo "<th></th>";
        echo "<th></th>";
        echo "<th>";
        echo "<input id='total' class='total_mesa' type=text disabled value='";
        echo "$".($total_bebida + $total_cafe + $total_comida + $total_pastel);
        echo "'>";
        echo "</th>";
        echo "</tr>";
        echo "</table>";
        echo "<form method='GET' action='caja/$nummesa' accept-charset='UTF-8' onsubmit='return alerta_pago()'>";
        echo "<input class='btn btn-success' type='submit' value='Pagar'></input>";
        echo "</form>";
		echo "</div>\n";
		echo "</div>\n";
		echo "</div>\n";
        echo "</div>\n";
    }
@endphp
@endsection
