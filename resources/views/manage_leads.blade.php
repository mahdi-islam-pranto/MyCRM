@extends('main')
@section('dynamic_page')

<div class="main content">

    <div class="card ">
        
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">ALL LEADS</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Start Date</th>
                            <th class="d-none d-xl-table-cell">End Date</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Assignee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leads as $single)
                        <tr>
                            <td>Project Apollo</td>
                            <td class="d-none d-xl-table-cell">01/01/2023</td>
                            <td class="d-none d-xl-table-cell">31/06/2023</td>
                            <td><span class="badge bg-success">Done</span></td>
                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                        </tr>
                       

                        @endforeach
                    </tbody>
                </table>
            </div>
        
        
    </div>


</div>

@endsection

