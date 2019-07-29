@extends('layouts.app')

@section('routes')
    <span><a href="{{ route('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
    <span>{{$patient->name}} <i class="ion-ios-arrow-forward"></i></span>
@endsection

@section('content')

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <h2>Patient Name: {{$patient->name}}</h2>
            </div>
            <div class="row justify-content-center">
                <p>Gender: @if($patient->gender=='m')
                            Male
                            @else  
                                Female
                            @endif
                </p>
            </div>
            <div class="row justify-content-center">
                <p>Date of Birth: {{$patient->dob}}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Weight Graph') }}</div>
                        <div class="card-body">
                            <canvas class="my-4 w-100" id="weight"></canvas>
                            <a href="{{route('patient.weights',$patient->patient_id)}}" class="btn btn-primary stretched-link">Tabulate</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="card-header bg-primary text-white">{{ __('Blood Pressure Graph') }}</div>
                        <div class="card-body">
                            <canvas class="my-4 w-100" id="bp"></canvas>
                            <a href="{{route('patient.bps',$patient->patient_id)}}" class="btn btn-primary stretched-link">Tabulate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    @include('footer')
    <script src="{{asset('js/weightchart.js')}}"></script>
    <script src="{{asset('js/bpchart.js')}}"></script>
@endsection