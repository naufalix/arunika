    
    <title>{{ $title }}</title> 
    <meta name="description" content="Animelovers v2 Admin Panel" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <link rel="canonical" href="{{Request::url()}}" />
    <link rel="shortcut icon" href="/favicon.ico" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="/assets/plugins/global/plugins.bundle_new.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/custom-menu.css" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/prismjs/prismjs.bundle.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/plugins/custom/sweetalert2/sweetalert2.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="/assets/plugins/global/plugins.bundle.css"/> --}}
    <!--end::Page Vendor Stylesheets-->

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="/assets/plugins/global/plugins.bundle.js"></script>
    <script src="/assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->

    <!-- Template Main JS File -->
    <script src="/assets/plugins/custom/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="/assets/plugins/custom/dropzone/dropzone.min.js"></script>

    <style type="text/css">
        .of-cover {object-fit: cover;}
        .btn-sm {font-size: 6px !important; border-radius: 5px !important;}
        html{scroll-behavior:smooth}
        .container {max-width: inherit}
        /* .markdown:first-child {margin-top: 0px !important;} */
        .markdown h2:nth-of-type(1) {margin-top: 0px !important;}
        .markdown h2 {font-size: 28px; margin-top: 50px; margin-bottom: 25px;}
        .markdown h3 {margin-top: 30px; margin-bottom: 15px;}
        .markdown li {margin-bottom: 8px;}
        .markdown img {width: 100%; border: 1px solid #00000020; border-radius: 8px; box-shadow: 0 0.5rem 1.5rem 0.5rem rgb(0 0 0 / 8%) !important;}
        .markdown table, .markdown th, .markdown td{border: 1px solid #CACDD1 !important; border-collapse: collapse; vertical-align: middle !important;}
        .markdown thead th:empty {display: none;}
        .markdown tbody td{padding: 0.75rem !important}
        .markdown thead th{padding: 0.75rem !important; text-align: center}
        
        .menu-link i {
            font-size: 16px;
            width: 16px;
            margin: 8px 12px 8px 0px;
        }

    </style>