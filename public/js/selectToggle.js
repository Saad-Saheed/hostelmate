function getHostelsCallBack(hostelCategory, hostel, route) {

    let sel_hostelCategory_id = hostelCategory.val();
    let url = route;
    url = url.replace(':id', sel_hostelCategory_id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        url: url,
        type:'GET',
        success: function(data) {

            hostel.html(`<option value="" selected="true">-- Hostel Room --</option>`);
            $.each(data.hostels, function(key, value) {
                let srow =`<option value="${value.id}">${value.block_name}(Room: ${value.room_no})</option>`;
                hostel.append(srow);
            });

        },
        error: function(data) {

            console.error(data);
            // let error =`<div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 150; position: absolute">
            //         ${data.responseJSON.message}
            //     </div>`;
            // $.append(error);

        }

    });
}

function getbedNoCallBack(hostel, bed_no, route) {

    let sel_hostel_id = hostel.val();
    let url = route;
    url = url.replace(':id', sel_hostel_id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({

        url: url,
        type:'GET',
        success: function(data) {

            bed_no.html(`<option value="" selected="true">-- Bed No --</option>`);
            for(let i = 1; i <= data.bed_no; i++) {
                let srow =`<option value="${i}">${i}</option>`;
                bed_no.append(srow);
            }

        },
        error: function(data) {

            console.error(data);
            // let error =`<div class="alert alert-danger alert-dismissible fade show" role="alert" style="z-index: 150; position: absolute">
            //         ${data.responseJSON.message}
            //     </div>`;
            // $.append(error);

        }

    });
}
