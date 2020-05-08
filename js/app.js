route.start(true);

function App() {
    var self = this;

    return {
        post: function(url, data, func) {
            $.ajax({
                url: url,
                data: data,
                type: 'post',
                dataType: 'json'
            }).done(function(response) {
                if(typeof(func) === 'function' ) {
                    func(response);
                } else {
                    return response;
                }
            });
        }
    }
}

var app = new App();

var tags = {};


route("/", function() {
    tags['main'] = riot.mount("#main", "main", {app: app})[0];
});

route("/add", function() {
    tags['main'] = riot.mount("#main", "add", {app: app})[0];
});