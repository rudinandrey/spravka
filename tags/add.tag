<add>
    <div class="container">
        <div class="row form-group">
            <div class="col-3">
                <h3>Города</h3>
            </div>
            <div class="col-6">
                <h3>Добавить</h3>
            </div>
            <div class="col-3">
                <a href="#" class="btn btn-link" class="{opts.edit_mode== true ? 'edit_mode' : ''}" onclick={btn_edit_mode}>Редактирование</a>
                <a href="#" class="btn btn-link" class="{opts.remove_mode == true ? 'remove_mode' : ''}" onclick={btn_remove_mode}>Удаление</a>
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
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-fiz-tab" data-toggle="tab" href="#nav-fiz" role="tab" aria-controls="nav-fiz" aria-selected="true">Физ.лица</a>
                        <a class="nav-item nav-link active" id="nav-ur-tab" data-toggle="tab" href="#nav-ur" role="tab" aria-controls="nav-ur" aria-selected="false">Юр.лица</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-fiz" role="tabpanel" aria-labelledby="nav-fiz-tab">Page 1</div>
                    <div class="tab-pane fade" id="nav-ur" role="tabpanel" aria-labelledby="nav-ur-tab">Page 2</div>
                </div>
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
</add>