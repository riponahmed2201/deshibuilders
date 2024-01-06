@extends('backend.layouts.master')

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="row g-5 g-xl-8">
            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('admin.project.index')}}" class="card bg-danger hoverable mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Project</div>
                        <div class="fw-bold text-white">Total: {{$projects}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>
            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('admin.ledgerType.index')}}" class="card bg-primary hoverable mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Ledger Type</div>
                        <div class="fw-bold text-white">Total: {{$ledgerTypes}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>
            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('admin.ledgerGroup.index')}}" class="card bg-success hoverable mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Ledger Group</div>
                        <div class="fw-bold text-white">Total: {{$ledgerGroups}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>

            <div class="col-xl-3">
                <!--begin::Statistics Widget 5-->
                <a href="{{route('admin.ledgerName.index')}}" class="card bg-warning hoverable mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body">
                        <div class="text-white fw-bolder fs-2 mb-2 mt-5">Ledger Name</div>
                        <div class="fw-bold text-white">Total: {{$ledgerNames}}</div>
                    </div>
                    <!--end::Body-->
                </a>
                <!--end::Statistics Widget 5-->
            </div>
        </div>
    </div>
@endsection
