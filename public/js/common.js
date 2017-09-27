/**
 * 所有ajax请求都经过该方法发送至服务端
 * @param method
 * @param request_data
 * @param url
 * @param callback
 */
function ajaxFunction(method, request_data, url, callback){
    $.ajax({
        type: method,
        url: url,
        async: false,
        data: request_data,
        success: function (data) {
          callback(data);
        }
    });
}
/**
 * 去掉两边的空格
 * @param str
 * @returns {XML|void|*|string}
 */
function trim(str){ //删除左右两端的空格
    return str.replace(/(^\s*)|(\s*$)/g, "");
}