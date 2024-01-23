@extends('layouts.admin')
@section('content')

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
                            <td id="addEventTD" style="">
                                <p class="noteUnsized">Add Event</p>
                                <form name="addEventForm" id="addEventForm"
                                    action="index.php?m=calendar&amp;view=MONTHVIEW&amp;month=1&amp;year=2024&amp;week=-1&amp;day=-1&amp;a=addEvent"
                                    method="post" onsubmit="return checkAddForm(document.addEventForm);"
                                    autocomplete="off">
                                    <input type="hidden" name="postback" id="postbackA" value="postback">

                                    <table class="editTableMini" width="235">
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

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="eventTypeLabel" for="type">Type:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="type" name="type" class="inputbox"
                                                        style="width: 150px;">
                                                        <option disabled selected>(Select a Type)</option>
                                                        @foreach($calendarEvenType as $event)
                                                        <option value="{{$event->id}}">{{$event->short_description}}
                                                        </option>
                                                        @endforeach
                                                    </select>&nbsp;*
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Public:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="checkBox" name="publicEntry" id="publicEntry">Public
                                                    Entry
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
                                                                        <input id="date-calendar" type="date" hidden />
                                                                        <i class="date-icon fa fa-calendar"
                                                                            aria-hidden="true"></i>
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
                                                    <select id="duration" name="duration" class="inputbox"
                                                        style="width: 150px;" disabled="">
                                                        <option value="15">15 minutes</option>
                                                        <option value="30">30 minutes</option>
                                                        <option value="45">45 minutes</option>
                                                        <option value="60" selected="selected">1 hour</option>
                                                        <option value="90">1.5 hours</option>
                                                        <option value="120">2 hours</option>
                                                        <option value="180">3 hours</option>
                                                        <option value="240">4 hours</option>
                                                        <option value="300">More than 4 hours</option>
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
                                        <input type="button" class="button" name="submit" value="Add Event">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"
    integrity="sha512-iusSCweltSRVrjOz+4nxOL9OXh2UA0m8KdjsX8/KUUiJz+TCNzalwE0WE6dYTfHDkXuGuHq3W9YIhDLN7UNB0w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {
    $('.date-icon').click(function() {
        $('#date-calendar').toggle();
    });
});

function hoursRadios1(element) {
    if ($(element).prop('checked') === true) {
        $('#all_day_radios').prop('checked', false);
        $('#hours').prop('disabled', false);
        $('#minutes').prop('disabled', false);
        $('#day_am_pm').prop('disabled', false);
        // $('#length_hours').prop('disabled', false);
    }
}

function allDayRadios(element) {
    if ($(element).prop('checked') === true) {
        $('#hoursRadios1').prop('checked', false);
        $('#hours').prop('disabled', true);
        $('#minutes').prop('disabled', true);
        $('#day_am_pm').prop('disabled', true);
        // $('#length_hours').prop('disabled', true);
    }
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


$('#calendar').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: new Date(),
    navLinks: true,
    editable: true,
    eventLimit: true,
    dayClick: function(data, jsEvent, view) {
        var year = data.year();
        var month = data.month() + 1;
        var day = data.date();

        // console.log(month,day,year);
        // Update the dropdowns based on the selected date
        var selectedDate = new Date(year, month - 1, day);
        updateDropdowns(selectedDate);
    },
    events: [{
            title: 'All Day Event',
            start: '2018-11-01'
        },
        {
            title: 'Long Event',
            start: '2018-11-07',
            end: '2018-11-10'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2018-11-09T16:00:00'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2018-11-16T16:00:00'
        },
        {
            title: 'Conference',
            start: '2018-11-11',
            end: '2018-11-13'
        },
        {
            title: 'Meeting',
            start: '2018-11-12T10:30:00',
            end: '2018-11-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2018-11-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2018-11-12T14:30:00'
        },
        {
            title: 'Happy Hour',
            start: '2018-11-12T17:30:00'
        },
        {
            title: 'Dinner',
            start: '2018-11-12T20:00:00'
        },
        {
            title: 'Birthday Party',
            start: '2018-11-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'https://google.com/',
            start: '2018-11-28'
        }
    ]
});
</script>
@endpush