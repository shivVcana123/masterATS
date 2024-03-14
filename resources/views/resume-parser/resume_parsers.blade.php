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
<meta name="csrf-token" content="{{ csrf_token() }}">
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

                        <input type='file' name='document' id='document' class='form-control'
                            onchange="parseWordDocxFile(this)">
                        <div id="result1"></div>
                        <br>
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <!-- <th>Full Name</th>
                                    <th>Education</th>
                                    <th>Skills</th>
                                    <th>Experience</th> -->
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($extractedData as $key => $data)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ $data['name'] }}</td>
                                    <td>{{ $data['email'] }}</td>
                                    <td>{{ $data['phone'] }}</td>
                                    <td><a href="javascript:;" onclick="parseWordDocxFileView({{ $data['id'] }})"><i
                                                class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <td colspan="12">No data found</td>
                                </tr> -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.7.0/mammoth.browser.min.js"
        integrity="sha512-5rhrET8+DEW1LEetnFJMD+dien4m45v5wKGqpBTlHhaPKiahcwlcbRvMNniFwMdHMAZVExgZRNU6dPSJiL455w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.7.0/mammoth.browser.js"
        integrity="sha512-cEHmdLshJ9UBXpN6O1nR3Lfk8/BsWBimS1/q5LUpNumC8ZbMRQ8S3RBXOt0FyUeoe/4U7l2KlKUuFh3LG91ENw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    function parseWordDocxFileView(id) {
    $.ajax({
        url: "{{route('view.document')}}"+'/'+id,
        type: 'GET',
        success: function(response) {
            console.log('Response:', response); // Debugging
            // Assuming success response returns the file
            // You can handle the file display or download here
        },
        error: function(xhr, status, error) {
            console.error('XHR:', xhr); // Debugging
            console.error('Error Status:', status); // Debugging
            console.error('Error:', error);
        },
    });
}






    function parseWordDocxFile(inputElement) {
        var files = inputElement.files || [];
        if (!files.length) return;
        var file = files[0];

        console.time();
        var reader = new FileReader();
        reader.onloadend = function(event) {

            var arrayBuffer = reader.result;

            mammoth.convertToHtml({
                arrayBuffer: arrayBuffer
            }).then(function(resultObject) {
                document.getElementById('result1').innerHTML = resultObject.value;
                console.log(resultObject.value);
            });
            console.timeEnd();
        };
        reader.readAsArrayBuffer(file);
    }


    function search_func() {
        address = document.getElementById("address").value;
        // alert(address);
        //write your specific code from here	
        $.ajax({
            url: "{{route('resumes')}}"+'/'+address,
            type: 'GET',
            // data: {address:address},
            contentType: false,
            processData: false,
            success: function(response) {
                const title = response.status ? "success" : "warning";
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
                url: "{{route('resumes')}}"+'/'+address,
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
                            window.location.href = "{{route('resumes')}}";
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
                formData.append('document_file[]',
                    file); // Use append() with '[]' to handle multiple files
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
            url: "{{route('document.upload')}}", 
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
                        window.location.href = "{{route('resumes')}}";
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