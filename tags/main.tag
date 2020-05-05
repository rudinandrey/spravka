<main>
	<div class="container">
		<div class="row">
			<div class="col-3">
				<h3>Города</h3>
			</div>
			<div class="col-6">
				<h3>Справочник</h3>
			</div>
			<div class="col-3">
				<a href="#" class="btn btn-secondary">Редактирование</a>
				<a href="#" class="btn btn-secondary">Удаление</a>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<ul>
					<li each={opts.cities}>{city}</li>
				</ul>
			</div>
			<div class="col-9">

			</div>
		</div>
	</div>

	<style>

	</style>

	<script>
		var self = this;

		this.on("mount", function() {

		});
	</script>
</main>