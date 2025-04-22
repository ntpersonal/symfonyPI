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

/* Home/blog.html.twig */
class __TwigTemplate_e77ce645dcccb0f581e47e9dd333dd37 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/blog.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/blog.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/blog.html.twig", 1);
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

        yield "Blog - Soccer";
        
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
                    <h1 class=\"text-white\">Blog Posts</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"container site-section\">
        <div class=\"row\">
            <div class=\"col-6 title-section\">
                <h2 class=\"heading\">Latest Blog</h2>
            </div>
        </div>
        <div class=\"row\">
            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 25
            yield "                <div class=\"col-lg-4 mb-4\">
                    <div class=\"custom-media d-block\">
                        <div class=\"img mb-4\">
                            <a href=\"single.html\">
                                <img src=\"";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((("images/img_" . (((($context["i"] % 2) == 0)) ? ("3") : ("1"))) . ".jpg")), "html", null, true);
            yield "\" alt=\"Image\" class=\"img-fluid\">
                            </a>
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
        // line 41
        yield "        </div>

        <div class=\"row justify-content-center\">
            <div class=\"col-lg-7 text-center\">
                <div class=\"custom-pagination\">
                    <a href=\"#\">1</a>
                    <span>2</span>
                    <a href=\"#\">3</a>
                    <a href=\"#\">4</a>
                    <a href=\"#\">5</a>
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
        return "Home/blog.html.twig";
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
        return array (  150 => 41,  132 => 29,  126 => 25,  122 => 24,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Blog - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 mx-auto text-center\">
                    <h1 class=\"text-white\">Blog Posts</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"container site-section\">
        <div class=\"row\">
            <div class=\"col-6 title-section\">
                <h2 class=\"heading\">Latest Blog</h2>
            </div>
        </div>
        <div class=\"row\">
            {% for i in 1..6 %}
                <div class=\"col-lg-4 mb-4\">
                    <div class=\"custom-media d-block\">
                        <div class=\"img mb-4\">
                            <a href=\"single.html\">
                                <img src=\"{{ asset('images/img_' ~ (i % 2 == 0 ? '3' : '1') ~ '.jpg') }}\" alt=\"Image\" class=\"img-fluid\">
                            </a>
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

        <div class=\"row justify-content-center\">
            <div class=\"col-lg-7 text-center\">
                <div class=\"custom-pagination\">
                    <a href=\"#\">1</a>
                    <span>2</span>
                    <a href=\"#\">3</a>
                    <a href=\"#\">4</a>
                    <a href=\"#\">5</a>
                </div>
            </div>
        </div>
    </div>
{% endblock %} ", "Home/blog.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\blog.html.twig");
    }
}
