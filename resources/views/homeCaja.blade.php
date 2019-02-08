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
                    @for($i=1 ; $i<=15 ; $i++)
                        @if($i < 10)
                            <button id="bmesa{{$i}}" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa{{$i}}" disabled="disabled">Mesa 0{{$i}}</button>
                        @else
                            <button id="bmesa{{$i}}" class="btn btn-outline-dark btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa{{$i}}" disabled="disabled">Mesa {{$i}}</button>
                        @endif()
                    @endfor()
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
	<div class='modal-body'>
		<a href="#close" title="Close" class="close">X</a>
        <h2>Añadir mesa</h2>
        
        {{ Form::open(array('url' => '','method' => 'POST', 'onSubmit' => 'return hab_mesaG()')) }}
            <h5>Seleccione mesa:</h5>
            {{ Form::number('num', 1,array('id'=>'num','min'=>'1' ,'max'=>15,'class'=>'number-especial'))}}
            <div id='divSandwich'>
                {{ Form::label('Sandwich', 'Platos calientes:',array('class'=>'label-block')) }}
                <button id='minusS' type="button" onclick="destroyS()">-</button>
                <button id='masS' type="button" onclick="duplicateS()">+</button>
                {{ Form::select('sandwich', $lista_platos ,null,['id'=>'sandwich','class'=>'select-especial']) }}
                {{ Form::number('cantS', 1,array('id'=>'cantS','min'=>'1','class'=>'number-especial'))}}

            </div>
            <div id='divBebidas'>
                @php
                    $bebidas=array('0' => 'Seleccione Bebida');
                    foreach($bebida as $beb){
                        array_push($bebidas,$beb->nombre." $".$beb->precio);
                    }
                @endphp
                {{ Form::label('Bebidas', 'Jugos y bebidas frias:',array('class'=>'label-block')) }}
                <button id='minusB' type="button" onclick="destroyB()">-</button>
                <button id='masB' type="button" onclick="duplicateB()">+</button>
                {{ Form::select('bebida', $bebidas ,null,['id'=>'bebida','class'=>'select-especial']) }}
                {{ Form::number('cantB', 1,array('id'=>'cantB','min'=>'1','class'=>'number-especial'))}}
            </div>
            <div id='divCafe'>
                @php
                    $cafes=array('0' => 'Seleccione te o cafe');
                    foreach($cafe as $caf){
                        array_push($cafes,$caf->nombre." $".$caf->precio);
                    }
                @endphp
                {{ Form::label('Cafe', 'Té o Cafe:',array('class'=>'label-block')) }}
                <button id='minusC' type="button" onclick="destroyC()">-</button>
                <button id='masC' type="button" onclick="duplicateC()">+</button>
                {{ Form::select('cafe', $cafes ,null,['id'=> 'cafe','class'=>'select-especial']) }}
                {{ Form::number('cantC', 1,array('id'=>'cantC','min'=>'1','class'=>'number-especial'))}}
            </div>
            <div id='divPastel'>
                @php
                    $pasteles=array('0' => 'Seleccione pastel');
                    foreach($pastel as $pas){
                        array_push($pasteles,$pas->nombre." $".$pas->precio);
                    }
                @endphp
                {{ Form::label('Pastel', 'Pastelería:',array('class'=>'label-block')) }}
                <button id='minusP' type="button" onclick="destroyP()">-</button>
                <button id='masP' type="button" onclick="duplicateP()">+</button>
                {{ Form::select('pastel', $pasteles ,null,['id'=>'pastel','class'=>'select-especial']) }}
                {{ Form::number('cantP', 1,array('id'=>'cantP','min'=>'1','class'=>'number-especial'))}}
            </div>
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
                    echo "<p>";
					echo $comida_mesas[$j][$i]." ";
					echo " $".$precio_mesas[$j][$i];
                    echo "</p>";				
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
