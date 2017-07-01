function ajax_POST(url, data, success, error) {
    $.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(data),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (serverData) {
            success(serverData);
        },
        error: function (a, b, c) {
            error(a, b, c);
        }
    });
}


function ajax_GET(url, success, error) {
    $.ajax({
        url: url,
        type: "GET",
        success: function (serverData) {
            success(serverData);
        },
        error: function (a, b, c) {
            error(a, b, c);
        }
    });
}


function redirect(url) {
    window.location.href = url;
}