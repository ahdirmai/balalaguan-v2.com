<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

{{-- Manifest --}}
<meta name="description" content="Electronic Ticketing - Balalaguan - Bumantara Event Organizer">
<meta name="author" content="Bumantara">
<meta name="keyword" content="Event,Organizer,Concert,Ticketing">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

{{-- icons --}}
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/icons/icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="152x152" href="{{ asset('/icons/icon-152x152.png') }}">
<link rel="icon" type="image/png" sizes="144x144" href="{{ asset('/icons/icon-144x144.png') }}">
<link rel="icon" type="image/png" sizes="128x128" href="{{ asset('/icons/icon-128x128.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/icons/icon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="72x72" href="{{ asset('/icons/icon-72x72.png') }}">

{{-- styles --}}
@vite([
    "resources/css/core-ui/vendors/simplebar.css",
    "resources/css/core-ui/vendors/chartjs.css",
    "resources/css/core-ui/style.css",
    "resources/css/core-ui/example.css",
    "resources/css/brand/colors.css"
])
<!-- We use those styles to show code examples, you should remove them in your application.-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">

{{-- Font awesome 6 --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>

{{-- Core UI modal --}}
<link rel="canonical" href="https://coreui.io/docs/components/modal/">

{{-- scripts --}}
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics-->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
</script>