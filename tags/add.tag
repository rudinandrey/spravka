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
                        <a class="nav-item nav-link {opts.tab == 0 ? 'active' : ''}" onclick={btn_select_fiz}>Физ.лица</a>
                        <a class="nav-item nav-link {opts.tab == 1 ? 'active' : ''}" onclick={btn_select_ur}>Юр.лица</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent" id="panel">

                </div>
            </div>

        </div>
    </div>

    <style>

    </style>

    <script>
        var self = this;

        opts.tab = 0;

        this.on("mount", function() {
            $('#nav-tab a').on('click', function (e) {
                e.preventDefault()
                $(this).tab('show')
            });


        });


        this.mountPanel = function () {
            switch (opts.tab) {
                case 0:
                    tags['panel'] = riot.mount('#panel', 'add_fiz', {app: opts.app});
                    break;
                case 1:
                    tags['panel'] = riot.mount('#panel', 'add_fiz', {app: opts.app});
                    break;
            }
        }

        this.btn_select_fiz = function (e) {
            e.preventDefault();

            opts.tab = 0;
            this.mountPanel();
            self.update();
        }

        this.btn_select_ur = function (e) {
            e.preventDefault();

            opts.tab = 1;
            this.mountPanel();
            self.update();
        }
    </script>
</add>