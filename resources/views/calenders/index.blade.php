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
                                                    <script type="text/javascript">
                                                    DateInput('dateAdd', true, 'MM-DD-YY', '01-22-24', -1);
                                                    </script><input type="hidden" name="dateAdd" value="01-17-24">
                                                    <table style="padding: 0px; border-spacing: 0px; margin: 0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select class="calendarDateInput"
                                                                        id="dateAdd_Month_ID"
                                                                        onchange="dateAdd_Object.changeMonth(this);">
                                                                        <option value="0" selected="selected">Jan
                                                                        </option>
                                                                        <option value="1">Feb</option>
                                                                        <option value="2">Mar</option>
                                                                        <option value="3">Apr</option>
                                                                        <option value="4">May</option>
                                                                        <option value="5">Jun</option>
                                                                        <option value="6">Jul</option>
                                                                        <option value="7">Aug</option>
                                                                        <option value="8">Sep</option>
                                                                        <option value="9">Oct</option>
                                                                        <option value="10">Nov</option>
                                                                        <option value="11">Dec</option>
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select class="calendarDateInput"
                                                                        id="dateAdd_Day_ID"
                                                                        onchange="dateAdd_Object.changeDay(this);">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                        <option value="19">19</option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22" selected="selected">22
                                                                        </option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                        <option value="31">31</option>
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <input class="calendarDateInput" type="text"
                                                                        id="dateAdd_Year_ID" size="2" maxlength="2"
                                                                        title="Year" value="24"
                                                                        onkeypress="return YearDigitsOnly(event);"
                                                                        onkeyup="dateAdd_Object.checkYear(this);"
                                                                        onblur="dateAdd_Object.fixYear(this);">
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
                                                        onchange="setAddAllDayEnabled();">
                                                    <select id="hour" name="hour" class="inputbox" style="width: 40px;"
                                                        disabled="">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>&nbsp;
                                                    <select id="minute" name="minute" class="inputbox"
                                                        style="width: 40px;" disabled="">
                                                        <option value="00">
                                                            00 </option>
                                                        <option value="15">
                                                            15 </option>
                                                        <option value="30">
                                                            30 </option>
                                                        <option value="45">
                                                            45 </option>
                                                    </select>&nbsp;
                                                    <select id="meridiem" name="meridiem" class="inputbox"
                                                        style="width: 45px;" disabled="">
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                    <br>

                                                    <input type="radio" name="allDay" id="allDay1" value="1"
                                                        onchange="setAddAllDayEnabled();">All Day / No Specific Time<br>
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
                                        <input type="submit" class="button" name="submit" value="Add Event">
                                    </div>
                                </form>
                            </td>
                            <td style="display:none" id="editEventTD">
                                <p class="noteUnsized">Edit Event</p>
                                <form name="editEventForm" id="editEventForm"
                                    action="index.php?m=calendar&amp;view=MONTHVIEW&amp;month=1&amp;year=2024&amp;week=-1&amp;day=-1&amp;a=editEvent"
                                    method="post" onsubmit="return checkEditForm(document.editEventForm);"
                                    autocomplete="off">
                                    <input type="hidden" name="postback" id="postbackB" value="postback">
                                    <input type="hidden" name="eventID" id="eventIDEdit">
                                    <input type="hidden" name="dataItemType" id="dataItemTypeEdit">
                                    <input type="hidden" name="dataItemID" id="dataItemIDEdit">
                                    <input type="hidden" name="jobOrderID" id="jobOrderIDEdit">

                                    <table class="editTableMini" width="235">
                                        <tbody>
                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="titleLabelEdit" for="title">Title:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="text" class="inputbox" name="title" id="titleEdit"
                                                        style="width: 150px">&nbsp;*
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="eventTypeLabelEdit" for="type">Type:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="typeEdit" name="type" class="inputbox"
                                                        style="width: 150px;">
                                                        <option value="">(Select a Type)</option>
                                                        <option value="100">Call</option>
                                                        <option value="200">Email</option>
                                                        <option value="300">Meeting</option>
                                                        <option value="400">Interview</option>
                                                        <option value="500">Personal</option>
                                                        <option value="600">Other</option>
                                                    </select>&nbsp;*
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Public:</label>
                                                </td>
                                                <td class="tdData">
                                                    <input type="checkBox" name="publicEntry"
                                                        id="publicEntryEdit">Public Entry
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="tdVertical">
                                                    <label id="dateLabel" for="date">Date:</label>
                                                </td>
                                                <td nowrap="nowrap" class="tdData">
                                                    <script type="text/javascript">
                                                    DateInput('dateEdit', true, 'MM-DD-YY', '01-22-24', -1);
                                                    </script><input type="hidden" name="dateEdit" value="01-22-24">
                                                    <table style="padding: 0px; border-spacing: 0px; margin: 0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select class="calendarDateInput"
                                                                        id="dateEdit_Month_ID"
                                                                        onchange="dateEdit_Object.changeMonth(this);">
                                                                        <option value="0" selected="selected">Jan
                                                                        </option>
                                                                        <option value="1">Feb</option>
                                                                        <option value="2">Mar</option>
                                                                        <option value="3">Apr</option>
                                                                        <option value="4">May</option>
                                                                        <option value="5">Jun</option>
                                                                        <option value="6">Jul</option>
                                                                        <option value="7">Aug</option>
                                                                        <option value="8">Sep</option>
                                                                        <option value="9">Oct</option>
                                                                        <option value="10">Nov</option>
                                                                        <option value="11">Dec</option>
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <select class="calendarDateInput"
                                                                        id="dateEdit_Day_ID"
                                                                        onchange="dateEdit_Object.changeDay(this);">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                        <option value="11">11</option>
                                                                        <option value="12">12</option>
                                                                        <option value="13">13</option>
                                                                        <option value="14">14</option>
                                                                        <option value="15">15</option>
                                                                        <option value="16">16</option>
                                                                        <option value="17">17</option>
                                                                        <option value="18">18</option>
                                                                        <option value="19">19</option>
                                                                        <option value="20">20</option>
                                                                        <option value="21">21</option>
                                                                        <option value="22" selected="selected">22
                                                                        </option>
                                                                        <option value="23">23</option>
                                                                        <option value="24">24</option>
                                                                        <option value="25">25</option>
                                                                        <option value="26">26</option>
                                                                        <option value="27">27</option>
                                                                        <option value="28">28</option>
                                                                        <option value="29">29</option>
                                                                        <option value="30">30</option>
                                                                        <option value="31">31</option>
                                                                    </select>
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;">
                                                                    <input class="calendarDateInput" type="text"
                                                                        id="dateEdit_Year_ID" size="2" maxlength="2"
                                                                        title="Year" value="24"
                                                                        onkeypress="return YearDigitsOnly(event);"
                                                                        onkeyup="dateEdit_Object.checkYear(this);"
                                                                        onblur="dateEdit_Object.fixYear(this);">
                                                                </td>
                                                                <td style="padding: 0px 3px 0px 0px; margin: 0px;"><a
                                                                        id="dateEdit_ID_Link"
                                                                        href="javascript:dateEdit_Object.show();"
                                                                        onmouseover="return dateEdit_Object.iconHover(true);"
                                                                        onmouseout="return dateEdit_Object.iconHover(false);"><img
                                                                            src="images/calendar.gif"
                                                                            style="vertical-align: middle; border: none;"
                                                                            title="Calendar"></a>&nbsp;
                                                                    <span id="dateEdit_ID"
                                                                        style="position: absolute; visibility: hidden; width: 126px; background-color: white; border: 1px solid dimgray;"
                                                                        onmouseover="dateEdit_Object.handleTimer(true);"
                                                                        onmouseout="dateEdit_Object.handleTimer(false);">
                                                                        <table width="126" cellspacing="0"
                                                                            cellpadding="1">
                                                                            <tbody>
                                                                                <tr
                                                                                    style="background-color:buttonface;">
                                                                                    <td id="dateEdit_Previous_ID"
                                                                                        style="cursor: default;"
                                                                                        align="center"
                                                                                        class="calendarDateInput"
                                                                                        onclick="dateEdit_Object.previous.go();"
                                                                                        onmousedown="VirtualButton(this, true);"
                                                                                        onmouseup="VirtualButton(this, false);"
                                                                                        onmouseover="return dateEdit_Object.previous.hover(this, true)"
                                                                                        onmouseout="return dateEdit_Object.previous.hover(this, false);"
                                                                                        title="December"><img
                                                                                            src="images/prev.gif"></td>
                                                                                    <td id="dateEdit_Current_ID"
                                                                                        style="cursor: pointer;"
                                                                                        align="center"
                                                                                        class="calendarDateInput"
                                                                                        colspan="5"
                                                                                        onclick="dateEdit_Object.displayed.goCurrent();"
                                                                                        onmouseover="self.status='Click to view January 2024'; return true;"
                                                                                        onmouseout="self.status = ''; return true;"
                                                                                        title="Show Current Month">
                                                                                        January 2024</td>
                                                                                    <td id="dateEdit_Next_ID"
                                                                                        style="cursor: default;"
                                                                                        align="center"
                                                                                        class="calendarDateInput"
                                                                                        onclick="dateEdit_Object.next.go();"
                                                                                        onmousedown="VirtualButton(this, true);"
                                                                                        onmouseup="VirtualButton(this, false);"
                                                                                        onmouseover="return dateEdit_Object.next.hover(this, true);"
                                                                                        onmouseout="return dateEdit_Object.next.hover(this, false);"
                                                                                        title="February"><img
                                                                                            src="images/next.gif"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        S</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        M</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        T</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        W</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        T</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        F</td>
                                                                                    <td width="18" align="center"
                                                                                        class="calendarDateInput"
                                                                                        style="height:16; width:18; font-weight: bold; border-top: 1px solid dimgray; border-bottom: 1px solid dimgray;">
                                                                                        S</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <span id="dateEdit_DayTable_ID">
                                                                            <table cellspacing="0" cellpadding="0"
                                                                                style="cursor:default">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="calendarDateInput"
                                                                                            style="height:16">&nbsp;
                                                                                        </td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(1)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',1)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            1</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(2)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',2)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            2</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(3)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',3)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            3</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(4)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',4)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            4</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(5)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',5)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            5</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(6)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',6)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            6</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(7)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',7)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            7</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(8)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',8)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            8</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(9)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',9)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            9</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(10)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',10)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            10</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(11)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',11)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            11</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(12)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',12)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            12</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(13)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',13)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            13</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(14)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',14)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            14</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(15)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',15)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            15</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(16)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',16)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            16</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(17)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',17)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            17</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(18)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',18)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            18</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(19)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',19)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            19</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(20)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',20)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            20</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(21)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',21)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            21</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:white;font-weight:bold;border:1px solid darkred;padding:0px;;background-color:lightgrey"
                                                                                            onclick="dateEdit_Object.pickDay(22)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'lightgrey',22)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'lightgrey')">
                                                                                            22</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(23)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',23)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            23</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(24)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',24)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            24</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(25)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',25)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            25</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(26)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',26)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            26</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(27)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',27)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            27</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(28)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',28)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            28</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(29)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',29)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            29</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(30)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',30)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            30</td>
                                                                                        <td align="center"
                                                                                            class="calendarDateInput"
                                                                                            style="cursor:default;height:16;width:18;color:black;;background-color:white"
                                                                                            onclick="dateEdit_Object.pickDay(31)"
                                                                                            onmouseover="return dateEdit_Object.displayed.dayHover(this,true,'white',31)"
                                                                                            onmouseout="return dateEdit_Object.displayed.dayHover(this,false,'white')">
                                                                                            31</td>
                                                                                        <td class="calendarDateInput"
                                                                                            style="height:16">&nbsp;
                                                                                        </td>
                                                                                        <td class="calendarDateInput"
                                                                                            style="height:16">&nbsp;
                                                                                        </td>
                                                                                        <td class="calendarDateInput"
                                                                                            style="height:16">&nbsp;
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </span>
                                                                    </span>
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
                                                    <input type="radio" name="allDay" id="allDayEdit0" value="0"
                                                        checked="" onchange="setEditAllDayEnabled();">
                                                    <select id="hourEdit" name="hour" class="inputbox"
                                                        style="width: 40px;">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>
                                                        <option value="8">08</option>
                                                        <option value="9">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>&nbsp;
                                                    <select id="minuteEdit" name="minute" class="inputbox"
                                                        style="width: 40px;">
                                                        <option value="00">
                                                            00 </option>
                                                        <option value="15">
                                                            15 </option>
                                                        <option value="30">
                                                            30 </option>
                                                        <option value="45">
                                                            45 </option>
                                                    </select>&nbsp;
                                                    <select id="meridiemEdit" name="meridiem" class="inputbox"
                                                        style="width: 45px;">
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                    <br>

                                                    <input type="radio" name="allDay" id="allDayEdit1" value="1"
                                                        onchange="setEditAllDayEnabled();">All Day / No Specific
                                                    Time<br>
                                                    <!-- FIXME: Remove hide style. -->
                                                    <span style="display:none;">
                                                        <input type="checkBox" name="reminderToggle"
                                                            id="reminderToggleEdit"
                                                            onclick="considerCheckBox('reminderToggleEdit', 'sendEmailTDEdit');">Send
                                                        e-mail reminder
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr id="sendEmailTDEdit" style="display: none;">
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
                                                                    <input type="text" id="sendEmailEdit"
                                                                        name="sendEmail" class="inputbox"
                                                                        style="width:115px;"
                                                                        value="talent@xyber-it.com">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Time:
                                                                </td>
                                                                <td>
                                                                    <select id="reminderTimeEdit" name="reminderTime"
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
                                                    <label id="durationLabel" for="durationEdit">Length:</label>
                                                </td>
                                                <td class="tdData">
                                                    <select id="durationEdit" name="duration" class="inputbox"
                                                        style="width: 150px;">
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
                                                    <label id="descriptionLabel" for="descriptionEdit">Desc:</label>
                                                </td>
                                                <td class="tdData">
                                                    <textarea id="descriptionEdit" name="description"
                                                        style="width: 150px; height: 180px;"></textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <div style="text-align: center;">
                                        <input type="submit" class="button" name="submit" value="Save">
                                        <input type="button" class="button" name="delete" value="Delete"
                                            onclick="confirmDeleteEntry();">
                                    </div>
                                </form>
                            </td>
                            <td style="display:none" id="viewEventTD">
                                <table width="235">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <p class="noteUnsized">View Event</p>
                                                <span id="viewEventTitle" style="font-weight:bold"></span><br>
                                                Entered By: <span id="viewEventOwner"></span><br>
                                                Event Type: <span id="viewEventType"></span><br>
                                                <span id="viewEventLink"></span><br>
                                                <br>
                                                Date: <span id="viewEventDate"></span><br>
                                                Time: <span id="viewEventTime"></span><br>
                                                Duration: <span id="viewEventDuration"></span><br>
                                                Reminder: <span id="viewEventReminder"></span><br>
                                                <br>
                                                Description:<br>
                                                <span id="viewEventDescription"></span><br>
                                                <br>
                                                <input type="button" class="button" name="Edit" value="Edit Event"
                                                    onclick="calendarEditEvent(currentViewedEntry);">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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