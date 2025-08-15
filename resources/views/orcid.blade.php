<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="First page"/>
        <meta name="og:description" content="ORCID-Comanage">
        <meta property="og:url" content="https://orcid-dev.dlib.indiana.edu/" />
        <meta property="og:image" content="https:/path/to/image"/>
        <meta property="og:image:width" content="768" />
        <meta property="og:image:height" content="512" />
        <link href="https://assets.iu.edu/favicon.ico" rel="icon" type="image/x-icon" />
        <link rel="stylesheet" href="https://unpkg.com/rivet-core@2.8.1/css/rivet.min.css" type='text/css' media='all' >
	<style>
	.rvt-layout__sidebar {
    	  border:none;
	}
	body {
	  min-height: 80vh;
	}
      	</style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    </head>
    <body class="rvt-layout">

    <!-- **************************************************************************
        APP CREATE/EDIT RESOURCE - TWO-COLUMN LAYOUT WITH ANCHORED SIDEBAR

        -> rivet.iu.edu/layouts/app-create-or-edit-resource-page/
    *************************************************************************** -->

    <!-- **************************************************************************
        Header

        -> rivet.iu.edu/components/header/
    *************************************************************************** -->

    <header class="rvt-header-wrapper">

@php($status = $status ?? session('status') ?? null)

	<!-- **********************************************************************
            "Skip to main content" link for keyboard users
        *********************************************************************** -->

        <a class="rvt-header-wrapper__skip-link" href="#main-content">Skip to main content</a>

        <!-- **********************************************************************
            Global header area
        *********************************************************************** -->

        <div class="rvt-header-global">
            <div class="rvt-p-lr-md">
                <div class="rvt-header-global__inner">
                    <div class="rvt-header-global__logo-slot">
                        <a class="rvt-lockup" href="https://orcid-dev.dlib.indiana.edu">

                            <!-- **************************************************
                                Trident logo
                            *************************************************** -->

                            <div class="rvt-lockup__tab">
                                <svg xmlns="http://www.w3.org/2000/svg" class="rvt-lockup__trident" viewBox="0 0 28 34">
                                    <path fill="currentColor" d="M-3.34344e-05 4.70897H8.83308V7.174H7.1897V21.1426H10.6134V2.72321H8.83308V0.121224H18.214V2.65476H16.2283V21.1426H19.7889V7.174H18.214V4.64047H27.0471V7.174H25.0614V23.6761L21.7746 26.8944H16.2967V30.455H18.214V33.8787H8.76463V30.592H10.6819V26.8259H5.20403L1.91726 23.6077V7.174H-3.34344e-05V4.70897Z"></path>
                                </svg>
                            </div>

                            <!-- **************************************************
                                Application title
                            *************************************************** -->

                            <div class="rvt-lockup__body">
                                <span class="rvt-lockup__title">ORCID Portal dev</span>
                            </div>
                        </a>
                    </div>
                    <div class="rvt-header-global__controls">
                        <div data-rvt-disclosure="menu" data-rvt-close-click-outside>
                            <button aria-expanded="false" class="rvt-global-toggle rvt-global-toggle--menu rvt-hide-lg-up" data-rvt-disclosure-toggle="menu">
                                <span class="rvt-sr-only">Menu</span>
                                <svg class="rvt-global-toggle__open" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="M15 4H1V2h14v2Zm0 5H1V7h14v2ZM1 14h14v-2H1v2Z"/></svg>
                                <svg class="rvt-global-toggle__close" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="m3.5 2.086 4.5 4.5 4.5-4.5L13.914 3.5 9.414 8l4.5 4.5-1.414 1.414-4.5-4.5-4.5 4.5L2.086 12.5l4.5-4.5-4.5-4.5L3.5 2.086Z"/></svg>
                            </button>

                            <!-- ******************************************************
                                Primary navigation
                            ******************************************************* -->

                            <nav aria-label="Main" class="rvt-header-menu" data-rvt-disclosure-target="menu" hidden>
                                <ul class="rvt-header-menu__list">
                                    <li class="rvt-header-menu__item">
  					<a class="rvt-header-menu__link" href="/comanage">Comanage</a>
 				   </li>
                                    <li class="rvt-header-menu__item">
                                        <a class="rvt-header-menu__link" href="/orcid">ORCID</a>
                                    </li>
				</ul>

                                <!-- **************************************************
                                    Avatar and "log out" link
                                *************************************************** -->

                               <div class="rvt-flex rvt-items-center rvt-m-left-md rvt-p-bottom-md rvt-p-bottom-none-lg-up">
                                    <div class="rvt-ts-14">
                                        <span><strong>Logged in as </strong></span>
                                    </div>
                                    <div class="rvt-ts-14 rvt-m-left-xs rvt-p-right-xs rvt-m-right-xs rvt-border-right">{{ cas()->user() }}</div>
				   
				</div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- **************************************************************************
        Main content area
    *************************************************************************** -->

    <main id="main-content" class="rvt-layout__wrapper rvt-layout__wrapper--details">

	        <!-- **********************************************************************
            Sidebar
        *********************************************************************** -->

        <div class="rvt-layout__sidebar [ rvt-p-top-xxl rvt-p-left-md rvt-bg-black-000 ]" id="section-nav">

            <!-- **********************************************************************
                Sidenav
            *********************************************************************** -->

 <!--           <nav class="rvt-sidenav" aria-labelledby="details-pages" data-rvt-sidenav>
                <span class="rvt-sidenav__label" id="details-pages">Details pages</span>
                <ul class="rvt-sidenav__list">
                    <li class="rvt-sidenav__item">
                        <a href="#side1" class="rvt-sidenav__link">Side navigation one</a>
                    </li>
                    <li class="rvt-sidenav__item">
                        <a href="#side2" class="rvt-sidenav__link">Side navigation two</a>
                    </li>
                    <li class="rvt-sidenav__item">
                        <a href="#side3" class="rvt-sidenav__link">Side navigation three</a>
                    </li>
                    <li class="rvt-sidenav__item">
                        <a href="#side4" class="rvt-sidenav__link">Side navigation four</a>
                    </li>
                </ul>
            </nav> -->
        </div>	

	<!-- **************************************************************
                    Breadcrumb navigation
                *************************************************************** -->

       <!--         <nav class="rvt-flex rvt-items-center" role="navigation" aria-label="Breadcrumb">
                    <ol class="rvt-breadcrumbs rvt-grow-1">
                        <li>
                            <a href="#0">
                                <span class="rvt-sr-only">Home</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="m8 .798 7 4.667V15H9v-4.444H7V15H1V5.465L8 .798ZM3 6.535V13h2V8.556h6V13h2V6.535L8 3.202 3 6.535Z"/></svg>
                            </a>
                        </li>
                </nav> -->
      
<div class="rvt-container-lg rvt-m-top-xl rvt-m-left-none rvt-m-right-none rvt-p-right-none rvt-p-left-none">
  <div class="rvt-row">
	<div class="rvt-cols-8-lg">
	    <div class="rvt-prose">
           <h1 class="rvt-m-top-md rvt-m-bottom-md">ORCID Record Fetch</h1>
        </div>

		    <!-- **************************************************************
        		Content
    			*************************************************************** -->
 <!-- <div class="rvt-alert rvt-alert-success rvt-m-bottom-lg"style="padding:.25rem;" role="alert" aria-labelledby="success-alert-title" data-rvt-alert="success">
  <p style="margin-left:.25rem;" >curl -i -H "Accept: application/vnd.orcid+json" -H 'Authorization: Bearer secret-hash' 'https://api.sandbox.orcid.org/v3.0/0009-0002-4299-4982/<strong>summary</strong>'</p>
    </div> -->
  
<h2>ORCID Record</h2>

@if($status === 'error')
    <div class="alert alert-danger">
        <strong>Error:</strong> {{ $error ?? 'An error occurred.' }}<br>
        @if(!empty($code)) <strong>Status:</strong> {{ $code }}<br> @endif
        @if(!empty($message)) <strong>Message:</strong> {{ $message }} @endif
    </div>
@endif

@if($status === 'success')
    <div class="alert alert-success">
        <strong>ORCID:</strong> {{ $orcid }}<br>
    </div>
@endif

@if(!empty($raw_json))
    <h4>Raw JSON</h4>
    <pre>{{ $raw_json }}</pre>
@endif

@if($status === 'error')
    <div class="alert alert-danger">
        <strong>Error:</strong> {{ $error }}<br>
        <strong>Status Code:</strong> {{ $code }}<br>
        <strong>Message:</strong> {{ $message }}
    </div>
@endif

@if($status === 'success')
    <div class="alert alert-success">
        <strong>ORCID:</strong> {{ $orcid }}<br>
        <h4>Data:</h4>
        <pre>{{ json_encode($data, JSON_PRETTY_PRINT) }}</pre>
    </div>
@endif

@if(!empty($raw_json))
    <h4>Raw JSON Output</h4>
    <pre>{{ $raw_json }}</pre>
@endif
<!-- <pre>
{
  "created-date" : {
    "value" : 1742238548817
  },
  "last-modified-date" : {
    "value" : 1742315682901
  },
  "credit-name" : "Richard Higgins",
  "orcid-identifier" : {
    "uri" : "https://sandbox.orcid.org/0009-0002-4299-4982",
    "path" : "0009-0002-4299-4982",
    "host" : "sandbox.orcid.org"
  },
  "external-identifiers" : null,
  "employments" : {
    "count" : 1,
    "employment" : [ {
      "put-code" : 75051,
      "type" : "employment",
      "organization-name" : "Indiana University",
      "role" : null,
      "url" : null,
      "start-date" : null,
      "end-date" : null,
      "validated" : false
    } ]
  },
  "professional-activities" : {
    "count" : 0,
    "professional-activity" : null
  },
  "fundings" : {
    "self-asserted-count" : 0,
    "validated-count" : 0
  },
  "works" : {
    "self-asserted-count" : 0,
    "validated-count" : 0
  },
  "peer-reviews" : {
    "peer-review-publication-grants" : 0,
    "self-asserted-count" : 0,
    "total" : 0
  },
  "email-domains" : {
    "count" : 0,
    "email-domain" : null
  },
  "education-qualifications" : {
    "count" : 0,
    "education-qualification" : null
  },
  "research-resources" : {
    "self-asserted-count" : 0,
    "validated-count" : 0
  }
}
</pre> -->

      </div>
    </div>
 </div>
</main>

    <!-- **************************************************************************
        Footer

        -> rivet.iu.edu/components/footer/
    **************************************************************************** -->

    <footer class="rvt-footer-base rvt-footer-base--light">
        <div class="rvt-footer-base__inner [ rvt-p-lr-md ]">
            <div class="rvt-footer-base__logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <polygon fill="currentColor" points="15.3 3.19 15.3 5 16.55 5 16.55 15.07 13.9 15.07 13.9 1.81 15.31 1.81 15.31 0 8.72 0 8.72 1.81 10.12 1.81 10.12 15.07 7.45 15.07 7.45 5 8.7 5 8.7 3.19 2.5 3.19 2.5 5 3.9 5 3.9 16.66 6.18 18.98 10.12 18.98 10.12 21.67 8.72 21.67 8.72 24 15.3 24 15.3 21.67 13.9 21.67 13.9 18.98 17.82 18.98 20.09 16.66 20.09 5 21.5 5 21.5 3.19 15.3 3.19" fill="#231f20" />
                </svg>
            </div>
            <ul class="rvt-footer-base__list">
                <li class="rvt-footer-base__item">
                    <a class="rvt-footer-base__link" href="https://accessibility.iu.edu/assistance/">Accessibility</a>
                </li>
                <li class="rvt-footer-base__item">
                    <a class="rvt-footer-base__link" href=https://libraries.indiana.edu/privacy">Privacy Notice</a>
                </li>
                <li class="rvt-footer-base__item">
                    <a class="rvt-footer-base__link" href="https://www.iu.edu/copyright/index.html">Copyright</a> © 2025 The Trustees of <a class="rvt-footer-base__link" href="https://www.iu.edu">Indiana University</a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="https://unpkg.com/rivet-core@2.8.1/js/rivet.min.js"></script>
    <script>
        Rivet.init();
    </script>
    </body>
</html>
