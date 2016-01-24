<h1>Informe de compra</h1>
<table>
	<tr>
		<th colspan="4">Cliente</th>
	</tr>
	<tr>
		<td colspan="4"></td>
	</tr>
	<tr>
		<td>Cliente</td>
		<td>{{$nombre}}</td>
		<td></td>
		<td>Fecha de compra:</td>
		<td>{{$venta->fecha_compra}}</td>
	</tr>
	<tr>
		<td>E-mail:</td>
		<td colspan="3">{{$email}}</td>
	</tr>	
</table>
<br>
<h3>Cuerpo</h3>
<table>
	<tr>
		<th>Producto</th>
		<th>Cantidad</th>
		<th>Precio unitario</th>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
	@foreach($cuerpo as $item)
	<tr>
		<td>{{$item['nombre']}}</td>
		<td align="center">{{$item['cantidad']}}</td>
		<td>${{$item['precio']}}</td>
	</tr>
	@endforeach	
	<tr>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td>Total</td>
		<td></td>
		<td align="center">${{$venta->total}}</td>
	</tr>
</table>