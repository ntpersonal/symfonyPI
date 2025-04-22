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

/* Home/matches.html.twig */
class __TwigTemplate_79b8857c9fc7436f5ff8385736416fb9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/matches.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/matches.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/matches.html.twig", 1);
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

        yield "Matches - Soccer";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/bg_3.jpg"), "html", null, true);
        yield "');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 mx-auto text-center\">
                    <h1 class=\"text-white\">Matches</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
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
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_1.png"), "html", null, true);
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
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_2.png"), "html", null, true);
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

    <div class=\"site-section bg-dark\">
        <div class=\"container\">
            <div class=\"row mb-5\">
                <div class=\"col-lg-12\">
                    <div class=\"widget-next-match\">
                        <div class=\"widget-title\">
                            <h3>Next Match</h3>
                        </div>
                        <div class=\"widget-body mb-3\">
                            <div class=\"widget-vs\">
                                <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                    <div class=\"team-1 text-center\">
                                        <img src=\"";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_1.png"), "html", null, true);
        yield "\" alt=\"Image\">
                                        <h3>Football League</h3>
                                    </div>
                                    <div>
                                        <span class=\"vs\"><span>VS</span></span>
                                    </div>
                                    <div class=\"team-2 text-center\">
                                        <img src=\"";
        // line 70
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/logo_2.png"), "html", null, true);
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
            </div>

            <div class=\"row\">
                <div class=\"col-12 title-section\">
                    <h2 class=\"heading\">Upcoming Match</h2>
                </div>
                ";
        // line 95
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 96
            yield "                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"bg-light p-4 rounded\">
                            <div class=\"widget-body\">
                                <div class=\"widget-vs\">
                                    <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                        <div class=\"team-1 text-center\">
                                            <img src=\"";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/logo_" . (((($context["i"] % 2) == 0)) ? ("3") : ("1"))) . ".png")), "html", null, true);
            yield "\" alt=\"Image\">
                                            <h3>Football League</h3>
                                        </div>
                                        <div>
                                            <span class=\"vs\"><span>VS</span></span>
                                        </div>
                                        <div class=\"team-2 text-center\">
                                            <img src=\"";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/logo_" . (((($context["i"] % 2) == 0)) ? ("4") : ("2"))) . ".png")), "html", null, true);
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
                            </div>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 127
        yield "            </div>
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
        // line 147
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 148
            yield "                    <div class=\"item\">
                        <div class=\"video-media\">
                            <img src=\"";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/img_" . (($context["i"] % 3) + 1)) . ".jpg")), "html", null, true);
            yield "\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <h3 class=\"m-0\">
                                        ";
            // line 157
            if ((($context["i"] % 3) == 0)) {
                // line 158
                yield "                                            Romolu to stay at Real Nadrid?
                                        ";
            } elseif (((            // line 159
$context["i"] % 3) == 1)) {
                // line 160
                yield "                                            Dogba set for Juvendu return?
                                        ";
            } else {
                // line 162
                yield "                                            Kai Nets Double To Secure Comfortable Away Win
                                        ";
            }
            // line 164
            yield "                                    </h3>
                                </div>
                            </a>
                        </div>
                    </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 170
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
            ";
        // line 181
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 182
            yield "                <div class=\"col-lg-6\">
                    <div class=\"custom-media d-flex\">
                        <div class=\"img mr-4\">
                            <img src=\"";
            // line 185
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/img_" . (((($context["i"] % 2) == 0)) ? ("3") : ("1"))) . ".jpg")), "html", null, true);
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
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        yield "        </div>
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
        return "Home/matches.html.twig";
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
        return array (  356 => 196,  339 => 185,  334 => 182,  330 => 181,  317 => 170,  306 => 164,  302 => 162,  298 => 160,  296 => 159,  293 => 158,  291 => 157,  281 => 150,  277 => 148,  273 => 147,  251 => 127,  227 => 109,  217 => 102,  209 => 96,  205 => 95,  177 => 70,  167 => 63,  137 => 36,  122 => 24,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Matches - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 mx-auto text-center\">
                    <h1 class=\"text-white\">Matches</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
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
                            <img src=\"{{ asset('images/logo_1.png') }}\" alt=\"Image\" class=\"img-fluid\">
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
                            <img src=\"{{ asset('images/logo_2.png') }}\" alt=\"Image\" class=\"img-fluid\">
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

    <div class=\"site-section bg-dark\">
        <div class=\"container\">
            <div class=\"row mb-5\">
                <div class=\"col-lg-12\">
                    <div class=\"widget-next-match\">
                        <div class=\"widget-title\">
                            <h3>Next Match</h3>
                        </div>
                        <div class=\"widget-body mb-3\">
                            <div class=\"widget-vs\">
                                <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                    <div class=\"team-1 text-center\">
                                        <img src=\"{{ asset('images/logo_1.png') }}\" alt=\"Image\">
                                        <h3>Football League</h3>
                                    </div>
                                    <div>
                                        <span class=\"vs\"><span>VS</span></span>
                                    </div>
                                    <div class=\"team-2 text-center\">
                                        <img src=\"{{ asset('images/logo_2.png') }}\" alt=\"Image\">
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
            </div>

            <div class=\"row\">
                <div class=\"col-12 title-section\">
                    <h2 class=\"heading\">Upcoming Match</h2>
                </div>
                {% for i in 1..4 %}
                    <div class=\"col-lg-6 mb-4\">
                        <div class=\"bg-light p-4 rounded\">
                            <div class=\"widget-body\">
                                <div class=\"widget-vs\">
                                    <div class=\"d-flex align-items-center justify-content-around justify-content-between w-100\">
                                        <div class=\"team-1 text-center\">
                                            <img src=\"{{ asset('images/logo_' ~ (i % 2 == 0 ? '3' : '1') ~ '.png') }}\" alt=\"Image\">
                                            <h3>Football League</h3>
                                        </div>
                                        <div>
                                            <span class=\"vs\"><span>VS</span></span>
                                        </div>
                                        <div class=\"team-2 text-center\">
                                            <img src=\"{{ asset('images/logo_' ~ (i % 2 == 0 ? '4' : '2') ~ '.png') }}\" alt=\"Image\">
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
                            </div>
                        </div>
                    </div>
                {% endfor %}
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
                            <img src=\"{{ asset('images/img_' ~ (i % 3 + 1) ~ '.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <h3 class=\"m-0\">
                                        {% if i % 3 == 0 %}
                                            Romolu to stay at Real Nadrid?
                                        {% elseif i % 3 == 1 %}
                                            Dogba set for Juvendu return?
                                        {% else %}
                                            Kai Nets Double To Secure Comfortable Away Win
                                        {% endif %}
                                    </h3>
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
            {% for i in 1..2 %}
                <div class=\"col-lg-6\">
                    <div class=\"custom-media d-flex\">
                        <div class=\"img mr-4\">
                            <img src=\"{{ asset('images/img_' ~ (i % 2 == 0 ? '3' : '1') ~ '.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                        </div>
                        <div class=\"text\">
                            <span class=\"meta\">May 20, 2020</span>
                            <h3 class=\"mb-4\"><a href=\"#\">Romolu to stay at Real Nadrid?</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
                            <p><a href=\"#\">Read more</a></p>
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>
    </div>
{% endblock %} ", "Home/matches.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\matches.html.twig");
    }
}
