@extends('main')
@section('dynamic_page')

<div class="main content">

    <div class="card ">
        
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">ALL CONTACTS</h5>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">ID</th>
                            <th class="d-none d-xl-table-cell">Contact Name</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Phone</th>
                            <th class="d-none d-xl-table-cell">Account Id</th>
                            <th class="d-none d-xl-table-cell">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $single)
                        <tr>
                            
                            <td class="d-none d-xl-table-cell">{{$single->id}}</td>
                            <td class="d-none d-xl-table-cell">{{$single->contact_name}}</td>
                            <td class="d-none d-xl-table-cell">{{$single->email}}</td>
                            
                            <td>{{$single->phone}}</td>
                            <td>{{$single->account_id}}</td>

                            {{-- buttons action --}}

                            <td class="d-none d-md-table-cell">
                                
                            <a class="btn btn-danger" href="{{url('/delete_contact/'.$single->id)}}" onclick="return confirm('Are you sure to delete this Contact?')"><div class="mb-2"><i class="align-middle" data-feather="trash-2"></i> <span class="align-middle"></span>
                            </div></a>
                        
                        
                        </td>

                            
                            
                                
                            
                        </tr>
                       

                        @endforeach
                    </tbody>
                </table>
            </div>
        
        
    </div>


</div>

@endsection

