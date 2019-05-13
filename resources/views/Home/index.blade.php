@extends('welcome')

@section('content')
<!-- TABLA PARA INGRESAR LOS DATOS -->
<table border="0">
    <th colspan="2"> Registro </th>
    <tr>
      <td>Nombre :</td>
      <td><input type="text" name="nombre" /></td>
    </tr>
    <tr>
      <td>Apellido_Paterno :</td>
      <td><input type="text" name="apellido_paterno" /></td>
    </tr>
    <tr>
      <td>Apellido_Materno</td>
      <td><input type="text" name="apellido_materno" /></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><input type="text" name="direccion" /></td>
    </tr>
    <tr>
      <td colspan="2"><button type="submit" id="input"> Guardar datos </button> </td>
    </tr>
    <!-- <tr>
      <td colspan="2"><button type="submit" id="update"> actualizar datos </button> </td>
    </tr> -->
  </table>
  {{ csrf_field() }}

 <!-- TABLA QUE DESPLEGARA DATOS  -->
<table border="0">
    <th colspan="6">registros</th>
    <tr>
      <td>

        <select name="allid" id="allid">
        							@foreach($member as $value)
        								<option value="{{ $value->id}}"> {{ $value->id }} </option>
        							@endforeach
        						</select>
                    <button type="submit" id="update" name="upid">
                      <img src="https://img.icons8.com/office/16/000000/edit.png">
                     </button>
                    <button type="submit" id="delete" name="delid">
                      <img src="https://img.icons8.com/office/16/000000/delete-sign.png">
                       </button>
      </td>
      <td>id</td>
      <td>Nombre</td>
      <td>Apellido_Paterno</td>
      <td>Apellido_Materno</td>
      <td>Dirección</td>
    </tr>
    <!-- <input type="radio" name="color" value="azul"> -->

    @foreach($member as $value)
    <tr>
      <!-- <td><input type="radio"  name="upid" value="{{ $value->nombre}}" id="upid"> -->
      <td>
        <!-- <input type="checkbox" name="selid" class="selid"
        value="<?= htmlspecialchars($value->id); ?>"> -->
        <!-- <button type="submit" id="update" name="upid">
          <img src="https://img.icons8.com/office/16/000000/edit.png">
         </button>
        <button type="submit" id="delete" name="delid">
          <img src="https://img.icons8.com/office/16/000000/delete-sign.png">
           </button> -->
        </td>
      <td>{{$value->id}}</td>
      <td>{{$value->nombre}}</td>
      <td>{{$value->apellido_paterno}}</td>
      <td>{{$value->apellido_materno}}</td>
      <td>{{$value->direccion}}</td>
    </tr>
    @endforeach

  </table>

<!-- AQUI SE EJECUTA EL AJAX  -->

<script type="text/javascript">
				// for Insert Ajax
				$('#input').click(function(){
					$.ajax({
						type:'post',
						url: 'insertdata',
						data:{
							'_token':$('input[name=_token').val(),
							'nombre':$('input[name=nombre').val(),
							'apellido_paterno':$('input[name=apellido_paterno').val(),
							'apellido_materno':$('input[name=apellido_materno').val(),
							'direccion':$('input[name=direccion').val()
						},
						success:function(data){
							window.location.reload();
						},
					});
				});

        // for Update Ajax
				$('#update').click(function(){
    //     alert($('input:radio[name=upid]:checked').val());

					$.ajax({
						type:'post',
						url: 'updatedata',
						data:{
              '_token':$('input[name=_token').val(),
             'id':$('#allid').val(),
              'nombre':$('input[name=nombre').val(),
              'apellido_paterno':$('input[name=apellido_paterno').val(),
              'apellido_materno':$('input[name=apellido_materno').val(),
              'direccion':$('input[name=direccion').val()
						},
						success:function(data){
							window.location.reload();
						},
					});
				});

        // for Delete Ajax
      $('#delete').click(function(){


      //      $(":checkbox[name=selid]").click(function() {


              $.ajax({
                type:'post',
                url: 'deletedata',
                data:{
                  '_token':$('input[name=_token').val(),
                  'id':$('#allid').val(),
                },
                success:function(data){
                  window.location.reload();
                },
              });
            // });





      //  alert(JSON.stringify(selected));
      });

	</script>

@endsection
