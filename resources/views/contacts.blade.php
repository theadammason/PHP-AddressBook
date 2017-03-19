@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/contact" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Contact Name -->
            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Name</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="contact-name" class="form-control">
                </div>
            </div>
            <!-- Contact Phone -->
            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Phone</label>

                <div class="col-sm-6">
                    <input type="number" name="phone" id="contact-phone" class="form-control">
                </div>
            </div>
            <!-- Contact Address -->
            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Address</label>

                <div class="col-sm-6">
                    <input type="text" name="address" id="contact-address" class="form-control">
                </div>
            </div>
            <!-- Contact Email -->
            <div class="form-group">
                <label for="contact" class="col-sm-3 control-label">Email</label>

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

    <!-- Current Tasks -->
    @if (count($contacts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Contacts
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Contact</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <!-- Contact name -->
                                <td class="table-text">
                                    <div>{{ $contact->name }}</div>
                                </td>
                                <!-- Contact name -->
                                <td class="table-text">
                                    <div>{{ $contact->phone }}</div>
                                </td>
                                <!-- Contact name -->
                                <td class="table-text">
                                    <div>{{ $contact->address }}</div>
                                </td>
                                <!-- Contact name -->
                                <td class="table-text">
                                    <div>{{ $contact->email }}</div>
                                </td>

                                <td>
                                  <form action="/task/{{$task->id}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                      <button>Detele Contact</button>
                                      <input type="hidden" name="_method" value="DELETE">
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
