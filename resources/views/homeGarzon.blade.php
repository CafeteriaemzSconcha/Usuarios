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
                            echo "document.getElementById('$listas').disabled=false;";
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
            {{ Form::submit('Habilitar mesa') }}
        {{ Form::close() }}
        <h3 id='ocupado'></h3>
        
	</div>
</div>

<div class="modal fade" id="mesa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 1</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 2</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 3</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 4</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 5</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 6</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 7</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 8</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 9</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 10</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 11</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 12</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 13</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 14</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="mesa15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Mesa 15</h4>
			</div>
			<div class="modal-body">
				Las weas que consume
			</div>
		</div>
	</div>
</div>
@endsection
