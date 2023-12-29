<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>

    <title>Deshbuilders - Admin Login</title>

    <meta charset="utf-8"/>
    <meta name="description" content="Deshbuilders"/>
    <meta name="keywords" content="Deshbuilders, construction, real state"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <link rel="shortcut icon" href="{{asset('assets/backend/media/images/logo/deshbuilder_logo.png')}}"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css')  }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-body">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{ asset('assets/backend/media/images/login-bg.jpg') }})">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            <a href="#" class="mb-12">
                <img alt="Logo" style="width: 220px" src="{{asset('assets/backend/media/images/logo/deshbuilder_logo.png')}}"/>
                {{--                <span class="fs-2x">Deshbuilders</span>--}}
            </a>
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                      action="{{ route('admin.login') }}" method="POST">

                    @csrf

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">Sign In to Deshbuilders</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input placeholder="Enter email" class="form-control form-control-lg form-control-solid"
                               type="email" required name="email" value="{{ old('email') }}"
                               autocomplete="off"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                        <input placeholder="Enter password" class="form-control form-control-lg form-control-solid"
                               required type="password" name="password"
                               autocomplete="off"/>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <span class="indicator-label">Sign In</span>
                        </button>
                        <!--end::Submit button-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Main-->

<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="assets/backend/plugins/global/plugins.bundle.js"></script>
<script src="assets/backend/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="assets/backend/js/custom/authentication/sign-in/general.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

</body>
<!--end::Body-->
</html>
