@extends('layouts.admin')


@section('content')


<style>
.errors {
    color: red;
}

.buttn-area {
    display: flex;
}
</style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Candidates Details</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('candidates.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/candidates/update',$candidatesDetails[0]->id ) }}"> Edit</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary "> {{ $candidatesDetails[0]->first_name }}
                    {{ $candidatesDetails[0]->middle_name }}
                    {{ $candidatesDetails[0]->last_name }}</button>
                <button type="button" class="btn btn-secondary  dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#exampleModal">Add to
                        List</a>
                    <a class="dropdown-item" href="javascript:;" data-toggle="modal"
                        data-target=".bd-example-modal-lg">Add
                        to Job Order </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Candidates Details -->
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-Mail:</strong>
                {{ $candidatesDetails[0]->email1 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>2nd E-Mail:</strong>
                {{ $candidatesDetails[0]->email2 }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Home Phone:</strong>
                {{ $candidatesDetails[0]->phone_home  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cell Phone:</strong>
                {{ $candidatesDetails[0]->phone_cell  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Work Phone:</strong>
                {{ $candidatesDetails[0]->phone_work  }}
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add to Candidate Static Lists</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Select the lists you want to add the item to.</p>
                    <div class="addToListListBox" id="addToListBox">
                        <input type="hidden" style="width:200px;" id="dataItemArray" value="74">
                        <div class="evenDivRow" id="savedListRow2">
                            <tbody>
                                @foreach($savedList as $details)
                                <div class="list-item">
                                    <input type="checkbox" id="checkbox_value" name="checkbox_value" value="1">
                                    <input type="hidden" id="list_id" name="list_id" value="{{$details->id}}">
                                    <label for="vehicle1" class="description-label">{{$details->description}}</label>
                                    <button type="button" class="btn btn-danger btn-sm edit-btn">Edit</button>
                                    <br>
                                </div>
                                @endforeach
                            </tbody>
                        </div>
                        <form action="" method="post">
                            <div class="input_fields_wrap">
                            </div>
                            <input type="hidden" id="data_item_type" name="data_item_type" value="100">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info add_field_button" id="new_list">New List</button>
                    <button type="button" class="btn btn-primary add_to_list">Add To List</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button End modal -->

    <!-- Job Orders For Candidates -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">Job Orders For Candidates</label>
        </div>
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Ref. Number</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th style="width: 67px">Owner </th>
                        <th>Added</th>
                        <th>Entered By</th>
                        <th>Status</th>
                        <th style="width: 65px">Action</th>
                    </tr>
                    @foreach($candidatesJobOrderDetails as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td>3232</td>
                        <td><a
                                href="{{route('joborders.profile',$details['joborderDetails']->id)}}">{{ $details['joborderDetails']->title }}</a>
                        </td>
                        <td><a
                                href="{{route('companies.deatils',$details['joborderDetails']['companies']->id)}}">{{ $details['joborderDetails']['companies']->company_name}}</a>
                        </td>
                        <td>{{$details['users']->user_name}} </td>
                        <td>
                            {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_submitted), 'd m Y') }}
                        </td>
                        <td>{{$details['users']->user_name}}</td>
                        <td>{{$details->status}}</td>
                        <td>
                            <i class="fa fa-pencil" data-toggle="modal" data-target="#activityModal"></i>
                            <i class="fa fa-trash"></i>
                        </td>
                    </tr>
                    @endforeach
                </thead>
                <tbody id="container" class="no-border-x no-border-y ui-sortable">

                </tbody>
            </table>
            <i class="fa fa-plus"></i><a href="javascript:;" data-toggle="modal" data-target=".bd-example-modal-lg">Add
                This Candidate to Job Order</a>
        </div>
    </div>

    <!-- Lising For Candidates -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">List</label>
        </div>
        <div class="table-responsive col-md-12">
            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    @foreach($savedList as $details)
                    <tr>
                        <td>{{$details->id}}</td>
                        <td><a href="{{route('joborders.profile',$details->id)}}">{{ $details->description }}</a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </thead>
                <tbody id="container" class="no-border-x no-border-y ui-sortable">

                </tbody>
            </table>
        </div>
    </div>
    <!-- Button trigger modal -->

    <!-- Job Orders For listing -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 150%; margin-left: -18%;">
                <div class="form-group col-md-12" style="margin-top: -15px; margin-left: -5px; padding: 2%;">
                    <div class="form-control" style="border-color: transparent;padding-left: 0px">
                        <label style="font-size: 18px">Job Orders For Candidates</label>
                    </div>
                    <div class="buttn-area">
                        <form class="example" action="{{ route('joborders.index') }}">
                            <label for="">Search by Job Title:</label>
                            <input type="text" placeholder="Search.." name="search" value="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                        <form class="example" action="{{ route('joborders.index') }}" style="margin-left: 48px;">
                            <label for="">Search by Company Name:</label>
                            <input type="text" placeholder="Search.." name="search" value="">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>

                    </div><br>
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered" id="table">
                            <thead class="no-border">
                                <tr>
                                    <th>ID</th>
                                    <th>Ref. Number</th>
                                    <th>Title</th>
                                    <th>Company</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Modified</th>
                                    <th>Start</th>
                                    <th>Recruiter</th>
                                    <th style="width: 67px">Owner </th>
                                    <th style="width: 65px">Action</th>
                                    <!-- <th></th> -->
                                </tr>
                                @foreach($candidatesJobOrderDetails as $details)
                                <tr>
                                    <td>{{$details->id}}</td>
                                    <td>3232</td>
                                    <td><a
                                            href="{{route('joborders.profile',$details['joborderDetails']->id)}}">{{ $details['joborderDetails']->title }}</a>
                                    </td>
                                    <td>{{ $details['joborderDetails']['companies']->company_name}}</td>
                                    <td>type</td>
                                    <td>{{$details->status}}</td>
                                    <td>
                                        {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_modified), 'd m Y') }}
                                    </td>
                                    <td></td>
                                    <td>{{$details['users']->user_name}}</td>
                                    <td>{{$details['users']->user_name}}</td>
                                    <td><a
                                            href="{{route('joborders.profile',$details['joborderDetails']->id)}}">View</a>
                                    </td>
                                    <!-- <td></td> -->
                                </tr>
                                @endforeach
                            </thead>
                            <tbody id="container" class="no-border-x no-border-y ui-sortable">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Candidates: Log Activity -->
    <!-- Modal -->
    <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 128%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="activityModalLabel">Candidates: Log Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <fieldset class="form-group">
                        <div class="container">
                            <label for="">Regarding:</label>
                            <select id="" name="">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <br><br>
                            <div class="form-group row">
                                <div class="col-sm-2">Status:</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Change Status
                                        </label>
                                        <br>
                                        <!-- <label for="">Regarding:</label> -->
                                        <select id="" name="">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Activity:</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Log an Activity
                                        </label>
                                        <br>
                                        <label for="">Activity Type:</label>
                                        <br>
                                        <select id="" name="">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10" style="margin-left: 95px;">
                                    <label for="">Activity Type:</label>
                                    <br>
                                    <textarea name="" id="" cols="30"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Schedule:</div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Schedule Event
                                        </label>
                                        <br>
                                        <!-- <label for="">Regarding:</label> -->
                                        <select id="" name="">
                                            <option selected>Open this select menu</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <br><br>
                                        <div class="month-area"
                                            style="display: flex; flex-direction: row; align-items: center;">
                                            <div class="form-group">
                                                <label for="monthPicker">Select Month:</label>
                                                <div class="input-group">
                                                    <select id="monthDropdown" name="month">
                                                        @for ($month = 1; $month <= 12; $month++) <option
                                                            value="{{ $month }}">
                                                            {{ date('M', mktime(0, 0, 0, $month, 1)) }}
                                                            </option>
                                                            @endfor
                                                    </select>

                                                    <select name="date" id="dayDropdown"></select>

                                                    <input type="text" name="year" style="width: 15%;"
                                                        value="{{ substr(date('Y'), -2) }}" id="year">

                                                    <input type="date" name="calander_date" id="calander_date"
                                                        style="margin-left: 10px; padding: 0px; width: 6%;">
                                                </div>
                                            </div>
                                            <div class="title-area">
                                                <label for="">Title</label>
                                                <input type="text">
                                            </div>
                                            <input type="hidden" id="selectedDate" name="selected_date">
                                        </div>
                                        <!-- <br> -->
                                        <div class="time-area" style="display: flex; flex-direction: row;">
                                            <div class="form-group">
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="gridRadios" id="gridRadios1" value="option1"
                                                                    checked>
                                                                <div class="input-group"
                                                                    style="display: flex; flex-direction: row; flex-wrap: nowrap;">
                                                                    <select id="hours" name="hours">
                                                                        @for ($hour = 1; $hour <= 12; $hour ++) <option
                                                                            value="{{ $hour  }}">
                                                                            {{$hour}}
                                                                            </option>
                                                                            @endfor
                                                                    </select>

                                                                    <select id="minutes" name="minutes">
                                                                        <option value="00">00</option>
                                                                        <option value="15">15</option>
                                                                        <option value="30">30</option>
                                                                        <option value="45">45</option>
                                                                    </select>

                                                                    <select id="day_am_pm" name="day_am_pm">
                                                                        <option value="AM">AM</option>
                                                                        <option value="PM">PM</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="length-area" style="margin-left: 105px; display: grid; align-items: center; align-content: center;
">
                                                <label for="">Length:</label>
                                                <select id="length_hours" name="length_hours"
                                                    style="width: 173px;  padding: 3px;">
                                                    <option value="00">00</option>
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="selectedDate" name="selected_date">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Activity -->
    <div class="form-group col-md-12" style="margin-top: 7px">
        <div class="form-control" style="border-color: transparent;padding-left: 0px">
            <label style="font-size: 18px">Activity</label>
        </div>


        <div class="table-responsive col-md-12">
            @if(count($candidatesJobOrderDetails) > 0)
            <table class="table table-striped table-bordered" id="table">
                <thead class="no-border">
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Entered</th>
                        <th>Regarding</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatesJobOrderDetails as $details)
                    @if(
                    $details['activities'] != null &&
                    $details['joborderDetails'] != null &&
                    $details['users'] != null &&
                    $details['candidatesDetails'] != null
                    )
                    <tr>
                        <td>{{$details->id}}</td>
                        <td>
                            {{ date_format(DateTime::createFromFormat('Y-m-d H:i:s', $details->date_created), 'd m Y (h:iA)') }}
                        </td>


                        <td>{{$details['activities']['activityTypes'][0]->short_description}} </td>
                        <td>{{$details['users']->user_name}}</td>
                        <td>{{$details['joborderDetails']->title}}
                            ({{$details['joborderDetails']['companies']->company_name}})</td>
                        <td>{{substr(optional($details['activities'])->notes, 0, 30)}}</td>
                        <td>
                            <i class="fa fa-pencil"></i>
                            <i class="fa fa-trash" id="delete_activity" data-id="{{$details->id}}"></i>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="7">No data found</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
            @else
            <p>No data found</p>
            @endif
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js">
</script>
<script>
$(document).ready(function() {
    // Set default date to current date
    var currentDate = new Date();
    var defaultDate = currentDate.toISOString().slice(0, 10);
    $('#calander_date').val(defaultDate);

    // Initialize dropdowns with default date
    updateDropdowns(currentDate);

    // Listen for changes in the calander_date input
    $('#calander_date').change(function() {
        var selectedDate = new Date($(this).val());
        updateDropdowns(selectedDate);
    });

    function updateDropdowns(date) {
        // Set month
        $('#monthDropdown').val(date.getMonth() + 1);

        // Set day
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
        $('#dayDropdown').empty();
        for (var day = 1; day <= lastDay; day++) {
            $('#dayDropdown').append('<option value="' + day + '">' + day + '</option>');
        }

        // Set year
        $('#year').val(date.getFullYear().toString().substr(-2));
    }
});
var wrapper = $(".input_fields_wrap"); // Fields wrapper
var add_button = $(".add_field_button"); // Add button ID
$('#activityModal').modal('show');


$(add_button).click(function(e) {
    // On add input button click
    e.preventDefault();
    $(wrapper).append(
        '<div class="list-item"><div class="col-8"><div class="list-item"><input type="text" class="col-6" id="description" name="description" value=""><button type="button" class="btn btn-primary btn-sm  remove_field">Delete</button><button type="button" class="btn btn-danger btn-sm  save-btn">Save</button><br><span class="description_error errors"></span></div></div></div>'
    ); // Add input box
});


$(document).ready(function() {
    // Event handler for the "Edit" button
    $('.edit-btn').on('click', function() {
        // Find the closest parent with class 'list-item'
        var listItem = $(this).closest('.list-item');



        // Get the values needed for the input fields
        var itemId = $(this).closest('.list-item').find('input#list_id').val();
        // alert(itemId);
        var descriptionValue = listItem.find('.description-label').text();
        listItem.find('.edit-btn').hide();
        // Create the new input field
        var newInputField = '<input type="hidden" id="list_id" name="list_id" value="' + itemId + '">' +
            '<input type="text" class="col-6" id="description" name="description" value="' +
            descriptionValue +
            '"><button type="button" class="btn btn-primary btn-sm edit-btn remove_field">Delete</button><button type="button" class="btn btn-danger btn-sm edit-btn save-btn">Save</button><br><span class="description_error errors"></span>';

        // Replace the label with the new input field
        listItem.find('.description-label').replaceWith(newInputField);
    });
});
$(document).on('click', '.remove_field', function() {
    var listItem = $(this).closest('.list-item');
    listItem.find('.description-label').show(); // Show the label
    listItem.find('.edit-btn').show(); // Show the edit button

    // Get the list_id value
    var list_id = $(this).closest('.list-item').find('input#list_id').val();

    // Alert or perform other actions with the list_id value
    if (list_id !== undefined) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t to delete this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, trigger the deletion
                window.location.href = '/candidates/list/delete/' + list_id; // Adjust the URL as needed
            }
            window.location.href =
                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
        });
    }

    listItem.remove();

    // Remove the list item
});
$(document).on("click", ".save-btn", function(e) {
    // User click on save button
    e.preventDefault();
    // Get the description value
    var descriptionValue = $(this).closest('.list-item').find('input#description').val();

    var list_id = $(this).closest('.list-item').find('input#list_id').val();
    if (list_id !== undefined) {
        var list_id = list_id;
    } else {
        var list_id = null;

    }

    let errors = [];
    $(".errors").html("");

    if (descriptionValue === "") {
        errors.push(description);
        $('.description_error').html(`Description field can't be empty.`);
        return; // Stop execution if there's an error
    }
    var data_item_type = $('#data_item_type').val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: '/candidates/list/save',
        type: 'POST',
        data: {
            list_id: list_id,
            description: descriptionValue,
            data_item_type: data_item_type,
        },
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    $('#exampleModal').modal('hide');
                    window.location.href =
                        "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});

$(document).ready(function() {
    // Event handler for the "Add To List" button
    $('.add_to_list').on('click', function() {
        // Check if at least one checkbox is checked
        if ($('input[name="checkbox_value"]:checked').length === 0) {
            alert("Please select at least one item.");
            return;
        }

        // Initialize an array to store selected list_ids
        var selectedListIds = [];

        $('input[name="checkbox_value"]:checked').each(function() {
            // Get the list_id and data_item_type values for each checked checkbox
            var itemId = $(this).closest('.list-item').find('input#list_id').val();
            var data_item_type = $('#data_item_type').val();

            selectedListIds.push([itemId, data_item_type]);
        });
        console.log(selectedListIds);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "{{route('candidates.list.save.entry')}}",
            type: 'POST',
            data: {
                selectedListIds: selectedListIds,
            },
            success: function(response) {
                const title = response.status ? "success" : "warning";
                Swal.fire({
                    title: response.message,
                    type: title,
                    icon: title,
                }).then(function(result) {
                    if (result.isConfirmed && response.status) {
                        $('#exampleModal').modal('hide');
                        window.location.href =
                            "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            },
        });
    });
});

$(document).on('click', '#delete_activity', function() {

    var activity_id = $('#delete_activity').data('id');

    Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t to delete this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/candidates/activity/delete/' +
                activity_id;
        }
    });
    const title = response.status ? "success" : "warning";
    Swal.fire({
        title: response.message,
        type: title,
        icon: title,
    }).then(function(result) {
        if (result.isConfirmed && response.status) {
            $('#exampleModal').modal('hide');
            window.location.href =
                "{{ url('/candidates/details',$candidatesDetails[0]->id ) }}";
        }
    });
});
</script>
@endpush