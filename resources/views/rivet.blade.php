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


    <header class="rvt-header-wrapper">

        <a class="rvt-header-wrapper__skip-link" href="#main-content">Skip to main content</a>

        <div class="rvt-header-global">
            <div class="rvt-p-lr-md">
                <div class="rvt-header-global__inner">
                    <div class="rvt-header-global__logo-slot">
                        <a class="rvt-lockup" href="#0">

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
                                

                            <div class="rvt-flex rvt-items-center rvt-m-left-md rvt-p-bottom-md rvt-p-bottom-none-lg-up">
                            @if (cas()->isAuthenticated())
                                <div class="rvt-ts-14">
                                    <span><strong>Logged in as </strong></span>
                                </div>
				<div class="rvt-ts-14 rvt-m-left-xs rvt-p-right-xs rvt-m-right-xs rvt-border-right">{{ cas()->user() }}</div>
				<a href="{{ route('logout') }}">Logout</a>
                            @else
				            <a href="{{ url('/login') }}">
                             <button type="button" class="rvt-button">IU Login</button>
                             </a>
                             @endif
				            </div>

                          </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="main-content" class="rvt-layout__wrapper rvt-layout__wrapper--details">

        <div class="rvt-layout__sidebar [ rvt-p-top-xxl rvt-p-left-md rvt-bg-black-000 ]" id="section-nav">

        </div>	
      
            <div class="rvt-container-lg rvt-m-top-xl rvt-m-left-none rvt-m-right-none rvt-p-right-none rvt-p-left-none">
		<div class="rvt-row">
	 <div class="rvt-cols-8-lg">
	<div class="rvt-prose">
           <h1 class="rvt-m-top-md rvt-m-bottom-md">ORCID-Comanage Integration</h1>
         </div>

		    <!-- **************************************************************
        		Content
    			*************************************************************** -->

                <div class="rvt-flow rvt-prose">
		  
			<p>Comanage Registry is an identity management system that facilitates enrollment and lifecycle management within collaborative organizations. IU's Identity Management Services is implementing this system as an integration with IU Login.</p> 
            
            <p>The Comanage Registry includes an ORCID Source plugin designed to integrate with the ORCID API, allowing organizations to securely link ORCID iDs to their COmanage records. The Orcid Source plugin was recently upgraded to work with ORCID's member API. </p>
            <p>This is a test application for expanding the Comanage Registry capability in order to query from and post data to individual ORCID records.</p>
            <ul><li>We will obtain invidiual IDs (and permission access tokens) through the Comanage Registry workflow</li>
            <li>Use these access tokens in other university systems (i.e, such as this test application) to read/write to ORCID Records</li> 
            <li>Each university system with this protocol would use the same ORCID API member ID embedded in Comanage
            <ul><li>Permissions granted by individuals will be collected only through COmanage flows</li> 
            <li>Standalone IU systems will use these permissions in the form of access tokens to read/write ORCID records</li></ul>
            </li></ul>
    <hr>
	    <p class-"rvt-m-top-sm"> <strong>Individual researchers</strong>:</p> 
<p>Click to authorize IU to have read & write access to your ORCID record </p> 
<div>  
 <a href="https://unt.identity.iu.edu/registry/co_petitions/start/coef:6">
<button type="button" class="rvt-button">
<span>Begin</span>
<svg class="rvt-icon-link-external" fill="currentColor" width="13" height="13" viewBox="0 0 16 16"><path d="M15 1H9v2h2.586l-3 3L10 7.414l3-3V7h2V1Z"></path><path d="M7 3H1v12h12V9h-2v4H3V5h4V3Z"></path></svg>
</button></a></div>
<div>
<p class-"rvt-m-top-sm"> <strong>Please be patient</strong>:</p>
<ul>
<li>You will be redirected and may be asked to log in.</li> 
<li>The initial processing by the Comanage Registry will take several seconds.</li> 
<li>Sign in and authorize ORCID when prompted.</li>
<li>If testing, use <i>@mailinator.com</i> credentials.</i>
</ul>
<p>Comanage will process the enrollment request and send users to ORCID to authorize the permissions.</p>

    <hr>

<p>Note: The data posted here is derived from a development instance of the Comanage Registry and the ORCID sandbox. It's included for demonstration purposes only. This dev site is restricted to IU Login users.</p> 
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

