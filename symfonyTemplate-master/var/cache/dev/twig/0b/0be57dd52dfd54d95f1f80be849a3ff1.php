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

/* admin_dashborad/rtl.html.twig */
class __TwigTemplate_2aa1ac66c72370a8a57973013aff4d6e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/rtl.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/rtl.html.twig"));

        $this->parent = $this->loadTemplate("admin_dashborad/dashboard.html.twig", "admin_dashborad/rtl.html.twig", 1);
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

        yield "RTL - Soccer";
        
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
        yield "    <!-- Fonts and icons -->
    <link href=\"https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800\" rel=\"stylesheet\" />
    <!-- Nucleo Icons -->
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/soft-ui-dashboard.css?v=1.1.0"), "html", null, true);
        yield "\" rel=\"stylesheet\" />
    <!-- RTL CSS -->
    <link id=\"pagestyle\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/soft-ui-dashboard-rtl.css?v=1.1.0"), "html", null, true);
        yield "\" rel=\"stylesheet\" />
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 19
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

        // line 20
        yield "<body class=\"g-sidenav-show rtl bg-gray-100\">
  <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3\" id=\"sidenav-main\">
    <div class=\"sidenav-header\">
      <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
      <a class=\"navbar-brand m-0\" href=\"";
        // line 24
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
        <img src=\"";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-ct-dark.png"), "html", null, true);
        yield "\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
        <span class=\"ms-1 font-weight-bold\">Soft UI Dashboard 3</span>
      </a>
    </div>
    <hr class=\"horizontal dark mt-0\">
    <div class=\"collapse navbar-collapse w-auto\" id=\"sidenav-collapse-main\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 33
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
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
        // line 53
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_tables");
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
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_billing");
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
        <li class=\"nav-item mt-3\">
          <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"";
        // line 96
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
            <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
              <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 46 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                <title>customer-support</title>
                <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                  <g transform=\"translate(-1717.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                    <g transform=\"translate(1716.000000, 291.000000)\">
                      <g transform=\"translate(1.000000, 0.000000)\">
                        <path class=\"color-background opacity-6\" d=\"M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z\"></path>
                        <path class=\"color-background\" d=\"M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z\"></path>
                        <path class=\"color-background\" d=\"M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z\"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class=\"nav-link-text ms-1\">Profile</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link active\" href=\"";
        // line 117
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_rtl");
        yield "\">
            <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
              <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                <title>settings</title>
                <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                  <g transform=\"translate(-2020.000000, -442.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                    <g transform=\"translate(1716.000000, 291.000000)\">
                      <g transform=\"translate(304.000000, 151.000000)\">
                        <polygon class=\"color-background opacity-6\" points=\"18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667\"></polygon>
                        <path class=\"color-background\" d=\"M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z\"></path>
                        <path class=\"color-background\" d=\"M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C36.5533333,-1.62166667 40.22,-1.62166667 42.7116667,0.868333333 C45.2033333,3.35833333 45.2033333,7.025 42.7116667,9.515 L33.785,11.285 Z\"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class=\"nav-link-text ms-1\">RTL</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <div class=\"main-content position-relative max-height-vh-100 h-100\">
    <!-- Navbar -->
    <nav class=\"navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2\">
      <div class=\"container-fluid py-1\">
        <nav aria-label=\"breadcrumb\">
          <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5\">
            <li class=\"breadcrumb-item text-sm\"><a class=\"text-white opacity-5\" href=\"javascript:;\">Pages</a></li>
            <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">RTL</li>
          </ol>
          <h6 class=\"text-white font-weight-bolder ms-2\">RTL</h6>
        </nav>
        <div class=\"collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2\" id=\"navbar\">
          <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
            <div class=\"input-group\">
              <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
              <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
            </div>
          </div>
          <ul class=\"navbar-nav justify-content-end\">
            <li class=\"nav-item d-flex align-items-center\">
              <a class=\"btn btn-outline-white btn-sm mb-0 me-3\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
            </li>
            <li class=\"nav-item d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-white font-weight-bold px-0\">
                <i class=\"fa fa-user me-sm-1\"></i>
                <span class=\"d-sm-inline d-none\">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class=\"container-fluid py-4\">
      <div class=\"row\">
        <div class=\"col-12\">
          <div class=\"card\">
            <div class=\"card-header pb-0\">
              <div class=\"d-lg-flex\">
                <div>
                  <h5 class=\"mb-0\">All Projects</h5>
                  <p class=\"text-sm mb-0\">
                    RTL support for the dashboard.
                  </p>
                </div>
                <div class=\"ms-auto my-auto mt-lg-0 mt-4\">
                  <div class=\"ms-auto my-auto\">
                    <a href=\"#\" class=\"btn bg-gradient-primary btn-sm mb-0\">+&nbsp; New Project</a>
                    <button type=\"button\" class=\"btn btn-outline-primary btn-sm mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#import\">
                      Import
                    </button>
                    <div class=\"modal fade\" id=\"import\" tabindex=\"-1\" aria-hidden=\"true\">
                      <div class=\"modal-dialog mt-lg-10\">
                        <div class=\"modal-content\">
                          <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"ModalLabel\">Import CSV</h5>
                            <i class=\"fas fa-upload ms-3\"></i>
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                          </div>
                          <div class=\"modal-body\">
                            <p>You can browse your computer for a file.</p>
                            <input type=\"text\" placeholder=\"Browse file...\" class=\"form-control mb-3\">
                            <div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"importCheck\" checked=\"\">
                              <label class=\"custom-control-label\" for=\"importCheck\">I accept the terms and conditions</label>
                            </div>
                          </div>
                          <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn bg-gradient-secondary btn-sm\" data-bs-dismiss=\"modal\">Close</button>
                            <button type=\"button\" class=\"btn bg-gradient-primary btn-sm\">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class=\"btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1\" data-type=\"csv\" type=\"button\" name=\"button\">Export</button>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"card-body px-0 pb-0\">
              <div class=\"table-responsive\">
                <table class=\"table table-flush\" id=\"products-list\">
                  <thead class=\"thead-light\">
                    <tr>
                      <th>Project</th>
                      <th>Budget</th>
                      <th>Status</th>
                      <th>Completion</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck1\" checked>
                          </div>
                          <img class=\"w-10 ms-3\" src=\"";
        // line 238
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-spotify.svg"), "html", null, true);
        yield "\" alt=\"spotify\">
                          <h6 class=\"ms-3 my-auto\">Spotify</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$2,500</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">working</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 60%\"></div>
                          </div>
                          <span class=\"text-sm\">60%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck2\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"";
        // line 269
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-invision.svg"), "html", null, true);
        yield "\" alt=\"invision\">
                          <h6 class=\"ms-3 my-auto\">Invision</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$5,000</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">done</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 100%\"></div>
                          </div>
                          <span class=\"text-sm\">100%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck3\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"";
        // line 300
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-slack.svg"), "html", null, true);
        yield "\" alt=\"slack\">
                          <h6 class=\"ms-3 my-auto\">Slack</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$3,000</td>
                      <td>
                        <span class=\"badge badge-danger badge-sm\">canceled</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-danger\" style=\"width: 0%\"></div>
                          </div>
                          <span class=\"text-sm\">0%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck4\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"";
        // line 331
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-webdev.svg"), "html", null, true);
        yield "\" alt=\"webdev\">
                          <h6 class=\"ms-3 my-auto\">Webdev</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$14,000</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">working</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 80%\"></div>
                          </div>
                          <span class=\"text-sm\">80%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck5\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"";
        // line 362
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/small-logos/logo-xd.svg"), "html", null, true);
        yield "\" alt=\"adobe\">
                          <h6 class=\"ms-3 my-auto\">Adobe XD</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$2,300</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">done</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 100%\"></div>
                          </div>
                          <span class=\"text-sm\">100%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Project</th>
                      <th>Budget</th>
                      <th>Status</th>
                      <th>Completion</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 407
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

        // line 408
        yield "  <!-- Core JS Files -->
  <script src=\"";
        // line 409
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/popper.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 410
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 411
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/plugins/perfect-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 412
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
        // line 425
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
        return "admin_dashborad/rtl.html.twig";
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
        return array (  619 => 425,  603 => 412,  599 => 411,  595 => 410,  591 => 409,  588 => 408,  575 => 407,  520 => 362,  486 => 331,  452 => 300,  418 => 269,  384 => 238,  260 => 117,  236 => 96,  210 => 73,  187 => 53,  164 => 33,  153 => 25,  149 => 24,  143 => 20,  130 => 19,  117 => 16,  112 => 14,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin_dashborad/dashboard.html.twig' %}

{% block title %}RTL - Soccer{% endblock %}

{% block stylesheets %}
    <!-- Fonts and icons -->
    <link href=\"https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800\" rel=\"stylesheet\" />
    <!-- Nucleo Icons -->
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css\" rel=\"stylesheet\" />
    <link href=\"https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css\" rel=\"stylesheet\" />
    <!-- Font Awesome Icons -->
    <script src=\"https://kit.fontawesome.com/42d5adcbca.js\" crossorigin=\"anonymous\"></script>
    <!-- CSS Files -->
    <link id=\"pagestyle\" href=\"{{ asset('assets/css/soft-ui-dashboard.css?v=1.1.0') }}\" rel=\"stylesheet\" />
    <!-- RTL CSS -->
    <link id=\"pagestyle\" href=\"{{ asset('assets/css/soft-ui-dashboard-rtl.css?v=1.1.0') }}\" rel=\"stylesheet\" />
{% endblock %}

{% block body %}
<body class=\"g-sidenav-show rtl bg-gray-100\">
  <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3\" id=\"sidenav-main\">
    <div class=\"sidenav-header\">
      <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
      <a class=\"navbar-brand m-0\" href=\"{{ path('app_dashboard') }}\">
        <img src=\"{{ asset('assets/images/logo-ct-dark.png') }}\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
        <span class=\"ms-1 font-weight-bold\">Soft UI Dashboard 3</span>
      </a>
    </div>
    <hr class=\"horizontal dark mt-0\">
    <div class=\"collapse navbar-collapse w-auto\" id=\"sidenav-collapse-main\">
      <ul class=\"navbar-nav\">
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('app_dashboard') }}\">
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
          <a class=\"nav-link\" href=\"{{ path('app_tables') }}\">
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
          <a class=\"nav-link\" href=\"{{ path('app_billing') }}\">
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
        <li class=\"nav-item mt-3\">
          <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link\" href=\"{{ path('app_profile') }}\">
            <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
              <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 46 42\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                <title>customer-support</title>
                <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                  <g transform=\"translate(-1717.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                    <g transform=\"translate(1716.000000, 291.000000)\">
                      <g transform=\"translate(1.000000, 0.000000)\">
                        <path class=\"color-background opacity-6\" d=\"M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z\"></path>
                        <path class=\"color-background\" d=\"M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z\"></path>
                        <path class=\"color-background\" d=\"M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z\"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class=\"nav-link-text ms-1\">Profile</span>
          </a>
        </li>
        <li class=\"nav-item\">
          <a class=\"nav-link active\" href=\"{{ path('app_rtl') }}\">
            <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
              <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                <title>settings</title>
                <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                  <g transform=\"translate(-2020.000000, -442.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                    <g transform=\"translate(1716.000000, 291.000000)\">
                      <g transform=\"translate(304.000000, 151.000000)\">
                        <polygon class=\"color-background opacity-6\" points=\"18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667\"></polygon>
                        <path class=\"color-background\" d=\"M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z\"></path>
                        <path class=\"color-background\" d=\"M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C36.5533333,-1.62166667 40.22,-1.62166667 42.7116667,0.868333333 C45.2033333,3.35833333 45.2033333,7.025 42.7116667,9.515 L33.785,11.285 Z\"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class=\"nav-link-text ms-1\">RTL</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <div class=\"main-content position-relative max-height-vh-100 h-100\">
    <!-- Navbar -->
    <nav class=\"navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2\">
      <div class=\"container-fluid py-1\">
        <nav aria-label=\"breadcrumb\">
          <ol class=\"breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5\">
            <li class=\"breadcrumb-item text-sm\"><a class=\"text-white opacity-5\" href=\"javascript:;\">Pages</a></li>
            <li class=\"breadcrumb-item text-sm text-white active\" aria-current=\"page\">RTL</li>
          </ol>
          <h6 class=\"text-white font-weight-bolder ms-2\">RTL</h6>
        </nav>
        <div class=\"collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2\" id=\"navbar\">
          <div class=\"ms-md-auto pe-md-3 d-flex align-items-center\">
            <div class=\"input-group\">
              <span class=\"input-group-text text-body\"><i class=\"fas fa-search\" aria-hidden=\"true\"></i></span>
              <input type=\"text\" class=\"form-control\" placeholder=\"Type here...\">
            </div>
          </div>
          <ul class=\"navbar-nav justify-content-end\">
            <li class=\"nav-item d-flex align-items-center\">
              <a class=\"btn btn-outline-white btn-sm mb-0 me-3\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
            </li>
            <li class=\"nav-item d-flex align-items-center\">
              <a href=\"javascript:;\" class=\"nav-link text-white font-weight-bold px-0\">
                <i class=\"fa fa-user me-sm-1\"></i>
                <span class=\"d-sm-inline d-none\">Sign In</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class=\"container-fluid py-4\">
      <div class=\"row\">
        <div class=\"col-12\">
          <div class=\"card\">
            <div class=\"card-header pb-0\">
              <div class=\"d-lg-flex\">
                <div>
                  <h5 class=\"mb-0\">All Projects</h5>
                  <p class=\"text-sm mb-0\">
                    RTL support for the dashboard.
                  </p>
                </div>
                <div class=\"ms-auto my-auto mt-lg-0 mt-4\">
                  <div class=\"ms-auto my-auto\">
                    <a href=\"#\" class=\"btn bg-gradient-primary btn-sm mb-0\">+&nbsp; New Project</a>
                    <button type=\"button\" class=\"btn btn-outline-primary btn-sm mb-0\" data-bs-toggle=\"modal\" data-bs-target=\"#import\">
                      Import
                    </button>
                    <div class=\"modal fade\" id=\"import\" tabindex=\"-1\" aria-hidden=\"true\">
                      <div class=\"modal-dialog mt-lg-10\">
                        <div class=\"modal-content\">
                          <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"ModalLabel\">Import CSV</h5>
                            <i class=\"fas fa-upload ms-3\"></i>
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                          </div>
                          <div class=\"modal-body\">
                            <p>You can browse your computer for a file.</p>
                            <input type=\"text\" placeholder=\"Browse file...\" class=\"form-control mb-3\">
                            <div class=\"form-check\">
                              <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"importCheck\" checked=\"\">
                              <label class=\"custom-control-label\" for=\"importCheck\">I accept the terms and conditions</label>
                            </div>
                          </div>
                          <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn bg-gradient-secondary btn-sm\" data-bs-dismiss=\"modal\">Close</button>
                            <button type=\"button\" class=\"btn bg-gradient-primary btn-sm\">Upload</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class=\"btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1\" data-type=\"csv\" type=\"button\" name=\"button\">Export</button>
                  </div>
                </div>
              </div>
            </div>
            <div class=\"card-body px-0 pb-0\">
              <div class=\"table-responsive\">
                <table class=\"table table-flush\" id=\"products-list\">
                  <thead class=\"thead-light\">
                    <tr>
                      <th>Project</th>
                      <th>Budget</th>
                      <th>Status</th>
                      <th>Completion</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck1\" checked>
                          </div>
                          <img class=\"w-10 ms-3\" src=\"{{ asset('assets/images/small-logos/logo-spotify.svg') }}\" alt=\"spotify\">
                          <h6 class=\"ms-3 my-auto\">Spotify</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$2,500</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">working</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 60%\"></div>
                          </div>
                          <span class=\"text-sm\">60%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck2\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"{{ asset('assets/images/small-logos/logo-invision.svg') }}\" alt=\"invision\">
                          <h6 class=\"ms-3 my-auto\">Invision</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$5,000</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">done</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 100%\"></div>
                          </div>
                          <span class=\"text-sm\">100%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck3\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"{{ asset('assets/images/small-logos/logo-slack.svg') }}\" alt=\"slack\">
                          <h6 class=\"ms-3 my-auto\">Slack</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$3,000</td>
                      <td>
                        <span class=\"badge badge-danger badge-sm\">canceled</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-danger\" style=\"width: 0%\"></div>
                          </div>
                          <span class=\"text-sm\">0%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck4\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"{{ asset('assets/images/small-logos/logo-webdev.svg') }}\" alt=\"webdev\">
                          <h6 class=\"ms-3 my-auto\">Webdev</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$14,000</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">working</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 80%\"></div>
                          </div>
                          <span class=\"text-sm\">80%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class=\"d-flex\">
                          <div class=\"form-check my-auto\">
                            <input class=\"form-check-input\" type=\"checkbox\" id=\"customCheck5\">
                          </div>
                          <img class=\"w-10 ms-3\" src=\"{{ asset('assets/images/small-logos/logo-xd.svg') }}\" alt=\"adobe\">
                          <h6 class=\"ms-3 my-auto\">Adobe XD</h6>
                        </div>
                      </td>
                      <td class=\"text-sm\">\$2,300</td>
                      <td>
                        <span class=\"badge badge-success badge-sm\">done</span>
                      </td>
                      <td>
                        <div class=\"d-flex align-items-center\">
                          <div class=\"progress w-50 me-2\" style=\"height: 6px;\">
                            <div class=\"progress-bar bg-success\" style=\"width: 100%\"></div>
                          </div>
                          <span class=\"text-sm\">100%</span>
                        </div>
                      </td>
                      <td class=\"text-sm\">
                        <a href=\"javascript:;\" class=\"mx-3\" data-bs-toggle=\"tooltip\" data-bs-original-title=\"Edit product\">
                          <i class=\"fas fa-user-edit text-secondary\"></i>
                        </a>
                        <span>
                          <i class=\"fas fa-trash text-secondary\"></i>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Project</th>
                      <th>Budget</th>
                      <th>Status</th>
                      <th>Completion</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{% endblock %}

{% block javascripts %}
  <!-- Core JS Files -->
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
{% endblock %} ", "admin_dashborad/rtl.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\admin_dashborad\\rtl.html.twig");
    }
}
