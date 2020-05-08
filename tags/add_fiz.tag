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
            Информация
        </div>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="info" ref="info">
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
                'abonent' : r.abonent.value,
                'info' : r.info.value,
                'address' : r.address.value,
                'phone' : r.phone.value,
                'city': tags.main.opts.selected_city
            };

            try {
                if(abonent.city == 0) throw new Error("Вы не выбрали город");
                if(abonent.abonent.trim() == '') throw new Error("Введите ФИО пользователя");
                if(abonent.address.trim() == '') throw new Error("Введите адрес абонента");

                opts.app.post("/api/add", abonent, function(data) {
                    console.log(data);
                });
            } catch (e) {
                alertify.error(e.message);
            }
        }
    </script>
</add_fiz>