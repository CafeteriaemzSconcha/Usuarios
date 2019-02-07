@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="#addmesa">Añadir mesa</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>   
                    @endif
                    <button id="bmesa1" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa1" disabled="disabled">Mesa 01</button>
                    <button id="bmesa2" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa2" disabled="disabled">Mesa 02</button>
                    <button id="bmesa3" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa3" disabled="disabled">Mesa 03</button>
                    <button id="bmesa4" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa4" disabled="disabled">Mesa 04</button>
                    <button id="bmesa5" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa5" disabled="disabled">Mesa 05</button>
                    <button id="bmesa6" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa6" disabled="disabled">Mesa 06</button>
                    <button id="bmesa7" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa7" disabled="disabled">Mesa 07</button>
                    <button id="bmesa8" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa8" disabled="disabled">Mesa 08</button>
                    <button id="bmesa9" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa9" disabled="disabled">Mesa 09</button>
                    <button id="bmesa10" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa10" disabled="disabled">Mesa 10</button>
                    <button id="bmesa11" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa11" disabled="disabled">Mesa 11</button>
                    <button id="bmesa12" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa12" disabled="disabled">Mesa 12</button>
                    <button id="bmesa13" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa13" disabled="disabled">Mesa 13</button>
                    <button id="bmesa14" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa14" disabled="disabled">Mesa 14</button>
                    <button id="bmesa15" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa15" disabled="disabled">Mesa 15</button>
                </div>
                @php
                    foreach ($lista as $listas){
                            
                        echo "<script>";
                        echo "document.getElementById('bmesa$listas').disabled=false;";
                        echo "</script>";                
                    }
                @endphp 
            </div>
        </div>
    </div>
</div>

<div id="addmesa" class="modalDialog">
	<div>
		<a href="#close" title="Close" class="close">X</a>
        <h2>Añadir mesa</h2>
        {{ Form::open(array('url' => '','method' => 'POST', 'onSubmit' => 'return hab_mesaG()')) }}
            <h5>Seleccione mesa.</h5>
            {{ Form::select('num', array(
                '0' => 'Seleccione mesa',
                '1' => 1,
                '2' => 2,
                '3' => 3,
                '4' => 4,
                '5' => 5,
                '6' => 6,
                '7' => 7,
                '8' => 8,
                '9' => 9,
                '10' => 10,
                '11' => 11,
                '12' => 12,
                '13' => 13,
                '14' => 14,
                '15' => 15,
            ),null,['id'=>'num']) }}
            <h5>Seleccione sandwich.</h5>
            {{ Form::select('sandwich', $lista_platos ,null,['id'=>'sandwich']) }}
            
            {{ Form::submit('Habilitar mesa', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
        <h3 id='ocupado'></h3>
        
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
		echo "<h4 class='modal-title' id='myModalLabel'>Mesa $nummesa </h4>\n";
		echo "</div>\n";
		echo "<div class='modal-body'>\n";
		$j=0;
		$i=0;		
		foreach($num_mesa as $num){
			foreach($num_mesa[$j] as $numsito){
				if ($num_mesa[$j][$i] == $nummesa) {
					echo $comida_mesas[$j][$i]." ";
					echo " $".$precio_mesas[$j][$i];				
				}
				$i++;
			}
			$j++;
			$i=0;
		}	
		echo "</div>\n";
		echo "</div>\n";
		echo "</div>\n";
		echo "</div>\n";
	}
@endphp
@endsection
