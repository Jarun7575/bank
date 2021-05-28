<html>
<head>
<title>IndiaBank</title>
<style>
td, th, tr {
    border: 1px solid;
}
svg.w-5.h-5 {
    width: 1%;
} 
</style>
</head>
<body>
<form action='citybank' method="get">
<select name="cityname" class="city">
<option value="">select</option>

@foreach($city as $citys)
<option value={{$citys->city}}>{{$citys->city}}</option>
@endforeach
</select>
<input type="text" name="searchvalue" placeholder="ENTER IFSC">
<input type="submit" value="Search">
</form>

<table style="border:1px solid;">
<tr>
<th>ifsc</th>
<th>bank_id</th>
<th>branch</th>
<th>address</th>
<th>city</th>
<th>district</th>
<th>state</th>
</tr>
@foreach($data as $datas)
<tr>
<td>{{$datas->ifsc}}</td>
<td>{{$datas->bank_id}}</td>
<td>{{$datas->branch}}</td>
<td>{{$datas->address}}</td>
<td>{{$datas->city}}</td>
<td>{{$datas->district}}</td>
<td>{{$datas->state}}</td>
</tr>
@endforeach
</table>
{{$data->links()}}
</body>
</html>