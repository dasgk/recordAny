function send_ajax(url, data, method,callback) {
    $.ajax({
        type: method,
        url: url,
        async: false,
        data: data,
        success: function (data) {
           callback(data);
        }
    });

}