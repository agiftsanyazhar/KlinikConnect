@extends('layouts.dashboard.app')

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>{{ $title }}</h3>
            </div>
        </div>
    </div>
    
    <section id="content-types">
        <div class="card shadow">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        @foreach ($announcements as $announcement)    
                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card shadow">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $announcement->title }}</h5>
                                            <p class="card-text">{{ $announcement->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
