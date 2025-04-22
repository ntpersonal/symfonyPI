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

/* @EasyAdmin/components/Icon.html.twig */
class __TwigTemplate_9edcffb1a9d15c3a18b9de2854a8761d extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/Icon.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/components/Icon.html.twig"));

        // line 2
        yield "<span ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 2, $this->source); })()), "defaults", [["class" => "icon"]], "method", false, false, false, 2), "html", null, true);
        yield ">
    ";
        // line 3
        $context["icon"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 3, $this->source); })()), "getIcon", [], "method", false, false, false, 3);
        // line 4
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 4, $this->source); })()), "isFontAwesomeIconSet", [], "any", false, false, false, 4)) {
            // line 5
            yield "        <i class=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 5, $this->source); })()), "name", [], "any", false, false, false, 5), "html", null, true);
            yield "\"></i>
    ";
        } elseif (CoreExtension::getAttribute($this->env, $this->source,         // line 6
(isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 6, $this->source); })()), "svgContents", [], "any", false, false, false, 6)) {
            // line 7
            yield "        ";
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["icon"]) || array_key_exists("icon", $context) ? $context["icon"] : (function () { throw new RuntimeError('Variable "icon" does not exist.', 7, $this->source); })()), "svgContents", [], "any", false, false, false, 7);
            yield "
    ";
        } else {
            // line 9
            yield "        ";
            // line 12
            yield "    ";
        }
        // line 13
        yield "</span>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@EasyAdmin/components/Icon.html.twig";
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
        return array (  76 => 13,  73 => 12,  71 => 9,  65 => 7,  63 => 6,  58 => 5,  55 => 4,  53 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# @var icon \\EasyCorp\\Bundle\\EasyAdminBundle\\Dto\\IconDto #}
<span {{ attributes.defaults({class: 'icon'}) }}>
    {% set icon = this.getIcon() %}
    {% if icon.isFontAwesomeIconSet %}
        <i class=\"{{ icon.name }}\"></i>
    {% elseif icon.svgContents %}
        {{ icon.svgContents|raw }}
    {% else %}
        {% guard function ux_icon %}
            {{ ux_icon(icon.name, attributes.all) }}
        {% endguard %}
    {% endif %}
</span>
", "@EasyAdmin/components/Icon.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\vendor\\easycorp\\easyadmin-bundle\\templates\\components\\Icon.html.twig");
    }
}
