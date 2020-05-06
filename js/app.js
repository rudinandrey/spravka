route.start(true);

var App = {
    return: {
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
            })
        }
    }
};
var app = new App();
var tags = {};
tags['main'] = riot.mount("#main", "main", {app: app})[0];

