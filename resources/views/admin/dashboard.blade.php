@extends('admin.layout')
@section('title','Home Page')
@section('content')
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">

	<div class="card">
		<div class="card-header" style="background-color: mintcream">
			<h3 class="text-dark">DASHBOARD</h3>
		</div>
		<div class="card-body">

			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">Grafik Barang Masuk </div>
								<canvas id="myChart" width="50" height="20"></canvas>
							</div>

						</div>
					</div>
				</div>
				<hr>
				<hr>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">Grafik Barang Keluar</div>
								<canvas id="mychart2" width="50" height="20"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
<!---Container Fluid-->
</div>
@stop

@section('javascript')

@stop