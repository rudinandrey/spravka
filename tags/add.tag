<add>
    <div class="container">
        <div class="row form-group">
            <div class="col-3">
                <h3>Города</h3>
            </div>
            <div class="col-6">
                <h3>Добавить</h3>
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

                <div class="tab-content form-group" id="panel">

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

        .nav-link {
            cursor: default;
        }
    </style>

    <script>
        var self = this;
        opts.selected_city = 0;
        opts.tab = 0;

        this.on("mount", function() {
            this.mountPanel();

            opts.app.post("/api/cities", {}, function(data) {
                opts.cities = data.result.cities;
                self.update();
            });
        });


        this.mountPanel = function () {
            switch (opts.tab) {
                case 0:
                    console.log('mount fiz');
                    tags['panel'] = riot.mount('#panel', 'add_fiz', {app: opts.app})[0];
                    break;
                case 1:
                    console.log('mount ur');
                    tags['panel'] = riot.mount('#panel', 'add_ur', {app: opts.app})[0];
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

        this.btn_select_city = function(e) {
            e.preventDefault();
            if(opts.selected_city == e.item.city_id) {
                opts.selected_city = 0;
            } else {
                opts.selected_city = e.item.city_id;
            }

            self.update();
        }
    </script>
</add>