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

/* Home/contact.html.twig */
class __TwigTemplate_5b6159aac6f9ab56d8744cdaa08fb56c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/contact.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/contact.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/contact.html.twig", 1);
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

        yield "Contact - Soccer";
        
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
                <div class=\"col-lg-9 mx-auto text-center\">
                    <h1 class=\"text-white\">Contact</h1>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-7\">
                    <form action=\"#\">
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Name\">
                        </div>
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Email\">
                        </div>
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Subject\">
                        </div>
                        <div class=\"form-group\">
                            <textarea name=\"\" class=\"form-control\" id=\"\" cols=\"30\" rows=\"10\" placeholder=\"Write something...\"></textarea>
                        </div>
                        <div class=\"form-group\">
                            <input type=\"submit\" class=\"btn btn-primary py-3 px-5\" value=\"Send Message\">
                        </div>
                    </form>  
                </div>
                <div class=\"col-lg-4 ml-auto\">
                    <ul class=\"list-unstyled\">
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">Address</strong>
                            273 South Riverview Rd. <br> New York, NY 10011
                        </li>
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">Email</strong>
                            <a href=\"#\">info@unslate.co</a>
                        </li>
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">
                                Phone
                            </strong>
                            <a href=\"#\">+12 345 6789 012</a>
                        </li>
                    </ul>
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
        return "Home/contact.html.twig";
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
        return array (  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Contact - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-9 mx-auto text-center\">
                    <h1 class=\"text-white\">Contact</h1>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-7\">
                    <form action=\"#\">
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Name\">
                        </div>
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Email\">
                        </div>
                        <div class=\"form-group\">
                            <input type=\"text\" class=\"form-control\" placeholder=\"Subject\">
                        </div>
                        <div class=\"form-group\">
                            <textarea name=\"\" class=\"form-control\" id=\"\" cols=\"30\" rows=\"10\" placeholder=\"Write something...\"></textarea>
                        </div>
                        <div class=\"form-group\">
                            <input type=\"submit\" class=\"btn btn-primary py-3 px-5\" value=\"Send Message\">
                        </div>
                    </form>  
                </div>
                <div class=\"col-lg-4 ml-auto\">
                    <ul class=\"list-unstyled\">
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">Address</strong>
                            273 South Riverview Rd. <br> New York, NY 10011
                        </li>
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">Email</strong>
                            <a href=\"#\">info@unslate.co</a>
                        </li>
                        <li class=\"mb-2\">
                            <strong class=\"text-white d-block\">
                                Phone
                            </strong>
                            <a href=\"#\">+12 345 6789 012</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
{% endblock %} ", "Home/contact.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\contact.html.twig");
    }
}
