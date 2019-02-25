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
                            </div>
                            </div>
                        @endif()
                    @endfor()
                    <div class="form-row">
                    <div class="col-1">
                            </div>      
                    <div class="col-auto">   
                        <button id="bmesa16" class="btn btn-outline-dark btn-lg btn-social text-center rounded-square i" data-toggle="modal" data-target="#mesa16" disabled="disabled">Mesa 16</button>
                    </div>
                    <div class="col-1">
                            </div>  
                    </div>
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
                {{ Form::open(array('url' => '/caja','method' => 'POST', 'onSubmit' => 'return hab_mesaG()')) }}
                <div class='container'>
                    <div class="form-row">
                        <div class="col-1"></div>
                        <div class="col-3">
                            {{ Form::label('Ingrese mesa', 'Ingrese mesa:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::number('num', 1,array('id'=>'num','min'=>'1' ,'max'=>16,'class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-6"></div>    
                    </div>  
                    <div id='divSandwich'>
                        <div class="form-row">
                            <div class="col-1">
                                <button id='minusS' type="button" onclick="destroyS()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('Plato', 'Plato:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masS' type="button" onclick="duplicateS()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowSandwich'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('sandwich', $lista_platos ,null,['id'=>'sandwich','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2">
                                {{ Form::number('cantS', 1,array('id'=>'cantS','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descS', 0,array('id'=>'descS','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
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
                            <div class="col-1">
                                <button id='minusB' type="button" onclick="destroyB()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('Liquidos', 'Liquidos:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masB' type="button" onclick="duplicateB()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowBebida'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('bebida', $bebidas ,null,['id'=>'bebida','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2">
                                {{ Form::number('cantB', 1,array('id'=>'cantB','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descB', 0,array('id'=>'descB','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
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
                            <div class="col-1">
                                <button id='minusC' type="button" onclick="destroyC()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('cafe', 'Cafetería:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masC' type="button" onclick="duplicateC()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowCafe'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('cafe', $cafes ,null,['id'=> 'cafe','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2">
                                {{ Form::number('cantC', 1,array('id'=>'cantC','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descC', 0,array('id'=>'descC','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
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
                            <div class="col-1">
                                <button id='minusP' type="button" onclick="destroyP()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('pastel', 'Pastelería:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masC' type="button" onclick="duplicateP()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowPastel'>
                            <div class="col-1"></div>
                            <div class="col-6" id='selec_pastel'>
                                {{ Form::select('pastel', $pasteles ,null,['id'=>'pastel','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2" id='number_cant'>
                                {{ Form::number('cantP', 1,array('id'=>'cantP','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descP', 0,array('id'=>'descP','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div id='divHelado'>
                        @php
                            $helados=array('0' => 'Seleccione Helado');
                            foreach($helado as $hel){
                                array_push($helados,$hel->nombre." $".$hel->precio);
                            }
                        @endphp
                        <div class="form-row">
                            <div class="col-1">
                                <button id='minusH' type="button" onclick="destroyH()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('helado', 'Heladería:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masH' type="button" onclick="duplicateH()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowHelado'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('helado', $helados ,null,['id'=>'helado','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2" id='number_cant'>
                                {{ Form::number('cantH', 1,array('id'=>'cantH','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descH', 0,array('id'=>'descH','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div id='divPostre'>
                        @php
                            $postres=array('0' => 'Seleccione postre');
                            foreach($postre as $pos){
                                array_push($postres,$pos->nombre." $".$pos->precio);
                            }
                        @endphp
                        <div class="form-row">
                            <div class="col-1">
                                <button id='minusPO' type="button" onclick="destroyPO()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('postre', 'Postres:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masPO' type="button" onclick="duplicatePO()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowPostre'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('postre', $postres ,null,['id'=>'postre','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2">
                                {{ Form::number('cantPO', 1,array('id'=>'cantPO','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descPO', 0,array('id'=>'descPO','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div id='divDesayuno'>
                        @php
                            $desayunos=array('0' => 'Seleccione desayuno u once');
                            foreach($desayuno as $des){
                                array_push($desayunos,$des->nombre." $".$des->precio);
                            }
                        @endphp
                        <div class="form-row">
                            <div class="col-1">
                                <button id='minusD' type="button" onclick="destroyD()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('desayuno', 'Desayunos u onces:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Cant', 'Cant:') }}
                            </div>
                            <div class="col-2">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masD' type="button" onclick="duplicateD()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowDesayuno'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('desayuno', $desayunos ,null,['id'=>'desayuno','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-2" id='number_cant'>
                                {{ Form::number('cantD', 1,array('id'=>'cantD','min'=>'1','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-2">
                                {{ Form::number('descD', 0,array('id'=>'descD','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div id='divAgregado'>
                        @php
                            $agregados=array('0' => 'Seleccione agregado');
                            foreach($agregado as $agr){
                                array_push($agregados,$agr->nombre." $".$agr->precio);
                            }
                        @endphp
                        <div class="form-row">
                            <div class="col-1">
                                <button id='minusA' type="button" onclick="destroyA()" class='btn btn-secondary btn-sm'>-</button>
                            </div>
                            <div class="col-6">
                                {{ Form::label('Agregados', 'Agregados:') }}
                            </div>
                            <div class="col-4">
                                {{ Form::label('Desc', 'Desc:') }}
                            </div>
                            <div class="col-1">
                                <button id='masD' type="button" onclick="duplicateA()" class='btn btn-secondary btn-sm'>+</button>
                            </div>
                        </div>
                        <div class="form-row" id='rowAgregado'>
                            <div class="col-1"></div>
                            <div class="col-6">
                                {{ Form::select('agregado', $agregados ,null,['id'=>'agregado','class'=>'form-control form-control-sm']) }}
                            </div>
                            <div class="col-4">
                                {{ Form::number('descA', 0,array('id'=>'descA','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                    <div class='form-row' id='observacion'>
                        <div class="col-1"></div>
                        <div class="col-10">
                            {{ Form::label('Observaciones', 'Observaciones: ') }} 
                            {{ Form::textarea('obs',null,array('id'=>'obs','class'=>'form-control','cols'=>45,'rows'=>5,'placeholder'=>'Ej: sin tomate'))}}
                        </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            {{ Form::submit('Habilitar mesa', array('class' => 'btn btn-success')) }}
                        </div>
                        <div class="col-4"></div>
                    </div>
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
                
                <div id='divSandwichE{{$nummesa}}'>
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroySE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Plato', 'Plato:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateSE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowSandwichE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('sandwichE', $lista_platos ,null,['id'=>'sandwichE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2">
                            {{ Form::number('cantSE', 1,array('id'=>'cantSE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descSE', 0,array('id'=>'descSE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div id='divBebidaE{{$nummesa}}'>
                    @php
                        $bebidas=array('0' => 'Seleccione Bebida');
                        foreach($bebida as $beb){
                            array_push($bebidas,$beb->nombre." $".$beb->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyBE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Bebida', 'Liquidos:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateBE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowBebidaE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('bebidaE', $bebidas ,null,['id'=>'bebidaE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2">
                            {{ Form::number('cantBE', 1,array('id'=>'cantBE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descBE', 0,array('id'=>'descBE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div id='divCafeE{{$nummesa}}'>
                    @php
                        $cafes=array('0' => 'Seleccione te o cafe');
                        foreach($cafe as $caf){
                            array_push($cafes,$caf->nombre." $".$caf->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyCE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Cafe', 'Cafetería:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateCE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowCafeE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('cafeE', $cafes ,null,['id'=> 'cafeE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2">
                            {{ Form::number('cantCE', 1,array('id'=>'cantCE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descCE', 0,array('id'=>'descCE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div id='divPastelE{{$nummesa}}'>
                    @php
                        $pasteles=array('0' => 'Seleccione pastel');
                        foreach($pastel as $pas){
                            array_push($pasteles,$pas->nombre." $".$pas->precio);
                        }
                    @endphp
                    <div class="form-row align-items-center">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyPE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Pastel', 'Pastelería:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicatePE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowPastelE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6" id='selec_pastel'>
                            {{ Form::select('pastelE', $pasteles ,null,['id'=>'pastelE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2" id='number_cant'>
                            {{ Form::number('cantPE', 1,array('id'=>'cantPE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descPE', 0,array('id'=>'descPE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>   
                <div id='divHeladoE{{$nummesa}}'>
                    @php
                        $helados=array('0' => 'Seleccione Helado');
                        foreach($helado as $hel){
                            array_push($helados,$hel->nombre." $".$hel->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyHE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Helado', 'Heladería:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateHE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowHeladoE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('heladoE', $helados ,null,['id'=>'heladoE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2" id='number_cant'>
                            {{ Form::number('cantHE', 1,array('id'=>'cantHE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descHE', 0,array('id'=>'descHE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>

                <div id='divPostreE{{$nummesa}}'>
                    @php
                        $postres=array('0' => 'Seleccione postre');
                        foreach($postre as $pos){
                            array_push($postres,$pos->nombre." $".$pos->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyPOE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Postre', 'Postres:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicatePOE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowPostreE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('postreE', $postres ,null,['id'=>'postreE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2">
                            {{ Form::number('cantPOE', 1,array('id'=>'cantPOE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descPOE', 0,array('id'=>'descPOE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>

                <div id='divDesayunoE{{$nummesa}}'>
                    @php
                        $desayunos=array('0' => 'Seleccione desayuno u once');
                        foreach($desayuno as $des){
                            array_push($desayunos,$des->nombre." $".$des->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyDE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Desayuno', 'Desayuno u once:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateDE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowDesayunoE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('desayunoE', $desayunos ,null,['id'=>'desayunoE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-2" id='number_cant'>
                            {{ Form::number('cantDE', 1,array('id'=>'cantDE','min'=>'1','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-2">
                            {{ Form::number('descDE', 0,array('id'=>'descDE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>

                <div id='divAgregadoE{{$nummesa}}'>
                    @php
                        $agregados=array('0' => 'Seleccione agregado');
                        foreach($agregado as $agr){
                            array_push($agregados,$agr->nombre." $".$agr->precio);
                        }
                    @endphp
                    <div class="form-row">
                        <div class="col-1">
                            <button id='minusS' type="button" onclick="destroyAE({{$nummesa}})" class='btn btn-secondary btn-sm'>-</button>
                        </div>
                        <div class="col-6">
                            {{ Form::label('Agregado', 'Agregados:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Cant', 'Cant:') }}
                        </div>
                        <div class="col-2">
                            {{ Form::label('Desc', 'Desc:') }}
                        </div>
                        <div class="col-1">
                            <button id='masS' type="button" onclick="duplicateAE({{$nummesa}})" class='btn btn-secondary btn-sm'>+</button>
                        </div>
                    </div>
                    <div class="form-row" id='rowAgregadoE{{$nummesa}}'>
                        <div class="col-1"></div>
                        <div class="col-6">
                            {{ Form::select('agregadoE', $agregados ,null,['id'=>'agregadoE','class'=>'form-control form-control-sm']) }}
                        </div>
                        <div class="col-4">
                            {{ Form::number('descAE', 0,array('id'=>'descAE','min'=>'0','max'=>'100','class'=>'form-control form-control-sm'))}}
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>    
                <div class='form-row' id='observacion'>
                    <div class="col-1"></div>
                    <div class="col-10">
                        {{ Form::label('Observaciones', 'Observaciones: ') }} 
                        {{ Form::textarea('obs',null,array('id'=>'obs','class'=>'form-control','cols'=>45,'rows'=>5,'placeholder'=>'Ej: sin tomate'))}}
                    </div>
                    <div class="col-1"></div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-4"></div>
                    <div class="col-4">  
                        {{ Form::submit('Añadir pedido', array('class' => 'btn btn-success')) }}
                    </div>
                    <div class="col-4"></div>
                </div>
                {{ Form::close() }}
                </div> 
            </form>              
        </div>
    @php
        echo "<input type='button' class='btn btn-warning btn-sm' value='Eliminar producto' onclick='hab_borrar($nummesa)'>";
        echo "</div>\n";
        echo "<div id='mesa-atendida$nummesa' class='modal-body'>\n";	
        echo "<div class='container'>";
        echo "<div class='form-row'>";
        echo "<div class='col-1'></div>";
        echo "<div class='col-1'>Cant.</div>";
        echo "<div class='col-4'>Nombre</div>";
        echo "<div class='col-2'>Precio U.</div>";
        echo "<div class='col-2'>Precio T.</div>";
        echo "<div class='col-2'></div>";
        echo "</div>";
        $i=1;
        $total_comida=0;
		foreach($comida as $com){
			if($com->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='sandwich$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar$i' name='quitar$i' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $com->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $com->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".($com->precio*((100-$com->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".($com->precio*$com->cantidad*((100-$com->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' name='cantQ$i' min=1 max=$com->cantidad value=1 class='form-control-sm' style='max-width: 100%;' value=1> </div>";	
                echo "</div>\n";	
                $total_comida = $total_comida + $com->precio*$com->cantidad*((100-$com->descuento)/100);
                $i++;		
			}
        }

        $i=1;
        $total_bebida=0;
        foreach($bebiditas as $bebi){
			if($bebi->numero_mesa == $nummesa) {
                $bebid=array();
                array_push($bebid,$bebi->nombre,$bebi->cantidad);
                echo "<div class='form-row' id='bebida$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar$i' name='quitar$i' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $bebi->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $bebi->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
                echo "$".($bebi->precio*((100-$bebi->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".($bebi->precio*$bebi->cantidad*((100-$bebi->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' min=1 max=$bebi->cantidad value=1  id='cantQ$i' name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";	
                echo "</div>\n";	
                $total_bebida = $total_bebida + $bebi->precio*$bebi->cantidad*((100-$bebi->descuento)/100);	
                $i++;	
			}
        }
        
        $total_pastel=0;
        $i=1;
        foreach($pastelitos as $past){
			if($past->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='pastel$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $past->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $past->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".($past->precio*((100-$past->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".($past->precio*$past->cantidad*((100-$past->descuento)/100));
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=$past->cantidad value=1  name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";	
                echo "</div>";	
                $total_pastel = $total_pastel + $past->precio*$past->cantidad*((100-$past->descuento)/100);		
                $i++;
            }
        }
        
        $total_cafe=0;
        $i=1;
        foreach($cafeteria as $cof){
			if($cof->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='cafe$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $cof->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $cof->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$cof->precio*((100-$cof->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$cof->precio*$cof->cantidad*((100-$cof->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=$cof->cantidad value=1  name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";	
                echo "</div>\n";	
                $total_cafe = $total_cafe + $cof->precio*$cof->cantidad*((100-$cof->descuento)/100);
                $i++;		
			}
        }

        $total_agregado=0;
        $i=1;
        foreach($agregaditos as $agre){
			if($agre->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='agregado$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo "1";
                echo "</div>";
                echo "<div class='col-4'>";
                echo $agre->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "";
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$agre->precio*((100-$agre->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=1 value=1  name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";	
                echo "</div>\n";	
                $total_agregado = $total_agregado + $agre->precio*((100-$agre->descuento)/100);	
                $i++;	
			}
        }
        $total_postre=0;
        $i=1;
        foreach($postresitos as $pos){
			if($pos->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='postre$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $pos->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $pos->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$pos->precio*((100-$pos->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$pos->precio*$pos->cantidad*((100-$pos->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=$pos->cantidad value=1  name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";	
                echo "</div>\n";	
                $total_postre = $total_postre + $pos->precio*$pos->cantidad*((100-$pos->descuento)/100);
                $i++;		
			}
        }
        $total_helado=0;
        $i=1;
        foreach($heladitos as $hel){
			if($hel->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='helado$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $hel->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $hel->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$hel->precio*((100-$hel->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$hel->precio*$hel->cantidad*((100-$hel->descuento)/100);
                echo "</div>";	
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=$hel->cantidad value=1  name='cantQ$i' class='form-control-sm' style='max-width: 100%;'> </div>";
                echo "</div>\n";	
                $total_helado = $total_helado + $hel->precio*$hel->cantidad*((100-$hel->descuento)/100);
                $i++;		
			}
        }
        $total_desayuno=0;
        $i=1;
        foreach($desayunitos as $des){
			if($des->numero_mesa == $nummesa) {
                echo "<div class='form-row' id='desayuno$i$nummesa'>";
                echo "<div class='col-1'>";
                echo "<input type='hidden' class='btn btn-danger btn-sm' id='quitar' name='quitar' value='X'>";
                echo "</div>";
                echo "<div class='col-1'>";
                echo $des->cantidad;
                echo "</div>";
                echo "<div class='col-4'>";
                echo $des->nombre;
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$des->precio*((100-$des->descuento)/100);
                echo "</div>";
                echo "<div class='col-2'>";
				echo "$".$des->precio*$des->cantidad*((100-$des->descuento)/100);
                echo "</div>";	
                echo "<div class='col-2'> <input type='hidden' id='cantQ$i' min=1 max=$des->cantidad value=1  class='form-control-sm' style='max-width: 100%;' name='cantQ$i'> </div>";
                echo "</div>\n";	
                $total_desayuno = $total_desayuno + $des->precio*$des->cantidad*((100-$des->descuento)/100);
                $i++;		
			}
        }
        echo "<div class='form-row'>";
        echo "<div class='col-1'></div>";
        echo "<div class='col-1'>% Desc:</div>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-2'></div>";
        echo "<div class='col-2'>";
        echo "<input id='descuento$nummesa' class='form-control-sm' type='number' value=0 min=0 style='max-width: 100%;' max=100>";
        echo "</div>";
        echo "<div class='col-2'></div>";
        echo "</div>";
        echo "<div class='form-row'>";
        echo "<div class='col-1'></div>";
        echo "<div class='col-1'>Total:</div>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-2'></div>";
        echo "<div class='col-2'>";
        echo "<input id='total' class='total_mesa' type=text disabled value='";
        echo "$".($total_bebida + $total_cafe + $total_comida + $total_pastel + $total_desayuno + $total_helado + $total_postre + $total_agregado);
        echo "'>";
        echo "</div>";
        echo "<div class='col-2'></div>";
        echo "</div>";
        echo "<div class='form-row'>";
        echo "<div class='col-4'>";
        echo "<form id='formel$nummesa' method='get' action='' onsubmit='borrar_producto($nummesa)' >";
        echo "<input id='eliminarE$nummesa' class='btn btn-danger form-control-sm' type='hidden' value='Eliminar producto'>";
        echo "</form>";
        echo "</div>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-4'>";
        echo "<input id='imprimir' class='btn btn-primary form-control-sm' type='button' value='Imprimir comanda' onclick='ver($nummesa)'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='form-row'>";
        echo "<div class='col-4'></div>";
        echo "<div class='col-4'>";
        echo "<form method='get' action='caja/$nummesa' onsubmit='alerta_pago()'>";
        echo "<input id='cerrar_mesa' class='btn btn-success form-control-sm' type='submit' value='Cerrar mesa' onclick=''>";
        echo "</form>";
        echo "</div>";
        echo "<div class='col-4'></div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
    }
@endphp
@endsection
