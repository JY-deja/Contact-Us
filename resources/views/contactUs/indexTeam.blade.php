@extends('layouts.contact')
@section('main_content')
<section >
    <div id="titlename">
        <h3 class="display-5 lead text-dark fw-bold text-center mt-3 py-2 "> {{$type}} Contact</h3>
    </div>                 
</section>
              {{-- database  --}}
<section class=" mx-5 px-5">
            <table id="datatableTeam" class="col text-center align-self-center table table-fluid table-bordered  table-striped text-white ">
                <thead class="">
                    <tr class="table-info text-info">
                        <th scope="col" class="cont_id text-center">Id</th>
                        <th scope="col" class="text-center">Full Name</th>
                        <th scope="col" class="text-center">Phone Number</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Update</th>
                        <th scope="col" class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody class="text-dark">

                  
                </tbody>
            </table>
              {{--button for insert data --}}
                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-outline-success d-grid  justify-contentent-center col-4 pt-3 mx-auto rounded-pill d-inline btn-lg bn ajout"><span class="bi bi-plus-circle-fill h4"> Create new Contact</span></button>
</section>
@endsection