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

/* order/index.html.twig */
class __TwigTemplate_b0f7980486df2f041405b669534be2ea extends Template
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
            'body' => [$this, 'block_body'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "order/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "order/index.html.twig"));

        $this->parent = $this->loadTemplate("admin_dashborad/dashboard.html.twig", "order/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-lg-3\">
            <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 \" id=\"sidenav-main\">
                <div class=\"sidenav-header\">
                  <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
                  <a class=\"navbar-brand m-0\" href=\"https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html\" target=\"_blank\">
                    <img src=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo-ct-dark.png"), "html", null, true);
        yield "\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
                    <span class=\"ms-1 font-weight-bold\">Sportify</span>
                  </a>
                </div>
                <hr class=\"horizontal dark mt-0\">
                <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
                  <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad");
        yield "\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" xmlns=\"http://www.w3.org/2000/svg\">
                            <title>box</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-2319.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(603.000000, 0.000000)\">
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
                      <a class=\"nav-link \" href=\"";
        // line 39
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
                        <span class=\"nav-link-text ms-1\">Teams</span>
                      </a>
                    </li>
                    <li class=\"nav-item\">
                       <a class=\"nav-link \" href=\"";
        // line 59
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_billing");
        yield "\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>credit-card</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(453.000000, 454.000000)\">
                                     <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                                    <path class=\"color-background\" d=\"M22.5,28.125 L0,15.625 L0,37.5 L22.5,50 L45,37.5 L45,15.625 L22.5,28.125 Z\"></path>
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
                        <a class=\"nav-link\" href=\"";
        // line 79
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("product_index");
        yield "\">
                          <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" xmlns=\"http://www.w3.org/2000/svg\">
                              <title>orders</title>
                              <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                                <g transform=\"translate(-1869.000000, -293.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                  <g transform=\"translate(1716.000000, 291.000000)\">
                                    <g transform=\"translate(153.000000, 2.000000)\">
                                        <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                                        <path class=\"color-background\" d=\"M22.5,28.125 L0,15.625 L0,37.5 L22.5,50 L45,37.5 L45,15.625 L22.5,28.125 Z\"></path>
                                      </g>
                                  </g>
                                </g>
                              </g>
                            </svg>
                          </div>
                          <span class=\"nav-link-text ms-1\">Product</span>
                        </a>
                      </li>
                    
                      <li class=\"nav-item\">
                        <a class=\"nav-link active\" href=\"";
        // line 100
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_index");
        yield "\">
                          <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 45 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                              <title>shop </title>
                              <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                                <g transform=\"translate(-1716.000000, -439.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                  <g transform=\"translate(1716.000000, 291.000000)\">
                                    <g transform=\"translate(0.000000, 148.000000)\">
                                        <path class=\"color-background opacity-6\" d=\"M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z\"></path>
                                        <path class=\"color-background\" d=\"M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z\"></path>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </svg>
                          </div>
                          <span class=\"nav-link-text ms-1\">Orders</span>
                        </a>
                      </li>
                    <li class=\"nav-item mt-3\">
                      <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
                    </li>
                    <li class=\"nav-item\">
                       <a class=\"nav-link \" href=\"";
        // line 123
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_profile");
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
                       <a class=\"nav-link \" href=\"";
        // line 144
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_sign_in");
        yield "\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 40 44\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>document</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-1870.000000, -591.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(154.000000, 300.000000)\">
                                    <path class=\"color-background opacity-6\" d=\"M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z\"></path>
                                    <path class=\"color-background\" d=\"M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z\"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <span class=\"nav-link-text ms-1\">Sign In</span>
                      </a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link \" href=\"";
        // line 164
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin_dashborad_sign_up");
        yield "\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"20px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>spaceship</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-1720.000000, -592.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(4.000000, 301.000000)\">
                                    <path class=\"color-background\" d=\"M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z\"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <span class=\"nav-link-text ms-1\">Sign Up</span>
                      </a>
                    </li>
                  </ul>
                </div>
                
              </aside>
        </div>
        <div class=\"col-lg-9\">
    <div class=\"d-flex justify-content-end mb-3\">
        <a href=\"";
        // line 192
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_new");
        yield "\" class=\"btn btn-primary\">Create New Order</a>
    </div>
    ";
        // line 194
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new RuntimeError('Variable "orders" does not exist.', 194, $this->source); })()))) {
            // line 195
            yield "        <div class=\"alert alert-warning text-center\">
            ";
            // line 196
            yield (((array_key_exists("message", $context) &&  !(null === $context["message"]))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true)) : ("No orders available."));
            yield "
        </div>
    ";
        } else {
            // line 199
            yield "        <div class=\"card\">
            <div class=\"card-header pb-0\">
                <h6>All Orders</h6>
            </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
                <div class=\"table-responsive p-0\">
                    <table class=\"table align-items-center mb-0\">
                        <thead>
                            <tr>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Order ID</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">User ID</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Quantity</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Product</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ";
            // line 217
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new RuntimeError('Variable "orders" does not exist.', 217, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 218
                yield "                                <tr>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 220
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 220), "html", null, true);
                yield "</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 223
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "idUser", [], "any", false, false, false, 223), "html", null, true);
                yield "</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 226
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 226), "Y-m-d H:i"), "html", null, true);
                yield "</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 229
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "quantityOrder", [], "any", false, false, false, 229), "html", null, true);
                yield "</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">";
                // line 232
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, true, false, 232), "nameproduct", [], "any", true, true, false, 232) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 232), "nameproduct", [], "any", false, false, false, 232)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 232), "nameproduct", [], "any", false, false, false, 232), "html", null, true)) : ("N/A"));
                yield "</p>
                                    </td>
                                    <td class=\"align-middle\">
                                        <a href=\"";
                // line 235
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 235)]), "html", null, true);
                yield "\" class=\"btn btn-warning btn-sm\">Edit</a>
                                        <form method=\"post\" action=\"";
                // line 236
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 236)]), "html", null, true);
                yield "\" style=\"display:inline-block;\">
                                            <input type=\"hidden\" name=\"_token\" value=\"";
                // line 237
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 237))), "html", null, true);
                yield "\">
                                            <button class=\"btn btn-danger btn-sm\">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['order'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 243
            yield "                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class=\"row mt-4\">
            ";
            // line 250
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["orders"]) || array_key_exists("orders", $context) ? $context["orders"] : (function () { throw new RuntimeError('Variable "orders" does not exist.', 250, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 251
                yield "                <div class=\"col-md-4\">
                    <div class=\"card shadow border-radius-md h-100\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-primary\">Order #";
                // line 254
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 254), "html", null, true);
                yield "</h5>
                            <p class=\"card-text\">
                                <strong>User ID:</strong> ";
                // line 256
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "idUser", [], "any", false, false, false, 256), "html", null, true);
                yield "<br>
                                <strong>Date:</strong> ";
                // line 257
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "date", [], "any", false, false, false, 257), "Y-m-d H:i"), "html", null, true);
                yield "<br>
                                <strong>Quantity:</strong> ";
                // line 258
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["order"], "quantityOrder", [], "any", false, false, false, 258), "html", null, true);
                yield "<br>
                                <strong>Product:</strong> ";
                // line 259
                yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, true, false, 259), "nameproduct", [], "any", true, true, false, 259) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 259), "nameproduct", [], "any", false, false, false, 259)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["order"], "product", [], "any", false, false, false, 259), "nameproduct", [], "any", false, false, false, 259), "html", null, true)) : ("N/A"));
                yield "
                            </p>
                            <div class=\"d-flex justify-content-between\">
                                <a href=\"";
                // line 262
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 262)]), "html", null, true);
                yield "\" class=\"btn btn-warning btn-sm\">Edit</a>
                                <form method=\"post\" action=\"";
                // line 263
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("order_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 263)]), "html", null, true);
                yield "\" style=\"display:inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 264
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["order"], "id", [], "any", false, false, false, 264))), "html", null, true);
                yield "\">
                                    <button class=\"btn btn-danger btn-sm\">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['order'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 272
            yield "        </div>
    ";
        }
        // line 274
        yield "</div>
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
        return "order/index.html.twig";
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
        return array (  454 => 274,  450 => 272,  436 => 264,  432 => 263,  428 => 262,  422 => 259,  418 => 258,  414 => 257,  410 => 256,  405 => 254,  400 => 251,  396 => 250,  387 => 243,  375 => 237,  371 => 236,  367 => 235,  361 => 232,  355 => 229,  349 => 226,  343 => 223,  337 => 220,  333 => 218,  329 => 217,  309 => 199,  303 => 196,  300 => 195,  298 => 194,  293 => 192,  262 => 164,  239 => 144,  215 => 123,  189 => 100,  165 => 79,  142 => 59,  119 => 39,  96 => 19,  85 => 11,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin_dashborad/dashboard.html.twig' %}

{% block body %}
<div class=\"container-fluid py-4\">
    <div class=\"row\">
        <div class=\"col-lg-3\">
            <aside class=\"sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 \" id=\"sidenav-main\">
                <div class=\"sidenav-header\">
                  <i class=\"fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none\" aria-hidden=\"true\" id=\"iconSidenav\"></i>
                  <a class=\"navbar-brand m-0\" href=\"https://demos.creative-tim.com/soft-ui-dashboard/pages/dashboard.html\" target=\"_blank\">
                    <img src=\"{{ asset('assets/images/logo-ct-dark.png') }}\" class=\"navbar-brand-img h-100\" alt=\"main_logo\">
                    <span class=\"ms-1 font-weight-bold\">Sportify</span>
                  </a>
                </div>
                <hr class=\"horizontal dark mt-0\">
                <div class=\"collapse navbar-collapse  w-auto \" id=\"sidenav-collapse-main\">
                  <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                      <a class=\"nav-link\" href=\"{{ path('app_admin_dashborad') }}\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" xmlns=\"http://www.w3.org/2000/svg\">
                            <title>box</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-2319.000000, -291.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(603.000000, 0.000000)\">
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
                      <a class=\"nav-link \" href=\"{{ path('app_admin_dashborad_tables') }}\">
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
                        <span class=\"nav-link-text ms-1\">Teams</span>
                      </a>
                    </li>
                    <li class=\"nav-item\">
                       <a class=\"nav-link \" href=\"{{ path('app_admin_dashborad_billing') }}\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 43 36\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>credit-card</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-2169.000000, -745.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(453.000000, 454.000000)\">
                                     <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                                    <path class=\"color-background\" d=\"M22.5,28.125 L0,15.625 L0,37.5 L22.5,50 L45,37.5 L45,15.625 L22.5,28.125 Z\"></path>
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
                        <a class=\"nav-link\" href=\"{{ path('product_index') }}\">
                          <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 42 42\" xmlns=\"http://www.w3.org/2000/svg\">
                              <title>orders</title>
                              <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                                <g transform=\"translate(-1869.000000, -293.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                  <g transform=\"translate(1716.000000, 291.000000)\">
                                    <g transform=\"translate(153.000000, 2.000000)\">
                                        <path class=\"color-background opacity-6\" d=\"M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z\"></path>
                                        <path class=\"color-background\" d=\"M22.5,28.125 L0,15.625 L0,37.5 L22.5,50 L45,37.5 L45,15.625 L22.5,28.125 Z\"></path>
                                      </g>
                                  </g>
                                </g>
                              </g>
                            </svg>
                          </div>
                          <span class=\"nav-link-text ms-1\">Product</span>
                        </a>
                      </li>
                    
                      <li class=\"nav-item\">
                        <a class=\"nav-link active\" href=\"{{ path('order_index') }}\">
                          <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                            <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 45 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                              <title>shop </title>
                              <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                                <g transform=\"translate(-1716.000000, -439.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                  <g transform=\"translate(1716.000000, 291.000000)\">
                                    <g transform=\"translate(0.000000, 148.000000)\">
                                        <path class=\"color-background opacity-6\" d=\"M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z\"></path>
                                        <path class=\"color-background\" d=\"M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z\"></path>
                                    </g>
                                  </g>
                                </g>
                              </g>
                            </svg>
                          </div>
                          <span class=\"nav-link-text ms-1\">Orders</span>
                        </a>
                      </li>
                    <li class=\"nav-item mt-3\">
                      <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Account pages</h6>
                    </li>
                    <li class=\"nav-item\">
                       <a class=\"nav-link \" href=\"{{ path('app_admin_dashborad_profile') }}\">
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
                       <a class=\"nav-link \" href=\"{{ path('app_admin_dashborad_sign_in') }}\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"12px\" viewBox=\"0 0 40 44\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>document</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-1870.000000, -591.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(154.000000, 300.000000)\">
                                    <path class=\"color-background opacity-6\" d=\"M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z\"></path>
                                    <path class=\"color-background\" d=\"M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z\"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <span class=\"nav-link-text ms-1\">Sign In</span>
                      </a>
                    </li>
                    <li class=\"nav-item\">
                      <a class=\"nav-link \" href=\"{{ path('app_admin_dashborad_sign_up') }}\">
                        <div class=\"icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center\">
                          <svg width=\"12px\" height=\"20px\" viewBox=\"0 0 40 40\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\">
                            <title>spaceship</title>
                            <g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\">
                              <g transform=\"translate(-1720.000000, -592.000000)\" fill=\"#FFFFFF\" fill-rule=\"nonzero\">
                                <g transform=\"translate(1716.000000, 291.000000)\">
                                  <g transform=\"translate(4.000000, 301.000000)\">
                                    <path class=\"color-background\" d=\"M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z\"></path>
                                    <path class=\"color-background opacity-6\" d=\"M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z\"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <span class=\"nav-link-text ms-1\">Sign Up</span>
                      </a>
                    </li>
                  </ul>
                </div>
                
              </aside>
        </div>
        <div class=\"col-lg-9\">
    <div class=\"d-flex justify-content-end mb-3\">
        <a href=\"{{ path('order_new') }}\" class=\"btn btn-primary\">Create New Order</a>
    </div>
    {% if orders is empty %}
        <div class=\"alert alert-warning text-center\">
            {{ message ?? 'No orders available.' }}
        </div>
    {% else %}
        <div class=\"card\">
            <div class=\"card-header pb-0\">
                <h6>All Orders</h6>
            </div>
            <div class=\"card-body px-0 pt-0 pb-2\">
                <div class=\"table-responsive p-0\">
                    <table class=\"table align-items-center mb-0\">
                        <thead>
                            <tr>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Order ID</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">User ID</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Date</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Quantity</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Product</th>
                                <th class=\"text-uppercase text-secondary text-xxs font-weight-bolder opacity-7\">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {% for order in orders %}
                                <tr>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">{{ order.id }}</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">{{ order.idUser }}</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">{{ order.date|date('Y-m-d H:i') }}</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">{{ order.quantityOrder }}</p>
                                    </td>
                                    <td>
                                        <p class=\"text-xs font-weight-bold mb-0\">{{ order.product.nameproduct ?? 'N/A' }}</p>
                                    </td>
                                    <td class=\"align-middle\">
                                        <a href=\"{{ path('order_edit', { id: order.id }) }}\" class=\"btn btn-warning btn-sm\">Edit</a>
                                        <form method=\"post\" action=\"{{ path('order_delete', { id: order.id }) }}\" style=\"display:inline-block;\">
                                            <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ order.id) }}\">
                                            <button class=\"btn btn-danger btn-sm\">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            {% endfor %}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class=\"row mt-4\">
            {% for order in orders %}
                <div class=\"col-md-4\">
                    <div class=\"card shadow border-radius-md h-100\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title text-primary\">Order #{{ order.id }}</h5>
                            <p class=\"card-text\">
                                <strong>User ID:</strong> {{ order.idUser }}<br>
                                <strong>Date:</strong> {{ order.date|date('Y-m-d H:i') }}<br>
                                <strong>Quantity:</strong> {{ order.quantityOrder }}<br>
                                <strong>Product:</strong> {{ order.product.nameproduct ?? 'N/A' }}
                            </p>
                            <div class=\"d-flex justify-content-between\">
                                <a href=\"{{ path('order_edit', { id: order.id }) }}\" class=\"btn btn-warning btn-sm\">Edit</a>
                                <form method=\"post\" action=\"{{ path('order_delete', { id: order.id }) }}\" style=\"display:inline-block;\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ order.id) }}\">
                                    <button class=\"btn btn-danger btn-sm\">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>
    {% endif %}
</div>
{% endblock %}
", "order/index.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\order\\index.html.twig");
    }
}
