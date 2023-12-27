@extends('layouts.admin')
@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-9">
                    <div id="useradd-2" class="card">
                        <div class="card-header">
                            <h5>Basic info</h5>
                            <small class="text-muted">{{ __('Mandatory informations') }}</small>
                        </div>
                        <div class="card-body">
                            <div class=" row mt-3 container-fluid">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Role') }}</label>
                                        <input type="text" name="role" value=""
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="choose-file">
                                            <div for="avatar">
                                                <label class="form-label">{{ __('Choose file here') }}</label>
                                                <input type="file" class="form-control" name="profile"
                                                    data-filename="profiles">
                                            </div>
                                            <p class="profiles"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Full Name') }}</label>
                                        <input type="text" name="name" value=""
                                            class="form-control" placeholder={{ __('Name') }}>
                                      
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }}</label>
                                        <input type="text" name="email" value=""
                                            class="form-control" placeholder={{ __('Email') }}>
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Password') }}</label>
                                        <input type="password" name="password" value=""
                                            placeholder="{{ __('Leave blank if you dont want to change') }}"
                                            class="form-control" autocomplete="off">
                                      
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Confirm Password') }}</label>
                                        <input type="password" name="password_confirmation" value=""
                                            placeholder="{{ __('Leave blank if you dont want to change') }}"
                                            class="form-control" autocomplete="off">
                                      
                                            <span class="invalid-feedback" role="alert">
                                                <strong></strong>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary mb-3">{{ __('Update Account') }}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('vendor/plugins/croppie/js/croppie.min.js') }}"></script>
    <script src="{{ asset('vendor/plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('vendor/js/custom.js') }}"></script> --}}


    <script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>

    <script>
     
    </script>
@endpush
