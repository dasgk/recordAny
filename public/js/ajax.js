function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return null;
}
cookie = getCookie('PHPSESSID');

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
    $.ajax({
        type: 'post',
        url: "stat",
        async: false,
        data: {url:location.href,cookie:cookie,"_token":"{{csrf_token()}}"},
        success: function (data) {
            callback(data);
        }
    });

}