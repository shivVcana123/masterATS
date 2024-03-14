@extends('layouts.admin')
@section('content')
<style>
.errors {
    color: red;
}


#viewEventTD {
    display: none;
    /* Hide initially */
}

#editEventTD {
    display: none;
    /* Hide initially */
}
</style>
<table style="border-collapse: collapse;">
    <tbody>
        <tr style="vertical-align: top;">
            <td style="padding: 0px;">
                <table style="width: 240px; border: none; vertical-align:top; border-collapse: collapse;" id="tableNav">
                    <tbody>
                        <tr style="vertical-align: top;">
                            <td id="upcomingEventsTD" style="padding: 0px; display: none;">
                                <div class="noteUnsizedSpan">My Upcoming Events / Calls</div>
                            </td>
                            <td id="addEventTD">
                                <p class="noteUnsized">Add Event</p>
                                <form name="addEventForm" id="addEventForm" method="post" autocomplete="off">
                                    <input type="hidden" name="postback" id="postbackA" value="postback">
                                    <table class="addTableMini" width="235">
                                        <tbody>
                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="titleLabel" for="title">Title:</label>
                                                </td>

                                                <td class="tdData">
                                                    <input type="text" class="inputbox" name="title" id="title"
                                                        style="width: 150px">
                                                </td>
                                            </tr>
                                            <span class="title_error errors"></span>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="eventTypeLabel" for="type">Type:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="eventType" name="eventType" class="inputbox"
                                                        style="width: 150px;">
                                                        <option disabled selected>(Select a Type)</option>
                                                        @foreach($calendarEvenType as $event)
                                                        <option value="{{$event->id}}">{{$event->short_description}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <br><span class="event_type_error errors"></span>
                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Public:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="checkBox" value="1" name="publicEntry"
                                                        id="publicEntry">Public
                                              <span class="send-mail-area"><input type="checkBox" value="1" name="send_mail" style="margin-left: 25px;"
                                                        id="sendMail">Send Mail</span>
                                                   
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Date:</label>
                                                </td>
                                                <td nowrap="nowrap" class="tdData">
                                                    <input type="hidden" name="dateAdd" value="01-17-24">
                                                    <table style="padding: 0px; border-spacing: 0px; margin: 0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select id="monthDropdown" name="month">
                                                                        @for ($month = 1; $month <= 12; $month++)
                                                                            <option value="{{ $month }}">
                                                                            {{ date('M', mktime(0, 0, 0, $month, 1)) }}
                                                                            </option>
                                                                            @endfor
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select name="date" id="dateDropdown"></select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <input class="calendarDateInput" type="text"
                                                                        id="year" size="2" title="Year">
                                                                </td>
                                                                <td>
                                                                    <div class="date-container">
                                                                        <input id="dateCalendar" type="date"
                                                                            style="padding: 0px; width: 20px;" />
                                                                    </div>


                                                                </td>
                                                                <td class="datepicker">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="timeLabel" for="time">Time:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="radio" name="allDay" id="allDay0" value="0" checked=""
                                                        onchange="hoursRadios1(this);">
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
                                                    <br>

                                                    <input type="radio" name="allDay" id="allDay1" value="1"
                                                        onchange="allDayRadios(this);">All Day / No Specific Time<br>
                                                    <!-- FIXME: Remove hide style. -->
                                                    <span style="display:none;">
                                                        <input type="checkBox" name="reminderToggle" id="reminderToggle"
                                                            onclick="considerCheckBox('reminderToggle', 'sendEmailTD');">Send
                                                        e-mail reminder
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr id="sendEmailTD" style="display:none;">
                                                <td class="tdVertical">
                                                    E-Mail:
                                                </td>
                                                <td class="tdData">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    To:
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="sendEmail" name="sendEmail"
                                                                        class="inputbox" style="width:115px;"
                                                                        value="talent@xyber-it.com">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Time:
                                                                </td>
                                                                <td>
                                                                    <select id="reminderTime" name="reminderTime"
                                                                        style="width:115px;">
                                                                        <option value="15">15 min early</option>
                                                                        <option value="30">30 min early</option>
                                                                        <option value="45">45 min early</option>
                                                                        <option value="60">1 hour early</option>
                                                                        <option value="120">2 hours early</option>
                                                                        <option value="1440">1 day early</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="durationLabel" for="duration">Length:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="length_hours" name="length_hours" class="inputbox"
                                                        style="width: 150px;" disabled="">
                                                        <option value="15 minutes">15 minutes</option>
                                                        <option value="30 minutes">30 minutes</option>
                                                        <option value="45 minutes">45 minutes</option>
                                                        <option value="1 hour" selected="selected">1 hour</option>
                                                        <option value="1.5 hours">1.5 hours</option>
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="More than 4 hours">More than 4 hours</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="descriptionLabel" for="description">Desc:</label>
                                                </td>
                                                <td class="tdData">
                                                    <textarea id="description" name="description"
                                                        style="width:150px; height:180px;"></textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div style="text-align: center;">
                                        <input type="button" class="button" name="submit" value="Add Event"
                                            onclick="addEvent()">
                                    </div>
                                </form>
                            </td>

                            <!-- view Event TD -->
                            <td id="viewEventTD">
                                <table width="235">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="noteUnsized">View Event</p>
                                                <span id="EventID" style="font-weight:bold" hidden></span><br>
                                                <span id="viewEventTitle" style="font-weight:bold">new</span><br>
                                                Entered By: <span id="viewEventOwner">Vishal Sud</span><br>
                                                Event Type: <span id="viewEventType"><img src="images/interview.gif">
                                                    Interview</span><br>
                                                <span id="viewEventLink"></span><br>
                                                <br>
                                                Date: <span id="viewEventDate">01-01-24</span><br>
                                                Time: <span id="viewEventTime">12:00 AM</span><br>
                                                Duration: <span id="viewEventDuration">1 Hour</span><br>
                                                Reminder: <span id="viewEventReminder"><i>(None Set)</i></span><br>
                                                <br>
                                                Description:<br>
                                                <span id="viewEventDescription">test</span><br>
                                                <br>
                                                <input type="button" class="button" name="Edit" value="Edit Event"
                                                    onclick="calendarEditEvent();">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>

                            <!-- edit Event TD -->
                            <td id="editEventTD">
                                <p class=" noteUnsized">Edit Event</p>
                                <form name="editEventForm" id="editEventForm" method="post" autocomplete="off">
                                    <input type="hidden" name="eventID" id="editEventID" value="">
                                    <table class="editTableMini" width="235">
                                        <tbody>
                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="titleLabel" for="title">Title:</label>
                                                </td>

                                                <td class="tdData">
                                                    <input type="text" class="inputbox" name="title" id="editTitle"
                                                        style="width: 150px">
                                                </td>
                                            </tr>
                                            <span class="edit_title_error errors"></span>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="eventTypeLabel" for="type">Type:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="editEventType" name="eventType" class="inputbox"
                                                        style="width: 150px;">
                                                        <option disabled selected>(Select a Type)</option>
                                                        @foreach($calendarEvenType as $event)
                                                        <option value="{{$event->id}}">{{$event->short_description}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <br><span class="edit_event_type_error errors"></span>
                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Public:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="checkBox" value="1" name="publicEntry"
                                                        id="editEventpublicEntry">Public
                                                        <!-- <span class="send-mail-area"><input type="checkBox" value="1" name="send_mail" style="margin-left: 25px;"
                                                        id="sendMail">Send Mail</span> -->
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Date:</label>
                                                </td>
                                                <td nowrap="nowrap" class="tdData">
                                                    <input type="hidden" name="dateAdd" value="01-17-24">
                                                    <table style="padding: 0px; border-spacing: 0px; margin: 0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select id="editEventmonthDropdown" name="month">
                                                                        @for ($month = 1; $month <= 12; $month++)
                                                                            <option value="{{ $month }}">
                                                                            {{ date('M', mktime(0, 0, 0, $month, 1)) }}
                                                                            </option>
                                                                            @endfor
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select id="editEventdateDropdown" name="date">
                                                                        @for ($date = 1; $date <= 31; $date++) <option
                                                                            value="{{ $date }}">
                                                                            {{ $date }}
                                                                            </option>
                                                                            @endfor
                                                                    </select>
                                                                </td>

                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <input class="calendarDateInput" type="text"
                                                                        id="editEventyear" size="2" title="Year">
                                                                </td>
                                                                <td>
                                                                    <div class="date-container">
                                                                        <input id="editDateCalendar" type="date"
                                                                            style="padding: 0px; width: 20px;" />
                                                                    </div>

                                                                </td>
                                                                <td class="datepicker">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="timeLabel" for="time">Time:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="radio" name="allDay" id="allDay0" value="0" checked=""
                                                        onchange="hoursRadios1(this);">
                                                    <select id="editEventhours" name="hours">
                                                        @for ($hour = 1; $hour <= 12; $hour ++) <option
                                                            value="{{ $hour  }}">
                                                            {{$hour}}
                                                            </option>
                                                            @endfor
                                                    </select>
                                                    <select id="editEventminutes" name="minutes">
                                                        <option value="00">00</option>
                                                        <option value="15">15</option>
                                                        <option value="30">30</option>
                                                        <option value="45">45</option>
                                                    </select>

                                                    <select id="editEventday_am_pm" name="day_am_pm">
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                    <br>

                                                    <input type="radio" name="allDay" id="editEventallDay1" value="1"
                                                        onchange="allDayRadios(this);">All Day / No Specific Time<br>
                                                    <!-- FIXME: Remove hide style. -->
                                                    <span style="display:none;">
                                                        <input type="checkBox" name="reminderToggle" id="reminderToggle"
                                                            onclick="considerCheckBox('reminderToggle', 'sendEmailTD');">Send
                                                        e-mail reminder
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr id="sendEmailTD" style="display:none;">
                                                <td class="tdVertical">
                                                    E-Mail:
                                                </td>
                                                <td class="tdData">
                                                    <table style="border-collapse: collapse;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    To:
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="sendEmail" name="sendEmail"
                                                                        class="inputbox" style="width:115px;"
                                                                        value="talent@xyber-it.com">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Time:
                                                                </td>
                                                                <td>
                                                                    <select id="editEventreminderTime"
                                                                        name="reminderTime" style="width:115px;">
                                                                        <option value="15">15 min early</option>
                                                                        <option value="30">30 min early</option>
                                                                        <option value="45">45 min early</option>
                                                                        <option value="60">1 hour early</option>
                                                                        <option value="120">2 hours early</option>
                                                                        <option value="1440">1 day early</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="durationLabel" for="duration">Length:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="editEventlength_hours" name="length_hours"
                                                        class="inputbox" style="width: 150px;">
                                                        <option value="15 minutes">15 minutes</option>
                                                        <option value="30 minutes">30 minutes</option>
                                                        <option value="45 minutes">45 minutes</option>
                                                        <option value="1 hour" selected="selected">1 hour</option>
                                                        <option value="1.5 hours">1.5 hours</option>
                                                        <option value="2 hours">2 hours</option>
                                                        <option value="3 hours">3 hours</option>
                                                        <option value="4 hours">4 hours</option>
                                                        <option value="More than 4 hours">More than 4 hours</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="descriptionLabel" for="description">Desc:</label>
                                                </td>
                                                <td class="tdData">
                                                    <textarea id="editEventdescription" name="description"
                                                        style="width:150px; height:180px;"></textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div style="text-align: center;">
                                        <input type="button" class="button" name="submit" value="Save"
                                            onclick="editEventDetails();">
                                        <input type="button" class="button" name="delete" value="Delete"
                                            onclick="deleteEventDetails();">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td style="padding-left: 0px;">
                <div id="calendar" style="border-collapse: collapse;"> </div>

            </td>
        </tr>
    </tbody>
</table>

@endsection
@push('scripts')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"
    integrity="sha512-liDnOrsa/NzR+4VyWQ3fBzsDBzal338A1VfUpQvAcdt+eL88ePCOd3n9VQpdA0Yxi4yglmLy/AmH+Lrzmn0eMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script>
$(document).ready(function() {
    $('.send-mail-area').hide();
    
    $('#dateCalendar').change(function() {
        var dateCalendar = $('#dateCalendar').val();
        var selectedDate = new Date(dateCalendar);
        updateDropdowns(selectedDate);
    });

    $('#editDateCalendar').change(function() {
        var editDateCalendar = $('#editDateCalendar').val();
        var selectedDate = new Date(editDateCalendar);
        editUpdateDropdowns(selectedDate);
    });

    $('#eventType').change(function(){
        $('.send-mail-area').show();
    });
});

function editUpdateDropdowns(date) {

    // Set month
    $('#editEventmonthDropdown').val(date.getMonth() + 1);

    // Set day
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    $('#editEventdateDropdown').empty();
    for (var day = 1; day <= lastDay; day++) {
        var selected = (day === date.getDate()) ? 'selected' : '';
        $('#editEventdateDropdown').append('<option value="' + day + '" ' + selected + '>' + day + '</option>');
    }

    // Set year
    $('#editEventyear').val(date.getFullYear().toString().substr(-2));
}


$('#length_hours').prop('disabled', false);

function hoursRadios1(element) {
    if ($(element).prop('checked') === true) {
        $('#all_day_radios').prop('checked', false);
        $('#hours').prop('disabled', false);
        $('#minutes').prop('disabled', false);
        $('#day_am_pm').prop('disabled', false);
        $('#length_hours').prop('disabled', false);
    }
}

function allDayRadios(element) {
    if ($(element).prop('checked') === true) {
        $('#hoursRadios1').prop('checked', false);
        $('#hours').prop('disabled', true);
        $('#minutes').prop('disabled', true);
        $('#day_am_pm').prop('disabled', true);
        $('#length_hours').prop('disabled', true);
    }
}

function addEvent() {
    var title = $('#title').val();
    var eventType = $('#eventType').val();
    var allDays = $('#allDay1').is(':checked') ? 1 : 0;
    var publicEntry = $('#publicEntry').is(':checked') ? 1 : 0;
    var sendMail = $('#sendMail').is(':checked') ? 1 : 0;
    var monthDropdown = $('#monthDropdown').val();
    var dateDropdown = $('#dateDropdown').val();
    var year = $('#year').val();
    var hours = $('#hours').val();
    var minutes = $('#minutes').val();
    var day_am_pm = $('#day_am_pm').val();
    var length_hours = $('#length_hours').val();
    var description = $('#description').val();
    let errors = [];
    $(".errors").html("");

    if (title === '') {
        errors.push(title);
        $('.title_error').html("title field can't be empty.");
    }

    if (eventType == null) {
        errors.push(eventType);
        $('.event_type_error').html("Please select at least 1 type.");
    }


    if (errors.length > 0) {
        return false;
    }
    const formData = new FormData();
    formData.append('title', title);
    formData.append('eventType', eventType);
    formData.append('publicEntry', publicEntry);
    formData.append('sendMail', sendMail);
    formData.append('monthDropdown', monthDropdown);
    formData.append('dateDropdown', dateDropdown);
    formData.append('year', year);
    formData.append('hours', hours);
    formData.append('minutes', minutes);
    formData.append('day_am_pm', day_am_pm);
    formData.append('length_hours', length_hours);
    formData.append('description', description);
    formData.append('allDays', allDays);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "{{route('add.schedule.event')}}", // Adjust the URL as needed
        type: 'POST',
        data: formData, // Use the FormData object instead of serialize()
        processData: false,
        contentType: false,
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.reload();
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
}



$(document).ready(function() {
    // Set the current date in the #monthDropdown
    var currentDate = new Date();
    $('#monthDropdown').val(currentDate.getMonth() + 1);
    updateDropdowns(currentDate);
});

$(document).on('change', '#monthDropdown', function() {
    var dateValue = $('#monthDropdown').val();
    var selectedDate = new Date(dateValue + currentDate); // Assuming the format is MM/YYYY
    updateDropdowns(selectedDate);
});

function updateDropdowns(date) {

    // Set month
    $('#monthDropdown').val(date.getMonth() + 1);

    // Set day
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    $('#dateDropdown').empty();
    for (var day = 1; day <= lastDay; day++) {
        var selected = (day === date.getDate()) ? 'selected' : '';
        $('#dateDropdown').append('<option value="' + day + '" ' + selected + '>' + day + '</option>');
    }

    // Set year
    $('#year').val(date.getFullYear().toString().substr(-2));
}


var editEventTD = document.getElementById("editEventTD");
$('#editEventTD').hide();
$(document).ready(function() {
    var myEvents = [];
    var eventId = '';

    function getEventIdForDate(date) {
        var matchingEvent = myEvents.find(function(event) {
            return event.start.getDate() === date.getDate() &&
                event.start.getMonth() === date.getMonth() &&
                event.start.getFullYear() === date.getFullYear();
        });

        return matchingEvent ? matchingEvent.id : null;
    }

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        // view:{
        //     agendaWeek:{
        //         columnFormat: "okk",
        //     }
        // },
        defaultDate: new Date(),
        navLinks: true,
        eventLimit: true,
        events: {
            url: "{{route('get.schedule.event')}}", 
            type: 'GET',
            success: function(response) {
                console.log(response.data);

                $.each(response.data, function(index, event) {
                    myEvents.push({
                        id: event.id,
                        title: `${event.calendar_event_type[0]?.short_description || ''} ${event.owner_user?.user_name || ''} ${event.title || ''}`,
                        start: new Date(event.date),
                        allDay: false,
                        // other properties...
                    });
                });

                // Now you can use myEvents to initialize FullCalendar
                $('#calendar').fullCalendar('removeEvents');
                $('#calendar').fullCalendar('addEventSource', myEvents);
                $('#calendar').fullCalendar('rerenderEvents');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        },

        eventRender: function(event, element) {
            element.find('.fc-title').prepend('<span class="event-id" hidden>' + event.id +
                '</span> ');
        },

        dayClick: function(data, jsEvent, view) {
            var currentDate = new Date();
            var selectedDate = data.toDate(); // Convert moment object to Date object

            // Check if the selected date is greater than or equal to the current date
            if (selectedDate >= currentDate || selectedDate.toDateString() === currentDate
                .toDateString()) {
                // Your logic for handling the click on the selected date
                var year = data.year();
                var month = data.month() + 1;
                var day = data.date();

                var eventId = getEventIdForDate(new Date(year, month - 1, day));

                var addEventTD = document.getElementById("addEventTD");
                var viewEventTD = document.getElementById("viewEventTD");

                if (eventId) {
                    $.ajax({
                        url:"{{ route('get.schedule.event') }}" + '/' + eventId,
                        type: 'GET',
                        success: function(response) {
                            var eventData = response.data[0];
                            if (eventData) {
                                updateView(eventData);
                                addEventTD.style.display = "none";
                                editEventTD.style.display = "none";
                                viewEventTD.style.display = "table-cell";
                            } else {
                                console.error("Event data not found for eventId: " +
                                    eventId);
                                handleNoEventData(addEventTD, viewEventTD);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error fetching event data: " + textStatus);
                            handleNoEventData(addEventTD, viewEventTD);
                        }
                    });
                } else {
                    handleNoEventData(addEventTD, viewEventTD);
                }

                // Update the dropdowns based on the selected date
                var selectedDate = new Date(year, month - 1, day);
                updateDropdowns(selectedDate);
            } else {
                console.log("You clicked on a past date. No action performed.");
            }
        },



    });
});

function handleNoEventData(addEventTD, viewEventTD) {
    // If eventId is not present, show addEventTD and hide viewEventTD
    addEventTD.style.display = "table-cell";
    viewEventTD.style.display = "none";
    editEventTD.style.display = "none";
}

function updateView(eventData) {
    var formattedDate = moment(eventData.date).format('DD-MM-Y');
    var formattedTime = moment(eventData.date).format('HH:mm A');
    $("#EventID").text(eventData.id);
    $("#viewEventTitle").text(eventData.title);
    $("#viewEventOwner").text(eventData.owner_user.user_name);
    $("#viewEventType").text(eventData.calendar_event_type[0].short_description);
    $("#viewEventDate").text(formattedDate); //formatDate('dd/mm/yy', new Date(eventData.date))
    $("#viewEventTime").text(formattedTime); // Verify if this is correct or needs modification
    $("#viewEventDuration").text(eventData.duration);
    $("#viewEventReminder").text(eventData.reminder_time);
    $("#viewEventDescription").text(eventData.description);

    // Update the dropdowns based on the selected date
    var selectedDate = new Date(eventData.date);
    updateDropdowns(selectedDate);
}

function updateDropdowns(date) {
    // Set month
    $('#monthDropdown').val(date.getMonth() + 1);

    // Set day
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
    $('#dateDropdown').empty();
    for (var day = 1; day <= lastDay; day++) {
        var selected = (day === date.getDate()) ? 'selected' : '';
        $('#dateDropdown').append('<option value="' + day + '" ' + selected + '>' + day + '</option>');
    }

    // Set year
    $('#year').val(date.getFullYear().toString().substr(-2));
}

function calendarEditEvent() {
    var eventId = document.getElementById("EventID").innerHTML;
    // alert(eventId);
    $.ajax({
        url:"{{ route('get.schedule.event') }}" + '/' + eventId,
        type: 'GET',
        success: function(response) {
            var editEventData = response.data[0];
            if (editEventData) {
                editEventView(editEventData);
                addEventTD.style.display = "none";
                viewEventTD.style.display = "none";
                editEventTD.style.display = "table-cell";
            } else {
                console.error("Event data not found for eventId: " +
                    eventId);
                handleNoEventData(addEventTD, viewEventTD);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching event data: " + textStatus);
            handleNoEventData(addEventTD, viewEventTD);
        }
    });
}

function editEventView(editEventData) {
    console.log(editEventData.public);
    document.getElementById("editEventID").value = editEventData.id
    document.getElementById("editTitle").value = editEventData.title
    document.getElementById("editEventType").value = editEventData.calendar_event_type_id

    // Assuming editEventData.date is a string in the format 'YYYY-MM-DD HH:mm:ss'
    var eventDate = new Date(editEventData.date);
    document.getElementById("editEventmonthDropdown").value = eventDate.getMonth() + 1;
    document.getElementById("editEventdateDropdown").value = eventDate.getDate();
    document.getElementById("editEventyear").value = eventDate.getFullYear().toString().slice(-2);
    // Set the value for AM/PM
    var hours = eventDate.getHours();
    var minutes = eventDate.getMinutes();
    var formattedMinutes = (minutes < 10 ? '00' : minutes);
    var amPmValue = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;
    document.getElementById("editEventhours").value = hours;
    document.getElementById("editEventminutes").value = formattedMinutes;


    document.getElementById("editEventday_am_pm").value = amPmValue;
    $("#editEventlength_hours").val(editEventData.duration);
    // $("#editEventpublicEntry").val(editEventData.public == 1 ? 'checked' : '');
    $("#editEventpublicEntry").prop('checked', editEventData.public == 1);

    // $("#viewEventReminder").text(editEventData.reminder_time);
    $("#editEventdescription").text(editEventData.description);
}


function editEventDetails() {
    var editEventID = $('#editEventID').val();
    var editTitle = $('#editTitle').val();
    var editEventType = $('#editEventType').val();
    var editEventpublicEntry = $('#editEventpublicEntry').is(':checked') ? 1 : 0;
    var editEventmonthDropdown = $('#editEventmonthDropdown').val();
    var editEventdateDropdown = $('#editEventdateDropdown').val();
    var editEventyear = $('#editEventyear').val();
    var editEventhours = $('#editEventhours').val();
    var editEventminutes = $('#editEventminutes').val();
    var editEventday_am_pm = $('#editEventday_am_pm').val();
    var editEventlength_hours = $('#editEventlength_hours').val();
    var editEventdescription = $('#editEventdescription').val();
    let errors = [];
    $(".errors").html("");

    if (editTitle === '') {
        errors.push(editTitle);
        $('.edit_title_error').html("title field can't be empty.");
    }

    // if (editEventType == null) {
    //     errors.push(editEventType);
    //     $('.edit_event_type_error').html("Please select at least 1 type.");
    // }


    if (errors.length > 0) {
        return false;
    }
    const formData = new FormData();
    formData.append('editEventID', editEventID);
    formData.append('title', editTitle);
    formData.append('eventType', editEventType);
    formData.append('publicEntry', editEventpublicEntry);
    formData.append('monthDropdown', editEventmonthDropdown);
    formData.append('dateDropdown', editEventdateDropdown);
    formData.append('year', editEventyear);
    formData.append('hours', editEventhours);
    formData.append('minutes', editEventminutes);
    formData.append('day_am_pm', editEventday_am_pm);
    formData.append('length_hours', editEventlength_hours);
    formData.append('description', editEventdescription);

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        url: "{{route('add.schedule.event')}}",
        type: 'POST',
        data: formData, // Use the FormData object instead of serialize()
        processData: false,
        contentType: false,
        success: function(response) {
            const title = response.status ? "success" : "warning";
            Swal.fire({
                title: response.message,
                type: title,
                icon: title,
            }).then(function(result) {
                if (result.isConfirmed && response.status) {
                    window.location.reload();
                    viewEventTD.style.display = "none";
                    editEventID.style.display = "none";
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        },
    });
}

function deleteEventDetails() {
    var editEventID = $('#editEventID').val();
    // alert(editEventID);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't to delete this record",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url:"{{ route('delete.schedule.event') }}" + '/' + editEventID,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        title: response.message,
                        type: "success",
                        icon: "success",
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            window.location.reload();

                        }
                    });
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log("error", thrownError);
                }
            });

        }
    });
}
</script>
@endpush