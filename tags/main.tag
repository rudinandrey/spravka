<main>
	<div class="container">
		<div class="row form-group">
			<div class="col-3">
				<h3>Города</h3>
			</div>
			<div class="col-6">
				<h3>Справочник</h3>
			</div>
<!--			<div class="col-3">-->
<!--				<a href="#" class="btn btn-link" class="{opts.edit_mode== true ? 'edit_mode' : ''}" onclick={btn_edit_mode}>Редактирование</a>-->
<!--				<a href="#" class="btn btn-link" class="{opts.remove_mode == true ? 'remove_mode' : ''}" onclick={btn_remove_mode}>Удаление</a>-->
<!--			</div>-->
		</div>
		<div class="row form-group">
			<div class="col-3">
				<ul>
					<li each={opts.cities} class="{opts.selected_city == city_id ? 'selected' : ''}">
						<a href="#" onclick={btn_select_city}>{city_name}</a></li>
				</ul>
			</div>
			<div class="col-9">
				<div class="row form-group">
					<div class="col"><input type="text" id="search_element" ref="search" class="form-control" onkeyup={event_onkeyup}></div>
					<div class="col-auto"><a href="#" class="btn btn-success" onclick={btn_search_org}>Орг.</a></div>
					<div class="col-auto"><a href="#" class="btn btn-success" onclick={btn_search_fiz}>Физ.</a></div>
				</div>
				<div class="row form-group">
					<div class="col">
						<table class="table">
							<thead>
							<tr>
								<th>Абонент</th>
								<th>Адрес</th>
								<th>Телефон</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							</tbody>
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

		opts.types = {
			fiz: 0,
			org: 1,
			unknown: -1
		};

		this.on("mount", function() {
			opts.app.post("/api/cities", {}, function(data) {
				opts.cities = data.result.cities;
				self.update();
			});
		});

		this.btn_select_city = function(e) {
			e.preventDefault();
			if(opts.selected_city == e.item.city_id) {
				opts.selected_city = 0;
			} else {
				opts.selected_city = e.item.city_id;
			}
			self.update();
			$('#search_element').focus();
		}

		this.btn_edit_mode = function(e) {
			e.preventDefault();
			if(opts.edit_mode == true) {
				opts.edit_mode = false;
			} else {
				opts.edit_mode = true;
			}
			self.update();
		}

		this.btn_remove_mode = function(e) {
			e.preventDefault();
			opts.remove_mode == true ? false : true;
			self.update();
		}

		this.event_onkeyup = function(e) {
			console.log(e.keyCode);
			if(e.keyCode == 13) {
				var params = {
					city: tags.main.opts.selected_city,
					type: opts.types.unknown,
					search: self.refs.search.value
				};
				self.search(params);
			}
		}

		this.btn_search_org = function(e) {
			e.preventDefault();
			var params = {
				city: tags.main.opts.selected_city,
				type: opts.types.org,
				search: self.refs.search.value
			};
			self.search(params);
		}

		this.btn_search_fiz = function(e) {
			e.preventDefault();
			var params = {
				city: tags.main.opts.selected_city,
				type: opts.types.fiz,
				search: self.refs.search.value
			};
			self.search(params);
		}

		this.search = function(params) {
			opts.app.post("/api/search", params, function(data) {
				if(data.error == 0) {
					console.log(data.result);
				} else {
					alertify.error(data.result.message);
				}
				console.log(data);
			});
		}
	</script>
</main>