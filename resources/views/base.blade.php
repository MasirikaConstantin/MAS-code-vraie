<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head><script src="{{asset('color-modes.js')}}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>@yield('titre' ,env("APP_NAME"))</title>
<!--
@ if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
@ vite(['resources/css/app.css', 'resources/js/app.js'])
@ else
<style>
/* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
</style>
@ endif
-->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{asset('prism.css')}}">
<link rel="stylesheet" href="{{asset('bootstrap-icons/bootstrap-icons.css')}}">
<link rel="shortcut icon" href="{{asset('mas-product.ico')}}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('quill.snow.css')}}">
<script src="{{asset('quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('tom-select.css')}}">
<link rel="stylesheet" href="{{asset('autre.css')}}">

<script src="{{asset('fancybox.umd.js')}}"></script>
<link
  rel="stylesheet"
  href="{{asset('fancybox.css')}}"
/>

<script src="{{asset('tom-select.complete.min.js')}}"></script>


<meta name="theme-color" content="#712cf9">

@php
  $route = request()->route() ? request()->route()->getName() : 'route_inconnue';
@endphp

    
            <style>
                    
                      @font-face {
                        font-family: 'Google';
                        src: url('{{asset('ProductSans-Light.ttf')}}');
                        font-weight: 500;
                        
                    }
                    body{
                        font-family: 'Google';
                    }
                    

                  .bd-placeholder-img {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
                  }

                  @media (min-width: 768px) {
                    .bd-placeholder-img-lg {
                      font-size: 3.5rem;
                    }
                  }

                  .b-example-divider {
                    width: 100%;
                    height: 3rem;
                    background-color: rgba(0, 0, 0, .1);
                    border: solid rgba(0, 0, 0, .15);
                    border-width: 1px 0;
                    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
                  }

                  .b-example-vr {
                    flex-shrink: 0;
                    width: 1.5rem;
                    height: 100vh;
                  }

                  .bi {
                    vertical-align: -.125em;
                    fill: currentColor;
                  }

                  
                  .btn-bd-primary {
                    --bd-violet-bg: #712cf9;
                    --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

                    --bs-btn-font-weight: 600;
                    --bs-btn-color: var(--bs-white);
                    --bs-btn-bg: var(--bd-violet-bg);
                    --bs-btn-border-color: var(--bd-violet-bg);
                    --bs-btn-hover-color: var(--bs-white);
                    --bs-btn-hover-bg: #6528e0;
                    --bs-btn-hover-border-color: #6528e0;
                    --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
                    --bs-btn-active-color: var(--bs-btn-hover-color);
                    --bs-btn-active-bg: #5a23c8;
                    --bs-btn-active-border-color: #5a23c8;
                  }

                  .bd-mode-toggle {
                    z-index: 1500;
                  }

                  .bd-mode-toggle .dropdown-menu .active .bi {
                    display: block !important;
                  }
                  

            </style>

    
   
  </head>

  <body class="bg-gray-900 text-gray-100">
    
    @php
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
                            
@endphp

<script>
  Fancybox.bind("[data-fancybox]", {
  // Your custom options
  });

</script>
   


@include('nav')


<style>

      .class {
        background-attachment: fixed !important;
          width: 100%;
          height: 80vh;
          background-size: cover;
          position:relative;
          margin-top: -80px;
          z-index: 9;
          background: url({{asset('imagde.svg')}})  ;
        
          }
        
          .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(225, 255, 0) !important;
              text-shadow: (12px 12px 12px #000000);
              font-family: 'ubuntu', sans-serif;
              font-size: 28px !important;
              font-style: italic;
              font-display:red; 

            }
            .h1{
              font-size: 80px !important;
              letter-spacing: 0.2em;

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }


          .accs{
            padding-top: 300px!important
          }
          @media (max-width: 992px) {
          
            }

          @media (max-width: 500px){
            .sss{
              color: rgb(208, 255, 0) !important;
              margin: 140px 0px !important;
              padding: 0px;
              
            }
            .h1{
              font-size: 50px !important;
              letter-spacing: 0.2em;
            }
            .accs{
              font-weight: bold !important;
              font-size: 120px !important;
              padding: 10% !important;
            }
            #monElement{
              color: rgba(213, 216, 27, 0.678) !important;
              text-shadow: (12px 12px 12px #000000);
              text-align: center;
              font-family: 'ubuntu', sans-serif;
              font-size: 18px !important;
              font-style: italic;
              font-display:red; 

            }
            .class{
              width: 100%;
              height:  auto !important;

            }
            .gg{
            margin: 0px !important;
          }

          
        }


        
</style>
<!-- Begin page content -->
<main class="flex-shrink-0 mt-6 ">

      @if (str_contains($route, 'index'))
        <div class="class "  >
            @if($route != 'astuces.new')
            <div class="  accs" style=" " >
                @endif
                  <div class="col-md-12">
                    <div class=" sss text-body  justify-content-center acc mt-3 ">
                      <h1 class="h1 text-body" >
                        <strong>Bienvenu  </strong>
                      </h1>
                      <h3 class="" id="monElement" >
                        
                      </h3>
                    </div>
                  
                  </div>
              </div>
            </div>
            @endif

          @if($route != 'astuces.new')
            
            <div class=" container mx-auto mt-6">
          @endif

      <div class="mt-6" style="margin-top: 90px" >
        <h1 class="text-4xl font-bold adrks:text-white mt-6 mb-4">@yield('section','')   </h1>
      </div>

      @if(session("success1"))

      <div id="successAlert" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 adrks:bg-gray-800 adrks:text-green-400 adrks:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success alert!</span> {{ session('success') }}
          <button type="button" onclick="this.parentElement.remove()" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 adrks:bg-green-600 adrks:hover:bg-green-700 adrks:focus:ring-green-800">X</button>
        </div>
      </div>
      
      @endif


          @yield('contenus')


</main>
<div class="contaisner mx-auto">
  <footer class="bg-gradient-to-b from-gray-900 to-black py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- À propos -->
            <div class="md:col-span-5">
                <div class="space-y-4">
                    <h3 class="text-indigo-400 font-bold flex items-center">
                        <i class="bi bi-info-circle mr-2"></i> À propos
                    </h3>
                    <div class="text-gray-400">
                        Bienvenue sur <a href="/" class="text-2xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">{{__("mon-site")}}</a> !
                        <p class="mt-2">Nous sommes une plateforme en ligne dédiée à fournir des réponses claires et précises à vos questions, quelle que soit leur domaine.</p>
                    </div>
                    <button type="button" class="text-indigo-400 hover:text-indigo-300" onclick="document.getElementById('aboutModal').classList.remove('hidden')">
                        En savoir plus →
                    </button>
                </div>

                
            </div>

            <!-- Modal -->
            <div id="aboutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-gray-900 rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-4">
                            <h5 class="text-xl font-bold text-indigo-400">
                                <i class="bi bi-info-circle mr-2"></i> À propos
                            </h5>
                            <button onclick="document.getElementById('aboutModal').classList.add('hidden')" class="text-gray-400 hover:text-white">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <div class="mt-6 text-gray-300 space-y-6">
                            <div>
                                <p class="font-bold mb-2">À propos de nous : Votre guichet unique pour les questions et les réponses</p>
                                <p>Bienvenue sur <span class="text-2xl text-indigo-400">{{__("mon-site")}}</span> !</p>
                            </div>

                            <div>
                                <p class="font-bold mb-2">Notre mission :</p>
                                <ul class="list-disc pl-5 space-y-2">
                                    <li>Offrir un espace ouvert et convivial où chacun peut poser des questions et obtenir des réponses de qualité.</li>
                                    <li>Favoriser le partage de connaissances et l'apprentissage continu dans une variété de domaines.</li>
                                    <li>Cultiver une communauté inclusive et respectueuse où chacun se sent à l'aise pour s'exprimer et apprendre.</li>
                                </ul>
                            </div>

                            <div>
                                <p class="font-bold mb-2">Ce qui nous distingue :</p>
                                <ul class="list-disc pl-5 space-y-2">
                                    <li><span class="font-semibold">Diversité des sujets:</span> Nous abordons un large éventail de sujets.</li>
                                    <li><span class="font-semibold">Expertise des contributeurs:</span> Notre communauté regroupe des experts et des passionnés.</li>
                                    <li><span class="font-semibold">Qualité des réponses:</span> Nous nous engageons à fournir des réponses claires et précises.</li>
                                    <li><span class="font-semibold">Approche collaborative:</span> Nous encourageons les interactions entre utilisateurs.</li>
                                </ul>
                            </div>

                            <div>
                                <a href="{{route('login')}}" class="text-indigo-400 hover:text-indigo-300 font-bold">Rejoignez-nous !</a>
                                <p class="mt-4">Ensemble, construisons un monde où la connaissance est accessible à tous !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Réseaux sociaux -->
            <div class="md:col-span-7">
                <div class="mt-8 pt-8 border-t border-gray-800">
                    <div class="flex flex-wrap items-center justify-between">
                        
                        
                        <div class="flex space-x-4 mt-4 md:mt-0">
                            <a href="https://www.facebook.com/mascodeproduct" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-facebook text-blue-400 hover:text-blue-300"></i>
                            </a>
                            <a href="https://x.com/negroconstantin" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-twitter text-gray-400 hover:text-gray-300"></i>
                            </a>
                            <a href="https://www.instagram.com/mascodeproduct/" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-instagram text-pink-400 hover:text-pink-300"></i>
                            </a>
                            <a href="https://youtube.com/@masproduct360" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-youtube text-red-400 hover:text-red-300"></i>
                            </a>
                            <a href="https://github.com/MasirikaConstantin" class="social-link" title="Constantin Masirika Jr.">
                                <i class="bi bi-github text-gray-400 hover:text-gray-300"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Formulaire de contact -->
                    @if (str_contains($route, 'contact'))
                    @else

                    <div class="mt-8">
                      <h3 class="text-indigo-400 font-bold mb-4">Contactez-nous</h3>
                      <form id="contactForm" class="space-y-4" action="{{ route('contacts') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-400">Nom</label>
                                <input type="text" id="name" name="nom" value="" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-sm text-red-600">Min 4 :</p>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-400">Email</label>
                                <input type="email" id="email" name="email" value="" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                                    <p class="mt-1 text-sm text-red-600">Email Valide</p>
                            </div>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-400">Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                <p class="mt-1 text-sm text-red-600">Min 10 :</p>
                        </div>
                        <button type="submit" class="w-full md:w-auto px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                            Envoyer
                        </button>
                    </form>
                    
                    <script>
                      document.getElementById('contactForm').addEventListener('submit', async function(event) {
                          event.preventDefault(); // Empêche le rechargement de la page
                          
                          // Récupère les valeurs des champs du formulaire
                          const name = document.getElementById('name').value.trim();
                          const email = document.getElementById('email').value.trim();
                          const message = document.getElementById('message').value.trim();
                  
                          // Vérifie la longueur du nom et du message, et la validité de l'email
                          if (name.length < 4) {
                              alert("Le nom doit contenir au moins 4 caractères.");
                              return;
                          }
                          if (message.length < 10) {
                              alert("Le message doit contenir au moins 10 caractères.");
                              return;
                          }
                          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                          if (!emailPattern.test(email)) {
                              alert("Veuillez entrer une adresse email valide.");
                              return;
                          }
                  
                          // Si les validations passent, prépare l'envoi du formulaire
                          const formData = new FormData(this);
                  
                          try {
                              const response = await fetch("{{ route('contacts') }}", {
                                  method: "POST",
                                  headers: {
                                      "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                  },
                                  body: formData
                              });
                  
                              if (response.ok) {
                                  // Vérifie si le contenu est JSON
                                  const contentType = response.headers.get("content-type");
                                  if (contentType && contentType.includes("application/json")) {
                                      const data = await response.json();
                                      alert('Formulaire envoyé avec succès !');
                                  } else {
                                      alert('Votre message a été bien envoyé.');
                                  }
                              } else {
                                  // Affiche les erreurs de validation ou un statut HTTP non "ok"
                                  const errors = await response.json();
                                  console.log(errors);
                                  alert('Erreur lors de l\'envoi du formulaire.');
                              }
                          } catch (error) {
                              console.error('Erreur de soumission :', error);
                              alert('Une erreur est survenue lors de l\'envoi.');
                          }
                      });
                  </script>
                  
                  
                    
                  </div>
                  @endif
                </div>
            </div>
        </div>

    </div>
    <p class="text-gray-400 text-center mt-6">&copy; 2023 - 2024 <strong>Mas Code Product </strong>Company, Inc. Tout droit réservé.</p>

</footer>

<style>
.social-link {
    @apply p-2 rounded-full transition-colors duration-300 hover:bg-gray-800/50;
}
</style>
</div>
<style>
    .s{
      margin: .15rem;
      font-size: 1.5rem;
    }
</style>


<script>
  function affichetext(element, txt, interval) {
    let i = 0;
    let timer = setInterval(function() {
      if (i < txt.length) {
        element.innerHTML += txt.charAt(i);
        i++;
      } else {
        clearInterval(timer);
      }
    }, interval);
  }

  const monElement = document.getElementById("monElement");
  const maPhrase = "--- Développé vos idées en réalité ----";
  const vitesse = 100;
  affichetext(monElement, maPhrase, vitesse);
</script>


<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			document.getElementById('imageDiv').src = e.target.result;
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>
	<script>
	document.getElementById('fileUpload').addEventListener('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			var img = document.createElement('img');
			img.src = e.target.result;
			document.getElementById('imageDiv').appendChild(img);
		}
		reader.readAsDataURL(this.files[0]);
	});
	</script>

<script>
  new TomSelect('select[multiple]',{plugins:{remove_button: {title: 'Delacher'}}})
</script>

<script>
  // Auto-fermeture de l'alerte après 5 secondes
  setTimeout(() => {
      const alert = document.getElementById('successAlert');
      if (alert) {
          alert.remove();
      }
  }, 5000);
</script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="{{asset('prism.js')}}"></script>
<script src="{{asset('quill.js')}}"></script>
    </body>
</html>
