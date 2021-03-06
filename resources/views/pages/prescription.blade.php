@extends('layouts.app')

@section('routes')
    <span class="mr-2"><a href="{{route('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span class="mr-2"><a href="{{route('dashboard')}}">Dashboard <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>Prescription <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')
{{-- Prescription with Basic Details, Symptoms, Prescribed Medicines, Tests --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Basic Details</div>
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col"> Name:  {{$patient->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col">Age(years): {{$patient->age}} </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Weight: {{$prescription->weight}} kg
                                </div>
                                <div class="col text-right">
                                    Date: {{$prescription->appointment->date}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    Blood Pressure : {{$prescription->bp_low}}/{{$prescription->bp_high}}
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Symptoms</div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($prescription->symptoms as $symptom)
                                    <div class="list-group-item mb-2">
                                        {{$symptom->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Tests</div>
                        <div class="card-body">
                            <div class="list-group">
                            @foreach($tests as $test)
                                @if($test->location)
                                <a href="{{route('test.show',['prescription'=>$prescription->prescription_id,
                                'test'=>$test->id])}}">
                                @endif
                                    <div class="list-group-item mb-2 row">
                                        <div class="col">{{$test->test->name}}</div>
                                    </div>
                                @if($test->location)
                                </a>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">Prescribed Medicines</div>
                        <div class="card-body">
                            <div class="list-group">
                            @foreach($medicines as $medicine)
                                <div class="list-group-item mb-2">
                                    <div class="row">
                                        <div class="col-md-4">{{$medicine->medicine->name}}</div>  
                                        <div class="col-md-4">{{$medicine->duration}} Days</div>  
                                        <div class="col-md-4">{{$medicine->dosage}}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection