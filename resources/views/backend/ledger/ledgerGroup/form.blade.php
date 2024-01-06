@extends('backend.layouts.master')

@section('title', 'Ledger Group Create')

@section('content')
    <div id="kt_content_container" class="container-xxl">

        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Ledger Group Create</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                     title="Click to ledger group list"
                     data-bs-original-title="Click to ledger group list">
                    <a href="{{ route('admin.ledgerGroup.index') }}" class="btn btn-sm btn-light btn-active-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000"></rect>
                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3"></rect>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Ledger Group List
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                @include('message')

                <!--begin::Form-->
                <form class="form" method="POST" id="kt_project_form"
                      action="{{ isset($editModeData) ? route('admin.ledgerGroup.update', $editModeData->id) : route('admin.ledgerGroup.store') }}">
                    @csrf

                    @isset($editModeData)
                        @method('PUT')

                        <input type="text" hidden name="ledger_group_id" value="{{ $editModeData->id }}">
                    @endisset

                    <div class="row mb-5">

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Name</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('name') is-invalid @enderror"
                                   placeholder="Enter name" name="name"
                                   value="{{ $editModeData->name ?? old('name') }}"/>
                            @error('name')
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
                            <label class="required fs-5 fw-bold mb-2">Description</label>
                            <textarea class="form-control form-control-solid ckeditor" placeholder="Enter description"
                                      name="description"
                                      data-kt-autosize="true">{{ $editModeData->description ?? old('description') }}</textarea>
                            @error('description')
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>

@endsection
