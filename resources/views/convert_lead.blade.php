@extends('main')

@section('dynamic_page')

<div class="main">

    <div class="content">

        

            <h1 class="h3 mb-1">Convert This Lead</h1>
        
    </div>
    
    <!-- form contents -->
    <main class="content">
        <div class="container-fluid p-0">

           
            <div class="row">
                <div class="col-12 col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title mb-3">{{$lead_details->first_name}} {{$lead_details->last_name}} ( {{$lead_details->company}})</h2>
                            <h5 class="card-title mb-3">{{$lead_details->phone}}</h5>
                            <h5 class="card-title mb-0">{{$lead_details->email}}</h5>
                        </div>
                     
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-2">Create Account <span class="badge bg-primary">{{$lead_details->first_name}} {{$lead_details->last_name}} </span></h5>
                            <h5 class="card-title mb-0">Create Account <span class="badge bg-primary">{{$lead_details->company}}</span></h5>
                        </div>
                        
                    </div>


                </div>

                    

                    

                <div class="col-12 col-lg-6">
                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Create New Deal For This Account</h5>
                        </div>
                        <div class="card-body">
                            <label for="staticEmail2" class="form-label">Ammount</label>
                            <input type="text" class="form-control mb-2" placeholder="" >

                            <label for="staticEmail2" class="form-label">Deal Name</label>
                            <input type="text" class="form-control mb-2" placeholder="" >

                            <label for="staticEmail2" class="form-label">Closing Date</label>
                            <input type="text" class="form-control mb-2" placeholder="" >

                            <label for="staticEmail2" class="form-label">Stage</label>
                            <input type="text" class="form-control" placeholder="" >
                        </div>
                    </div>

                    
                    

                    
                </div>
            

        </div>
    </main>


@endsection