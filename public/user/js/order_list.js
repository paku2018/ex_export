$(document).ready(function() {
    refreshTable()
});

function refreshTable() {
    try {
        dt.destroy()
    } catch (e) {
    }
    dt = $('#dt_orders').DataTable({
        ajax: {
            url: path,
            type: "POST",
            data: {_token: token}
        },
        searching: false,
        bLengthChange: false,
        aoColumnDefs: [
            {"bSortable": false, "aTargets": [0]},
            {"bSearchable": false, "aTargets": [0]}
        ],
        columns: [
            {"data": "bill_name"},
            {"data": "business_name"},
            {"data": "full_address"},
            {"data": "order_desc"},
            {"data": "quantity"},
            {"data": "order_count"},
            {"data": "delivery_name"},
            {"data": "delivery_address"},
            {"data": "delivery_number"},
            {"data": "delivery_complement"},
            {"data": "delivery_city"},
            {"data": "delivery_state"},
            {"data": "delivery_zip"},
            {"data": "delivery_neighborhood"},
            {"data": "request_at"},
            {
                'data':'status','render':function (data,type,row) {
                    return `<a href="/seller/order/`+row['id']+`/edit">`+data+`</a>`;
                }
            },
            {"data": "transporter",'render':function (data, type, row) {
                    if(data!=null)
                        return data.name;
                    else
                        return "";
                }
            },
            {"data": "track_key"}
        ]
    });
}
