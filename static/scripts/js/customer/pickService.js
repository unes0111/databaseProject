//import * as $ from "../../jquery/jquery-3.2.1";

function pickServiceCustomer() {
    let id = $('#id').val();
    let name = $('#name').val();
    let cost = $('#cost').val();

    if (id && id != null && name && name.trim() != '' && cost && cost.trim() != '') {
        $.ajax({
            url: "/controllers/customerController/pickServiceCustomer",
            type: "POST",
            data: JSON.stringify(
                {
                    Id: id,
                    Name: name,
                    Cost: cost
                }
            ),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (data) {
                console.log(data.IsSuccess);
            },
            error: function (errorData) {
                console.log(errorData);
            }
        });
    }
}