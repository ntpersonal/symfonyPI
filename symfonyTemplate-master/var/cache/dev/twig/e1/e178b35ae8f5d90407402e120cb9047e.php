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

/* @Maker/validator/Constraint.tpl.php */
class __TwigTemplate_bab66f876f21d4f920d412ae6221c027 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Maker/validator/Constraint.tpl.php"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@Maker/validator/Constraint.tpl.php"));

        // line 1
        yield "<?= \"<?php\\n\" ?>

namespace <?= \$class_data->getNamespace(); ?>;

<?= \$class_data->getUseStatements(); ?>

#[\\Attribute(\\Attribute::TARGET_PROPERTY | \\Attribute::TARGET_METHOD | \\Attribute::IS_REPEATABLE)]
<?= \$class_data->getClassDeclaration(); ?>
{
    public string \$message = 'The string \"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["string"]) || array_key_exists("string", $context) ? $context["string"] : (function () { throw new RuntimeError('Variable "string" does not exist.', 10, $this->source); })()), "html", null, true);
        yield "\" contains an illegal character: it can only contain letters or numbers.';

    // You can use #[HasNamedArguments] to make some constraint options required.
    // All configurable options must be passed to the constructor.
    public function __construct(
        public string \$mode = 'strict',
        ?array \$groups = null,
        mixed \$payload = null
    ) {
        parent::__construct([], \$groups, \$payload);
    }
}
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
        return "@Maker/validator/Constraint.tpl.php";
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
        return array (  59 => 10,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<?= \"<?php\\n\" ?>

namespace <?= \$class_data->getNamespace(); ?>;

<?= \$class_data->getUseStatements(); ?>

#[\\Attribute(\\Attribute::TARGET_PROPERTY | \\Attribute::TARGET_METHOD | \\Attribute::IS_REPEATABLE)]
<?= \$class_data->getClassDeclaration(); ?>
{
    public string \$message = 'The string \"{{ string }}\" contains an illegal character: it can only contain letters or numbers.';

    // You can use #[HasNamedArguments] to make some constraint options required.
    // All configurable options must be passed to the constructor.
    public function __construct(
        public string \$mode = 'strict',
        ?array \$groups = null,
        mixed \$payload = null
    ) {
        parent::__construct([], \$groups, \$payload);
    }
}
", "@Maker/validator/Constraint.tpl.php", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\vendor\\symfony\\maker-bundle\\templates\\validator\\Constraint.tpl.php");
    }
}
