@extends('layouts.admin')
@section('content')
  <!-- Candidates: Log Activity -->
  <!-- Modal -->
  <div class="modal fade" id="activityModal" tabindex="-1" role="dialog" aria-labelledby="activityModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="width: 149%; margin-left: -90px;">
              <div class="modal-header">
                  <h5 class="modal-title" id="activityModalLabel">Candidates: Log Activity</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <fieldset class="form-group">
                      <div class="container">
                          <div class="activity-area">
                              <label for="">Regarding:</label>
                              <select id="joborder_item" name="joborder_item" style="margin-left: 23px;">
                                  <option selected disabled="disabled">General</option>
                                  @foreach($candidatesJobOrderDetails as $key => $details)
                                  <option value="{{$details['joborderDetails']->id}}"
                                      {{ old('candidatesJobOrderDetails') == $key ? 'selected' : ''}}>
                                      {{$details['joborderDetails']->title}}</option>
                                  @endforeach


                              </select>
                              <input class="form-check-input" type="checkbox" id="checkbox_mail_send_item"
                                  name="checkbox_mail_send_item" style="margin-left: 30px;">
                              <label class="form-check-label" for="checkbox_mail_send_item">
                                  Send E-Mail Notification to Candidate
                              </label>
                              <br><br>
                              <div class="form-group row">
                                  <div class="col-sm-2">Status:</div>
                                  <div class="col-sm-10">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="checkbox_status_change">
                                          <label class="form-check-label" for="checkbox_status_change">
                                              Change Status
                                          </label>
                                          <br>
                                          <!-- <label for="">Regarding:</label> -->
                                          <select id="change_status_item" name="change_status_item" class="inputbox"
                                              style="width: 150px;">
                                              <option selected disabled>Select a Status</option>
                                              @foreach($changeStatus as $details)
                                              <option value="{{$details->id}}">{{$details->description}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col-sm-2">Activity:</div>
                                  <div class="col-sm-10">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="checkbox_activity">
                                          <label class="form-check-label" for="checkbox_activity">
                                              Log an Activity
                                          </label>
                                          <br>
                                          <label for="select_checkbox_activity">Activity Type:</label>
                                          <br>
                                          <select id="select_checkbox_activity" name="select_checkbox_activity">
                                              <option selected disabled>Select Activity Type</option>
                                              @foreach($activityType as $details)
                                              <option value="{{$details->id}}">{{$details->short_description}}
                                              </option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>


                              <div class="form-group row">
                                  <div class="col-sm-10" style="margin-left: 115px;">
                                      <label for="activity_type_description">Activity Type:</label>
                                      <br>
                                      <textarea name="activity_type_description" id="activity_type_description"
                                          cols="30"></textarea>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <div class="col-sm-2">Schedule:</div>
                              <div class="col-sm-10">
                                  <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="checkbox_schedule">
                                      <label class="form-check-label" for="checkbox_schedule">
                                          Schedule Event
                                      </label>
                                      <br>
                                      <!-- <label for="">Regarding:</label> -->
                                      <select id="schedule_event_type" name="schedule_event_type">
                                          <option selected disabled>Select Event Type</option>
                                          @foreach($calendarEvenType as $details)
                                          <option value="{{$details->id}}">{{$details->short_description}}</option>
                                          @endforeach
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

                                                  <select name="date" id="dateDropdown"></select>

                                                  <input type="text" name="year" id="year" style="width: 15%;"
                                                      value="{{ substr(date('Y'), -2) }}" id="year">

                                                  <input type="date" name="calander_date" id="calander_date"
                                                      style="margin-left: 10px; padding: 0px; width: 6%;">
                                              </div>
                                          </div>
                                          <div class="title-area">
                                              <label for="title">Title</label>
                                              <input type="text" id="title" name="title">
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
                                                                  name="hoursRadios" id="hoursRadios1" value="" checked>
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
                                          <div class="length-area"
                                              style="margin-left: 190px; display: grid; align-items: center; align-content: center;">
                                              <label for="">Length:</label>
                                              <select id="length_hours" name="length_hours"
                                                  style="width: 173px;  padding: 3px;">
                                                  <option value="15">15 minuts</option>
                                                  <option value="30">30 minuts</option>
                                                  <option value="45">45 minuts</option>
                                                  <option value="1">1 hours</option>
                                                  <option value="1.5">1.5 hours</option>
                                                  <option value="2">2 hours</option>
                                                  <option value="3">3 hours</option>
                                                  <option value="4">4 hours</option>
                                                  <option value="more">More then 4 hours</option>

                                              </select>
                                          </div>
                                      </div>

                                      <!-- <br> -->
                                      <div class="time-area" style="display: flex; flex-direction: row;">
                                          <div class="form-group">
                                              <fieldset class="form-group">
                                                  <div class="row">
                                                      <div class="col-sm-10">
                                                          <div class="form-check">
                                                              <input class="form-check-input" type="radio"
                                                                  name="all_day_radios" id="all_day_radios" value=""
                                                                  checked>
                                                              <div class="input-group">
                                                                  All Day / No Specific Time
                                                              </div>
                                                          </div>
                                                          <input type="checkbox" name="public_entry" id="public_entry">
                                                          Public Entry
                                                      </div>
                                                  </div>
                                              </fieldset>
                                          </div>
                                          <div class="length-area"
                                              style="margin-left: 205px; display: grid; align-items: center; align-content: center;">
                                              <label for="">Description:</label>
                                              <textarea name="length_description" id="length_description"
                                                  cols="30"></textarea>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </fieldset>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="save_activity_btn">Save changes</button>
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
                  $details['candidatesJobOrderDetails'] != null
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
  
  @push('scripts')
  <script>
    alert('okkkk');
$(document).on('click', '#schedule_event, #schedule_event td', function() {
    if ($(this).attr('value') == 'Schedule Event') {
        $('.activity-area').hide();
    }
    $('#activityModal').modal('show');
});

$(document).on('click', '#Activity, #Activity td', function() {
    if ($(this).attr('value') == 'Activity') {
        $('.activity-area').show();
    }
    $('#activityModal').modal('show');
});
$(document).on('click', '#save_activity_btn', function() {
    var joborder_item = $('#joborder_item').val();
    var change_status_item = $('#change_status_item').val();
    var select_checkbox_activity = $('#select_checkbox_activity').val();
    var activity_type_description = $('#activity_type_description').val();
    var schedule_event_type = $('#schedule_event_type').val();
    var monthDropdown = $('#monthDropdown').val();
    var dateDropdown = $('#dateDropdown').val();
    var year = $('#year').val();
    var title = $('#title').val();
    var hours = $('#hours').val();
    var minutes = $('#minutes').val();
    var day_am_pm = $('#day_am_pm').val();
    var length_hours = $('#length_hours').val();
    var length_description = $('#length_description').val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: '/candidates/activity/save',
        type: 'POST',
        data: {
            joborder_item: joborder_item,
            change_status_item: change_status_item,
            select_checkbox_activity: select_checkbox_activity,
            activity_type_description: activity_type_description,
            schedule_event_type: schedule_event_type,
            monthDropdown: monthDropdown,
            dateDropdown: dateDropdown,
            year: year,
            title: title,
            hours: hours,
            minutes: minutes,
            day_am_pm: day_am_pm,
            length_hours: length_hours,
            length_description: length_description,
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
                        "{{ url('/candidates/details',$candidatesJobOrderDetails[0]['candidates']->id ) }}";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
});
  </script>