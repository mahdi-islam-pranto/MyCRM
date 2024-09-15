@extends('main')
@section('dynamic_page')

<div class="main content">
    <div class="card ">
        <div class="card flex-fill">
            <div class="card-header d-flex  justify-content-between" >
                <h5 class="card-title mb-0">ALL DEALS</h5>
                <button  id="printButton" class="btn btn-primary">Print</button>
                
            </div>
            <table class="table table-hover my-0" id="dealsTable">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">ID</th>
                        <th class="d-none d-xl-table-cell">Amount</th>
                        <th class="d-none d-xl-table-cell">Deal Name</th>
                        <th class="d-none d-xl-table-cell">Stage</th>
                        <th class="d-none d-xl-table-cell">Account Id</th>
                        <th class="d-none d-xl-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deals as $single)
                    <tr>
                        <td class="d-none d-xl-table-cell">{{$single->id}}</td>
                        <td class="d-none d-xl-table-cell">{{$single->ammount}}</td>
                        <td class="d-none d-xl-table-cell">{{$single->deal_name}}</td>
                        <td class="d-none d-xl-table-cell"><span class="badge bg-success">{{$single->deal_stage}}</span></td>
                        <td>{{$single->account_id}}</td>
                        <td class="d-none d-md-table-cell">
                            <a class="btn btn-danger" href="{{url('/delete_deal/'.$single->id)}}" onclick="return confirm('Are you sure to delete this Contact?')">
                                <div class="mb-2"><i class="align-middle" data-feather="trash-2"></i> <span class="align-middle"></span></div>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jsPDF and autoTable Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>

<script>
    $(document).ready(function () {
        $('#printButton').click(function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.autoTable({
                html: '#dealsTable',
                styles: { 
                    cellPadding: 3,
                    fontSize: 10,
                    valign: 'middle',
                    overflow: 'linebreak',
                    tableWidth: 'auto',
                    tableLineColor: [255, 255, 255],
                    tableLineWidth: 0.1,
                },
                headStyles: { fillColor: [100, 100, 100] },
            });

            doc.save('deals.pdf');
        });
    });
</script>
@endsection
