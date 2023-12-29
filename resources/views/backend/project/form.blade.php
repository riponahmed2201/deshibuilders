@extends('backend.layouts.master')

@section('content')
    <div id="kt_content_container" class="container-xxl">

        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Project Create</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                     title="Click to project list"
                     data-bs-original-title="Click to project list">
                    <a href="{{ route('admin.project.index') }}" class="btn btn-sm btn-light btn-active-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                      rx="1" transform="rotate(-90 11.364 20.364)"
                                      fill="black"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                      fill="black"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Project List
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                @include('message')

                <!--begin::Form-->
                <form class="form" method="POST" id="kt_project_form"
                      action="{{ isset($editModeData) ? route('admin.project.update', $editModeData->id) : route('admin.project.store') }}">
                    @csrf

                    @isset($editModeData)
                        @method('PUT')

                        <input type="text" hidden name="designation_id" value="{{ $editModeData->id }}">
                    @endisset

                    <div class="row mb-5">

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Project Name</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('name') is-invalid @enderror"
                                   placeholder="Enter project name" name="name"
                                   value="{{ $editModeData->name ?? old('name') }}"/>
                            @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Location</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('location') is-invalid @enderror"
                                   placeholder="Enter location" name="location"
                                   value="{{ $editModeData->location ?? old('location') }}"/>
                            @error('location')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Launching Date</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('launching_date') is-invalid @enderror"
                                   placeholder="Enter launching date" name="launching_date"
                                   value="{{ $editModeData->launching_date ?? old('launching_date') }}"/>
                            @error('launching_date')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Hand Over Date</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('hand_over_date') is-invalid @enderror"
                                   placeholder="Enter hand over date" name="hand_over_date"
                                   value="{{ $editModeData->hand_over_date ?? old('hand_over_date') }}"/>
                            @error('hand_over_date')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Active</label>
                            <select name="status"
                                    class="form-select form-select-solid @error('status') is-invalid @enderror"
                                    data-control="select2" data-hide-search="true" data-placeholder="Active">
                                <option {{ isset($editModeData) && $editModeData->status == 'YES' ? 'selected' : '' }}
                                        value="YES">
                                    YES
                                </option>
                                <option {{ isset($editModeData) && $editModeData->status == 'NO' ? 'selected' : '' }}
                                        value="NO">NO
                                </option>
                            </select>
                            @error('status')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Details</label>
                            <textarea class="form-control form-control-solid ckeditor" placeholder="Enter details"
                                      name="details"
                                      data-kt-autosize="true">{{ $editModeData->details ?? old('details') }}</textarea>
                            @error('details')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer flex-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
            <!--begin::Body-->
        </div>
    </div>
@endsection

@section('page_js')

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    {{--    <script src="{{ asset('assets/backend/plugins/global/ckeditor/ckeditor.js') }}"></script>--}}

    <script type="text/javascript">
        var i;

        i = document.querySelector("#kt_project_form");

        $(i.querySelector('[name="launching_date"]')).flatpickr({
            dateFormat: "Y-m-d"
        });

        $(i.querySelector('[name="hand_over_date"]')).flatpickr({
            dateFormat: "Y-m-d"
        });

        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
