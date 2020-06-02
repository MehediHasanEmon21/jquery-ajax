
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_gender = '', filter_country = '')
    {
        var dataTable = $('#customer_data').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                url: "/filter-data",
                data:{filter_gender:filter_gender, filter_country:filter_country}
            },
            columns: [
                {
                    data:'CustomerName',
                    name:'CustomerName'
                },
                {
                    data:'Gender',
                    name:'Gender'
                },
                {
                    data:'Address',
                    name:'Address'
                },
                {
                    data:'City',
                    name:'City'
                },
                {
                    data:'PostalCode',
                    name:'PostalCode'
                },
                {
                    data:'Country',
                    name:'Country'
                }
            ]
        });
    }

    $('#filter').click(function(){
        var filter_gender = $('#filter_gender').val();
        var filter_country = $('#filter_country').val();

        if(filter_gender != '' &&  filter_gender != '')
        {
            $('#customer_data').DataTable().destroy();
            fill_datatable(filter_gender, filter_country);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_country').val('');
        $('#customer_data').DataTable().destroy();
        fill_datatable();
    });

});