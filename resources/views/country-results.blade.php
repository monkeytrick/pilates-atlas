@extends('layouts.page-layout')

@section('results-header')
    <h2>{{ $studios->total() }} studios found for {{ $countryName }}</h2>
@endsection

@section('pagination-links')
    <div class="paginate">
        {{ $studios->links() }}
    </div>
@endsection

<!-- Display dropdown for cities within the selected country -->
@section('search-box')
    <div style="background-color: rgb(240, 240, 240); padding: 15px; margin-bottom: 20px; border: 1px solid rgb(204, 204, 204);">
        <form action="{{ route('city.show_studios') }}"  method="GET">
                <select style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); font-family: inherit;"
                        name="id" id="city-select">
                        <option value="all" selected>All cities</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>                                     
                        @endforeach
                </select>
            <div>
                <button type="submit" style="background-color: #0da2e7; color: white; padding: 10px 15px; border: none; border-radius: 4px; font-size: 14px; cursor: pointer; font-family: inherit;">Search Studios</button>
            </div>
        </form>
    </div>
@endsection

@section('cities-dropdown') 
    <select style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); font-family: inherit;"
                    name="id" id="city-select">
        <option value="all" selected>All cities</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>                                     
        @endforeach
    </select>
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

