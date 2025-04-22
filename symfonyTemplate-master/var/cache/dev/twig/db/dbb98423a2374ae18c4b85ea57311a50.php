<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin_dashborad/virtual-reality.html.twig */
class __TwigTemplate_92a822d349f8e15e5e0bd04bce4f868e extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin_dashborad/dashboard.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/virtual-reality.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/virtual-reality.html.twig"));

        $this->parent = $this->loadTemplate("admin_dashborad/dashboard.html.twig", "admin_dashborad/virtual-reality.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Virtual Reality";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <!--     Fonts and icons     -->
    <link href=\"https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800\" rel=\"stylesheet\" />
    <!-- Nucleo Icons -->
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/soft-ui-dashboard.css?v=1.1.0"), "html", null, true);
        yield "\" rel=\"stylesheet\" />
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 19
        yield "<body class=\"g-sidenav-show  bg-gray-100 virtual-reality\">
  <div>
    <!-- Navbar -->
    <nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl\" id=\"navbarBlur\" navbar-scroll=\"true\">
      <div class=\"container-fluid py-1 px-3\">
        <nav aria-label=\"breadcrumb\">
          <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
            <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-dark\" href=\"javascript:;\">Pages</a></li>
            <li class=\"breadcrumb-item text-sm text-dark active\" aria-current=\"page\">Virtual Reality</li>
          </ol>
          <h6 class=\"font-weight-bolder mb-0\">Virtual Reality</h6>
        </nav>
        <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
          <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
            <div class=\"input-group\">
              <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
              <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
            </div>
          </div>
          <ul class=\"navbar-nav  justify-content-end\">
            <li class=\"nav-item d-flex align-items-center\">
              <a class=\"btn btn-outline-primary btn-sm mb-0 me-3\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
            </li>
            <li class=\"nav-item d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body font-weight-bold px-0\">
                <i class=\"fa fa-user me-sm-1\"></i>
                <span class=\"d-sm-inline d-none\">Sign In</span>
              </a>
            </li>
            <li class=\"nav-item d-xl-none ps-3 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\" id=\"iconNavbarSidenav\">
                <div class=\"sidenav-toggler-inner\">
                  <i class=\"sidenav-toggler-line\"></i>
                  <i class=\"sidenav-toggler-line\"></i>
                  <i class=\"sidenav-toggler-line\"></i>
                </div>
              </a>
            </li>
            <li class=\"nav-item px-3 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\">
                <i class=\"fa fa-cog fixed-plugin-button-nav cursor-pointer\"></i>
              </a>
            </li>
            <li class=\"nav-item dropdown pe-2 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\" id=\"dropdownMenuButton\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                <i class=\"fa fa-bell cursor-pointer\"></i>
              </a>
              <ul class=\"dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4\" aria-labelledby=\"dropdownMenuButton\">
                <li class=\"mb-2\">
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"my-auto\">
                        <img src=\"";
        // line 71
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-2.jpg"), "html", null, true);
        yield "\" class=\"avatar avatar-sm  me-3 \">
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          <span class=\"font-weight-bold\">New message</span> from Laur
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class=\"mb-2\">
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"my-auto\">
                        <img src=\"";
        // line 89
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-spotify.svg"), "html", null, true);
        yield "\" class=\"avatar avatar-sm bg-gradient-dark  me-3 \">
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          <span class=\"font-weight-bold\">New album</span> by Travis Scott
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"avatar avatar-sm bg-gradient-secondary  me-3  my-auto\">
                        <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                          <title>credit-card</title>
                          <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                            <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                              <g transform=\"translate(1716.000000, 291.000000)\">
                                <g transform=\"translate(453.000000, 454.000000)\">
                                  <path class=\"color-background\" d=\"M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z\" opacity=\"0.593633743\"></path>
                                  <path class=\"color-background\" d=\"M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z\"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          Payment successfully completed
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <div class=\"border-radius-xl mt-3 mx-3 position-relative\" style=\"background-image: url('";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/vr-bg.jpg"), "html", null, true);
        yield "') ; background-size: cover;\">
    <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 \" id=\"sidenav-main\">
      <div class=\"sidenav-header\">
        <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
        <a class=\"navbar-brand m-0\" href=\" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html \" target=\"_blank\">
          <img src=\"";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-ct-dark.png"), "html", null, true);
        yield "\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
          <span class=\"ms-1 font-weight-bold\">Soft UI Dashboard 3</span>
        </a>
      </div>
      <hr class=\"horizontal dark mt-0\">
      <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 154
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad");
        yield "\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 45 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>shop </title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-1716.000000, -439.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(0.000000, 148.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                          <path class=\"color-background\" d=\"M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Dashboard</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 174
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_tables");
        yield "\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>office</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-1869.000000, -293.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g id=\"office\" transform=\"translate(153.000000, 2.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z\"></path>
                          <path class=\"color-background\" d=\"M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Tables</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"";
        // line 194
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_billing");
        yield "\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>credit-card</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(453.000000, 454.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z\"></path>
                          <path class=\"color-background\" d=\"M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Billing</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link active\" href=\"";
        // line 214
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_virtual_reality");
        yield "\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>box-3d-50</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-2319.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(603.000000, 0.000000)\">
                          <path class=\"color-background\" d=\"M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z\"></path>
                          <path class=\"color-background opacity-6\" d=\"M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z\"></path>
                          <path class=\"color-background opacity-6\" d=\"M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Virtual Reality</span>
            </a>
          </li>
        </ul>
      </div>
      <div class=\"sidenav-footer mx-3 \">
        <div class=\"card card-background shadow-none card-background-mask-secondary\" id=\"sidenavCard\">
          <div class=\"full-background\" style=\"background-image: url('";
        // line 238
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/curved-images/white-curved.jpg"), "html", null, true);
        yield "')\"></div>
          <div class=\"card-body text-start p-3 w-100\">
            <div class=\"icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md\">
              <i class=\"ni ni-diamond text-dark text-gradient text-lg top-0\" aria-hidden=\"true\" id=\"sidenavCardIcon\"></i>
            </div>
            <div class=\"docs-info\">
              <h6 class=\"text-white up mb-0\">Need help?</h6>
              <p class=\"text-xs font-weight-bold\">Please check our docs</p>
              <a href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard\" target=\"_blank\" class=\"btn btn-white btn-sm w-100 mb-0\">Documentation</a>
            </div>
          </div>
        </div>
        <a class=\"btn btn-primary mt-3 w-100\" href=\"https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree\">Upgrade to pro</a>
      </div>
    </aside>
    <main class=\"main-content mt-1 border-radius-lg\">
      <div class=\"section min-vh-85 position-relative transform-scale-0 transform-scale-md-7\">
        <div class=\"container\">
          <div class=\"row pt-10\">
            <div class=\"col-lg-1 col-md-1 pt-5 pt-lg-0 ms-lg-5 text-center\">
              <a href=\"javascript:;\" class=\"avatar avatar-md border-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"My Profile\">
                <img class=\"border-radius-lg\" alt=\"Image placeholder\" src=\"";
        // line 259
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-1.jpg"), "html", null, true);
        yield "\">
              </a>
              <button class=\"btn btn-white border-radius-lg p-2 mt-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Home\">
                <i class=\"fas fa-home p-2\"></i>
              </button>
              <button class=\"btn btn-white border-radius-lg p-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Search\">
                <i class=\"fas fa-search p-2\"></i>
              </button>
              <button class=\"btn btn-white border-radius-lg p-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Minimize\">
                <i class=\"fas fa-ellipsis-h p-2\"></i>
              </button>
            </div>
            <div class=\"col-lg-8 col-md-11\">
              <div class=\"d-flex\">
                <div class=\"me-auto\">
                  <h1 class=\"display-1 font-weight-bold mt-n4 mb-0\">28°C</h1>
                  <h6 class=\"text-uppercase mb-0 ms-1\">Cloudy</h6>
                </div>
                <div class=\"ms-auto\">
                  <img class=\"w-50 float-end mt-lg-n4\" src=\"";
        // line 278
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/icon-sun-cloud.png"), "html", null, true);
        yield "\" alt=\"image sun\">
                </div>
              </div>
              <div class=\"row mt-4\">
                <div class=\"col-lg-4 col-md-4\">
                  <div class=\"card move-on-hover overflow-hidden\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">08:00</h6>
                        <h6 class=\"mb-0\">Synk up with Mark
                          <small class=\"text-secondary font-weight-normal\">Hangouts</small>
                        </h6>
                      </div>
                      <hr class=\"horizontal dark\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">09:30</h6>
                        <h6 class=\"mb-0\">Gym <br />
                          <small class=\"text-secondary font-weight-normal\">World Class</small>
                        </h6>
                      </div>
                      <hr class=\"horizontal dark\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">11:00</h6>
                        <h6 class=\"mb-0\">Design Review<br />
                          <small class=\"text-secondary font-weight-normal\">Zoom</small>
                        </h6>
                      </div>
                    </div>
                    <a href=\"javascript:;\" class=\"bg-gray-100 w-100 text-center py-1\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Show More\">
                      <i class=\"fas fa-chevron-down text-primary\"></i>
                    </a>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 mt-4 mt-sm-0\">
                  <div class=\"card bg-gradient-dark move-on-hover\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <h5 class=\"mb-0 text-white\">To Do</h5>
                        <div class=\"ms-auto\">
                          <h1 class=\"text-white text-end mb-0 mt-n2\">7</h1>
                          <p class=\"text-sm mb-0 text-white\">items</p>
                        </div>
                      </div>
                      <p class=\"text-white mb-0\">Shopping</p>
                      <p class=\"mb-0 text-white\">Meeting</p>
                    </div>
                    <a href=\"javascript:;\" class=\"w-100 text-center py-1\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Show More\">
                      <i class=\"fas fa-chevron-down text-white\"></i>
                    </a>
                  </div>
                  <div class=\"card move-on-hover mt-4\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <p class=\"mb-0\">Emails (21)</p>
                        <a href=\"javascript:;\" class=\"ms-auto\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Check your emails\">
                          Check
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 mt-4 mt-sm-0\">
                  <div class=\"card card-background card-background-mask-primary move-on-hover align-items-start\">
                    <div class=\"cursor-pointer\">
                      <div class=\"full-background\" style=\"background-image: url('";
        // line 342
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/curved-images/curved1.jpg"), "html", null, true);
        yield "')\"></div>
                      <div class=\"card-body\">
                        <h5 class=\"text-white mb-0\">Some Kind Of Blues</h5>
                        <p class=\"text-white text-sm\">Deftones</p>
                        <div class=\"d-flex mt-5\">
                          <button class=\"btn btn-outline-white rounded-circle p-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Prev\">
                            <i class=\"fas fa-backward p-2\"></i>
                          </button>
                          <button class=\"btn btn-outline-white rounded-circle p-2 mx-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Pause\">
                            <i class=\"fas fa-play p-2\"></i>
                          </button>
                          <button class=\"btn btn-outline-white rounded-circle p-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Next\">
                            <i class=\"fas fa-forward p-2\"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=\"card move-on-hover mt-4\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <p class=\"my-auto\">Messages</p>
                        <div class=\"ms-auto\">
                          <div class=\"avatar-group\">
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"2 New Messages\">
                              <img alt=\"Image placeholder\" src=\"";
        // line 367
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-1.jpg"), "html", null, true);
        yield "\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"1 New Message\">
                              <img alt=\"Image placeholder\" src=\"";
        // line 370
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-2.jpg"), "html", null, true);
        yield "\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"13 New Messages\">
                              <img alt=\"Image placeholder\" src=\"";
        // line 373
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-3.jpg"), "html", null, true);
        yield "\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"7 New Messages\">
                              <img alt=\"Image placeholder\" src=\"";
        // line 376
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/team-4.jpg"), "html", null, true);
        yield "\">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <footer class=\"footer pt-3\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center justify-content-lg-between\">
        <div class=\"col-lg-6 mb-lg-0 mb-4\">
          <div class=\"copyright text-center text-sm text-muted text-lg-start\">
            © ";
        // line 396
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield ",
            made with <i class=\"fa fa-heart\"></i> by
            <a href=\"https://www.creative-tim.com\" class=\"font-weight-bold\" target=\"_blank\">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class=\"col-lg-6\">
          <ul class=\"nav nav-footer justify-content-center justify-content-lg-end\">
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com\" class=\"nav-link text-muted\" target=\"_blank\">Creative Tim</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/presentation\" class=\"nav-link text-muted\" target=\"_blank\">About Us</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/blog\" class=\"nav-link text-muted\" target=\"_blank\">Blog</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/license\" class=\"nav-link pe-0 text-muted\" target=\"_blank\">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 424
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 425
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <!--   Core JS Files   -->
    <script src=\"";
        // line 427
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/popper.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 428
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 429
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/plugins/perfect-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 430
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/plugins/smooth-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src=\"";
        // line 443
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/soft-ui-dashboard.min.js?v=1.1.0"), "html", null, true);
        yield "\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin_dashborad/virtual-reality.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  653 => 443,  637 => 430,  633 => 429,  629 => 428,  625 => 427,  619 => 425,  606 => 424,  568 => 396,  545 => 376,  539 => 373,  533 => 370,  527 => 367,  499 => 342,  432 => 278,  410 => 259,  386 => 238,  359 => 214,  336 => 194,  313 => 174,  290 => 154,  279 => 146,  271 => 141,  216 => 89,  195 => 71,  141 => 19,  128 => 18,  115 => 15,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin_dashborad/dashboard.html.twig' %}

{% block title %}Virtual Reality{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <!--     Fonts and icons     -->
    <link href=\"https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800\" rel=\"stylesheet\" />
    <!-- Nucleo Icons -->
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}\" rel=\"stylesheet\" />
{% endblock %}

{% block body %}
<body class=\"g-sidenav-show  bg-gray-100 virtual-reality\">
  <div>
    <!-- Navbar -->
    <nav class=\"navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl\" id=\"navbarBlur\" navbar-scroll=\"true\">
      <div class=\"container-fluid py-1 px-3\">
        <nav aria-label=\"breadcrumb\">
          <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5\">
            <li class=\"breadcrumb-item text-sm\"><a class=\"opacity-5 text-dark\" href=\"javascript:;\">Pages</a></li>
            <li class=\"breadcrumb-item text-sm text-dark active\" aria-current=\"page\">Virtual Reality</li>
          </ol>
          <h6 class=\"font-weight-bolder mb-0\">Virtual Reality</h6>
        </nav>
        <div class=\"collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4\" id=\"navbar\">
          <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
            <div class=\"input-group\">
              <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
              <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
            </div>
          </div>
          <ul class=\"navbar-nav  justify-content-end\">
            <li class=\"nav-item d-flex align-items-center\">
              <a class=\"btn btn-outline-primary btn-sm mb-0 me-3\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
            </li>
            <li class=\"nav-item d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body font-weight-bold px-0\">
                <i class=\"fa fa-user me-sm-1\"></i>
                <span class=\"d-sm-inline d-none\">Sign In</span>
              </a>
            </li>
            <li class=\"nav-item d-xl-none ps-3 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\" id=\"iconNavbarSidenav\">
                <div class=\"sidenav-toggler-inner\">
                  <i class=\"sidenav-toggler-line\"></i>
                  <i class=\"sidenav-toggler-line\"></i>
                  <i class=\"sidenav-toggler-line\"></i>
                </div>
              </a>
            </li>
            <li class=\"nav-item px-3 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\">
                <i class=\"fa fa-cog fixed-plugin-button-nav cursor-pointer\"></i>
              </a>
            </li>
            <li class=\"nav-item dropdown pe-2 d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-body p-0\" id=\"dropdownMenuButton\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                <i class=\"fa fa-bell cursor-pointer\"></i>
              </a>
              <ul class=\"dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4\" aria-labelledby=\"dropdownMenuButton\">
                <li class=\"mb-2\">
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"my-auto\">
                        <img src=\"{{ asset('assets/images/team-2.jpg') }}\" class=\"avatar avatar-sm  me-3 \">
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          <span class=\"font-weight-bold\">New message</span> from Laur
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class=\"mb-2\">
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"my-auto\">
                        <img src=\"{{ asset('assets/images/small-logos/logo-spotify.svg') }}\" class=\"avatar avatar-sm bg-gradient-dark  me-3 \">
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          <span class=\"font-weight-bold\">New album</span> by Travis Scott
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">
                    <div class=\"d-flex py-1\">
                      <div class=\"avatar avatar-sm bg-gradient-secondary  me-3  my-auto\">
                        <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                          <title>credit-card</title>
                          <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                            <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                              <g transform=\"translate(1716.000000, 291.000000)\">
                                <g transform=\"translate(453.000000, 454.000000)\">
                                  <path class=\"color-background\" d=\"M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z\" opacity=\"0.593633743\"></path>
                                  <path class=\"color-background\" d=\"M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z\"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class=\"d-flex flex-column justify-content-center\">
                        <h6 class=\"text-sm font-weight-normal mb-1\">
                          Payment successfully completed
                        </h6>
                        <p class=\"text-xs text-secondary mb-0 \">
                          <i class=\"fa fa-clock me-1\"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>
  <div class=\"border-radius-xl mt-3 mx-3 position-relative\" style=\"background-image: url('{{ asset('assets/images/vr-bg.jpg') }}') ; background-size: cover;\">
    <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 \" id=\"sidenav-main\">
      <div class=\"sidenav-header\">
        <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
        <a class=\"navbar-brand m-0\" href=\" https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html \" target=\"_blank\">
          <img src=\"{{ asset('assets/images/logo-ct-dark.png') }}\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
          <span class=\"ms-1 font-weight-bold\">Soft UI Dashboard 3</span>
        </a>
      </div>
      <hr class=\"horizontal dark mt-0\">
      <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
        <ul class=\"navbar-nav\">
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_admin_dashborad') }}\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 45 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>shop </title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-1716.000000, -439.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(0.000000, 148.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                          <path class=\"color-background\" d=\"M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Dashboard</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_admin_dashborad_tables') }}\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>office</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-1869.000000, -293.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g id=\"office\" transform=\"translate(153.000000, 2.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z\"></path>
                          <path class=\"color-background\" d=\"M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Tables</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"{{ path('app_admin_dashborad_billing') }}\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>credit-card</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(453.000000, 454.000000)\">
                          <path class=\"color-background opacity-6\" d=\"M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z\"></path>
                          <path class=\"color-background\" d=\"M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Billing</span>
            </a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link active\" href=\"{{ path('app_admin_dashborad_virtual_reality') }}\">
              <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                  <title>box-3d-50</title>
                  <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                    <g transform=\"translate(-2319.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                      <g transform=\"translate(1716.000000, 291.000000)\">
                        <g transform=\"translate(603.000000, 0.000000)\">
                          <path class=\"color-background\" d=\"M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z\"></path>
                          <path class=\"color-background opacity-6\" d=\"M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z\"></path>
                          <path class=\"color-background opacity-6\" d=\"M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z\"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class=\"nav-link-text ms-1\">Virtual Reality</span>
            </a>
          </li>
        </ul>
      </div>
      <div class=\"sidenav-footer mx-3 \">
        <div class=\"card card-background shadow-none card-background-mask-secondary\" id=\"sidenavCard\">
          <div class=\"full-background\" style=\"background-image: url('{{ asset('assets/images/curved-images/white-curved.jpg') }}')\"></div>
          <div class=\"card-body text-start p-3 w-100\">
            <div class=\"icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md\">
              <i class=\"ni ni-diamond text-dark text-gradient text-lg top-0\" aria-hidden=\"true\" id=\"sidenavCardIcon\"></i>
            </div>
            <div class=\"docs-info\">
              <h6 class=\"text-white up mb-0\">Need help?</h6>
              <p class=\"text-xs font-weight-bold\">Please check our docs</p>
              <a href=\"https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard\" target=\"_blank\" class=\"btn btn-white btn-sm w-100 mb-0\">Documentation</a>
            </div>
          </div>
        </div>
        <a class=\"btn btn-primary mt-3 w-100\" href=\"https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree\">Upgrade to pro</a>
      </div>
    </aside>
    <main class=\"main-content mt-1 border-radius-lg\">
      <div class=\"section min-vh-85 position-relative transform-scale-0 transform-scale-md-7\">
        <div class=\"container\">
          <div class=\"row pt-10\">
            <div class=\"col-lg-1 col-md-1 pt-5 pt-lg-0 ms-lg-5 text-center\">
              <a href=\"javascript:;\" class=\"avatar avatar-md border-0\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"My Profile\">
                <img class=\"border-radius-lg\" alt=\"Image placeholder\" src=\"{{ asset('assets/images/team-1.jpg') }}\">
              </a>
              <button class=\"btn btn-white border-radius-lg p-2 mt-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Home\">
                <i class=\"fas fa-home p-2\"></i>
              </button>
              <button class=\"btn btn-white border-radius-lg p-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Search\">
                <i class=\"fas fa-search p-2\"></i>
              </button>
              <button class=\"btn btn-white border-radius-lg p-2\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"left\" title=\"Minimize\">
                <i class=\"fas fa-ellipsis-h p-2\"></i>
              </button>
            </div>
            <div class=\"col-lg-8 col-md-11\">
              <div class=\"d-flex\">
                <div class=\"me-auto\">
                  <h1 class=\"display-1 font-weight-bold mt-n4 mb-0\">28°C</h1>
                  <h6 class=\"text-uppercase mb-0 ms-1\">Cloudy</h6>
                </div>
                <div class=\"ms-auto\">
                  <img class=\"w-50 float-end mt-lg-n4\" src=\"{{ asset('assets/images/small-logos/icon-sun-cloud.png') }}\" alt=\"image sun\">
                </div>
              </div>
              <div class=\"row mt-4\">
                <div class=\"col-lg-4 col-md-4\">
                  <div class=\"card move-on-hover overflow-hidden\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">08:00</h6>
                        <h6 class=\"mb-0\">Synk up with Mark
                          <small class=\"text-secondary font-weight-normal\">Hangouts</small>
                        </h6>
                      </div>
                      <hr class=\"horizontal dark\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">09:30</h6>
                        <h6 class=\"mb-0\">Gym <br />
                          <small class=\"text-secondary font-weight-normal\">World Class</small>
                        </h6>
                      </div>
                      <hr class=\"horizontal dark\">
                      <div class=\"d-flex\">
                        <h6 class=\"mb-0 me-3\">11:00</h6>
                        <h6 class=\"mb-0\">Design Review<br />
                          <small class=\"text-secondary font-weight-normal\">Zoom</small>
                        </h6>
                      </div>
                    </div>
                    <a href=\"javascript:;\" class=\"bg-gray-100 w-100 text-center py-1\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Show More\">
                      <i class=\"fas fa-chevron-down text-primary\"></i>
                    </a>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 mt-4 mt-sm-0\">
                  <div class=\"card bg-gradient-dark move-on-hover\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <h5 class=\"mb-0 text-white\">To Do</h5>
                        <div class=\"ms-auto\">
                          <h1 class=\"text-white text-end mb-0 mt-n2\">7</h1>
                          <p class=\"text-sm mb-0 text-white\">items</p>
                        </div>
                      </div>
                      <p class=\"text-white mb-0\">Shopping</p>
                      <p class=\"mb-0 text-white\">Meeting</p>
                    </div>
                    <a href=\"javascript:;\" class=\"w-100 text-center py-1\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Show More\">
                      <i class=\"fas fa-chevron-down text-white\"></i>
                    </a>
                  </div>
                  <div class=\"card move-on-hover mt-4\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <p class=\"mb-0\">Emails (21)</p>
                        <a href=\"javascript:;\" class=\"ms-auto\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Check your emails\">
                          Check
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class=\"col-lg-4 col-md-4 mt-4 mt-sm-0\">
                  <div class=\"card card-background card-background-mask-primary move-on-hover align-items-start\">
                    <div class=\"cursor-pointer\">
                      <div class=\"full-background\" style=\"background-image: url('{{ asset('assets/images/curved-images/curved1.jpg') }}')\"></div>
                      <div class=\"card-body\">
                        <h5 class=\"text-white mb-0\">Some Kind Of Blues</h5>
                        <p class=\"text-white text-sm\">Deftones</p>
                        <div class=\"d-flex mt-5\">
                          <button class=\"btn btn-outline-white rounded-circle p-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Prev\">
                            <i class=\"fas fa-backward p-2\"></i>
                          </button>
                          <button class=\"btn btn-outline-white rounded-circle p-2 mx-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Pause\">
                            <i class=\"fas fa-play p-2\"></i>
                          </button>
                          <button class=\"btn btn-outline-white rounded-circle p-2 mb-0\" type=\"button\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"Next\">
                            <i class=\"fas fa-forward p-2\"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=\"card move-on-hover mt-4\">
                    <div class=\"card-body\">
                      <div class=\"d-flex\">
                        <p class=\"my-auto\">Messages</p>
                        <div class=\"ms-auto\">
                          <div class=\"avatar-group\">
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"2 New Messages\">
                              <img alt=\"Image placeholder\" src=\"{{ asset('assets/images/team-1.jpg') }}\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"1 New Message\">
                              <img alt=\"Image placeholder\" src=\"{{ asset('assets/images/team-2.jpg') }}\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"13 New Messages\">
                              <img alt=\"Image placeholder\" src=\"{{ asset('assets/images/team-3.jpg') }}\">
                            </a>
                            <a href=\"javascript:;\" class=\"avatar avatar-sm border-0 rounded-circle\" data-bs-toggle=\"tooltip\" data-bs-placement=\"top\" title=\"7 New Messages\">
                              <img alt=\"Image placeholder\" src=\"{{ asset('assets/images/team-4.jpg') }}\">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <footer class=\"footer pt-3\">
    <div class=\"container-fluid\">
      <div class=\"row align-items-center justify-content-lg-between\">
        <div class=\"col-lg-6 mb-lg-0 mb-4\">
          <div class=\"copyright text-center text-sm text-muted text-lg-start\">
            © {{ \"now\"|date(\"Y\") }},
            made with <i class=\"fa fa-heart\"></i> by
            <a href=\"https://www.creative-tim.com\" class=\"font-weight-bold\" target=\"_blank\">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class=\"col-lg-6\">
          <ul class=\"nav nav-footer justify-content-center justify-content-lg-end\">
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com\" class=\"nav-link text-muted\" target=\"_blank\">Creative Tim</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/presentation\" class=\"nav-link text-muted\" target=\"_blank\">About Us</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/blog\" class=\"nav-link text-muted\" target=\"_blank\">Blog</a>
            </li>
            <li class=\"nav-item\">
              <a href=\"https://www.creative-tim.com/license\" class=\"nav-link pe-0 text-muted\" target=\"_blank\">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</body>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <!--   Core JS Files   -->
    <script src=\"{{ asset('assets/js/core/popper.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/core/bootstrap.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}\"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src=\"https://buttons.github.io/buttons.js\"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src=\"{{ asset('assets/js/soft-ui-dashboard.min.js?v=1.1.0') }}\"></script>
{% endblock %} ", "admin_dashborad/virtual-reality.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\admin_dashborad\\virtual-reality.html.twig");
    }
}
