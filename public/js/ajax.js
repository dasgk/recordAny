function send_ajax(url, data, method,callback,result) {
    $.ajax({
        type: method,
        url: url,
        async: false,
        data: data,
        success: function (data) {
           callback(result);
        }
    });

}