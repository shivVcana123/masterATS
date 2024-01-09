@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h4> Item History (Administrator View)</h4>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" style="margin-right: 5px;"
                href="{{ url('/contacts/edit',$companyHistory[0]->id) }}"> Edit</a>
        </div>
    </div>
</div>

<table class="detailsOutside">
    <tbody>
        <tr style="vertical-align:top;">
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">companyID:</td>
                            <td class="data">
                                <span class="bold">
                                    <span class="jobTitleCold">
                                        {{$companyHistory[0]->id}}
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">name:</td>
                            <td class="data">
                                <a href="index.php?m=companies&amp;a=show&amp;companyID=14">
                                    <span class="jobTitleCold">
                                        {{$companyHistory[0]->company_name}} </span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">address:</td>
                            <td class="data"> {{$companyHistory[0]->address}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">state:</td>
                            <td class="data"> {{$companyHistory[0]->state}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">phone1:</td>
                            <td class="data"> {{$companyHistory[0]->primary_phone}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">faxNumber:</td>
                            <td class="data"> {{$companyHistory[0]->fax_number}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> keyTechnologies:</td>
                            <td class="data"> {{$companyHistory[0]->key_technologies}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">defaultCompany:</td>
                            <td class="data"> {{$companyHistory[0]->default_company}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> billingContactFullName:</td>
                            <td class="data"> {{$companyHistory[0]->billing_contact}}</td>
                        </tr>
                        <tr>
                            <td class="vertical">enteredByFullName:</td>
                            <td class="data"> {{$companyHistory[0]->entered_by}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> owner_email:</td>
                            <td class="data"> {{$companyHistory[0]->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td width="50%" height="100%">
                <table class="detailsInside" height="100%">
                    <tbody>
                        <tr>
                            <td class="vertical">billingContact:</td>
                            <td class="data">
                                {{$companyHistory[0]->billing_contact}}
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">dateCreated:</td>
                            <td class="data">
                                <a href="javascript"> {{$companyHistory[0]->created_at}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical">ownerFullName:</td>
                            <td class="data">
                                <a href="javascript:;"> {{$companyHistory[0]->owner}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="vertical"> owner:</td>
                            <td class="data"> {{$companyHistory[0]->owner}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> isHot</td>
                            <td class="data">{{$companyHistory[0]->is_hot}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> city:</td>
                            <td class="data"> {{$companyHistory[0]->city}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> zip:</td>
                            <td class="data"> {{$companyHistory[0]->zip}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> phone2:</td>
                            <td class="data"> {{$companyHistory[0]->secondary_phone}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> url:</td>
                            <td class="data"> {{$companyHistory[0]->web_url}}</td>
                        </tr>
                        <tr>
                            <td class="vertical"> notes:</td>
                            <td class="data"> {{$companyHistory[0]->notes}}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>


@endsection