@extends('layouts.app') @section('content')

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Contact Form -->
    <form action="/contact" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Contact Name -->
        <div class="form-group">
            <label for="contact-name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="contact-name" class="form-control">
            </div>
        </div>
        <!-- Contact Phone -->
        <div class="form-group">
            <label for="contact-phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" name="phone" id="contact-phone" class="form-control" placeholder="xxx-xxx-xxxx" pattern="^\d{3}-\d{3}-\d{4}$">
            </div>
        </div>
        <!-- Contact Address -->
        <div class="form-group">
            <label for="contact-address" class="col-sm-3 control-label">Address</label>
            <div class="col-sm-6">
                <input type="text" name="address" id="contact-address" class="form-control">
            </div>
        </div>
        <!-- Contact Email -->
        <div class="form-group">
            <label for="contact-email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="email" name="email" id="contact-email" class="form-control">
            </div>
        </div>

        <!-- Add Contact Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i> Add Contact
          </button>
            </div>
        </div>
    </form>
</div>

<!-- Show Contacts -->
@if (count($addressbook) > 0)

<div class="container">
    <table class="table table-striped contacts-table">

        <!-- Table Headings -->
        <thead>
            <th>
                Name
            </th>
            <th>
                Phone Number
            </th>
            <th>
                Address
            </th>
            <th>
                Email
            </th>
        </thead>

        <!-- Table Body -->
        <tbody>
            @foreach ($addressbook as $contact)
            <tr>
                <td style="display:none">
                    <div class="contactId">
                        {{$contact->id}}
                    </div>
                </td>
                <!-- Contact name -->
                <td class="table-text">
                    <div>
                        {{ $contact->name }}
                    </div>
                </td>
                <!-- Contact name -->
                <td class="table-text">
                    <div>
                        {{ $contact->phone }}
                    </div>
                </td>
                <!-- Contact name -->
                <td class="table-text">
                    <div>
                        {{ $contact->address }}
                    </div>
                </td>
                <!-- Contact name -->
                <td class="table-text">
                    <div>
                        {{ $contact->email }}
                    </div>
                </td>
                <td>
                    <form action="{{url('contact/'.$contact->id)}}" method="POST">
                        {{csrf_field()}} {{method_field('UPDATE')}}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".modal">
                      <i class="fa fa-btn fa-trash"></i>Edit
                    </button>
                    </form>
                </td>
                <td>
                    <form action="{{url('contact/'.$contact->id)}}" method="POST">
                        {{csrf_field()}} {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-btn fa-trash"></i>Delete
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit contact</h4>
            </div>
            <div class="modal-body">
                <form action="/contact" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Contact Name -->
                    <div class="form-group">
                        <label for="contact-name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="contact-name" class="form-control" value="{{ $contact->name }}">
                        </div>
                    </div>
                    <!-- Contact Phone -->
                    <div class="form-group">
                        <label for="contact-phone" class="col-sm-3 control-label">Phone</label>

                        <div class="col-sm-6">
                            <input type="text" name="phone" id="contact-phone" class="form-control" placeholder="xxx-xxx-xxxx" pattern="^\d{3}-\d{3}-\d{4}$" value="{{ $contact->phone }}">
                        </div>
                    </div>
                    <!-- Contact Address -->
                    <div class="form-group">
                        <label for="contact-address" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="contact-address" class="form-control" value="{{ $contact->address }}">
                        </div>
                    </div>
                    <!-- Contact Email -->
                    <div class="form-group">
                        <label for="contact-email" class="col-sm-3 control-label">Email</label>

                        <div class="col-sm-6">
                            <input type="email" name="email" id="contact-email" class="form-control" value="{{ $contact->email }}">
                        </div>
                    </div>

                    <!-- Add Contact Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                      <i class="fa fa-plus"></i> Add Contact
                                  </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif @endsection
