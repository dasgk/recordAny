function changeToEditforComments(node) {
    node.html("");
    var inputObj = $("<textarea /> </textarea>");
    inputObj.css("border", "1").css("background-color", node.css("background-blue"))
        .css("font-size", "24px").css("height", "90px")
        .css("width", "490px").val(content).appendTo(node)
        .get(0).select();
    inputObj.click(function () {
        return false;
    }).keyup(function (event) {
        var keyvalue = event.which;
        if (keyvalue == 13) {
            node.html(node.children("textarea").val());
        }
        if (keyvalue == 27) {
            node.html(content);
        }
    }).blur(function () {
        if (node.children("textarea").val() != content) {
            if (confirm("是否保存修改的内容？", "Yes", "No")) {
                send_ajax("{{url('user/modify_comments')}}", {
                    'comments': node.children("textarea").val(),
                    "_token": "{{csrf_token()}}"
                }, 'POST', success);
            } else {
                node.html(content);
            }
        } else {
            node.html(content);
        }
    });
}
function changeToEditforNickName(node) {
    node.html("");
    var inputObj = $("<input type='text'/>");
    inputObj.css("border", "1").css("background-color", node.css("background-blue"))
        .css("font-size", node.css("font-size")).css("height", "50px")
        .css("width", node.css("width")).val(content).appendTo(node)
        .get(0).select();
    inputObj.click(function () {
        return false;
    }).keyup(function (event) {
        var keyvalue = event.which;
        if (keyvalue == 13) {
            node.html(node.children("input").val());
        }
        if (keyvalue == 27) {
            node.html(content);
        }
    }).blur(function () {
        if (node.children("input").val() != content) {
            if (confirm("是否保存修改的内容？", "Yes", "No")) {
                send_ajax("{{url('user/modify_nick_name')}}", {
                    'nick_name': node.children("input").val(),
                    "_token": "{{csrf_token()}}"
                }, 'POST', success);
            } else {
                node.html(content);
            }
        } else {
            node.html(content);
        }
    });
}