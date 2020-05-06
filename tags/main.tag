<main>
	<div class="container">
		<div class="row form-group">
			<div class="col-3">
				<h3>Города</h3>
			</div>
			<div class="col-6">
				<h3>Справочник</h3>
			</div>
			<div class="col-3">
				<a href="#" class="btn btn-link" class="{opts.edit_mode ? 'edit_mode' : ''}">Редактирование</a>
				<a href="#" class="btn btn-link" class="{opts.remove_mode ? 'remove_mode' : ''}">Удаление</a>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-3">
				<ul>
					<li each={opts.cities} class="{opts.selected_city == city_id ? 'selected' : ''}">
						<a href="#" onclick={btn_select_city}>{city_name}</a></li>
				</ul>
			</div>
			<div class="col-9">
				<div class="row">
					<div class="col"><input type="text" class="form-control"></div>
					<div class="col-auto"><a href="#" class="btn btn-success" onclick={btn_search_org}>Орг. F11</a></div>
					<div class="col-auto"><a href="#" class="btn btn-success" onclick={btn_search_fiz}>Физ. F12</a></div>
				</div>
				<div class="row">
					<div class="col">
						<table class="table">
							<thead>
							<tr>
								<th>Абонент</th>
								<th>Адрес</th>
								<th>Телефон</th>
							</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

	<style>
		.selected > a {
			font-weight: bold;
			color: white;
			background-color: black;
		}

		ul {
			list-style-type: none;
			padding:0;
			margin:0;
		}

		.edit_mode {
			font-weight: bold;
			color: white;
			background-color: black;
		}

		.remove_mode {
			font-weight: bold;
			color: white;
			background-color: black;
		}

	</style>

	<script>
		var self = this;
		opts.selected_city = 0;
		opts.edit_mode = false;
		opts.remove_mode = false;

		this.on("mount", function() {
			opts.app.post("/api/cities", {}, function(data) {
				opts.cities = data.result.cities;
				self.update();
			});
		});

		this.btn_select_city = function(e) {
			e.preventDefault();
			opts.selected_city = e.item.city_id;
			self.update();
		}
	</script>
</main>