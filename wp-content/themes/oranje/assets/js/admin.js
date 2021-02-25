jQuery(document).ready(function ($) {


    $('#order_datatable').DataTable( {
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 4 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 6 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 9 ],
                "visible": false,
                "searchable": true
            },
            {
                "targets": [ 13 ],
                "visible": false,
                "searchable": false
            }
        ],
        "processing": true,
        "serverSide": true,
        "ajax": ajaxurl + '?action=get_orders_data'
    } );

    $("#order_datatable").on("click", ".get_order_cardinfo", function(e){
        e.preventDefault();                
        tb_show("Card Information", $(this).attr('data-querystring') );        
    });

    $("#order_datatable").on("click", ".update_order_status", function(e){
        e.preventDefault();                
        $.post(ajaxurl, {action: 'order_status_update', refid: $(this).attr('data-refid'), status_name: $(this).attr('data-status') }, function(res) {
            // console.log(res);
            res = JSON.parse(res);
            if( res.status == 'success' ) {
                $( 'a[data-refid="'+ res.post.refid +'"]' ).closest('.dropdown').html( res.html_block );
            }
        });
        // tb_show("Card Information", $(this).attr('data-querystring') );        
    });

});