@extends('main')

@section('dynamic_page')


<main class="content">
    <div class="container-fluid p-0">
        
            <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Lead Profile</h1>
           
        </div>
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Lead Details</h5>
                    </div>
                    <div class="card-body text-center">
                        
                        <h5 class="card-title mb-3">{{$lead_details->company}}</h5>
                        

                        <div>
                            
                            <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
                        </div>
                    </div>
                    <hr class="my-0" />
                    {{-- <div class="card-body">
                        <h5 class="h6 card-title">Skills</h5>
                        <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
                        <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
                        <a href="#" class="badge bg-primary me-1 my-1">React</a>
                        <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UI</a>
                        <a href="#" class="badge bg-primary me-1 my-1">UX</a>
                    </div> --}}
                    <hr class="my-0" />
                    {{-- <div class="card-body">
                        <h5 class="h6 card-title">About</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">San Francisco, SA</a></li>

                            <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
                            <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Boston</a></li>
                        </ul>
                    </div> --}}
                    <hr class="my-0" />
                    <div class="card-body">
                        <h5 class="h6 card-title">Contact</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1"><a href="#">Email</a></li>
                            <li class="mb-1"><a href="#">Twitter</a></li>
                            <li class="mb-1"><a href="#">Facebook</a></li>
                            <li class="mb-1"><a href="#">Instagram</a></li>
                            <li class="mb-1"><a href="#">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-xl-9">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Detailed Information</h5>
                    </div>
                    <div class="card-body h-100">

                        <div class="d-flex align-items-start">
                            
                            <div class="flex-grow-1">
                                <h5 class="card-title">First Name: {{$lead_details->first_name}}</h5>
                                <h5 class="card-title ">Last Name: {{$lead_details->last_name}}</h5>
                                <h5 class="card-title ">Contact Number: {{$lead_details->phone}}</h5>
                                <h5 class="card-title ">Email: {{$lead_details->email}}</h5>
                                <h5 class="card-title ">Address: {{$lead_details->address}}</h5>

                            </div>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            
                            <div class="flex-grow-1">
                                <h5 class="card-title">Lead Title: {{$lead_details->title}}</h5>
                                <h5 class="card-title">Description: {{$lead_details->description}}</h5>
                            </div>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            
                            <div class="flex-grow-1">
                                <h5 class="card-title"> Lead Source: <span class="badge bg-success">{{$lead_details->lead_source}} </span></h5>
                                <h5 class="card-title">Lead Status: <span class="badge bg-success"> {{$lead_details->lead_status}}</span></h5>
                            </div>
                        </div>

                        <hr />
                        
                        

                        <div class="d-grid gap-2">
                            <a href="{{url('/edit_lead/'.$lead_details->id)}}" class="btn btn-primary">EDIT LEAD</a>
                            <a href="{{url('/convert_lead/'.$lead_details->id)}}" class="btn btn-primary">CONVERT LEAD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

    </div>
</main>

@endsection