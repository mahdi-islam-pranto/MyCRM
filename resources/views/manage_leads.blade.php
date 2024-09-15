@extends('main')
@section('dynamic_page')

<div class="main content">
    <div class="card">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title mb-0">ALL LEADS</h5>
                <button id="printLeadsButton" class="btn btn-primary">Print</button>
            </div>
            <table class="table table-hover my-0" id="leadsTable">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">Company Name</th>
                        <th class="d-none d-xl-table-cell">Title</th>
                        <th class="d-none d-xl-table-cell">Email</th>
                        <th class="d-none d-md-table-cell">Phone</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-md-table-cell">Source</th>
                        <th class="d-none d-md-table-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leads as $single)
                    <tr>
                        <td><a href="{{url('/view_lead/'.$single->id)}}">{{$single->company}}</a></td>
                        <td class="d-none d-xl-table-cell">{{$single->title}}</td>
                        <td class="d-none d-xl-table-cell">{{$single->email}}</td>
                        <td>{{$single->phone}}</td>
                        <td><span class="badge bg-success">{{$single->lead_status}}</span></td>
                        <td class="d-none d-md-table-cell">{{$single->lead_source}}</td>
                        <td class="d-none d-md-table-cell">
                            <a class="btn btn-primary" href="{{url('/edit_lead/'.$single->id)}}">
                                <div class="mb-2"><i class="align-middle" data-feather="edit"></i> <span class="align-middle"></span></div>
                            </a>
                            <a class="btn btn-danger" href="{{url('/delete-lead/'.$single->id)}}" onclick="return confirm('Are you sure to delete this Lead?')">
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
        $('#printLeadsButton').click(function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            
            doc.autoTable({
                html: '#leadsTable',
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

            doc.save('leads.pdf');
        });
    });
</script>
@endsection
