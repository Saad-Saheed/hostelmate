@extends('layouts.dashboard')

@section('title')
All Transaction
@endsection

@section('links')
<!-- Page plugins -->
{{-- <link rel="stylesheet" href="{{asset('/css/custom.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/rr-1.2.8/datatables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('jslinks')
<!-- Optional JS -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/r-2.2.9/rr-1.2.8/datatables.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js" defer></script>
<script src="{{asset('/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>


<script>
    $('document').ready(function(){

        $('#datatable-buttons-sp').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'print'
                // ]
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
        });

    });
</script>
@endsection



@section('content')
<!-- Main content -->
<div class="main-content">
  <h2 class="p-3">All Transaction</h2>

  <!-- Page content -->
  <div class="container-fluid mt-5">
    <!-- Table -->
    <div class="row">
      <div class="col p-0">
        <div class="col-lg-11 col-md-12 mx-auto">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Payment Transactions</h3>
            </div>
            {{-- <div class="table-responsive py-4"> --}}
              <table class="table table-flush table-hover table-striped" id="datatable-buttons-sp" width="100%">
                <thead class="thead-light">
                  <tr>
                    <th>Order No</th>
                    <th>Payment ref</th>
                    <th>Payment Method</th>
                    <th>Payer</th>
                    <th>Hostel</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Dated</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Order No</th>
                    <th>Payment ref</th>
                    <th>Payment Method</th>
                    <th>Payer</th>
                    <th>Hostel</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Dated</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if (isset($transactions))
                  @foreach ($transactions as $transaction)
                  <tr>
                    <td>{{$transaction->order_no}}</td>
                    <td>{{$transaction->payment_ref}}</td>
                    <td>{{ $transaction->payment_method }}</td>
                    <td>{{$transaction->user->student_id}}</td>
                    <td class="text-wrap">{{ $transaction->hostel->hostelCategory->name }}</td>
                    <td>₦{{ number_format($transaction->amount, 0) }}</td>
                    <td>{{  $transaction->status  }}</td>
                    <td>{{$transaction->created_at->diffForHumans()}}</td>

                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
