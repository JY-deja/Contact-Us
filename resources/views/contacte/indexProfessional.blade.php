<!DOCTYPE html>
@extends('layouts.contact')

<body class="bg-white" id='bd'>
<main class="container-fluid">

<!-- Start Modal insert and update -->
      <div class="modal fade mdl" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content mdlg">
            <div class="modal-header">
              <h2 class="modal-title hid" id="exampleModalLabel " >Create New Contact</h2>
              <h2 class="modal-title sho" id="exampleModalLabel " >Update Contact</h2>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <form id="addForm" role="form">
              {{ csrf_field() }}

                <input class="pt" type="hidden" name="_method" value=" ">
                <input class="id_Edit" type="hidden" name="_method" value=" ">
    
                <div class="modal-body">

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Full name</label>
                    <input type="text" name ="fname" class="form-control name" placeholder="Please insert the full name" >
                  </div>

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Phone number</label>
                    <input type="tel" name ="phone" class="form-control tele" placeholder="Please insert the phone number" >
                  </div>

                  <div class="form-group">
                    <label class="form-label text-left fw-bolder">Category</label>
                    <select name="catg" class="form-control ctg">
                        <option value="Family">Family Contact</option>
                        <option value="Professional" selected>Professional Contact</option>
                        <option value="Friendship">Contact Friendship</option>
                    </select>
                    
                  </div>

                </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg rounded-pill float-end" data-bs-dismiss="modal" >Close</button>
                <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end hid">Save</button>
                <button type="submit" class="btn btn-lg btn-success rounded-pill float-lg-end sho">Update</button>
              </div>

            </form>
          </div>
        </div>
      </div>
<!-- end Modal insert and update-->
 <section class="">
            <h1 class="display-3 lead text-dark fw-bold text-center mt-4 py-4 ">
                Contact 
            </h1>       
</section>
              {{-- database  --}}
<section class=" mx-5 px-5">
            <table id="datatableProfessional" class="col text-center align-self-center table table-fluid table-bordered  table-striped text-white ">
              
                <thead class="">
                    <tr class="table-info text-info">
                        <th scope="col" class="cont_id text-center" >Id</th>
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
</main>
</body>

</html>