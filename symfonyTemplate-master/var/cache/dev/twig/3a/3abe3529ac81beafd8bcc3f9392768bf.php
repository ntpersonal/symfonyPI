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

/* admin_dashborad/sign-in.html.twig */
class __TwigTemplate_5b664e622549647dc4c50e0dd3113b5c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/sign-in.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_dashborad/sign-in.html.twig"));

        $this->parent = $this->loadTemplate("admin_dashborad/dashboard.html.twig", "admin_dashborad/sign-in.html.twig", 1);
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

        yield "Sign In - Soccer";
        
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
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 17
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

        // line 18
        yield "<body class=\"\">
  <div class=\"container position-sticky z-index-sticky top-0\">
    <div class=\"row\">
      <div class=\"col-12\">
        <!-- Navbar -->
        <nav class=\"navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4\">
          <div class=\"container-fluid pe-0\">
            <a class=\"navbar-brand font-weight-bolder ms-lg-0 ms-3\" href=\"";
        // line 25
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad");
        yield "\">
              Soft UI Dashboard 3
            </a>
            <button class=\"navbar-toggler shadow-none ms-2\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navigation\" aria-controls=\"navigation\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
              <span class=\"navbar-toggler-icon mt-2\">
                <span class=\"navbar-toggler-bar bar1\"></span>
                <span class=\"navbar-toggler-bar bar2\"></span>
                <span class=\"navbar-toggler-bar bar3\"></span>
              </span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navigation\">
              <ul class=\"navbar-nav mx-auto ms-xl-auto me-xl-7\">
                <li class=\"nav-item\">
                  <a class=\"nav-link d-flex align-items-center me-2 active\" aria-current=\"page\" href=\"";
        // line 38
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad");
        yield "\">
                    <i class=\"fa fa-chart-pie opacity-6 text-dark me-1\"></i>
                    Dashboard
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"";
        // line 44
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_profile");
        yield "\">
                    <i class=\"fa fa-user opacity-6 text-dark me-1\"></i>
                    Profile
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_sign_up");
        yield "\">
                    <i class=\"fas fa-user-circle opacity-6 text-dark me-1\"></i>
                    Sign Up
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"";
        // line 56
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_sign_in");
        yield "\">
                    <i class=\"fas fa-key opacity-6 text-dark me-1\"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <li class=\"nav-item d-flex align-items-center\">
                <a class=\"btn btn-round btn-sm mb-0 btn-outline-primary me-2\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
              </li>
              <ul class=\"navbar-nav d-lg-block d-none\">
                <li class=\"nav-item\">
                  <a href=\"https://www.creative-tim.com/product/soft-ui-dashboard\" class=\"btn btn-sm btn-round mb-0 me-1 bg-gradient-dark\">Free download</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class=\"main-content mt-0\">
    <section>
      <div class=\"page-header min-vh-75\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto\">
              <div class=\"card card-plain mt-8\">
                <div class=\"card-header pb-0 text-left bg-transparent\">
                  <h3 class=\"font-weight-bolder text-info text-gradient\">Welcome back</h3>
                  <p class=\"mb-0\">Enter your email and password to sign in</p>
                </div>
                <div class=\"card-body\">
                  <form role=\"form\">
                    <label>Email</label>
                    <div class=\"mb-3\">
                      <input type=\"email\" class=\"form-control\" placeholder=\"Email\" aria-label=\"Email\" aria-describedby=\"email-addon\">
                    </div>
                    <label>Password</label>
                    <div class=\"mb-3\">
                      <input type=\"password\" class=\"form-control\" placeholder=\"Password\" aria-label=\"Password\" aria-describedby=\"password-addon\">
                    </div>
                    <div class=\"form-check form-switch\">
                      <input class=\"form-check-input\" type=\"checkbox\" id=\"rememberMe\" checked=\"\">
                      <label class=\"form-check-label\" for=\"rememberMe\">Remember me</label>
                    </div>
                    <div class=\"text-center\">
                      <button type=\"button\" class=\"btn bg-gradient-info w-100 mt-4 mb-0\">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class=\"card-footer text-center pt-0 px-lg-2 px-1\">
                  <p class=\"mb-4 text-sm mx-auto\">
                    Don't have an account?
                    <a href=\"";
        // line 110
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_sign_up");
        yield "\" class=\"text-info text-gradient font-weight-bold\">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class=\"col-md-6\">
              <div class=\"oblique position-absolute top-0 h-100 d-md-block d-none me-n8\">
                <div class=\"oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6\" style=\"background-image:url('";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/curved-images/curved6.jpg"), "html", null, true);
        yield "')\"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class=\"footer py-5\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-lg-8 mb-4 mx-auto text-center\">
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Company
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            About Us
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Team
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Products
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Blog
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Pricing
          </a>
        </div>
        <div class=\"col-lg-8 mx-auto text-center mb-4 mt-2\">
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-dribbble\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-twitter\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-instagram\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-pinterest\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-github\"></span>
          </a>
        </div>
      </div>
      <div class=\"row\">
        <div class=\"col-8 mx-auto text-center mt-1\">
          <p class=\"mb-0 text-secondary\">
            Copyright © ";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 179
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

        // line 180
        yield "  <!-- Core JS Files -->
  <script src=\"";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/popper.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 182
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/core/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/plugins/perfect-scrollbar.min.js"), "html", null, true);
        yield "\"></script>
  <script src=\"";
        // line 184
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
        // line 197
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
        return "admin_dashborad/sign-in.html.twig";
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
        return array (  376 => 197,  360 => 184,  356 => 183,  352 => 182,  348 => 181,  345 => 180,  332 => 179,  313 => 170,  257 => 117,  247 => 110,  190 => 56,  181 => 50,  172 => 44,  163 => 38,  147 => 25,  138 => 18,  125 => 17,  112 => 14,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin_dashborad/dashboard.html.twig' %}

{% block title %}Sign In - Soccer{% endblock %}

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
{% endblock %}

{% block body %}
<body class=\"\">
  <div class=\"container position-sticky z-index-sticky top-0\">
    <div class=\"row\">
      <div class=\"col-12\">
        <!-- Navbar -->
        <nav class=\"navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4\">
          <div class=\"container-fluid pe-0\">
            <a class=\"navbar-brand font-weight-bolder ms-lg-0 ms-3\" href=\"{{ path('app_admin_dashborad') }}\">
              Soft UI Dashboard 3
            </a>
            <button class=\"navbar-toggler shadow-none ms-2\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navigation\" aria-controls=\"navigation\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
              <span class=\"navbar-toggler-icon mt-2\">
                <span class=\"navbar-toggler-bar bar1\"></span>
                <span class=\"navbar-toggler-bar bar2\"></span>
                <span class=\"navbar-toggler-bar bar3\"></span>
              </span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navigation\">
              <ul class=\"navbar-nav mx-auto ms-xl-auto me-xl-7\">
                <li class=\"nav-item\">
                  <a class=\"nav-link d-flex align-items-center me-2 active\" aria-current=\"page\" href=\"{{ path('app_admin_dashborad') }}\">
                    <i class=\"fa fa-chart-pie opacity-6 text-dark me-1\"></i>
                    Dashboard
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"{{ path('app_admin_dashborad_profile') }}\">
                    <i class=\"fa fa-user opacity-6 text-dark me-1\"></i>
                    Profile
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"{{ path('app_admin_dashborad_sign_up') }}\">
                    <i class=\"fas fa-user-circle opacity-6 text-dark me-1\"></i>
                    Sign Up
                  </a>
                </li>
                <li class=\"nav-item\">
                  <a class=\"nav-link me-2\" href=\"{{ path('app_admin_dashborad_sign_in') }}\">
                    <i class=\"fas fa-key opacity-6 text-dark me-1\"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <li class=\"nav-item d-flex align-items-center\">
                <a class=\"btn btn-round btn-sm mb-0 btn-outline-primary me-2\" target=\"_blank\" href=\"https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard\">Online Builder</a>
              </li>
              <ul class=\"navbar-nav d-lg-block d-none\">
                <li class=\"nav-item\">
                  <a href=\"https://www.creative-tim.com/product/soft-ui-dashboard\" class=\"btn btn-sm btn-round mb-0 me-1 bg-gradient-dark\">Free download</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class=\"main-content mt-0\">
    <section>
      <div class=\"page-header min-vh-75\">
        <div class=\"container\">
          <div class=\"row\">
            <div class=\"col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto\">
              <div class=\"card card-plain mt-8\">
                <div class=\"card-header pb-0 text-left bg-transparent\">
                  <h3 class=\"font-weight-bolder text-info text-gradient\">Welcome back</h3>
                  <p class=\"mb-0\">Enter your email and password to sign in</p>
                </div>
                <div class=\"card-body\">
                  <form role=\"form\">
                    <label>Email</label>
                    <div class=\"mb-3\">
                      <input type=\"email\" class=\"form-control\" placeholder=\"Email\" aria-label=\"Email\" aria-describedby=\"email-addon\">
                    </div>
                    <label>Password</label>
                    <div class=\"mb-3\">
                      <input type=\"password\" class=\"form-control\" placeholder=\"Password\" aria-label=\"Password\" aria-describedby=\"password-addon\">
                    </div>
                    <div class=\"form-check form-switch\">
                      <input class=\"form-check-input\" type=\"checkbox\" id=\"rememberMe\" checked=\"\">
                      <label class=\"form-check-label\" for=\"rememberMe\">Remember me</label>
                    </div>
                    <div class=\"text-center\">
                      <button type=\"button\" class=\"btn bg-gradient-info w-100 mt-4 mb-0\">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class=\"card-footer text-center pt-0 px-lg-2 px-1\">
                  <p class=\"mb-4 text-sm mx-auto\">
                    Don't have an account?
                    <a href=\"{{ path('app_admin_dashborad_sign_up') }}\" class=\"text-info text-gradient font-weight-bold\">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class=\"col-md-6\">
              <div class=\"oblique position-absolute top-0 h-100 d-md-block d-none me-n8\">
                <div class=\"oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6\" style=\"background-image:url('{{ asset('assets/images/curved-images/curved6.jpg') }}')\"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class=\"footer py-5\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"col-lg-8 mb-4 mx-auto text-center\">
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Company
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            About Us
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Team
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Products
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Blog
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-5 me-3 mb-sm-0 mb-2\">
            Pricing
          </a>
        </div>
        <div class=\"col-lg-8 mx-auto text-center mb-4 mt-2\">
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-dribbble\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-twitter\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-instagram\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-pinterest\"></span>
          </a>
          <a href=\"javascript:;\" target=\"_blank\" class=\"text-secondary me-xl-4 me-4\">
            <span class=\"text-lg fab fa-github\"></span>
          </a>
        </div>
      </div>
      <div class=\"row\">
        <div class=\"col-8 mx-auto text-center mt-1\">
          <p class=\"mb-0 text-secondary\">
            Copyright © {{ \"now\"|date(\"Y\") }} Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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
{% endblock %} ", "admin_dashborad/sign-in.html.twig", "C:\\Users\\arijm\\Downloads\\symfonyTemplate-master-yes\\symfonyTemplate-master\\templates\\admin_dashborad\\sign-in.html.twig");
    }
}
