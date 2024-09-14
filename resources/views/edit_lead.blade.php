@extends('main')

@section('dynamic_page')



<div class="main">
    

    <!-- form contents -->
    <form action="" method="POST">
    @csrf
    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">EDIT LEAD</h1>
                
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            
                            <h5 class="card-title mb-0">First Name  <span class="text-danger">*</span></h5> 
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{$lead_details->first_name}}">

                            @error('first_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Title  <span class="text-danger">*</span></h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{$lead_details->title}}">
                            @error('title')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Description</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="description" name="description" value="{{$lead_details->description}}">
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Company <span class="text-danger">*</span></h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Company" name="company" value="{{$lead_details->company}}">
                            @error('company')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Email</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="{{$lead_details->email}}">
                        </div>
                    </div>


                    

                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Address</h5>
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" rows="2" placeholder="Address" name="address" value="{{$lead_details->address}}"></textarea>
                        </div>
                    </div>


                    

                    
                </div>
                

                <div class="col-12 col-lg-6">

{{-- last name --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Last Name <span class="text-danger">*</span></h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{$lead_details->last_name}}">
                            @error('last_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                     {{-- phone --}}

                     <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Phone <span class="text-danger">*</span></h5>
                        </div>
                        <div class="card-body">
                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$lead_details->phone}}">
                            @error('phone')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- lead source --}}

                    @php
                        $lead_source = array("Facebook", "Google", "Linkedin", "Instagram", "Twitter", "Others");
                    @endphp

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Lead Source</h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select mb-3" name="lead_source">
                                @foreach($lead_source as $single)
                                @if($single == $lead_details->lead_source)
                                
                                                <option value="{{$single}}" selected>{{$single}}</option>

                                @else

                                                <option value="{{$single}}" >{{$single}}</option>

                                @endif
                                @endforeach
                            </select>

                        </div>
                    </div>


                    {{-- lead status --}}


                    @php
                        $lead_status = array(
                            "Open",
                            "Closed",
                            "Negotiation",
                            "Qualified",
                            "Not Qualified",
                            "Need Analysis",
                            "Interested",
                            "Meeting",
                            "Proposal",
                            "Not Interested",
                            
                        );
                    @endphp

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Lead Status</h5>
                        </div>
                        <div class="card-body">
                            <select class="form-select mb-3" name="lead_status">
                                @foreach($lead_status as $single)

                                @if($single == $lead_details->lead_status)
                                
                                                <option value="{{$single}}" selected>{{$single}}</option>

                                @else

                                                <option value="{{$single}}" >{{$single}}</option>

                                @endif
                                
                                               

                                @endforeach
                            </select>

                        </div>
                    </div>



                    
                </div>
            

                
            </div>

            <div class="d-grid gap-2 mt-3 ml-5 mr-5">
											
                <button type="submit" class="btn btn-lg btn-primary" name="submit" value="submit">UPDATE LEAD</button>
            </div>



        </div>
    </main>
</form>

</div>


@endsection