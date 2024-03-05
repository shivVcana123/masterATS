@extends('layouts.admin')
@section('content')
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #f2f2f2;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive py-5 pb-4 dropdown_2">
                    <div class="container-fluid">
                        <!--     Table start   -->
                        <h2>Resume Parser</h2>
                        <input id="address" type="text" onkeypress="handle(event)" placeholder="searching...">
                        <input id="search" type="button" value="search" onClick="search_func()">
                        <div class="buttn-area" style="margin-left: 84%;">
                            <!-- <a href="{{route('contacts.create')}}"> -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                Resume</button>
                            <!-- </a> -->

                        </div>

                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Education</th>
                                    <th>Skills</th>
                                    <th>Experience</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td colspan="12">No data found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method='post' enctype="multipart/form-data">
                    <input hidden type='text' name='company_id' id='company_id' value="1" class='form-control'>
                    <div class="modal-body">
                        Select file : <input type='file' name='document_file' id='document_file' class='form-control'
                            multiple><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id='submit_file'>Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @push('scripts')
    <script>
    function search_func() {
        address = document.getElementById("address").value;
        // alert(address);
        //write your specific code from here	
        $.ajax({
            url: '/resumes/'+address, // Adjust the URL as needed
            type: 'GET',
            // data: {address:address},
            contentType: false,
            processData: false,
            success: function(response) {
                const title = response.status ? "success" : "warning";
                Swal.fire({
                    title: response.message,
                    type: title,
                    icon: title,
                }).then(function(result) {
                    if (result.isConfirmed && response.status) {
                        window.location.href = "{{url('/resumes')}}";
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            },
        });
    }

    function handle(e) {
        address = document.getElementById("address").value;
        if (e.keyCode === 13) {
            //write your specific code from here
            $.ajax({
                url: '/resumes/'+address,
            type: 'GET',
            // data: {address:address},
            contentType: false,
            processData: false,
            success: function(response) {
                const title = response.status ? "success" : "warning";
                Swal.fire({
                    title: response.message,
                    type: title,
                    icon: title,
                }).then(function(result) {
                    if (result.isConfirmed && response.status) {
                        window.location.href = "{{url('/resumes')}}";
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            },
        });
        }
        return false;
    }

    // $(document).on('click', '#submit_file', function(e) {
    //     e.preventDefault();
    //     var company_id = $('#company_id').val();

    //     const formData = new FormData();
    //     const fileInput = $('#document_file')[0];

    //     let errors = [];
    //     $(".errors").html("");

    //     if (fileInput.files.length > 0) {
    //         const file = fileInput.files[0];
    //         formData.append('company_id', company_id);
    //         formData.append('document_file', file);
    //     } else {
    //         errors.push('document_file');
    //         $(".document_file_error").html('Please select a document file');
    //     }

    //     if (errors.length > 0) {
    //         return false;
    //     }


    //     $.ajaxSetup({
    //         headers: {
    //             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //         },
    //     });
    //     $.ajax({
    //         url: '/document/upload', // Adjust the URL as needed
    //         type: 'POST',
    //         data: formData,
    //         contentType: false,
    //         processData: false,
    //         success: function(response) {
    //             const title = response.status ? "success" : "warning";
    //             Swal.fire({
    //                 title: response.message,
    //                 type: title,
    //                 icon: title,
    //             }).then(function(result) {
    //                 if (result.isConfirmed && response.status) {
    //                     window.location.href = "{{url('/resumes.index')}}";
    //                 }
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error('Error:', error);
    //         },
    //     });
    // });
    $(document).on('click', '#submit_file', function(e) {
        e.preventDefault();
        var company_id = $('#company_id').val();

        const formData = new FormData();
        const fileInput = $('#document_file')[0];

        let errors = [];
        $(".errors").html("");

        if (fileInput.files.length > 0) {
            for (let i = 0; i < fileInput.files.length; i++) {
                const file = fileInput.files[i];
                formData.append('company_id', company_id);
                formData.append('document_file[]', file); // Use append() with '[]' to handle multiple files
            }
        } else {
            errors.push('document_file');
            $(".document_file_error").html('Please select at least one document file');
        }

        if (errors.length > 0) {
            return false;
        }

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: '/document/upload', // Adjust the URL as needed
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                const title = response.status ? "success" : "warning";
                Swal.fire({
                    title: response.message,
                    type: title,
                    icon: title,
                }).then(function(result) {
                    if (result.isConfirmed && response.status) {
                        window.location.href = "{{url('/resumes')}}";
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            },
        });
    });
    </script>
    @endpush