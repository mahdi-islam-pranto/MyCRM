@extends('main')

@section('dynamic_page')

<div class="main">

    <div class="content">

        

            <h1 class="h3 mb-1">Convert This Lead</h1>
        
    </div>
    
    <!-- form contents -->
    <main class="content">
        <div class="container-fluid p-0">

            <form action="" method="POST">
                @csrf
           
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
                            <h5 class="card-title mb-2">Create New Contact <span class="badge bg-primary">{{$lead_details->first_name}} {{$lead_details->last_name}} </span></h5>
                            <h5 class="card-title mb-0">Create New Account <span class="badge bg-primary">{{$lead_details->company}}</span></h5>
                        </div>
                        
                    </div>


                </div>

                    

                    

                <div class="col-12 col-lg-6">
                    

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Create New Deal For This Account</h5>
                        </div>
                        <div class="card-body">
                            <label for="staticEmail2" class="form-label">Ammount <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" placeholder="" name="ammount">
                            @error('ammount')
                            <small class="text-danger">{{$message}}</small>
                            @enderror


                            <label for="staticEmail2" class="form-label">Deal Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" placeholder="" name="deal_name">
                            @error('deal_name')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                            <br>

                            <label for="staticEmail2" class="form-label">Closing Date <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" placeholder="" name="closing_date">
                            @error('closing_date')
                            <small class="text-danger">{{$message}}</small>
                            @enderror

                            <br>

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


                            <label for="staticEmail2" class="form-label">Stage <span class="text-danger">*</span></label>
                            <select class="form-select mb-3" name="deal_stage">
                                @foreach($lead_status as $single)
                                
                                                <option value="{{$single}}">{{$single}}</option>

                                @endforeach
                            </select>
                            @error('lead_stage')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>

                <div class="both-buttons">

                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Convert</button> 
                    <a href="{{url('manage_leads')}}"><div  class="btn btn-secondary">Cancel</div> </a>

                </div>


                    
                    

                    
                </div>


            </div>

        </form>
            

        </div>
    </main>


@endsection