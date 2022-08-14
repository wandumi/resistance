@extends('backend.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css"
          integrity="sha512-hievggED+/IcfxhYRSr4Auo1jbiOczpqpLZwfTVL/6hFACdbI3WQ8S9NCX50gsM9QVE+zLk/8wb9TlgriFbX+Q=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .modal-dialog,
        .modal-content {
            /* 80% of window height */
            height: 90%;
        }
    </style>

@endsection


@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Financial</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('financials/financial') }}">financial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Financial</li>
        </ol>
    </div>
    <!-- creating  -->
    <div class="col-xl-12 col-lg-12 mb-4 pl-0">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Financial</h6>
                <a class="m-0 float-right btn btn-primary btn-sm" href="{{ url('financials/financial') }}">Back <i
                        class="fas fa-chevron-right"></i></a>
            </div>
            <div id="presentationTable" class="col-md-6 offset-lg-3 py-5 ">
                @if($message =  session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <form id="financial" action="{{ url('financials/financial') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="financial_section_id">Financial Lists</label>
                            <select name="financial_section_id" class="form-control" id="financial_section_id">
                                <option default disabled selected>Select Financial Lists</option>
                                @foreach($financialLists as $lists)
                                    <option value="{{ $lists->id }}">
                                        {{ $lists->name}}
                                    </option>
                                @endforeach
                            </select>
                                    
                            @error('financial_section_id')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="pdf">pdf a File</label>
                            <input type="file" value="{{ old('pdf') }}" class="form-control @error('pdf') is-invalid @enderror" name="pdf" id="pdf">
                            @error('pdf')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="cover_image">cover Image</label>
                            <input type="file" value="{{ old('cover_image') }}" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" id="cover_image">
                            @error('cover_image')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <button type="submit" id="form-submit" class="btn btn-primary btn-block">Submit</button>

                    </div>

                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="viewPresentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog mw-100 w-50" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">View Image/PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div> 


@endsection


