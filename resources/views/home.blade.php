@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
                    <div class="content">
                        <div class="form-a-container">
                            @php
                                $ym = date("Y").'-'.date("m");
                            @endphp
                            <form method="GET" action="{{route('current',[$ym])}}">
                                <button type="submit" class="btn btn-outline-success">
                                    ENTER
                                </button>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
