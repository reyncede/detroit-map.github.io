<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Detroit Map</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="map-container">
		<div id="map">
			<?php include("map.php"); ?>
		</div>

		<div class="zoom-buttons">
			<button id="zoom-in-btn" class="btn btn-primary"><i class="fas fa-search-plus"></i></button>
			<button id="zoom-out-btn" class="btn btn-primary"><i class="fas fa-search-minus"></i></button>
		</div>

		<div class="card info-panel resizable shadow-lg p-1 bg-white rounded">
			<div class="input-group input-group-sm">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
				</div>
				<input id="searchInput" class="form-control" type="text" placeholder="Search Regions">
			</div>

			<div class="card-body">
				<div class="table">
					<table id="regionTable" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Neighborhoods</th>
								<th>Ave</th>
								<th>Zillow</th>
							</tr>
						</thead>
						<tbody>
							<?php include("tables.php"); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div id="popover" class="card shadow-lg p-0 bg-white rounded" style="display: none; width: 18rem;">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h5 id="popover-header" class="mb-0">Card Header</h5>
			<button type="button" class="btn" aria-label="Close" id="popover-close-btn">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="card-body">
			<table class="table table-bordered" style="font-size: 14px;">
				<tr>
					<td>
						<p id="popover-body" class="card-text"></p>
					</td>
					<td>
						<a id="popover-link"></a>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
	<script src="script.js"></script>
	<script>
		$(document).ready(function() {
			var scale = 1; // Initial scale

			$('#zoom-in-btn').on("click", function() {
				scaleMap(1.2); // Increase scale factor as needed
			});

			$('#zoom-out-btn').on("click", function() {
				scaleMap(0.8); // Decrease scale factor as needed
			});

			function scaleMap(scaleFactor) {
				scale *= scaleFactor; // Update scale
				$('#map').css('transform', 'scale(' + scale + ')');
			}
		});
	</script>
</body>

</html>