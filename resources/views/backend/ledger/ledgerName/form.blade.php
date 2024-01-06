@extends('backend.layouts.master')

@section('title', 'Ledger Name Create')

@section('content')
    <div id="kt_content_container" class="container-xxl">

        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Ledger Name Create</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                     title="Click to ledger name list"
                     data-bs-original-title="Click to ledger name list">
                    <a href="{{ route('admin.ledgerName.index') }}" class="btn btn-sm btn-light btn-active-primary">
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
                        Ledger Name List
                    </a>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                @include('message')

                <!--begin::Form-->
                <form class="form" method="POST"
                      action="{{ isset($editModeData) ? route('admin.ledgerName.update', $editModeData->id) : route('admin.ledgerName.store') }}">
                    @csrf

                    @isset($editModeData)
                        @method('PUT')

                        <input type="text" hidden name="ledger_name_id" value="{{ $editModeData->id }}">
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
                            <label class="required fs-5 fw-bold mb-2">Ledger Type</label>
                            <select name="ledger_type" data-control="select2" data-placeholder="Select Ledger Type"
                                    class="form-select form-select-solid ledger_type">
                                <option value="">Select Ledger Type</option>
                                @foreach ($ledgerTypes as $ledgerType)
                                    <option
                                        @isset($editModeData)
                                            {{ $editModeData->ledger_type == $ledgerType->id ? 'selected' : '' }}
                                        @endisset
                                        value="{{ $ledgerType->id }}">{{ $ledgerType->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ledger_type')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Ledger Group</label>
                            <select name="ledger_group" data-control="select2" data-placeholder="Select Ledger Group"
                                    class="form-select form-select-solid ledger_group">
                                <option value="">Select Ledger Group</option>
                                @foreach ($ledgerGroups as $ledgerGroup)
                                    <option
                                        @isset($editModeData)
                                            {{ $editModeData->ledger_group == $ledgerGroup->id ? 'selected' : '' }}
                                        @endisset
                                        value="{{ $ledgerGroup->id }}">{{ $ledgerGroup->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ledger_group')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Unit</label>
                            <input type="text"
                                   class="form-control form-control-solid @error('unit') is-invalid @enderror"
                                   placeholder="Enter unit" name="unit"
                                   value="{{ $editModeData->unit ?? old('unit') }}"/>
                            @error('unit')
                            <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 fv-row mb-5">
                            <label class="required fs-5 fw-bold mb-2">Type</label>
                            <select name="type"
                                    class="form-select form-select-solid @error('type') is-invalid @enderror"
                                    data-control="select2" data-hide-search="true" data-placeholder="Active">
                                <option {{ isset($editModeData) && $editModeData->status == 'DR' ? 'selected' : '' }}
                                        value="DR">
                                    DR
                                </option>
                                <option {{ isset($editModeData) && $editModeData->status == 'CR' ? 'selected' : '' }}
                                        value="CR">CR
                                </option>
                            </select>
                            @error('type')
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
