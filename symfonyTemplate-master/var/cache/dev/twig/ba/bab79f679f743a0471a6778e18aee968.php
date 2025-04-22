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

/* Home/index.html.twig */
class __TwigTemplate_d90411cc01f3ed84f2a9be7cc53c6fee extends Template
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
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/index.html.twig", 1);
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

        yield "Home - Soccer";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    <div class=\"hero overlay\" style=\"background-image: url('";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/bg_3.jpg"), "html", null, true);
        yield "');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 ml-auto\">
                    <h1 class=\"text-white\">World Cup Event</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                    <div id=\"date-countdown\"></div>
                    <p>
                        <a href=\"#\" class=\"btn btn-primary py-3 px-4 mr-3\">Book Ticket</a>
                        <a href=\"#\" class=\"more light\">Learn More</a>
                    </p>  
                </div>
            </div>
        </div>
    </div>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"d-flex team-vs\">
                    <span class=\"score\">4-1</span>
                    <div class=\"team-1 w-50\">
                        <div class=\"team-details w-100 text-center\">
                            <img src=\"";
        // line 29
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo_1.png"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                            <h3>LA LEGA <span>(win)</span></h3>
                            <ul class=\"list-unstyled\">
                                <li>Anja Landry (7)</li>
                                <li>Eadie Salinas (12)</li>
                                <li>Ashton Allen (10)</li>
                                <li>Baxter Metcalfe (5)</li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"team-2 w-50\">
                        <div class=\"team-details w-100 text-center\">
                            <img src=\"";
        // line 41
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo_2.png"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                            <h3>JUVENDU <span>(loss)</span></h3>
                            <ul class=\"list-unstyled\">
                                <li>Macauly Green (3)</li>
                                <li>Arham Stark (8)</li>
                                <li>Stephan Murillo (9)</li>
                                <li>Ned Ritter (5)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"latest-news\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12 title-section\">
                    <h2 class=\"heading\">Latest News</h2>
                </div>
            </div>
            <div class=\"row no-gutters\">
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"";
        // line 67
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/img_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Romolu to stay at Real Nadrid?</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/img_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Kai Nets Double To Secure Comfortable Away Win</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"";
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/img_2.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Dogba set for Juvendu return?</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section bg-dark\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6\">
                    <div class=\"widget-next-match\">
                        <div class=\"widget-title\">
                            <h3>Next Match</h3>
                        </div>
                        <div class=\"widget-body mb-3\">
                            <div class=\"widget-vs\">
                                <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                    <div class=\"team-1 text-center\">
                                        <img src=\"";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo_1.png"), "html", null, true);
        yield "\" alt=\"Image\">
                                        <h3>Football League</h3>
                                    </div>
                                    <div>
                                        <span class=\"vs\"><span>VS</span></span>
                                    </div>
                                    <div class=\"team-2 text-center\">
                                        <img src=\"";
        // line 150
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/logo_2.png"), "html", null, true);
        yield "\" alt=\"Image\">
                                        <h3>Soccer</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=\"text-center widget-vs-contents mb-4\">
                            <h4>World Cup League</h4>
                            <p class=\"mb-5\">
                                <span class=\"d-block\">December 20th, 2020</span>
                                <span class=\"d-block\">9:30 AM GMT+0</span>
                                <strong class=\"text-primary\">New Euro Arena</strong>
                            </p>

                            <div id=\"date-countdown2\" class=\"pb-1\"></div>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-6\">
                    <div class=\"widget-next-match\">
                        <table class=\"table custom-table\">
                            <thead>
                                <tr>
                                    <th>P</th>
                                    <th>Team</th>
                                    <th>W</th>
                                    <th>D</th>
                                    <th>L</th>
                                    <th>PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><strong class=\"text-white\">Football League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><strong class=\"text-white\">Soccer</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><strong class=\"text-white\">Juvendo</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><strong class=\"text-white\">French Football League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><strong class=\"text-white\">Legia Abante</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><strong class=\"text-white\">Gliwice League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><strong class=\"text-white\">Cornika</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><strong class=\"text-white\">Gravity Smash</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6 title-section\">
                    <h2 class=\"heading\">Videos</h2>
                </div>
                <div class=\"col-6 text-right\">
                    <div class=\"custom-nav\">
                        <a href=\"#\" class=\"js-custom-prev-v2\"><span class=\"icon-keyboard_arrow_left\"></span></a>
                        <span></span>
                        <a href=\"#\" class=\"js-custom-next-v2\"><span class=\"icon-keyboard_arrow_right\"></span></a>
                    </div>
                </div>
            </div>

            <div class=\"owl-4-slider owl-carousel\">
                ";
        // line 271
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 272
            yield "                    <div class=\"item\">
                        <div class=\"video-media\">
                            <img src=\"";
            // line 274
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("assets/images/img_" . (($context["i"] % 3) + 1)) . ".jpg")), "html", null, true);
            yield "\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <h3 class=\"m-0\">";
            // line 280
            if ((($context["i"] % 3) == 0)) {
                yield "Dogba set for Juvendu return?";
            } elseif ((($context["i"] % 3) == 1)) {
                yield "Kai Nets Double To Secure Comfortable Away Win";
            } else {
                yield "Romolu to stay at Real Nadrid?";
            }
            yield "</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 286
        yield "            </div>
        </div>
    </div>

    <div class=\"container site-section\">
        <div class=\"row\">
            <div class=\"col-6 title-section\">
                <h2 class=\"heading\">Our Blog</h2>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-6\">
                <div class=\"custom-media d-flex\">
                    <div class=\"img mr-4\">
                        <img src=\"";
        // line 300
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/img_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                    </div>
                    <div class=\"text\">
                        <span class=\"meta\">May 20, 2020</span>
                        <h3 class=\"mb-4\"><a href=\"#\">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
                        <p><a href=\"#\">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-6\">
                <div class=\"custom-media d-flex\">
                    <div class=\"img mr-4\">
                        <img src=\"";
        // line 313
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/img_3.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\">
                    </div>
                    <div class=\"text\">
                        <span class=\"meta\">May 20, 2020</span>
                        <h3 class=\"mb-4\"><a href=\"#\">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
                        <p><a href=\"#\">Read more</a></p>
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

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "Home/index.html.twig";
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
        return array (  466 => 313,  450 => 300,  434 => 286,  416 => 280,  407 => 274,  403 => 272,  399 => 271,  275 => 150,  265 => 143,  235 => 116,  225 => 109,  208 => 95,  198 => 88,  181 => 74,  171 => 67,  142 => 41,  127 => 29,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Home - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('assets/images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 ml-auto\">
                    <h1 class=\"text-white\">World Cup Event</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                    <div id=\"date-countdown\"></div>
                    <p>
                        <a href=\"#\" class=\"btn btn-primary py-3 px-4 mr-3\">Book Ticket</a>
                        <a href=\"#\" class=\"more light\">Learn More</a>
                    </p>  
                </div>
            </div>
        </div>
    </div>

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12\">
                <div class=\"d-flex team-vs\">
                    <span class=\"score\">4-1</span>
                    <div class=\"team-1 w-50\">
                        <div class=\"team-details w-100 text-center\">
                            <img src=\"{{ asset('assets/images/logo_1.png') }}\" alt=\"Image\" class=\"img-fluid\">
                            <h3>LA LEGA <span>(win)</span></h3>
                            <ul class=\"list-unstyled\">
                                <li>Anja Landry (7)</li>
                                <li>Eadie Salinas (12)</li>
                                <li>Ashton Allen (10)</li>
                                <li>Baxter Metcalfe (5)</li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"team-2 w-50\">
                        <div class=\"team-details w-100 text-center\">
                            <img src=\"{{ asset('assets/images/logo_2.png') }}\" alt=\"Image\" class=\"img-fluid\">
                            <h3>JUVENDU <span>(loss)</span></h3>
                            <ul class=\"list-unstyled\">
                                <li>Macauly Green (3)</li>
                                <li>Arham Stark (8)</li>
                                <li>Stephan Murillo (9)</li>
                                <li>Ned Ritter (5)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"latest-news\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-12 title-section\">
                    <h2 class=\"heading\">Latest News</h2>
                </div>
            </div>
            <div class=\"row no-gutters\">
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"{{ asset('assets/images/img_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Romolu to stay at Real Nadrid?</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"{{ asset('assets/images/person_1.jpg') }}\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"{{ asset('assets/images/img_3.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Kai Nets Double To Secure Comfortable Away Win</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"{{ asset('assets/images/person_1.jpg') }}\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class=\"col-md-4\">
                    <div class=\"post-entry\">
                        <a href=\"#\">
                            <img src=\"{{ asset('assets/images/img_2.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                        </a>
                        <div class=\"caption\">
                            <div class=\"caption-inner\">
                                <h3 class=\"mb-3\">Dogba set for Juvendu return?</h3>
                                <div class=\"author d-flex align-items-center\">
                                    <div class=\"img mb-2 mr-3\">
                                        <img src=\"{{ asset('assets/images/person_1.jpg') }}\" alt=\"\">
                                    </div>
                                    <div class=\"text\">
                                        <h4>Mellissa Allison</h4>
                                        <span>May 19, 2020 &bullet; Sports</span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section bg-dark\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-6\">
                    <div class=\"widget-next-match\">
                        <div class=\"widget-title\">
                            <h3>Next Match</h3>
                        </div>
                        <div class=\"widget-body mb-3\">
                            <div class=\"widget-vs\">
                                <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                    <div class=\"team-1 text-center\">
                                        <img src=\"{{ asset('assets/images/logo_1.png') }}\" alt=\"Image\">
                                        <h3>Football League</h3>
                                    </div>
                                    <div>
                                        <span class=\"vs\"><span>VS</span></span>
                                    </div>
                                    <div class=\"team-2 text-center\">
                                        <img src=\"{{ asset('assets/images/logo_2.png') }}\" alt=\"Image\">
                                        <h3>Soccer</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class=\"text-center widget-vs-contents mb-4\">
                            <h4>World Cup League</h4>
                            <p class=\"mb-5\">
                                <span class=\"d-block\">December 20th, 2020</span>
                                <span class=\"d-block\">9:30 AM GMT+0</span>
                                <strong class=\"text-primary\">New Euro Arena</strong>
                            </p>

                            <div id=\"date-countdown2\" class=\"pb-1\"></div>
                        </div>
                    </div>
                </div>
                <div class=\"col-lg-6\">
                    <div class=\"widget-next-match\">
                        <table class=\"table custom-table\">
                            <thead>
                                <tr>
                                    <th>P</th>
                                    <th>Team</th>
                                    <th>W</th>
                                    <th>D</th>
                                    <th>L</th>
                                    <th>PTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><strong class=\"text-white\">Football League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><strong class=\"text-white\">Soccer</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><strong class=\"text-white\">Juvendo</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><strong class=\"text-white\">French Football League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><strong class=\"text-white\">Legia Abante</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><strong class=\"text-white\">Gliwice League</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><strong class=\"text-white\">Cornika</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><strong class=\"text-white\">Gravity Smash</strong></td>
                                    <td>22</td>
                                    <td>3</td>
                                    <td>2</td>
                                    <td>140</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6 title-section\">
                    <h2 class=\"heading\">Videos</h2>
                </div>
                <div class=\"col-6 text-right\">
                    <div class=\"custom-nav\">
                        <a href=\"#\" class=\"js-custom-prev-v2\"><span class=\"icon-keyboard_arrow_left\"></span></a>
                        <span></span>
                        <a href=\"#\" class=\"js-custom-next-v2\"><span class=\"icon-keyboard_arrow_right\"></span></a>
                    </div>
                </div>
            </div>

            <div class=\"owl-4-slider owl-carousel\">
                {% for i in 1..6 %}
                    <div class=\"item\">
                        <div class=\"video-media\">
                            <img src=\"{{ asset('assets/images/img_' ~ (i % 3 + 1) ~ '.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <h3 class=\"m-0\">{% if i % 3 == 0 %}Dogba set for Juvendu return?{% elseif i % 3 == 1 %}Kai Nets Double To Secure Comfortable Away Win{% else %}Romolu to stay at Real Nadrid?{% endif %}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>

    <div class=\"container site-section\">
        <div class=\"row\">
            <div class=\"col-6 title-section\">
                <h2 class=\"heading\">Our Blog</h2>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-lg-6\">
                <div class=\"custom-media d-flex\">
                    <div class=\"img mr-4\">
                        <img src=\"{{ asset('assets/images/img_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                    </div>
                    <div class=\"text\">
                        <span class=\"meta\">May 20, 2020</span>
                        <h3 class=\"mb-4\"><a href=\"#\">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
                        <p><a href=\"#\">Read more</a></p>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-6\">
                <div class=\"custom-media d-flex\">
                    <div class=\"img mr-4\">
                        <img src=\"{{ asset('assets/images/img_3.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                    </div>
                    <div class=\"text\">
                        <span class=\"meta\">May 20, 2020</span>
                        <h3 class=\"mb-4\"><a href=\"#\">Romolu to stay at Real Nadrid?</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
                        <p><a href=\"#\">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %} ", "Home/index.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\index.html.twig");
    }
}
