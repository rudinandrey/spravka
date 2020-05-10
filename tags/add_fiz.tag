<add_fiz>
    <div class="row form-group form-top">
        <div class="col-sm-5">
            Абонент
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="abonent" ref="abonent">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
            Адрес
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="address" ref="address">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
            Телефон
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="phone" ref="phone">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
            Информация
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="info" ref="info">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-5">
            &nbsp;
        </div>
        <div class="col-sm-7">
            <a href="#" class="btn btn-success" onclick={btn_add_abonent}>Добавить</a>
        </div>
    </div>

    <style>
        .form-top {
            margin-top: 20px;
        }
    </style>

    <script>
        var self = this;

        this.on("mount", function () {

        });

        this.btn_add_abonent = function(e) {
            e.preventDefault();
            console.log('Добавляем абонента');
            var r = this.refs;
            var abonent = {
                'name' : r.abonent.value,
                'info' : r.info.value,
                'address' : r.address.value,
                'phone' : r.phone.value,
                'city': tags.main.opts.selected_city,
                'type' : 0
            };

            try {
                if(abonent.city == 0) throw new Error("Вы не выбрали город");
                if(abonent.name.trim() == '') throw new Error("Введите ФИО пользователя");
                if(abonent.address.trim() == '') throw new Error("Введите адрес абонента");
                if(abonent.phone.trim() == "") throw new Error("Введите номер телефона");

                opts.app.post("/api/add", abonent, function(data) {
                    console.log(data);
                    if(data.error == 0) {
                        alertify.success("Абонент успешно добавлен");
                        self.clearForm();
                    } else {
                        alertify.error(data.result.message);
                    }
                });
            } catch (e) {
                alertify.error(e.message);
            }
        }

        this.clearForm = function() {
            var r = this.refs;
            r.abonent.value = '';
            r.info.value = '';
            r.address.value = '';
            r.phone.value = '';
            self.update();
        }
    </script>
</add_fiz>