@extends('layouts.page-layout')

@section('results-header')
    <h2>{{ $studios->total() }} studios found for {{ $cityName }}</h2>
@endsection

@section('studio-results-count')
    <div dataset="studio-count"
        style="margin-bottom: 10px; font-size: 14px; color: rgb(102, 102, 102);">
            Results: {{ $studios->firstItem() }} - {{ $studios->lastItem() }}
    </div>
@endsection
    
@section('studios-list')
    <div id="studio-list">
        @foreach ($studios as $studio)
                 <div class="studio-card" 
                    data-city="{{ $studio->city->name }}"
                    style="border-bottom: 1px solid rgb(221, 221, 221); padding-top: 15px; padding-bottom: 15px;">
                    <h3 style="margin: 0px 0px 5px; font-size: 16px; font-weight: bold;">
                        <a href="{{ $studio['website'] }}" target="_blank" rel="noopener noreferrer" 
                            style="color: rgb(0, 0, 238); text-decoration: underline;">
                            {{ $studio->name }}
                        </a>
                    </h3>
                    <div style="font-size: 14px; color: rgb(0, 0, 0); margin-bottom: 5px;">{{ $studio->area }} — {{ $studio->city->name }}</div>
                    <div style="font-size: 14px; color: rgb(102, 102, 102); font-style: italic;">{{ $studio->description }}</div>
                    <div style="font-size: 12px; color: rgb(153, 153, 153); margin-top: 5px;">
                        <strong>Area:</strong> {{ $studio->area  }} | <strong>Website:</strong> 
                        <a href="{{ $studio['website'] }}" 
                            target="_blank" rel="noopener noreferrer" style="color: rgb(0, 0, 238);">{{ $studio->website }}</a>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
