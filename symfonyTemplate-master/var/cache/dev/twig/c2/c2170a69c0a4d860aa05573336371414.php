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

/* Home/base.html.twig */
class __TwigTemplate_088e6980213043589186642b90e13d25 extends Template
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

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>";
        // line 4
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- CSS -->
    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/fonts/icomoon/style.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/bootstrap/bootstrap.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/jquery-ui.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/owl.carousel.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/owl.theme.default.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/jquery.fancybox.min.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/bootstrap-datepicker.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/fonts/flaticon/font/flaticon.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/aos.css"), "html", null, true);
        yield "\">
    <link rel=\"stylesheet\" href=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/css/style.css"), "html", null, true);
        yield "\">

    ";
        // line 21
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 22
        yield "</head>

<body>
    <div class=\"site-wrap\">
        ";
        // line 26
        yield from $this->unwrap()->yieldBlock('header', $context, $blocks);
        // line 62
        yield "
        ";
        // line 63
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 64
        yield "
        ";
        // line 65
        yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        // line 130
        yield "    </div>

    <!-- JavaScript -->
    <script src=\"";
        // line 133
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-3.3.1.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 134
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-migrate-3.0.1.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery-ui.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 136
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/popper.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 137
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/bootstrap.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 138
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/owl.carousel.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery.stellar.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 140
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery.countdown.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 141
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/bootstrap-datepicker.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 142
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery.easing.1.3.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/aos.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery.fancybox.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 145
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/jquery.sticky.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 146
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/js/main.js"), "html", null, true);
        yield "\"></script>

    ";
        // line 148
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 149
        yield "</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
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

        yield "Soccer &mdash; Website by Colorlib";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 21
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 26
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 27
        yield "        <div class=\"site-mobile-menu site-navbar-target\">
            <div class=\"site-mobile-menu-header\">
                <div class=\"site-mobile-menu-close\">
                    <span class=\"icon-close2 js-menu-toggle\"></span>
                </div>
            </div>
            <div class=\"site-mobile-menu-body\"></div>
        </div>

        <header class=\"site-navbar py-4\" role=\"banner\">
            <div class=\"container\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"site-logo\">
                        <a href=\"";
        // line 40
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                            <img src=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo.png"), "html", null, true);
        yield "\" alt=\"Logo\">
                        </a>
                    </div>
                    <div class=\"ml-auto\">
                        <nav class=\"site-navigation position-relative text-right\" role=\"navigation\">
                            <ul class=\"site-menu main-menu js-clone-nav mr-auto d-none d-lg-block\">
                                <li class=\"active\"><a href=\"";
        // line 47
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"nav-link\">Home</a></li>
                                <li><a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_matches");
        yield "\" class=\"nav-link\">Matches</a></li>
                                <li><a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_players");
        yield "\" class=\"nav-link\">Players</a></li>
                                <li><a href=\"";
        // line 50
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_blog");
        yield "\" class=\"nav-link\">Blog</a></li>
                                <li><a href=\"";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_contact");
        yield "\" class=\"nav-link\">Contact</a></li>
                            </ul>
                        </nav>
                        <a href=\"#\" class=\"d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white\">
                            <span class=\"icon-menu h3 text-white\"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 63
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 66
        yield "        <footer class=\"footer-section\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>News</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">All</a></li>
                                <li><a href=\"#\">Club News</a></li>
                                <li><a href=\"#\">Media Center</a></li>
                                <li><a href=\"#\">Video</a></li>
                                <li><a href=\"#\">RSS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Tickets</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Online Ticket</a></li>
                                <li><a href=\"#\">Payment and Prices</a></li>
                                <li><a href=\"#\">Contact &amp; Booking</a></li>
                                <li><a href=\"#\">Tickets</a></li>
                                <li><a href=\"#\">Coupon</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Matches</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Standings</a></li>
                                <li><a href=\"#\">World Cup</a></li>
                                <li><a href=\"#\">La Lega</a></li>
                                <li><a href=\"#\">Hyper Cup</a></li>
                                <li><a href=\"#\">World League</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Social</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Twitter</a></li>
                                <li><a href=\"#\">Facebook</a></li>
                                <li><a href=\"#\">Instagram</a></li>
                                <li><a href=\"#\">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"row text-center\">
                    <div class=\"col-md-12\">
                        <div class=\" pt-5\">
                            <p>
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class=\"icon-heart\" aria-hidden=\"true\"></i> by <a href=\"https://colorlib.com\" target=\"_blank\">Colorlib</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 148
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Home/base.html.twig";
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
        return array (  438 => 148,  364 => 66,  351 => 65,  329 => 63,  307 => 51,  303 => 50,  299 => 49,  295 => 48,  291 => 47,  282 => 41,  278 => 40,  263 => 27,  250 => 26,  228 => 21,  205 => 4,  193 => 149,  191 => 148,  186 => 146,  182 => 145,  178 => 144,  174 => 143,  170 => 142,  166 => 141,  162 => 140,  158 => 139,  154 => 138,  150 => 137,  146 => 136,  142 => 135,  138 => 134,  134 => 133,  129 => 130,  127 => 65,  124 => 64,  122 => 63,  119 => 62,  117 => 26,  111 => 22,  109 => 21,  104 => 19,  100 => 18,  96 => 17,  92 => 16,  88 => 15,  84 => 14,  80 => 13,  76 => 12,  72 => 11,  68 => 10,  59 => 4,  54 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>{% block title %}Soccer &mdash; Website by Colorlib{% endblock %}</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">

    <!-- CSS -->
    <link href=\"https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/fonts/icomoon/style.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/bootstrap/bootstrap.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/jquery-ui.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/owl.carousel.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/owl.theme.default.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/jquery.fancybox.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/bootstrap-datepicker.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/fonts/flaticon/font/flaticon.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/aos.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('assets/css/style.css') }}\">

    {% block stylesheets %}{% endblock %}
</head>

<body>
    <div class=\"site-wrap\">
        {% block header %}
        <div class=\"site-mobile-menu site-navbar-target\">
            <div class=\"site-mobile-menu-header\">
                <div class=\"site-mobile-menu-close\">
                    <span class=\"icon-close2 js-menu-toggle\"></span>
                </div>
            </div>
            <div class=\"site-mobile-menu-body\"></div>
        </div>

        <header class=\"site-navbar py-4\" role=\"banner\">
            <div class=\"container\">
                <div class=\"d-flex align-items-center\">
                    <div class=\"site-logo\">
                        <a href=\"{{ path('app_home') }}\">
                            <img src=\"{{ asset('assets/images/logo.png') }}\" alt=\"Logo\">
                        </a>
                    </div>
                    <div class=\"ml-auto\">
                        <nav class=\"site-navigation position-relative text-right\" role=\"navigation\">
                            <ul class=\"site-menu main-menu js-clone-nav mr-auto d-none d-lg-block\">
                                <li class=\"active\"><a href=\"{{ path('app_home') }}\" class=\"nav-link\">Home</a></li>
                                <li><a href=\"{{ path('app_matches') }}\" class=\"nav-link\">Matches</a></li>
                                <li><a href=\"{{ path('app_players') }}\" class=\"nav-link\">Players</a></li>
                                <li><a href=\"{{ path('app_blog') }}\" class=\"nav-link\">Blog</a></li>
                                <li><a href=\"{{ path('app_contact') }}\" class=\"nav-link\">Contact</a></li>
                            </ul>
                        </nav>
                        <a href=\"#\" class=\"d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white\">
                            <span class=\"icon-menu h3 text-white\"></span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        {% endblock %}

        {% block body %}{% endblock %}

        {% block footer %}
        <footer class=\"footer-section\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>News</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">All</a></li>
                                <li><a href=\"#\">Club News</a></li>
                                <li><a href=\"#\">Media Center</a></li>
                                <li><a href=\"#\">Video</a></li>
                                <li><a href=\"#\">RSS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Tickets</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Online Ticket</a></li>
                                <li><a href=\"#\">Payment and Prices</a></li>
                                <li><a href=\"#\">Contact &amp; Booking</a></li>
                                <li><a href=\"#\">Tickets</a></li>
                                <li><a href=\"#\">Coupon</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Matches</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Standings</a></li>
                                <li><a href=\"#\">World Cup</a></li>
                                <li><a href=\"#\">La Lega</a></li>
                                <li><a href=\"#\">Hyper Cup</a></li>
                                <li><a href=\"#\">World League</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-lg-3\">
                        <div class=\"widget mb-3\">
                            <h3>Social</h3>
                            <ul class=\"list-unstyled links\">
                                <li><a href=\"#\">Twitter</a></li>
                                <li><a href=\"#\">Facebook</a></li>
                                <li><a href=\"#\">Instagram</a></li>
                                <li><a href=\"#\">Youtube</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class=\"row text-center\">
                    <div class=\"col-md-12\">
                        <div class=\" pt-5\">
                            <p>
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class=\"icon-heart\" aria-hidden=\"true\"></i> by <a href=\"https://colorlib.com\" target=\"_blank\">Colorlib</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {% endblock %}
    </div>

    <!-- JavaScript -->
    <script src=\"{{ asset('assets/js/jquery-3.3.1.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery-ui.js') }}\"></script>
    <script src=\"{{ asset('assets/js/popper.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/bootstrap.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/owl.carousel.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery.stellar.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery.countdown.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/bootstrap-datepicker.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery.easing.1.3.js') }}\"></script>
    <script src=\"{{ asset('assets/js/aos.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery.fancybox.min.js') }}\"></script>
    <script src=\"{{ asset('assets/js/jquery.sticky.js') }}\"></script>
    <script src=\"{{ asset('assets/js/main.js') }}\"></script>

    {% block javascripts %}{% endblock %}
</body>
</html>", "Home/base.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\base.html.twig");
    }
}
