@extends('layouts.contact')
            {{-- Body of page --}}
@section('main_content')
    <section class="">
        <h4 class="display-6 lead text-dark fw-bolder text-center mt-3 py-2 ">
            Team Contact 
        </h4>       
    </section>
    <section class="p-sm-4 back">
        <div class="container-fluid team">

            <div class="row" id="carte">
                @csrf
            </div>
        </div>
        <div class="pt-5">
            <button type="button" data-bs-toggle="modal" data-bs-target="#ctg_Modal" class="btn btn-outline-success d-grid justify-contentent-center col-3 pt-2 mx-auto rounded-pill d-inline btn-lg bn save"><span class="bi bi-plus-circle-fill h4"> Create new Category</span></button>
        </div>

    </section>
@endsection                                          

