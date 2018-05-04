<legend>Fotos</legend>
<div class="row">
    @foreach($fotos as $foto)
    <div class="col-sm-2">
        <div class="thumbnail">
            <div class="panel-body">
                <a href="{{ route('upfotos.destroy', $foto->id) }}" class="btn btn-danger pull-right" ><span class="glyphicon glyphicon-remove-circle" title="Eliminar foto"></span></a> 
                <a href="\..\..\{{$foto->photo}}"><img src="\..\..\{{$foto->photo}}" height='100' width='100'> </a>
         	</div>
        </div>
    </div>
    @endforeach
</div>
{!!Form::open(['route'=>'upfotos.store', 'method' => 'POST', 'files'=>'true', 'class' => 'form-horizontal'])!!}
	<div class="form-group">
		  <label class="control-label">Agregar foto</label>
		  <div class="input-group">
		  		<td>
			    <input type="file" name="file" class="form-control"> 
			    {!!Form::submit('Subir',['id'=>'subirfoto','class' => 'btn btn-primary'])!!}
			  </td>
		  </div>
	</div>
	{!!Form::text('eventoid',$evento->id,['class'=>'form-control', 'id'=>'eventoid','TYPE'=>'text' ,'style'=>"display: none"])!!}
{!!Form::close()!!}