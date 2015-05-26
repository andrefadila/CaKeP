<html>
	<head>
		<title>Cari Desa</title>
		<!-- <meta name="_token" content="{{ csrf_token() }}" /> -->
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
		<!-- <link href='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css' type='text/css'> -->
		<link href='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css' type='text/css'>
		<link href='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css' rel='stylesheet'>

		<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js'></script>
		<!-- <script src='//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js'></script> -->
		<script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js'></script>
		<script src='//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js'></script>
		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				color: #B0BEC5;
				display: table;
				font-weight: 100;
				font-family: 'Lato';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			.title {
				font-size: 96px;
				margin-bottom: 40px;
			}

			.quote {
				font-size: 24px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<h3>Cari Desa</h3>
				<?php
				if (isset($_GET['q'])) 
			    	$q = $_GET['q'];
			    else
			    	$q = '';
			    ?>
				<form action="" method="">
					<input type="text" name="q" value="{{ $q }}" style="width:475px">
		        	<input type="submit" value="Cari">
		        </form>
		        @if(!$desa->isEmpty())
		        <table>
		          <thead>
		          <tr>
		              <th>Nama Desa</th>
		              <th>Kode Pos</th>
		              <th>Kecamatan</th>
		              <th>Kabupaten</th>
		              <th>Provinsi</th>
		          </tr>
		          </thead>
		          <tbody>
		          @foreach($desa as $item)
		              <tr id="{{ $item->id }}">
		                  <td>{{ $item->nama }}</td>
		                  <td><a href="#" data-type="text" class="kode-pos edit-vl">{{ $item->kode_pos }}</a></td>
		                  <td>{{ $item->kecamatan->nama }}</td>
		                  <td>{{ $item->kecamatan->kabupaten->nama }}</td>
		                  <td>{{ $item->kecamatan->kabupaten->provinsi->nama }}</td>
		              </tr>
		          @endforeach
		          </tbody>
		      	</table>
		      	@endif
			</div>
		</div>
		
	</body>
	<script type="text/javascript">
		$('.kode-pos').editable({
            type: 'text',
            title: 'Ganti Kode Pos',
            success: function (response, newValue) {
                var id_desa = $(this).closest('tr').attr('id');
                //console.log(newValue);
                $.ajax({
		            url: '{{ URL::to("cari/save") }}',
    				dataType: 'json',
		            method: 'post',
		            data: { id_desa: id_desa, kode_pos: newValue, _token: '{{ csrf_token() }}' },
		            success: function (data) {
		                console.log(data);
		                //success(data);
		            },
		            error: function (data) {
		                console.log("error");
		            }
		        });
            }
        });
	</script>
</html>
