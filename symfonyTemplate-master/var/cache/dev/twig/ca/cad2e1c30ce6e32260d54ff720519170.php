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

/* Home/players.html.twig */
class __TwigTemplate_5062f25987d798d44ba17a5db84b652e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/players.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/players.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/players.html.twig", 1);
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

        yield "Players - Soccer";
        
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
                    <h1 class=\"text-white\">Players</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6 title-section\">
                    <h2 class=\"heading\">Star Players / Videos</h2>
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
        // line 33
        $context["players"] = [["number" => "#10", "position" => "Forward", "name" => "Phillip Hobbs"], ["number" => "#7", "position" => "Forward", "name" => "Garry Norris"], ["number" => "#4", "position" => "Forward", "name" => "Romolu Harper"], ["number" => "#4", "position" => "Forward", "name" => "Phillip Hobbs"], ["number" => "#1", "position" => "Goalkeeper", "name" => "Garry Norris"], ["number" => "#8", "position" => "Forward", "name" => "Romolu Harper"]];
        // line 41
        yield "                
                ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["players"]) || array_key_exists("players", $context) ? $context["players"] : (function () { throw new RuntimeError('Variable "players" does not exist.', 42, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["player"]) {
            // line 43
            yield "                    <div class=\"item\">
                        <div class=\"video-media\">
                            <img src=\"";
            // line 45
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/img_" . ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 45) % 3) + 1)) . ".jpg")), "html", null, true);
            yield "\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <span class=\"meta\">";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["player"], "number", [], "any", false, false, false, 51), "html", null, true);
            yield " / ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["player"], "position", [], "any", false, false, false, 51), "html", null, true);
            yield "</span>
                                    <h3 class=\"m-0\">";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["player"], "name", [], "any", false, false, false, 52), "html", null, true);
            yield "</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['player'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
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
        // line 69
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 2));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 70
            yield "                <div class=\"col-lg-6\">
                    <div class=\"custom-media d-flex\">
                        <div class=\"img mr-4\">
                            <img src=\"";
            // line 73
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
        // line 84
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
        return "Home/players.html.twig";
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
        return array (  231 => 84,  214 => 73,  209 => 70,  205 => 69,  192 => 58,  172 => 52,  166 => 51,  157 => 45,  153 => 43,  136 => 42,  133 => 41,  131 => 33,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Players - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 mx-auto text-center\">
                    <h1 class=\"text-white\">Players</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-6 title-section\">
                    <h2 class=\"heading\">Star Players / Videos</h2>
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
                {% set players = [
                    { number: '#10', position: 'Forward', name: 'Phillip Hobbs' },
                    { number: '#7', position: 'Forward', name: 'Garry Norris' },
                    { number: '#4', position: 'Forward', name: 'Romolu Harper' },
                    { number: '#4', position: 'Forward', name: 'Phillip Hobbs' },
                    { number: '#1', position: 'Goalkeeper', name: 'Garry Norris' },
                    { number: '#8', position: 'Forward', name: 'Romolu Harper' }
                ] %}
                
                {% for player in players %}
                    <div class=\"item\">
                        <div class=\"video-media\">
                            <img src=\"{{ asset('images/img_' ~ (loop.index % 3 + 1) ~ '.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                            <a href=\"https://vimeo.com/139714818\" class=\"d-flex play-button align-items-center\" data-fancybox>
                                <span class=\"icon mr-3\">
                                    <span class=\"icon-play\"></span>
                                </span>
                                <div class=\"caption\">
                                    <span class=\"meta\">{{ player.number }} / {{ player.position }}</span>
                                    <h3 class=\"m-0\">{{ player.name }}</h3>
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
{% endblock %} ", "Home/players.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\players.html.twig");
    }
}
