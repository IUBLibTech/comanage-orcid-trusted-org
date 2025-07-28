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
        <link rel='stylesheet' href="https://orcid-dev.dlib.indiana.edu/build/assets/iul-custom.css" type='text/css' media='all' />
      
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
                                    <li class="rvt-header-menu__item rvt-header-menu__item--current">
                                        <div class="rvt-header-menu__dropdown rvt-dropdown" data-rvt-dropdown="primary-nav-3">
                                            <div class="rvt-header-menu__group">
                                                <a class="rvt-header-menu__link" href="#3" aria-current="page">Nav One</a>
                                                <button aria-expanded="false" class="rvt-dropdown__toggle rvt-header-menu__toggle" data-rvt-dropdown-toggle="primary-nav-3">
                                                    <span class="rvt-sr-only">More sub-navigation links</span>
                                                    <svg class="rvt-global-toggle__open" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="m15.146 6.263-1.292-1.526L8 9.69 2.146 4.737.854 6.263 8 12.31l7.146-6.047Z"/></svg>
                                                </button>
                                            </div>
                                            <div class="rvt-header-menu__submenu rvt-dropdown__menu rvt-dropdown__menu--right" data-rvt-dropdown-menu="primary-nav-3" hidden>
                                                <ul class="rvt-header-menu__submenu-list">
                                                    <li class="rvt-header-menu__submenu-item">
                                                        <a class="rvt-header-menu__submenu-link" href="#sub1">Sub One</a>
                                                    </li>
                                                    <li class="rvt-header-menu__submenu-item">
                                                        <a class="rvt-header-menu__submenu-link" href="#sub2">Sub Three</a>
                                                    </li>
                                                    <li class="rvt-header-menu__submenu-item">
                                                        <a class="rvt-header-menu__submenu-link" href="#sub3">Sub Three</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="rvt-header-menu__item">
                                        <a class="rvt-header-menu__link" href="#0">Nav Two</a>
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

            <nav class="rvt-sidenav" aria-labelledby="details-pages" data-rvt-sidenav>
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
            </nav>
        </div>
        <div class="rvt-layout__content [ rvt-p-top-xxl rvt-p-lr-md rvt-p-lr-xxl-md-up ]">
            <div class="rvt-prose">

                <!-- **************************************************************
                    Breadcrumb navigation
                *************************************************************** -->

                <nav class="rvt-flex rvt-items-center" role="navigation" aria-label="Breadcrumb">
                    <ol class="rvt-breadcrumbs rvt-grow-1">
                        <li>
                            <a href="#0">
                                <span class="rvt-sr-only">Home</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="m8 .798 7 4.667V15H9v-4.444H7V15H1V5.465L8 .798ZM3 6.535V13h2V8.556h6V13h2V6.535L8 3.202 3 6.535Z"/></svg>
                            </a>
                        </li>
                </nav>

                <!-- **************************************************************
                    Page title
                *************************************************************** -->

                <h1 class="rvt-m-top-xs">ORCID-Comanage Integration</h1>
            </div>
            <div class="rvt-container-lg rvt-m-top-xl rvt-m-left-none rvt-m-right-none rvt-p-right-none rvt-p-left-none">
                <div class="rvt-row">
                    <div class="rvt-cols-8-lg">

		    <!-- **************************************************************
        		Content
    			*************************************************************** -->

                <div class="rvt-flow rvt-prose">
		    <div class="rvt-prose rvt-flow">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

		<div class="rvt-m-top-xxl"><h2> Work in Progress </h2>

		<!-- ******************************************************
                            Create/edit form
                        ******************************************************* -->

                       <!-- <form action=""> -->

                            <!-- **************************************************
                                Grouped set of fields
                            *************************************************** -->

                         <!--    <fieldset class="rvt-fieldset">
                                <legend class="rvt-legend [ rvt-ts-18 rvt-border-bottom rvt-p-bottom-xs ]">First set of fields</legend>
                                <p class="rvt-ts-14">Required fields are marked with <span class="rvt-color-orange-500 rvt-text-bold">*</span></p>
                                <div class="rvt-m-top-sm">
                                    <label class="rvt-label" for="text-one">Text input <span class="rvt-color-orange-500 rvt-text-bold">*</span></label>
                                    <input class="rvt-input" type="text" id="text-one" required>
                                </div>
                                <div class="rvt-m-top-lg">
                                    <label class="rvt-label" for="select-one">Select input</label>
                                    <select class="rvt-select rvt-validation-danger" name="" id="select-one" aria-describedby="select-option-message">
                                        <option value="">Option one</option>
                                        <option value="">Option two</option>
                                        <option value="">Option three</option>
                                        <option value="">Option four</option>
                                    </select>
                                    <div class="rvt-inline-alert rvt-inline-alert--danger">
                                    <span class="rvt-inline-alert__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="m8 6.586-2-2L4.586 6l2 2-2 2L6 11.414l2-2 2 2L11.414 10l-2-2 2-2L10 4.586l-2 2Z"/>  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2 8a6 6 0 1 1 12 0A6 6 0 0 1 2 8Z"/></svg>
                                    </span>
                                        <span class="rvt-inline-alert__message" id="select-option-message">
                                    This input has an error associated with it.
                                    </span>
                                    </div>
                                </div>
                                <div class="rvt-m-top-lg">
                                    <label for="textarea-1" class="rvt-label">Textarea <span class="rvt-color-orange-500 rvt-text-bold">*</span></label>
                                    <textarea id="textarea-1" class="rvt-textarea" required></textarea>
                                </div>
                            </fieldset>  -->

                            <!-- **************************************************
                                Grouped set of fields
                            *************************************************** -->

                          <!--  <fieldset class="rvt-fieldset rvt-m-top-xxl">
                                <legend class="rvt-legend [ rvt-ts-18 rvt-border-bottom rvt-p-bottom-xs ]">Another set of fields</legend>
                                <ul class="rvt-list-plain rvt-width-xl rvt-m-top-sm">
                                    <li>
                                        <div class="rvt-checkbox">
                                            <input type="checkbox" name="checkbox-demo" id="checkbox-1">
                                            <input type="hidden">
                                            <label for="checkbox-1">Option one</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rvt-checkbox">
                                            <input type="checkbox" name="checkbox-demo" id="indeterminate">
                                            <label for="indeterminate">Option two</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rvt-checkbox">
                                            <input aria-describedby="checkbox-description" type="checkbox" name="checkbox-demo" id="checkbox-long">
                                            <label for="checkbox-long">Just a quick note</label>
                                            <div id="checkbox-description" class="rvt-checkbox__description">This checkbox has a really long label that can wrap on to two lines and still have nice left alignment.</div>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>  -->

                            <!-- **************************************************
                                Grouped set of fields
                            *************************************************** -->

                           <!--  <fieldset class="rvt-fieldset rvt-m-top-xxl">
                                <legend class="rvt-legend [ rvt-ts-18 rvt-border-bottom rvt-p-bottom-xs ]">A third set of fields</legend>
                                <ul class="rvt-list-inline">
                                    <li>
                                        <div class="rvt-radio">
                                            <input type="radio" name="radio-group-1" id="radio-1" aria-describedby="radio-list-message">
                                            <label for="radio-1">Option one</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="rvt-radio">
                                            <input type="radio" name="radio-group-1" id="radio-2" aria-describedby="radio-list-message">
                                            <label for="radio-2">Option two</label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="rvt-inline-alert rvt-inline-alert--standalone rvt-inline-alert--warning">
                                <span class="rvt-inline-alert__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">  <path d="M12 7H4v2h8V7Z"/>  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2 8a6 6 0 1 1 12 0A6 6 0 0 1 2 8Z"/></svg>
                                </span>
                                    <span class="rvt-inline-alert__message" id="radio-list-message">
                                This set of fields can have validation messages too.
                                </span>
                                </div>
                            </fieldset> -->

                            <!-- **************************************************
                                Create/edit form buttons
                            *************************************************** -->

                           <!--  <div class="rvt-button-group [ rvt-m-top-xl ]">
                                <button class="rvt-button">Create/update item</button>
                                <button class="rvt-button rvt-button--danger">Delete item</button>
                            </div>
                        </form>  -->
                    </div>
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

