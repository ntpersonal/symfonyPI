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

/* @EasyAdmin/crud/form_theme.html.twig */
class __TwigTemplate_41d57b85372a53a9791f1a0282cc43b3 extends Template
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

        // line 2
        $_trait_0 = $this->loadTemplate("@EasyAdmin/symfony-form-themes/bootstrap_5_layout.html.twig", "@EasyAdmin/crud/form_theme.html.twig", 2);
        if (!$_trait_0->unwrap()->isTraitable()) {
            throw new RuntimeError('Template "'."@EasyAdmin/symfony-form-themes/bootstrap_5_layout.html.twig".'" cannot be used as a trait.', 2, $this->source);
        }
        $_trait_0_blocks = $_trait_0->unwrap()->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            [
                'form_start' => [$this, 'block_form_start'],
                'form_end' => [$this, 'block_form_end'],
                'form_errors' => [$this, 'block_form_errors'],
                'form_widget_simple' => [$this, 'block_form_widget_simple'],
                'datetime_widget' => [$this, 'block_datetime_widget'],
                'date_widget' => [$this, 'block_date_widget'],
                'time_widget' => [$this, 'block_time_widget'],
                'file_widget' => [$this, 'block_file_widget'],
                'form_row' => [$this, 'block_form_row'],
                'choice_widget_collapsed' => [$this, 'block_choice_widget_collapsed'],
                'collection_row' => [$this, 'block_collection_row'],
                'collection_widget' => [$this, 'block_collection_widget'],
                'collection_entry_row' => [$this, 'block_collection_entry_row'],
                'form_widget_compound' => [$this, 'block_form_widget_compound'],
                'button_row' => [$this, 'block_button_row'],
                'form_label' => [$this, 'block_form_label'],
                'empty_collection' => [$this, 'block_empty_collection'],
                'vich_file_row' => [$this, 'block_vich_file_row'],
                'vich_file_widget' => [$this, 'block_vich_file_widget'],
                'vich_image_row' => [$this, 'block_vich_image_row'],
                'vich_image_widget' => [$this, 'block_vich_image_widget'],
                'ea_crud_rest' => [$this, 'block_ea_crud_rest'],
                'ea_crud_widget' => [$this, 'block_ea_crud_widget'],
                'ea_crud_widget_panels' => [$this, 'block_ea_crud_widget_panels'],
                'ea_crud_widget_fieldsets' => [$this, 'block_ea_crud_widget_fieldsets'],
                'ea_autocomplete_widget' => [$this, 'block_ea_autocomplete_widget'],
                'ea_autocomplete_inner_label' => [$this, 'block_ea_autocomplete_inner_label'],
                'ea_code_editor_widget' => [$this, 'block_ea_code_editor_widget'],
                'ea_text_editor_widget' => [$this, 'block_ea_text_editor_widget'],
                'ea_form_row_row' => [$this, 'block_ea_form_row_row'],
                'ea_form_column_group_open_row' => [$this, 'block_ea_form_column_group_open_row'],
                'ea_form_column_group_close_row' => [$this, 'block_ea_form_column_group_close_row'],
                'ea_form_column_open_row' => [$this, 'block_ea_form_column_open_row'],
                'ea_form_column_close_row' => [$this, 'block_ea_form_column_close_row'],
                'ea_form_fieldset_open_ealabel' => [$this, 'block_ea_form_fieldset_open_ealabel'],
                'ea_form_fieldset_open_label' => [$this, 'block_ea_form_fieldset_open_label'],
                'ea_form_fieldset_open_row' => [$this, 'block_ea_form_fieldset_open_row'],
                'ea_form_fieldset_close_row' => [$this, 'block_ea_form_fieldset_close_row'],
                'ea_form_tablist_row' => [$this, 'block_ea_form_tablist_row'],
                'ea_form_tabpane_group_open_row' => [$this, 'block_ea_form_tabpane_group_open_row'],
                'ea_form_tabpane_group_close_row' => [$this, 'block_ea_form_tabpane_group_close_row'],
                'ea_form_tabpane_open_row' => [$this, 'block_ea_form_tabpane_open_row'],
                'ea_form_tabpane_close_row' => [$this, 'block_ea_form_tabpane_close_row'],
                'ea_filters_widget' => [$this, 'block_ea_filters_widget'],
                'comparison_widget' => [$this, 'block_comparison_widget'],
                'ea_numeric_filter_widget' => [$this, 'block_ea_numeric_filter_widget'],
                'ea_datetime_filter_widget' => [$this, 'block_ea_datetime_filter_widget'],
                'ea_fileupload_widget' => [$this, 'block_ea_fileupload_widget'],
                'TODO_ea_fileupload_widget' => [$this, 'block_TODO_ea_fileupload_widget'],
                'ea_slug_widget' => [$this, 'block_ea_slug_widget'],
            ]
        );
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/crud/form_theme.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@EasyAdmin/crud/form_theme.html.twig"));

        // line 3
        yield "
";
        // line 4
        yield from $this->unwrap()->yieldBlock('form_start', $context, $blocks);
        // line 14
        yield "
";
        // line 15
        yield from $this->unwrap()->yieldBlock('form_end', $context, $blocks);
        // line 21
        yield "
";
        // line 22
        yield from $this->unwrap()->yieldBlock('form_errors', $context, $blocks);
        // line 29
        yield "
";
        // line 31
        yield "
";
        // line 32
        yield from $this->unwrap()->yieldBlock('form_widget_simple', $context, $blocks);
        // line 42
        yield "
";
        // line 43
        yield from $this->unwrap()->yieldBlock('datetime_widget', $context, $blocks);
        // line 51
        yield "
";
        // line 52
        yield from $this->unwrap()->yieldBlock('date_widget', $context, $blocks);
        // line 57
        yield "
";
        // line 58
        yield from $this->unwrap()->yieldBlock('time_widget', $context, $blocks);
        // line 63
        yield "
";
        // line 64
        yield from $this->unwrap()->yieldBlock('file_widget', $context, $blocks);
        // line 72
        yield "
";
        // line 74
        yield "
";
        // line 75
        yield from $this->unwrap()->yieldBlock('form_row', $context, $blocks);
        // line 120
        yield "
";
        // line 121
        yield from $this->unwrap()->yieldBlock('choice_widget_collapsed', $context, $blocks);
        // line 132
        yield "
";
        // line 133
        yield from $this->unwrap()->yieldBlock('collection_row', $context, $blocks);
        // line 159
        yield "
";
        // line 160
        yield from $this->unwrap()->yieldBlock('collection_widget', $context, $blocks);
        // line 189
        yield "
";
        // line 190
        yield from $this->unwrap()->yieldBlock('collection_entry_row', $context, $blocks);
        // line 233
        yield "
";
        // line 234
        yield from $this->unwrap()->yieldBlock('form_widget_compound', $context, $blocks);
        // line 251
        yield "
";
        // line 252
        yield from $this->unwrap()->yieldBlock('button_row', $context, $blocks);
        // line 257
        yield "
";
        // line 259
        yield "
";
        // line 260
        yield from $this->unwrap()->yieldBlock('form_label', $context, $blocks);
        // line 304
        yield "
";
        // line 306
        yield "
";
        // line 307
        yield from $this->unwrap()->yieldBlock('empty_collection', $context, $blocks);
        // line 312
        yield "
";
        // line 313
        yield from $this->unwrap()->yieldBlock('vich_file_row', $context, $blocks);
        // line 317
        yield "
";
        // line 318
        yield from $this->unwrap()->yieldBlock('vich_file_widget', $context, $blocks);
        // line 352
        yield "
";
        // line 353
        yield from $this->unwrap()->yieldBlock('vich_image_row', $context, $blocks);
        // line 357
        yield "
";
        // line 358
        yield from $this->unwrap()->yieldBlock('vich_image_widget', $context, $blocks);
        // line 424
        yield "
";
        // line 425
        yield from $this->unwrap()->yieldBlock('ea_crud_rest', $context, $blocks);
        // line 428
        yield "
";
        // line 430
        yield from $this->unwrap()->yieldBlock('ea_crud_widget', $context, $blocks);
        // line 435
        yield "
";
        // line 437
        yield from $this->unwrap()->yieldBlock('ea_crud_widget_panels', $context, $blocks);
        // line 442
        yield "
";
        // line 443
        yield from $this->unwrap()->yieldBlock('ea_crud_widget_fieldsets', $context, $blocks);
        // line 508
        yield "
";
        // line 510
        yield from $this->unwrap()->yieldBlock('ea_autocomplete_widget', $context, $blocks);
        // line 513
        yield "
";
        // line 514
        yield from $this->unwrap()->yieldBlock('ea_autocomplete_inner_label', $context, $blocks);
        // line 518
        yield "
";
        // line 520
        yield from $this->unwrap()->yieldBlock('ea_code_editor_widget', $context, $blocks);
        // line 530
        yield "
";
        // line 532
        yield from $this->unwrap()->yieldBlock('ea_text_editor_widget', $context, $blocks);
        // line 543
        yield "
";
        // line 545
        yield from $this->unwrap()->yieldBlock('ea_form_row_row', $context, $blocks);
        // line 548
        yield "
";
        // line 549
        yield from $this->unwrap()->yieldBlock('ea_form_column_group_open_row', $context, $blocks);
        // line 555
        yield "
";
        // line 556
        yield from $this->unwrap()->yieldBlock('ea_form_column_group_close_row', $context, $blocks);
        // line 563
        yield "
";
        // line 564
        yield from $this->unwrap()->yieldBlock('ea_form_column_open_row', $context, $blocks);
        // line 583
        yield "
";
        // line 584
        yield from $this->unwrap()->yieldBlock('ea_form_column_close_row', $context, $blocks);
        // line 587
        yield "
";
        // line 588
        yield from $this->unwrap()->yieldBlock('ea_form_fieldset_open_ealabel', $context, $blocks);
        // line 599
        yield "
";
        // line 600
        yield from $this->unwrap()->yieldBlock('ea_form_fieldset_open_label', $context, $blocks);
        // line 621
        yield "
";
        // line 622
        yield from $this->unwrap()->yieldBlock('ea_form_fieldset_open_row', $context, $blocks);
        // line 634
        yield "
";
        // line 635
        yield from $this->unwrap()->yieldBlock('ea_form_fieldset_close_row', $context, $blocks);
        // line 641
        yield "
";
        // line 642
        yield from $this->unwrap()->yieldBlock('ea_form_tablist_row', $context, $blocks);
        // line 670
        yield "
";
        // line 671
        yield from $this->unwrap()->yieldBlock('ea_form_tabpane_group_open_row', $context, $blocks);
        // line 675
        yield "
";
        // line 676
        yield from $this->unwrap()->yieldBlock('ea_form_tabpane_group_close_row', $context, $blocks);
        // line 680
        yield "
";
        // line 681
        yield from $this->unwrap()->yieldBlock('ea_form_tabpane_open_row', $context, $blocks);
        // line 694
        yield "
";
        // line 695
        yield from $this->unwrap()->yieldBlock('ea_form_tabpane_close_row', $context, $blocks);
        // line 699
        yield "
";
        // line 701
        yield from $this->unwrap()->yieldBlock('ea_filters_widget', $context, $blocks);
        // line 723
        yield "
";
        // line 724
        yield from $this->unwrap()->yieldBlock('comparison_widget', $context, $blocks);
        // line 727
        yield "
";
        // line 728
        yield from $this->unwrap()->yieldBlock('ea_numeric_filter_widget', $context, $blocks);
        // line 738
        yield "
";
        // line 739
        yield from $this->unwrap()->yieldBlock('ea_datetime_filter_widget', $context, $blocks);
        // line 742
        yield "
";
        // line 743
        yield from $this->unwrap()->yieldBlock('ea_fileupload_widget', $context, $blocks);
        // line 805
        yield "
";
        // line 806
        yield from $this->unwrap()->yieldBlock('TODO_ea_fileupload_widget', $context, $blocks);
        // line 873
        yield "
";
        // line 874
        yield from $this->unwrap()->yieldBlock('ea_slug_widget', $context, $blocks);
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_start(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_start"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_start"));

        // line 5
        yield "    ";
        if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "vars", [], "any", false, false, false, 5), "errors", [], "any", false, false, false, 5)) > 0) && CoreExtension::inFilter("ea_crud", ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 5), "block_prefixes", [], "any", true, true, false, 5)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 5, $this->source); })()), "vars", [], "any", false, false, false, 5), "block_prefixes", [], "any", false, false, false, 5), [])) : ([]))))) {
            // line 6
            yield "        ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 6, $this->source); })()), 'errors', ["attr" => ["class" => "global-invalid-feedback"]]);
            yield "
    ";
        }
        // line 8
        yield "
    ";
        // line 9
        yield from $this->yieldParentBlock("form_start", $context, $blocks);
        yield "
    ";
        // line 10
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 10, $this->source); })()), "request", [], "any", false, false, false, 10), "query", [], "any", false, false, false, 10), "get", ["referrer"], "method", false, false, false, 10)) {
            // line 11
            yield "        <input type=\"hidden\" name=\"referrer\" value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 11, $this->source); })()), "request", [], "any", false, false, false, 11), "query", [], "any", false, false, false, 11), "get", ["referrer"], "method", false, false, false, 11), "html", null, true);
            yield "\">
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_end(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_end"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_end"));

        // line 16
        yield "        ";
        if (( !array_key_exists("render_rest", $context) || (isset($context["render_rest"]) || array_key_exists("render_rest", $context) ? $context["render_rest"] : (function () { throw new RuntimeError('Variable "render_rest" does not exist.', 16, $this->source); })()))) {
            // line 17
            yield "            ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 17, $this->source); })()), 'rest');
            yield "
        ";
        }
        // line 19
        yield "    </form>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_errors(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_errors"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_errors"));

        // line 23
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 23, $this->source); })())) > 0)) {
            // line 24
            yield "        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["errors"]) || array_key_exists("errors", $context) ? $context["errors"] : (function () { throw new RuntimeError('Variable "errors" does not exist.', 24, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 25
                yield "            <div class=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 25)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 25, $this->source); })()), "class", [], "any", false, false, false, 25), "")) : ("")), "html", null, true);
                yield " invalid-feedback d-block\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["error"], "message", [], "any", false, false, false, 25), "html", null, true);
                yield "</div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['error'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            yield "    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 32
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_widget_simple(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_simple"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_simple"));

        // line 33
        if (( !array_key_exists("type", $context) || !CoreExtension::inFilter((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 33, $this->source); })()), ["file", "hidden"]))) {
            // line 34
            $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 34, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim(((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 34)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 34, $this->source); })()), "class", [], "any", false, false, false, 34), "")) : ("")))]);
        }
        // line 36
        if ((array_key_exists("type", $context) && (((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 36, $this->source); })()) == "range") || ((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 36, $this->source); })()) == "color")))) {
            // line 37
            yield "        ";
            // line 38
            $context["required"] = false;
        }
        // line 40
        yield from $this->yieldParentBlock("form_widget_simple", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 43
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_datetime_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "datetime_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "datetime_widget"));

        // line 44
        if (((isset($context["widget"]) || array_key_exists("widget", $context) ? $context["widget"] : (function () { throw new RuntimeError('Variable "widget" does not exist.', 44, $this->source); })()) != "single_text")) {
            // line 45
            $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 45, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "class", [], "any", true, true, false, 45)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 45, $this->source); })()), "class", [], "any", false, false, false, 45), "")) : ("")) . " form-inline"))]);
        }
        // line 47
        yield "<div class=\"datetime-widget datetime-widget-datetime\">";
        // line 48
        yield from $this->yieldParentBlock("datetime_widget", $context, $blocks);
        // line 49
        yield "</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 52
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_date_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "date_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "date_widget"));

        // line 53
        yield "<div class=\"datetime-widget datetime-widget-date\">";
        // line 54
        yield from $this->yieldParentBlock("date_widget", $context, $blocks);
        // line 55
        yield "</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 58
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_time_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "time_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "time_widget"));

        // line 59
        yield "<div class=\"datetime-widget datetime-widget-time\">";
        // line 60
        yield from $this->yieldParentBlock("time_widget", $context, $blocks);
        // line 61
        yield "</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 64
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_file_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "file_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "file_widget"));

        // line 65
        if (((array_key_exists("vich", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["vich"]) || array_key_exists("vich", $context) ? $context["vich"] : (function () { throw new RuntimeError('Variable "vich" does not exist.', 65, $this->source); })()), false)) : (false))) {
            // line 66
            $context["type"] = ((array_key_exists("type", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 66, $this->source); })()), "file")) : ("file"));
            // line 67
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 69
            yield from             $this->unwrap()->yieldBlock("form_widget_simple", $context, $blocks);
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 75
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_row"));

        // line 76
        yield "    ";
        $context["row_attr"] = Twig\Extension\CoreExtension::merge((isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 76, $this->source); })()), ["class" => (((CoreExtension::getAttribute($this->env, $this->source,         // line 77
($context["row_attr"] ?? null), "class", [], "any", true, true, false, 77)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 77, $this->source); })()), "class", [], "any", false, false, false, 77), "")) : ("")) . " form-group")]);
        // line 79
        yield "    ";
        $context["field"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "vars", [], "any", false, false, false, 79), "ea_vars", [], "any", false, false, false, 79), "field", [], "any", false, false, false, 79);
        // line 80
        yield "
    <div class=\"";
        // line 81
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "columns", [], "any", true, true, false, 81) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 81, $this->source); })()), "columns", [], "any", false, false, false, 81)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 81, $this->source); })()), "columns", [], "any", false, false, false, 81), "html", null, true)) : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "defaultColumns", [], "any", true, true, false, 81) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 81, $this->source); })()), "defaultColumns", [], "any", false, false, false, 81)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 81, $this->source); })()), "defaultColumns", [], "any", false, false, false, 81), "html", null, true)) : (""))));
        yield "\">";
        // line 82
        $context["row_class"] = ((array_key_exists("row_class", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["row_class"]) || array_key_exists("row_class", $context) ? $context["row_class"] : (function () { throw new RuntimeError('Variable "row_class" does not exist.', 82, $this->source); })()), ((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 82)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 82, $this->source); })()), "class", [], "any", false, false, false, 82), "mb-3")) : ("mb-3")))) : (((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 82)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 82, $this->source); })()), "class", [], "any", false, false, false, 82), "mb-3")) : ("mb-3"))));
        // line 83
        yield "<div ";
        $_v0 = $context;
        $_v1 = ["attr" => Twig\Extension\CoreExtension::merge((isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 83, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim(((isset($context["row_class"]) || array_key_exists("row_class", $context) ? $context["row_class"] : (function () { throw new RuntimeError('Variable "row_class" does not exist.', 83, $this->source); })()) . (((( !(isset($context["compound"]) || array_key_exists("compound", $context) ? $context["compound"] : (function () { throw new RuntimeError('Variable "compound" does not exist.', 83, $this->source); })()) || ((array_key_exists("force_error", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["force_error"]) || array_key_exists("force_error", $context) ? $context["force_error"] : (function () { throw new RuntimeError('Variable "force_error" does not exist.', 83, $this->source); })()), false)) : (false))) &&  !(isset($context["valid"]) || array_key_exists("valid", $context) ? $context["valid"] : (function () { throw new RuntimeError('Variable "valid" does not exist.', 83, $this->source); })()))) ? (" has-error") : (""))))])];
        if (!is_iterable($_v1)) {
            throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 83, $this->getSourceContext());
        }
        $_v1 = CoreExtension::toArray($_v1);
        $context = $_v1 + $context + $this->env->getGlobals();
        yield from         $this->unwrap()->yieldBlock("attributes", $context, $blocks);
        $context = $_v0;
        yield ">";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), 'label');
        // line 85
        yield "<div class=\"form-widget\">
                ";
        // line 86
        $context["has_prepend_html"] =  !(null === ((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "prepend_html", [], "any", true, true, false, 86)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 86, $this->source); })()), "prepend_html", [], "any", false, false, false, 86), null)) : (null)));
        // line 87
        yield "                ";
        $context["has_append_html"] =  !(null === ((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "append_html", [], "any", true, true, false, 87)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 87, $this->source); })()), "append_html", [], "any", false, false, false, 87), null)) : (null)));
        // line 88
        yield "                ";
        $context["has_input_groups"] = ((isset($context["has_prepend_html"]) || array_key_exists("has_prepend_html", $context) ? $context["has_prepend_html"] : (function () { throw new RuntimeError('Variable "has_prepend_html" does not exist.', 88, $this->source); })()) || (isset($context["has_append_html"]) || array_key_exists("has_append_html", $context) ? $context["has_append_html"] : (function () { throw new RuntimeError('Variable "has_append_html" does not exist.', 88, $this->source); })()));
        // line 89
        yield "
                ";
        // line 90
        if ((isset($context["has_input_groups"]) || array_key_exists("has_input_groups", $context) ? $context["has_input_groups"] : (function () { throw new RuntimeError('Variable "has_input_groups" does not exist.', 90, $this->source); })())) {
            yield "<div class=\"input-group\">";
        }
        // line 91
        yield "                    ";
        if ((isset($context["has_prepend_html"]) || array_key_exists("has_prepend_html", $context) ? $context["has_prepend_html"] : (function () { throw new RuntimeError('Variable "has_prepend_html" does not exist.', 91, $this->source); })())) {
            // line 92
            yield "                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">";
            // line 93
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 93, $this->source); })()), "prepend_html", [], "any", false, false, false, 93);
            yield "</span>
                        </div>
                    ";
        }
        // line 96
        yield "
                    ";
        // line 97
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 97, $this->source); })()), 'widget');
        yield "

                    ";
        // line 99
        if ((isset($context["has_append_html"]) || array_key_exists("has_append_html", $context) ? $context["has_append_html"] : (function () { throw new RuntimeError('Variable "has_append_html" does not exist.', 99, $this->source); })())) {
            // line 100
            yield "                        <span class=\"input-group-text\">";
            yield CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 100, $this->source); })()), "append_html", [], "any", false, false, false, 100);
            yield "</span>
                    ";
        }
        // line 102
        yield "                ";
        if ((isset($context["has_input_groups"]) || array_key_exists("has_input_groups", $context) ? $context["has_input_groups"] : (function () { throw new RuntimeError('Variable "has_input_groups" does not exist.', 102, $this->source); })())) {
            yield "</div>";
        }
        // line 103
        yield "
                ";
        // line 104
        if ((((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "help", [], "any", true, true, false, 104) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 104, $this->source); })()), "help", [], "any", false, false, false, 104)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 104, $this->source); })()), "help", [], "any", false, false, false, 104)) : (false))) {
            // line 105
            yield "                    <small class=\"form-text form-help\">";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 105, $this->source); })()), "help", [], "any", false, false, false, 105), (isset($context["label_translation_parameters"]) || array_key_exists("label_translation_parameters", $context) ? $context["label_translation_parameters"] : (function () { throw new RuntimeError('Variable "label_translation_parameters" does not exist.', 105, $this->source); })()), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 105, $this->source); })()));
            yield "</small>
                ";
        } elseif ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 106
($context["form"] ?? null), "vars", [], "any", false, true, false, 106), "help", [], "any", true, true, false, 106) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 106, $this->source); })()), "vars", [], "any", false, false, false, 106), "help", [], "any", false, false, false, 106)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 106, $this->source); })()), "vars", [], "any", false, false, false, 106), "help", [], "any", false, false, false, 106)) : (false))) {
            // line 107
            yield "                    <small class=\"form-text form-help\">";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "vars", [], "any", false, false, false, 107), "help", [], "any", false, false, false, 107), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "vars", [], "any", false, false, false, 107), "help_translation_parameters", [], "any", false, false, false, 107), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 107, $this->source); })()), "vars", [], "any", false, false, false, 107), "translation_domain", [], "any", false, false, false, 107));
            yield "</small>
                ";
        }
        // line 110
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 110, $this->source); })()), 'errors');
        // line 111
        yield "</div>
        </div>
    </div>

    ";
        // line 116
        yield "    ";
        if ((null === ((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "columns", [], "any", true, true, false, 116)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 116, $this->source); })()), "columns", [], "any", false, false, false, 116), null)) : (null)))) {
            // line 117
            yield "        <div class=\"flex-fill\"></div>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 121
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_choice_widget_collapsed(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "choice_widget_collapsed"));

        // line 122
        yield "    ";
        if (("ea-autocomplete" == ((CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "data-ea-widget", [], "array", true, true, false, 122)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 122, $this->source); })()), "data-ea-widget", [], "array", false, false, false, 122), false)) : (false)))) {
            // line 123
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 123, $this->source); })()), ["data-ea-i18n-no-results-found" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("autocomplete.no-results-found", [], "EasyAdminBundle"), "data-ea-i18n-no-more-results" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("autocomplete.no-more-results", [], "EasyAdminBundle"), "data-ea-i18n-loading-more-results" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("autocomplete.loading-more-results", [], "EasyAdminBundle")]);
            // line 128
            yield "    ";
        }
        // line 129
        yield "
    ";
        // line 130
        yield from $this->yieldParentBlock("choice_widget_collapsed", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 133
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_collection_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_row"));

        // line 134
        yield "    ";
        if ((array_key_exists("prototype", $context) &&  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 134, $this->source); })()), "rendered", [], "any", false, false, false, 134))) {
            // line 135
            yield "        ";
            $context["row_attr"] = Twig\Extension\CoreExtension::merge((isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 135, $this->source); })()), ["data-prototype" => $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 135, $this->source); })()), 'row')]);
            // line 136
            yield "    ";
        }
        // line 137
        yield "
    ";
        // line 138
        $context["maxKey"] = 0;
        // line 139
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::keys(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 139, $this->source); })()), "children", [], "any", false, false, false, 139)));
        foreach ($context['_seq'] as $context["_key"] => $context["key"]) {
            // line 140
            yield "        ";
            if (CoreExtension::matches("/^\\d+\$/", $context["key"])) {
                // line 141
                yield "            ";
                $context["intKey"] = $this->extensions['Twig\Extension\CoreExtension']->formatNumber($context["key"], 0, "", "", "");
                // line 142
                yield "            ";
                if (((isset($context["intKey"]) || array_key_exists("intKey", $context) ? $context["intKey"] : (function () { throw new RuntimeError('Variable "intKey" does not exist.', 142, $this->source); })()) > (isset($context["maxKey"]) || array_key_exists("maxKey", $context) ? $context["maxKey"] : (function () { throw new RuntimeError('Variable "maxKey" does not exist.', 142, $this->source); })()))) {
                    // line 143
                    yield "                ";
                    $context["maxKey"] = (isset($context["intKey"]) || array_key_exists("intKey", $context) ? $context["intKey"] : (function () { throw new RuntimeError('Variable "intKey" does not exist.', 143, $this->source); })());
                    // line 144
                    yield "            ";
                }
                // line 145
                yield "        ";
            }
            // line 146
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['key'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 147
        yield "
    ";
        // line 148
        $context["row_attr"] = Twig\Extension\CoreExtension::merge((isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 148, $this->source); })()), ["data-ea-collection-field" => "true", "data-entry-is-complex" => (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 150
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 150, $this->source); })()), "vars", [], "any", false, false, false, 150), "ea_vars", [], "any", false, false, false, 150), "field", [], "any", false, false, false, 150) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 150, $this->source); })()), "vars", [], "any", false, false, false, 150), "ea_vars", [], "any", false, false, false, 150), "field", [], "any", false, false, false, 150), "customOptions", [], "any", false, false, false, 150), "get", ["entryIsComplex"], "method", false, false, false, 150))) ? ("true") : ("false")), "data-allow-add" => ((        // line 151
(isset($context["allow_add"]) || array_key_exists("allow_add", $context) ? $context["allow_add"] : (function () { throw new RuntimeError('Variable "allow_add" does not exist.', 151, $this->source); })())) ? ("true") : ("false")), "data-allow-delete" => ((        // line 152
(isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 152, $this->source); })())) ? ("true") : ("false")), "data-num-items" => ((Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source,         // line 153
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 153, $this->source); })()), "children", [], "any", false, false, false, 153))) ? (0) : (((isset($context["maxKey"]) || array_key_exists("maxKey", $context) ? $context["maxKey"] : (function () { throw new RuntimeError('Variable "maxKey" does not exist.', 153, $this->source); })()) + 1))), "data-form-type-name-placeholder" => ((        // line 154
array_key_exists("prototype", $context)) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["prototype"]) || array_key_exists("prototype", $context) ? $context["prototype"] : (function () { throw new RuntimeError('Variable "prototype" does not exist.', 154, $this->source); })()), "vars", [], "any", false, false, false, 154), "name", [], "any", false, false, false, 154)) : (""))]);
        // line 156
        yield "
    ";
        // line 157
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 160
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_collection_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_widget"));

        // line 161
        yield "    ";
        // line 163
        yield "    ";
        $context["isEmptyCollection"] = ((null === (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 163, $this->source); })())) || (is_iterable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 163, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 163, $this->source); })()))));
        // line 164
        yield "    ";
        $context["is_array_field"] = ("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\ArrayField" == ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 164), "ea_vars", [], "any", false, true, false, 164), "field", [], "any", false, true, false, 164), "fieldFqcn", [], "any", true, true, false, 164)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 164, $this->source); })()), "vars", [], "any", false, false, false, 164), "ea_vars", [], "any", false, false, false, 164), "field", [], "any", false, false, false, 164), "fieldFqcn", [], "any", false, false, false, 164), false)) : (false)));
        // line 165
        yield "
    <div class=\"ea-form-collection-items\">
        ";
        // line 167
        if ((isset($context["isEmptyCollection"]) || array_key_exists("isEmptyCollection", $context) ? $context["isEmptyCollection"] : (function () { throw new RuntimeError('Variable "isEmptyCollection" does not exist.', 167, $this->source); })())) {
            // line 168
            yield "            ";
            yield from             $this->unwrap()->yieldBlock("empty_collection", $context, $blocks);
            yield "
        ";
        } elseif (        // line 169
(isset($context["is_array_field"]) || array_key_exists("is_array_field", $context) ? $context["is_array_field"] : (function () { throw new RuntimeError('Variable "is_array_field" does not exist.', 169, $this->source); })())) {
            // line 170
            yield "            ";
            yield from             $this->unwrap()->yieldBlock("form_widget", $context, $blocks);
            yield "
        ";
        } else {
            // line 172
            yield "            <div class=\"accordion\">
                ";
            // line 173
            yield from             $this->unwrap()->yieldBlock("form_widget", $context, $blocks);
            yield "
            </div>
        ";
        }
        // line 176
        yield "    </div>

    ";
        // line 178
        if (((isset($context["isEmptyCollection"]) || array_key_exists("isEmptyCollection", $context) ? $context["isEmptyCollection"] : (function () { throw new RuntimeError('Variable "isEmptyCollection" does not exist.', 178, $this->source); })()) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 178), "prototype", [], "any", true, true, false, 178))) {
            // line 179
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 179, $this->source); })()), ["data-empty-collection" =>             $this->unwrap()->renderBlock("empty_collection", $context, $blocks)]);
            // line 180
            yield "    ";
        }
        // line 181
        yield "
    ";
        // line 182
        if ((((array_key_exists("allow_add", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["allow_add"]) || array_key_exists("allow_add", $context) ? $context["allow_add"] : (function () { throw new RuntimeError('Variable "allow_add" does not exist.', 182, $this->source); })()), false)) : (false)) &&  !(isset($context["disabled"]) || array_key_exists("disabled", $context) ? $context["disabled"] : (function () { throw new RuntimeError('Variable "disabled" does not exist.', 182, $this->source); })()))) {
            // line 183
            yield "        <button type=\"button\" class=\"btn btn-link field-collection-add-button\">
            ";
            // line 184
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:plus", "class" => "pr-1"]);
            yield "
            ";
            // line 185
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action.add_new_item", [], "EasyAdminBundle"), "html", null, true);
            yield "
        </button>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 190
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_collection_entry_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_entry_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "collection_entry_row"));

        // line 191
        yield "    ";
        $context["is_array_field"] = ("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\ArrayField" == ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 191, $this->source); })())), "vars", [], "any", false, true, false, 191), "ea_vars", [], "any", false, true, false, 191), "field", [], "any", false, true, false, 191), "fieldFqcn", [], "any", true, true, false, 191)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 191, $this->source); })())), "vars", [], "any", false, false, false, 191), "ea_vars", [], "any", false, false, false, 191), "field", [], "any", false, false, false, 191), "fieldFqcn", [], "any", false, false, false, 191), false)) : (false)));
        // line 192
        yield "    ";
        $context["is_complex"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 192, $this->source); })())), "vars", [], "any", false, true, false, 192), "ea_vars", [], "any", false, true, false, 192), "field", [], "any", false, true, false, 192), "customOptions", [], "any", false, true, false, 192), "get", ["entryIsComplex"], "method", true, true, false, 192) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 192, $this->source); })())), "vars", [], "any", false, false, false, 192), "ea_vars", [], "any", false, false, false, 192), "field", [], "any", false, false, false, 192), "customOptions", [], "any", false, false, false, 192), "get", ["entryIsComplex"], "method", false, false, false, 192)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 192, $this->source); })())), "vars", [], "any", false, false, false, 192), "ea_vars", [], "any", false, false, false, 192), "field", [], "any", false, false, false, 192), "customOptions", [], "any", false, false, false, 192), "get", ["entryIsComplex"], "method", false, false, false, 192)) : (false));
        // line 193
        yield "    ";
        $context["to_string_method"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 193, $this->source); })())), "vars", [], "any", false, true, false, 193), "ea_vars", [], "any", false, true, false, 193), "field", [], "any", false, true, false, 193), "customOptions", [], "any", false, true, false, 193), "get", ["entryToStringMethod"], "method", true, true, false, 193) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 193, $this->source); })())), "vars", [], "any", false, false, false, 193), "ea_vars", [], "any", false, false, false, 193), "field", [], "any", false, false, false, 193), "customOptions", [], "any", false, false, false, 193), "get", ["entryToStringMethod"], "method", false, false, false, 193)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 193, $this->source); })())), "vars", [], "any", false, false, false, 193), "ea_vars", [], "any", false, false, false, 193), "field", [], "any", false, false, false, 193), "customOptions", [], "any", false, false, false, 193), "get", ["entryToStringMethod"], "method", false, false, false, 193)) : (null));
        // line 194
        yield "    ";
        $context["allows_deleting_items"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 194, $this->source); })())), "vars", [], "any", false, true, false, 194), "allow_delete", [], "any", true, true, false, 194)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 194, $this->source); })())), "vars", [], "any", false, false, false, 194), "allow_delete", [], "any", false, false, false, 194), false)) : (false));
        // line 195
        yield "    ";
        $context["render_expanded"] = ( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 195, $this->source); })()), "vars", [], "any", false, false, false, 195), "valid", [], "any", false, false, false, 195) || ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 195, $this->source); })())), "vars", [], "any", false, true, false, 195), "ea_vars", [], "any", false, true, false, 195), "field", [], "any", false, true, false, 195), "customOptions", [], "any", false, true, false, 195), "get", ["renderExpanded"], "method", true, true, false, 195)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 195, $this->source); })())), "vars", [], "any", false, false, false, 195), "ea_vars", [], "any", false, false, false, 195), "field", [], "any", false, false, false, 195), "customOptions", [], "any", false, false, false, 195), "get", ["renderExpanded"], "method", false, false, false, 195), false)) : (false)));
        // line 196
        yield "    ";
        $context["delete_item_button"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 197
            yield "        <button type=\"button\" class=\"btn btn-link btn-link-danger field-collection-delete-button\"
                title=\"";
            // line 198
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action.remove_item", [], "EasyAdminBundle"), "html", null, true);
            yield "\">
            ";
            // line 199
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:delete"]);
            yield "
        </button>
    ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 202
        yield "
    <div class=\"field-collection-item ";
        // line 203
        yield (((isset($context["is_complex"]) || array_key_exists("is_complex", $context) ? $context["is_complex"] : (function () { throw new RuntimeError('Variable "is_complex" does not exist.', 203, $this->source); })())) ? ("field-collection-item-complex") : (""));
        yield " ";
        yield (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 203, $this->source); })()), "vars", [], "any", false, false, false, 203), "valid", [], "any", false, false, false, 203)) ? ("is-invalid") : (""));
        yield "\">
        ";
        // line 204
        if (((array_key_exists("is_array_field", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["is_array_field"]) || array_key_exists("is_array_field", $context) ? $context["is_array_field"] : (function () { throw new RuntimeError('Variable "is_array_field" does not exist.', 204, $this->source); })()), false)) : (false))) {
            // line 205
            yield "            ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 205, $this->source); })()), 'label');
            yield "
            ";
            // line 206
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 206, $this->source); })()), 'widget');
            yield "
            ";
            // line 207
            if (((isset($context["allows_deleting_items"]) || array_key_exists("allows_deleting_items", $context) ? $context["allows_deleting_items"] : (function () { throw new RuntimeError('Variable "allows_deleting_items" does not exist.', 207, $this->source); })()) &&  !(isset($context["disabled"]) || array_key_exists("disabled", $context) ? $context["disabled"] : (function () { throw new RuntimeError('Variable "disabled" does not exist.', 207, $this->source); })()))) {
                // line 208
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["delete_item_button"]) || array_key_exists("delete_item_button", $context) ? $context["delete_item_button"] : (function () { throw new RuntimeError('Variable "delete_item_button" does not exist.', 208, $this->source); })()), "html", null, true);
                yield "
            ";
            }
            // line 210
            yield "        ";
        } else {
            // line 211
            yield "            <div class=\"accordion-item\">
                <h2 class=\"accordion-header\">
                    <button class=\"accordion-button ";
            // line 213
            yield (((isset($context["render_expanded"]) || array_key_exists("render_expanded", $context) ? $context["render_expanded"] : (function () { throw new RuntimeError('Variable "render_expanded" does not exist.', 213, $this->source); })())) ? ("") : ("collapsed"));
            yield "\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 213, $this->source); })()), "html", null, true);
            yield "-contents\">
                        ";
            // line 214
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:chevron-right", "class" => "form-collection-item-collapse-marker"]);
            yield "
                        ";
            // line 215
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->representAsString((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 215, $this->source); })()), (isset($context["to_string_method"]) || array_key_exists("to_string_method", $context) ? $context["to_string_method"] : (function () { throw new RuntimeError('Variable "to_string_method" does not exist.', 215, $this->source); })())), "html", null, true);
            yield "
                    </button>

                    ";
            // line 218
            if (((isset($context["allows_deleting_items"]) || array_key_exists("allows_deleting_items", $context) ? $context["allows_deleting_items"] : (function () { throw new RuntimeError('Variable "allows_deleting_items" does not exist.', 218, $this->source); })()) &&  !(isset($context["disabled"]) || array_key_exists("disabled", $context) ? $context["disabled"] : (function () { throw new RuntimeError('Variable "disabled" does not exist.', 218, $this->source); })()))) {
                // line 219
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["delete_item_button"]) || array_key_exists("delete_item_button", $context) ? $context["delete_item_button"] : (function () { throw new RuntimeError('Variable "delete_item_button" does not exist.', 219, $this->source); })()), "html", null, true);
                yield "
                    ";
            }
            // line 221
            yield "                </h2>
                <div id=\"";
            // line 222
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 222, $this->source); })()), "html", null, true);
            yield "-contents\" class=\"accordion-collapse collapse ";
            yield (((isset($context["render_expanded"]) || array_key_exists("render_expanded", $context) ? $context["render_expanded"] : (function () { throw new RuntimeError('Variable "render_expanded" does not exist.', 222, $this->source); })())) ? ("show") : (""));
            yield "\">
                    <div class=\"accordion-body\">
                        <div class=\"row\">
                            ";
            // line 225
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 225, $this->source); })()), 'widget');
            yield "
                        </div>
                    </div>
                </div>
            </div>
        ";
        }
        // line 231
        yield "    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 234
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_widget_compound(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_compound"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_widget_compound"));

        // line 235
        yield "    <div class=\"form-widget-compound\">
        ";
        // line 236
        if (CoreExtension::inFilter("collection", (isset($context["block_prefixes"]) || array_key_exists("block_prefixes", $context) ? $context["block_prefixes"] : (function () { throw new RuntimeError('Variable "block_prefixes" does not exist.', 236, $this->source); })()))) {
            // line 237
            yield "            ";
            // line 239
            yield "            ";
            $context["isEmptyCollection"] = ((null === (isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 239, $this->source); })())) || (is_iterable((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 239, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["value"]) || array_key_exists("value", $context) ? $context["value"] : (function () { throw new RuntimeError('Variable "value" does not exist.', 239, $this->source); })()))));
            // line 240
            yield "            ";
            if ((isset($context["isEmptyCollection"]) || array_key_exists("isEmptyCollection", $context) ? $context["isEmptyCollection"] : (function () { throw new RuntimeError('Variable "isEmptyCollection" does not exist.', 240, $this->source); })())) {
                // line 241
                yield "                ";
                yield from                 $this->unwrap()->yieldBlock("empty_collection", $context, $blocks);
                yield "
            ";
            }
            // line 243
            yield "            ";
            if (((isset($context["isEmptyCollection"]) || array_key_exists("isEmptyCollection", $context) ? $context["isEmptyCollection"] : (function () { throw new RuntimeError('Variable "isEmptyCollection" does not exist.', 243, $this->source); })()) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 243), "prototype", [], "any", true, true, false, 243))) {
                // line 244
                yield "                ";
                $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 244, $this->source); })()), ["data-empty-collection" =>                 $this->unwrap()->renderBlock("empty_collection", $context, $blocks)]);
                // line 245
                yield "            ";
            }
            // line 246
            yield "        ";
        }
        // line 247
        yield "
        ";
        // line 248
        yield from $this->yieldParentBlock("form_widget_compound", $context, $blocks);
        yield "
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 252
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_button_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "button_row"));

        // line 253
        yield "<div class=\"form-group field-";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::first($this->env->getCharset(), Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["block_prefixes"]) || array_key_exists("block_prefixes", $context) ? $context["block_prefixes"] : (function () { throw new RuntimeError('Variable "block_prefixes" does not exist.', 253, $this->source); })()),  -2)), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["ea"] ?? null), "field", [], "any", false, true, false, 253), "css_class", [], "any", true, true, false, 253)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 253, $this->source); })()), "field", [], "any", false, false, false, 253), "css_class", [], "any", false, false, false, 253), "")) : ("")), "html", null, true);
        yield "\">";
        // line 254
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 254, $this->source); })()), 'widget');
        // line 255
        yield "</div>";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 260
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_form_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_label"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "form_label"));

        // line 261
        if (((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 261, $this->source); })()) === false)) {
        } else {
            // line 265
            if ((array_key_exists("compound", $context) && (isset($context["compound"]) || array_key_exists("compound", $context) ? $context["compound"] : (function () { throw new RuntimeError('Variable "compound" does not exist.', 265, $this->source); })()))) {
                // line 266
                $context["element"] = "legend";
                // line 267
                $context["label_attr"] = Twig\Extension\CoreExtension::merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 267, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 267)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 267, $this->source); })()), "class", [], "any", false, false, false, 267), "")) : ("")) . " col-form-label"))]);
            } else {
                // line 269
                $context["label_attr"] = Twig\Extension\CoreExtension::merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 269, $this->source); })()), ["for" => (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 269, $this->source); })()), "class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 269)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 269, $this->source); })()), "class", [], "any", false, false, false, 269), "")) : ("")) . " form-control-label"))]);
            }
            // line 271
            if ((isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new RuntimeError('Variable "required" does not exist.', 271, $this->source); })())) {
                // line 272
                $context["label_attr"] = Twig\Extension\CoreExtension::merge((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 272, $this->source); })()), ["class" => Twig\Extension\CoreExtension::trim((((CoreExtension::getAttribute($this->env, $this->source, ($context["label_attr"] ?? null), "class", [], "any", true, true, false, 272)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 272, $this->source); })()), "class", [], "any", false, false, false, 272), "")) : ("")) . " required"))]);
            }
            // line 274
            if (((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 274, $this->source); })()) === "")) {
            } elseif ((null ===             // line 277
(isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 277, $this->source); })()))) {
                // line 278
                if ( !Twig\Extension\CoreExtension::testEmpty((isset($context["label_format"]) || array_key_exists("label_format", $context) ? $context["label_format"] : (function () { throw new RuntimeError('Variable "label_format" does not exist.', 278, $this->source); })()))) {
                    // line 279
                    $context["label"] = Twig\Extension\CoreExtension::replace((isset($context["label_format"]) || array_key_exists("label_format", $context) ? $context["label_format"] : (function () { throw new RuntimeError('Variable "label_format" does not exist.', 279, $this->source); })()), ["%name%" =>                     // line 280
(isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 280, $this->source); })()), "%id%" =>                     // line 281
(isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 281, $this->source); })())]);
                } else {
                    // line 284
                    $context["label"] = $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 284, $this->source); })()));
                }
            }
            // line 287
            yield "<";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("element", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 287, $this->source); })()), "label")) : ("label")), "html", null, true);
            if ((isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 287, $this->source); })())) {
                $_v2 = $context;
                $_v3 = ["attr" => (isset($context["label_attr"]) || array_key_exists("label_attr", $context) ? $context["label_attr"] : (function () { throw new RuntimeError('Variable "label_attr" does not exist.', 287, $this->source); })())];
                if (!is_iterable($_v3)) {
                    throw new RuntimeError('Variables passed to the "with" tag must be a mapping.', 287, $this->getSourceContext());
                }
                $_v3 = CoreExtension::toArray($_v3);
                $context = $_v3 + $context + $this->env->getGlobals();
                yield from                 $this->unwrap()->yieldBlock("attributes", $context, $blocks);
                $context = $_v2;
            }
            yield ">";
            // line 288
            if (((isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 288, $this->source); })()) === false)) {
                // line 289
                if ((((array_key_exists("label_html", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["label_html"]) || array_key_exists("label_html", $context) ? $context["label_html"] : (function () { throw new RuntimeError('Variable "label_html" does not exist.', 289, $this->source); })()), false)) : (false)) === false)) {
                    // line 290
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 290, $this->source); })()), "html", null, true);
                } else {
                    // line 292
                    yield (isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 292, $this->source); })());
                }
            } else {
                // line 295
                if ((((array_key_exists("label_html", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["label_html"]) || array_key_exists("label_html", $context) ? $context["label_html"] : (function () { throw new RuntimeError('Variable "label_html" does not exist.', 295, $this->source); })()), false)) : (false)) === false)) {
                    // line 296
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 296, $this->source); })()), (isset($context["label_translation_parameters"]) || array_key_exists("label_translation_parameters", $context) ? $context["label_translation_parameters"] : (function () { throw new RuntimeError('Variable "label_translation_parameters" does not exist.', 296, $this->source); })()), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 296, $this->source); })())), "html", null, true);
                } else {
                    // line 298
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["label"]) || array_key_exists("label", $context) ? $context["label"] : (function () { throw new RuntimeError('Variable "label" does not exist.', 298, $this->source); })()), (isset($context["label_translation_parameters"]) || array_key_exists("label_translation_parameters", $context) ? $context["label_translation_parameters"] : (function () { throw new RuntimeError('Variable "label_translation_parameters" does not exist.', 298, $this->source); })()), (isset($context["translation_domain"]) || array_key_exists("translation_domain", $context) ? $context["translation_domain"] : (function () { throw new RuntimeError('Variable "translation_domain" does not exist.', 298, $this->source); })()));
                }
            }
            // line 301
            yield "</";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("element", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["element"]) || array_key_exists("element", $context) ? $context["element"] : (function () { throw new RuntimeError('Variable "element" does not exist.', 301, $this->source); })()), "label")) : ("label")), "html", null, true);
            yield ">";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 307
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_empty_collection(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "empty_collection"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "empty_collection"));

        // line 308
        yield "    <div class=\"empty collection-empty\">
        ";
        // line 309
        yield Twig\Extension\CoreExtension::include($this->env, $context, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 309, $this->source); })()), "templatePath", ["label/empty"], "method", false, false, false, 309));
        yield "
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 313
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_file_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_file_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_file_row"));

        // line 314
        yield "    ";
        $context["force_error"] = true;
        // line 315
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 318
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_file_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_file_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_file_widget"));

        // line 319
        yield "    <div class=\"ea-vich-file\">
        ";
        // line 320
        if ( !Twig\Extension\CoreExtension::testEmpty(((array_key_exists("download_uri", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 320, $this->source); })()), "")) : ("")))) {
            // line 321
            yield "            <a class=\"ea-vich-file-name\" href=\"";
            yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 321, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 321, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 321, $this->source); })()), "html", null, true)));
            yield "\">
                ";
            // line 322
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:file-lines"]);
            // line 323
            if (((array_key_exists("download_label", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["download_label"]) || array_key_exists("download_label", $context) ? $context["download_label"] : (function () { throw new RuntimeError('Variable "download_label" does not exist.', 323, $this->source); })()), false)) : (false))) {
                // line 324
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["download_label"]) || array_key_exists("download_label", $context) ? $context["download_label"] : (function () { throw new RuntimeError('Variable "download_label" does not exist.', 324, $this->source); })()), [], "VichUploaderBundle"), "html", null, true);
            } else {
                // line 326
                yield ((Twig\Extension\CoreExtension::last($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), (isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 326, $this->source); })()), "/"))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::last($this->env->getCharset(), Twig\Extension\CoreExtension::split($this->env->getCharset(), (isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 326, $this->source); })()), "/")), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("download", [], "VichUploaderBundle"), "html", null, true)));
            }
            // line 328
            yield "</a>
        ";
        }
        // line 330
        yield "
        ";
        // line 331
        $context["file_upload_js"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 332
            yield "            var newFile = document.getElementById('";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 332, $this->source); })()), "file", [], "any", false, false, false, 332), "vars", [], "any", false, false, false, 332), "id", [], "any", false, false, false, 332), "html", null, true);
            yield "').files[0];
            var fileSizeInMegabytes = newFile.size > 1024 * 1024;
            var fileSize = fileSizeInMegabytes ? newFile.size / (1024 * 1024) : newFile.size / 1024;
            document.getElementById('";
            // line 335
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 335, $this->source); })()), "file", [], "any", false, false, false, 335), "vars", [], "any", false, false, false, 335), "id", [], "any", false, false, false, 335), "html", null, true);
            yield "_new_file_name').innerText = newFile.name + ' (' + fileSize.toFixed(2) + ' ' + (fileSizeInMegabytes ? 'MB' : 'KB') + ')';
        ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 337
        yield "
        <div class=\"ea-vich-file-actions\">
            ";
        // line 340
        yield "            <div class=\"btn btn-secondary input-file-container\">
                ";
        // line 341
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:upload"]);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action.choose_file", [], "EasyAdminBundle"), "html", null, true);
        yield "
                ";
        // line 342
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 342, $this->source); })()), "file", [], "any", false, false, false, 342), 'widget', ["attr" => ["onchange" => (isset($context["file_upload_js"]) || array_key_exists("file_upload_js", $context) ? $context["file_upload_js"] : (function () { throw new RuntimeError('Variable "file_upload_js" does not exist.', 342, $this->source); })())], "vich" => true]);
        yield "
            </div>

            ";
        // line 345
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", true, true, false, 345)) {
            // line 346
            yield "                ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 346, $this->source); })()), "delete", [], "any", false, false, false, 346), 'row');
            yield "
            ";
        }
        // line 348
        yield "        </div>
        <div class=\"small\" id=\"";
        // line 349
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 349, $this->source); })()), "file", [], "any", false, false, false, 349), "vars", [], "any", false, false, false, 349), "id", [], "any", false, false, false, 349), "html", null, true);
        yield "_new_file_name\"></div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 353
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_image_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_image_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_image_row"));

        // line 354
        yield "    ";
        $context["force_error"] = true;
        // line 355
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_row", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 358
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_vich_image_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_image_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "vich_image_widget"));

        // line 359
        yield "    ";
        $context["formTypeOptions"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["ea_vars"] ?? null), "field", [], "any", false, true, false, 359), "formTypeOptions", [], "any", true, true, false, 359)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea_vars"]) || array_key_exists("ea_vars", $context) ? $context["ea_vars"] : (function () { throw new RuntimeError('Variable "ea_vars" does not exist.', 359, $this->source); })()), "field", [], "any", false, false, false, 359), "formTypeOptions", [], "any", false, false, false, 359), "")) : (""));
        // line 360
        yield "    <div class=\"ea-vich-image\">
        ";
        // line 361
        if ( !Twig\Extension\CoreExtension::testEmpty(((array_key_exists("image_uri", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 361, $this->source); })()), "")) : ("")))) {
            // line 362
            yield "            ";
            if (Twig\Extension\CoreExtension::testEmpty(((array_key_exists("download_uri", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 362, $this->source); })()), "")) : ("")))) {
                // line 363
                yield "                <div class=\"ea-lightbox-thumbnail\">
                    ";
                // line 364
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formTypeOptions"] ?? null), "imagine_pattern", [], "any", true, true, false, 364) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formTypeOptions"]) || array_key_exists("formTypeOptions", $context) ? $context["formTypeOptions"] : (function () { throw new RuntimeError('Variable "formTypeOptions" does not exist.', 364, $this->source); })()), "imagine_pattern", [], "any", false, false, false, 364)))) {
                    // line 365
                    yield "                        ";
                    // line 368
                    yield "                            <img style=\"cursor: initial\" src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 368, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 368, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 368, $this->source); })()), "html", null, true)));
                    yield "\">
                        ";
                    // line 370
                    yield "                    ";
                } else {
                    // line 371
                    yield "                        <img style=\"cursor: initial\" src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 371, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 371, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 371, $this->source); })()), "html", null, true)));
                    yield "\">
                    ";
                }
                // line 373
                yield "                </div>
            ";
            } else {
                // line 375
                yield "                ";
                $context["_lightbox_id"] = ("ea-lightbox-" . (isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 375, $this->source); })()));
                // line 376
                yield "
                <a href=\"#\" class=\"ea-lightbox-thumbnail\" data-ea-lightbox-content-selector=\"#";
                // line 377
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["_lightbox_id"]) || array_key_exists("_lightbox_id", $context) ? $context["_lightbox_id"] : (function () { throw new RuntimeError('Variable "_lightbox_id" does not exist.', 377, $this->source); })()), "html", null, true);
                yield "\">
                    ";
                // line 378
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formTypeOptions"] ?? null), "imagine_pattern", [], "any", true, true, false, 378) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formTypeOptions"]) || array_key_exists("formTypeOptions", $context) ? $context["formTypeOptions"] : (function () { throw new RuntimeError('Variable "formTypeOptions" does not exist.', 378, $this->source); })()), "imagine_pattern", [], "any", false, false, false, 378)))) {
                    // line 379
                    yield "                        ";
                    // line 382
                    yield "                            <img src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 382, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 382, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 382, $this->source); })()), "html", null, true)));
                    yield "\">
                        ";
                    // line 384
                    yield "                    ";
                } else {
                    // line 385
                    yield "                        <img src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 385, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 385, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["image_uri"]) || array_key_exists("image_uri", $context) ? $context["image_uri"] : (function () { throw new RuntimeError('Variable "image_uri" does not exist.', 385, $this->source); })()), "html", null, true)));
                    yield "\">
                    ";
                }
                // line 387
                yield "                </a>

                <div id=\"";
                // line 389
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["_lightbox_id"]) || array_key_exists("_lightbox_id", $context) ? $context["_lightbox_id"] : (function () { throw new RuntimeError('Variable "_lightbox_id" does not exist.', 389, $this->source); })()), "html", null, true);
                yield "\" class=\"ea-lightbox\">
                    ";
                // line 390
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["formTypeOptions"] ?? null), "imagine_pattern", [], "any", true, true, false, 390) &&  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["formTypeOptions"]) || array_key_exists("formTypeOptions", $context) ? $context["formTypeOptions"] : (function () { throw new RuntimeError('Variable "formTypeOptions" does not exist.', 390, $this->source); })()), "imagine_pattern", [], "any", false, false, false, 390)))) {
                    // line 391
                    yield "                        ";
                    // line 394
                    yield "                            <img src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 394, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 394, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 394, $this->source); })()), "html", null, true)));
                    yield "\">
                        ";
                    // line 396
                    yield "                    ";
                } else {
                    // line 397
                    yield "                        <img src=\"";
                    yield ((((isset($context["asset_helper"]) || array_key_exists("asset_helper", $context) ? $context["asset_helper"] : (function () { throw new RuntimeError('Variable "asset_helper" does not exist.', 397, $this->source); })()) === true)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 397, $this->source); })())), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["download_uri"]) || array_key_exists("download_uri", $context) ? $context["download_uri"] : (function () { throw new RuntimeError('Variable "download_uri" does not exist.', 397, $this->source); })()), "html", null, true)));
                    yield "\">
                    ";
                }
                // line 399
                yield "                </div>
            ";
            }
            // line 401
            yield "        ";
        }
        // line 402
        yield "
        ";
        // line 403
        $context["file_upload_js"] = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 404
            yield "            var newFile = document.getElementById('";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 404, $this->source); })()), "file", [], "any", false, false, false, 404), "vars", [], "any", false, false, false, 404), "id", [], "any", false, false, false, 404), "html", null, true);
            yield "').files[0];
            var fileSizeInMegabytes = newFile.size > 1024 * 1024;
            var fileSize = fileSizeInMegabytes ? newFile.size / (1024 * 1024) : newFile.size / 1024;
            document.getElementById('";
            // line 407
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 407, $this->source); })()), "file", [], "any", false, false, false, 407), "vars", [], "any", false, false, false, 407), "id", [], "any", false, false, false, 407), "html", null, true);
            yield "_new_file_name').innerText = newFile.name + ' (' + fileSize.toFixed(2) + ' ' + (fileSizeInMegabytes ? 'MB' : 'KB') + ')';
        ";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 409
        yield "
        <div class=\"ea-vich-image-actions\">
            ";
        // line 412
        yield "            <div class=\"btn btn-secondary input-file-container\">
                ";
        // line 413
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:upload"]);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("action.choose_file", [], "EasyAdminBundle"), "html", null, true);
        yield "
                ";
        // line 414
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 414, $this->source); })()), "file", [], "any", false, false, false, 414), 'widget', ["attr" => ["onchange" => (isset($context["file_upload_js"]) || array_key_exists("file_upload_js", $context) ? $context["file_upload_js"] : (function () { throw new RuntimeError('Variable "file_upload_js" does not exist.', 414, $this->source); })())], "vich" => true]);
        yield "
            </div>

            ";
        // line 417
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "delete", [], "any", true, true, false, 417)) {
            // line 418
            yield "                ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 418, $this->source); })()), "delete", [], "any", false, false, false, 418), 'row');
            yield "
            ";
        }
        // line 420
        yield "        </div>
        <div class=\"small\" id=\"";
        // line 421
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 421, $this->source); })()), "file", [], "any", false, false, false, 421), "vars", [], "any", false, false, false, 421), "id", [], "any", false, false, false, 421), "html", null, true);
        yield "_new_file_name\"></div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 425
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_crud_rest(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_rest"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_rest"));

        // line 426
        yield "    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 426, $this->source); })()), 'rest');
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 430
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_crud_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget"));

        // line 431
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 431, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 432
            yield "        ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'row');
            yield "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 437
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_crud_widget_panels(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_panels"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_panels"));

        // line 438
        yield "    ";
        trigger_deprecation('', '', "The \"ea_crud_widget_panels\" block is deprecated because the form layout building logic has been revamped. Check \"ea_crud_widget\" block in `form_theme.html.page` for more details."." in \"@EasyAdmin/crud/form_theme.html.twig\" at line 438.");
        // line 439
        yield "
    ";
        // line 440
        yield from         $this->unwrap()->yieldBlock("ea_crud_widget_fieldsets", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 443
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_crud_widget_fieldsets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_fieldsets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_crud_widget_fieldsets"));

        // line 444
        yield "    ";
        trigger_deprecation('', '', "The \"ea_crud_widget_fieldsets\" block is deprecated because the form layout building logic has been revamped. Check \"ea_crud_widget\" block in `form_theme.html.page` for more details."." in \"@EasyAdmin/crud/form_theme.html.twig\" at line 444.");
        // line 445
        yield "
    ";
        // line 446
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 446, $this->source); })()), "vars", [], "any", false, false, false, 446), "ea_crud_form", [], "any", false, false, false, 446), "form_fieldsets", [], "any", false, false, false, 446), function ($__fieldset_config__) use ($context, $macros) { $context["fieldset_config"] = $__fieldset_config__; return ( !CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "form_tab", [], "any", false, false, false, 446) || (CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "form_tab", [], "any", false, false, false, 446) == (isset($context["tab_name"]) || array_key_exists("tab_name", $context) ? $context["tab_name"] : (function () { throw new RuntimeError('Variable "tab_name" does not exist.', 446, $this->source); })()))); }));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["fieldset_name"] => $context["fieldset_config"]) {
            // line 447
            yield "        ";
            $context["fieldset_has_header"] = ((((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "label", [], "any", true, true, false, 447)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "label", [], "any", false, false, false, 447), false)) : (false)) || ((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "icon", [], "any", true, true, false, 447)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "icon", [], "any", false, false, false, 447), false)) : (false))) || ((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", true, true, false, 447)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", false, false, false, 447), false)) : (false)));
            // line 448
            yield "
        ";
            // line 449
            $context["collapsible"] = CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "collapsible", [], "any", false, false, false, 449);
            // line 450
            yield "        ";
            $context["collapsed"] = CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "collapsed", [], "any", false, false, false, 450);
            // line 451
            yield "
        <div class=\"";
            // line 452
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "css_class", [], "any", true, true, false, 452) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "css_class", [], "any", false, false, false, 452)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "css_class", [], "any", false, false, false, 452), "html", null, true)) : (""));
            yield "\">
            <fieldset class=\"form-fieldset\">
                ";
            // line 454
            if ((isset($context["fieldset_has_header"]) || array_key_exists("fieldset_has_header", $context) ? $context["fieldset_has_header"] : (function () { throw new RuntimeError('Variable "fieldset_has_header" does not exist.', 454, $this->source); })())) {
                // line 455
                yield "                    <div class=\"form-fieldset-header ";
                yield (((isset($context["collapsible"]) || array_key_exists("collapsible", $context) ? $context["collapsible"] : (function () { throw new RuntimeError('Variable "collapsible" does not exist.', 455, $this->source); })())) ? ("collapsible") : (""));
                yield " ";
                yield (( !Twig\Extension\CoreExtension::testEmpty(((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", true, true, false, 455)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", false, false, false, 455), false)) : (false)))) ? ("with-help") : (""));
                yield "\">
                        <div class=\"form-fieldset-title\">
                            <a ";
                // line 457
                if ( !(isset($context["collapsible"]) || array_key_exists("collapsible", $context) ? $context["collapsible"] : (function () { throw new RuntimeError('Variable "collapsible" does not exist.', 457, $this->source); })())) {
                    // line 458
                    yield "                                href=\"#\" class=\"not-collapsible\"
                            ";
                } else {
                    // line 460
                    yield "                                href=\"#content-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["fieldset_name"], "html", null, true);
                    yield "\" data-bs-toggle=\"collapse\"
                                class=\"form-fieldset-collapse ";
                    // line 461
                    yield (((isset($context["collapsed"]) || array_key_exists("collapsed", $context) ? $context["collapsed"] : (function () { throw new RuntimeError('Variable "collapsed" does not exist.', 461, $this->source); })())) ? ("collapsed") : (""));
                    yield "\"
                                aria-expanded=\"";
                    // line 462
                    yield (((isset($context["collapsed"]) || array_key_exists("collapsed", $context) ? $context["collapsed"] : (function () { throw new RuntimeError('Variable "collapsed" does not exist.', 462, $this->source); })())) ? ("false") : ("true"));
                    yield "\" aria-controls=\"content-";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["fieldset_name"], "html", null, true);
                    yield "\"
                            ";
                }
                // line 464
                yield "                            >
                                ";
                // line 465
                if ((isset($context["collapsible"]) || array_key_exists("collapsible", $context) ? $context["collapsible"] : (function () { throw new RuntimeError('Variable "collapsible" does not exist.', 465, $this->source); })())) {
                    // line 466
                    yield "                                    ";
                    yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:chevron-right", "class" => "form-fieldset-collapse-marker"]);
                    yield "
                                ";
                }
                // line 468
                yield "
                                ";
                // line 469
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "icon", [], "any", true, true, false, 469)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "icon", [], "any", false, false, false, 469), false)) : (false))) {
                    // line 470
                    yield "                                    ";
                    yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "icon", [], "any", false, false, false, 470), "class" => "form-fieldset-icon"]);
                    yield "
                                ";
                }
                // line 472
                yield "                                ";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "label", [], "any", false, false, false, 472));
                yield "
                            </a>

                            ";
                // line 475
                if (((CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", true, true, false, 475)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", false, false, false, 475), false)) : (false))) {
                    // line 476
                    yield "                                <div class=\"form-fieldset-help\">";
                    yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["fieldset_config"], "help", [], "any", false, false, false, 476));
                    yield "</div>
                            ";
                }
                // line 478
                yield "                        </div>
                    </div>
                ";
            }
            // line 481
            yield "
                <div id=\"content-";
            // line 482
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["fieldset_name"], "html", null, true);
            yield "\" class=\"form-fieldset-body ";
            yield (( !(isset($context["fieldset_has_header"]) || array_key_exists("fieldset_has_header", $context) ? $context["fieldset_has_header"] : (function () { throw new RuntimeError('Variable "fieldset_has_header" does not exist.', 482, $this->source); })())) ? ("without-header") : (""));
            yield " ";
            yield (((isset($context["collapsible"]) || array_key_exists("collapsible", $context) ? $context["collapsible"] : (function () { throw new RuntimeError('Variable "collapsible" does not exist.', 482, $this->source); })())) ? ("collapse") : (""));
            yield " ";
            yield (( !(isset($context["collapsed"]) || array_key_exists("collapsed", $context) ? $context["collapsed"] : (function () { throw new RuntimeError('Variable "collapsed" does not exist.', 482, $this->source); })())) ? ("show") : (""));
            yield "\">
                    <div class=\"row\">
                        ";
            // line 484
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 484, $this->source); })()), function ($__field__) use ($context, $macros) { $context["field"] = $__field__; return (!CoreExtension::inFilter("hidden", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 484), "block_prefixes", [], "any", false, false, false, 484)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 484), "ea_crud_form", [], "any", false, false, false, 484), "form_fieldset", [], "any", false, false, false, 484) == $context["fieldset_name"])); }));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 485
                yield "                            ";
                if (( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 485), "ea_crud_form", [], "any", false, false, false, 485), "form_tab", [], "any", false, false, false, 485) || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 485), "ea_crud_form", [], "any", false, false, false, 485), "form_tab", [], "any", false, false, false, 485) == (isset($context["tab_name"]) || array_key_exists("tab_name", $context) ? $context["tab_name"] : (function () { throw new RuntimeError('Variable "tab_name" does not exist.', 485, $this->source); })())))) {
                    // line 486
                    yield "                                ";
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'row');
                    yield "
                            ";
                }
                // line 488
                yield "                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 489
            yield "                    </div>
                </div>
            </fieldset>
        </div>
    ";
            $context['_iterated'] = true;
        }
        // line 493
        if (!$context['_iterated']) {
            // line 494
            yield "        ";
            // line 505
            yield "        ";
            yield $this->getTemplateForMacro("macro_recursiveFieldsetForm", $context, 505, $this->getSourceContext())->macro_recursiveFieldsetForm(...[(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 505, $this->source); })())]);
            yield "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['fieldset_name'], $context['fieldset_config'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 510
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_autocomplete_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_autocomplete_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_autocomplete_widget"));

        // line 511
        yield "    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 511, $this->source); })()), "autocomplete", [], "any", false, false, false, 511), 'widget', ["attr" => Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 511, $this->source); })()), ["required" => (isset($context["required"]) || array_key_exists("required", $context) ? $context["required"] : (function () { throw new RuntimeError('Variable "required" does not exist.', 511, $this->source); })())])]);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 514
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_autocomplete_inner_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_autocomplete_inner_label"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_autocomplete_inner_label"));

        // line 515
        yield "    ";
        $context["name"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, Symfony\Bridge\Twig\Extension\twig_get_form_parent((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 515, $this->source); })())), "vars", [], "any", false, false, false, 515), "name", [], "any", false, false, false, 515);
        // line 516
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("form_label", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 520
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_code_editor_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_code_editor_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_code_editor_widget"));

        // line 521
        yield "    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 521, $this->source); })()), 'widget', ["attr" => Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 521, $this->source); })()), ["data-ea-code-editor-field" => "true", "data-language" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 523
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 523, $this->source); })()), "vars", [], "any", false, false, false, 523), "ea_vars", [], "any", false, false, false, 523), "field", [], "any", false, false, false, 523), "customOptions", [], "any", false, false, false, 523), "get", ["language"], "method", false, false, false, 523), "data-tab-size" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 524
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 524, $this->source); })()), "vars", [], "any", false, false, false, 524), "ea_vars", [], "any", false, false, false, 524), "field", [], "any", false, false, false, 524), "customOptions", [], "any", false, false, false, 524), "get", ["tabSize"], "method", false, false, false, 524), "data-indent-with-tabs" => ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 525
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 525, $this->source); })()), "vars", [], "any", false, false, false, 525), "ea_vars", [], "any", false, false, false, 525), "field", [], "any", false, false, false, 525), "customOptions", [], "any", false, false, false, 525), "get", ["indentWithTabs"], "method", false, false, false, 525)) ? ("true") : ("false")), "data-show-line-numbers" => ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 526
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 526, $this->source); })()), "vars", [], "any", false, false, false, 526), "ea_vars", [], "any", false, false, false, 526), "field", [], "any", false, false, false, 526), "customOptions", [], "any", false, false, false, 526), "get", ["showLineNumbers"], "method", false, false, false, 526)) ? ("true") : ("false")), "data-number-of-rows" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 527
(isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 527, $this->source); })()), "vars", [], "any", false, false, false, 527), "ea_vars", [], "any", false, false, false, 527), "field", [], "any", false, false, false, 527), "customOptions", [], "any", false, false, false, 527), "get", ["numOfRows"], "method", false, false, false, 527)])]);
        // line 528
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 532
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_text_editor_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_text_editor_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_text_editor_widget"));

        // line 533
        yield "    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 533, $this->source); })()), 'widget', ["attr" => Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 533, $this->source); })()), ["class" => "ea-text-editor-content d-none", "data-number-of-rows" => ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 535
($context["form"] ?? null), "vars", [], "any", false, true, false, 535), "ea_vars", [], "any", false, true, false, 535), "field", [], "any", false, true, false, 535), "customOptions", [], "any", false, true, false, 535), "get", ["numOfRows"], "method", true, true, false, 535)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 535, $this->source); })()), "vars", [], "any", false, false, false, 535), "ea_vars", [], "any", false, false, false, 535), "field", [], "any", false, false, false, 535), "customOptions", [], "any", false, false, false, 535), "get", ["numOfRows"], "method", false, false, false, 535), 5)) : (5)), "data-trix-editor-config" => json_encode(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,         // line 536
($context["form"] ?? null), "vars", [], "any", false, true, false, 536), "ea_vars", [], "any", false, true, false, 536), "field", [], "any", false, true, false, 536), "customOptions", [], "any", false, true, false, 536), "get", ["trixEditorConfig"], "method", true, true, false, 536)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 536, $this->source); })()), "vars", [], "any", false, false, false, 536), "ea_vars", [], "any", false, false, false, 536), "field", [], "any", false, false, false, 536), "customOptions", [], "any", false, false, false, 536), "get", ["trixEditorConfig"], "method", false, false, false, 536), null)) : (null)))])]);
        // line 537
        yield "

    <div class=\"ea-text-editor-wrapper ";
        // line 539
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((CoreExtension::getAttribute($this->env, $this->source, ($context["row_attr"] ?? null), "class", [], "any", true, true, false, 539)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["row_attr"]) || array_key_exists("row_attr", $context) ? $context["row_attr"] : (function () { throw new RuntimeError('Variable "row_attr" does not exist.', 539, $this->source); })()), "class", [], "any", false, false, false, 539), "")) : ("")) . (( !(isset($context["valid"]) || array_key_exists("valid", $context) ? $context["valid"] : (function () { throw new RuntimeError('Variable "valid" does not exist.', 539, $this->source); })())) ? (" has-error") : (""))), "html", null, true);
        yield "\">
        <trix-editor input=\"";
        // line 540
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["id"]) || array_key_exists("id", $context) ? $context["id"] : (function () { throw new RuntimeError('Variable "id" does not exist.', 540, $this->source); })()), "html", null, true);
        yield "\" class=\"trix-content\"></trix-editor>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 545
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_row_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_row_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_row_row"));

        // line 546
        yield "    <div class=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 546, $this->source); })()), "vars", [], "any", false, false, false, 546), "row_attr", [], "any", false, false, false, 546), "class", [], "any", false, false, false, 546), "html", null, true);
        yield "\"></div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 549
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_column_group_open_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_group_open_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_group_open_row"));

        // line 550
        yield "    ";
        // line 551
        yield "    ";
        if ( !((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 551), "ea_is_inside_tab", [], "any", true, true, false, 551)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 551, $this->source); })()), "vars", [], "any", false, false, false, 551), "ea_is_inside_tab", [], "any", false, false, false, 551), false)) : (false))) {
            // line 552
            yield "        <div class=\"row\">
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 556
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_column_group_close_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_group_close_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_group_close_row"));

        // line 557
        yield "    ";
        // line 559
        yield "    ";
        if ( !((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "vars", [], "any", false, true, false, 559), "ea_is_inside_tab", [], "any", true, true, false, 559)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 559, $this->source); })()), "vars", [], "any", false, false, false, 559), "ea_is_inside_tab", [], "any", false, false, false, 559), false)) : (false))) {
            // line 560
            yield "        </div>
    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 564
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_column_open_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_open_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_open_row"));

        // line 565
        yield "    ";
        $context["field"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 565, $this->source); })()), "vars", [], "any", false, false, false, 565), "ea_vars", [], "any", false, false, false, 565), "field", [], "any", false, false, false, 565);
        // line 566
        yield "    ";
        $context["field_icon"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 566, $this->source); })()), "getCustomOption", ["icon"], "method", false, false, false, 566);
        // line 567
        yield "    ";
        $context["column_has_title"] = ((((((isset($context["field_icon"]) || array_key_exists("field_icon", $context) ? $context["field_icon"] : (function () { throw new RuntimeError('Variable "field_icon" does not exist.', 567, $this->source); })()) != null) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 567, $this->source); })()), "label", [], "any", false, false, false, 567) != false)) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 567, $this->source); })()), "label", [], "any", false, false, false, 567) != null)) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 567, $this->source); })()), "label", [], "any", false, false, false, 567) != "")) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 567, $this->source); })()), "help", [], "any", false, false, false, 567) != null));
        // line 568
        yield "
    <div class=\"form-column ";
        // line 569
        yield (( !(isset($context["column_has_title"]) || array_key_exists("column_has_title", $context) ? $context["column_has_title"] : (function () { throw new RuntimeError('Variable "column_has_title" does not exist.', 569, $this->source); })())) ? ("form-column-no-header") : (""));
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 569, $this->source); })()), "cssClass", [], "any", false, false, false, 569), "html", null, true);
        yield "\">
        ";
        // line 570
        if ((isset($context["column_has_title"]) || array_key_exists("column_has_title", $context) ? $context["column_has_title"] : (function () { throw new RuntimeError('Variable "column_has_title" does not exist.', 570, $this->source); })())) {
            // line 571
            yield "            <div class=\"form-column-title\">
                <div class=\"form-column-title-content\">
                    ";
            // line 573
            if ((isset($context["field_icon"]) || array_key_exists("field_icon", $context) ? $context["field_icon"] : (function () { throw new RuntimeError('Variable "field_icon" does not exist.', 573, $this->source); })())) {
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["field_icon"]) || array_key_exists("field_icon", $context) ? $context["field_icon"] : (function () { throw new RuntimeError('Variable "field_icon" does not exist.', 573, $this->source); })()), "class" => "form-column-icon"]);
            }
            // line 574
            yield "                    ";
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 574, $this->source); })()), "label", [], "any", false, false, false, 574)) {
                yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((CoreExtension::getAttribute($this->env, $this->source, ($context["field"] ?? null), "label", [], "any", true, true, false, 574)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 574, $this->source); })()), "label", [], "any", false, false, false, 574), "")) : ("")), [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 574, $this->source); })()), "i18n", [], "any", false, false, false, 574), "translationDomain", [], "any", false, false, false, 574));
            }
            // line 575
            yield "                </div>

                ";
            // line 577
            if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 577, $this->source); })()), "help", [], "any", false, false, false, 577)) {
                // line 578
                yield "                    <div class=\"form-column-help\">";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 578, $this->source); })()), "help", [], "any", false, false, false, 578), [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 578, $this->source); })()), "i18n", [], "any", false, false, false, 578), "translationDomain", [], "any", false, false, false, 578));
                yield "</div>
                ";
            }
            // line 580
            yield "            </div>
        ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 584
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_column_close_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_close_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_column_close_row"));

        // line 585
        yield "    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 588
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_fieldset_open_ealabel(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_ealabel"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_ealabel"));

        // line 589
        yield "    ";
        if ((isset($context["ea_is_collapsible"]) || array_key_exists("ea_is_collapsible", $context) ? $context["ea_is_collapsible"] : (function () { throw new RuntimeError('Variable "ea_is_collapsible" does not exist.', 589, $this->source); })())) {
            // line 590
            yield "        ";
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:chevron-right", "class" => "form-fieldset-collapse-marker"]);
            yield "
    ";
        }
        // line 592
        yield "
    ";
        // line 593
        if ((isset($context["ea_icon"]) || array_key_exists("ea_icon", $context) ? $context["ea_icon"] : (function () { throw new RuntimeError('Variable "ea_icon" does not exist.', 593, $this->source); })())) {
            // line 594
            yield "        ";
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => (isset($context["ea_icon"]) || array_key_exists("ea_icon", $context) ? $context["ea_icon"] : (function () { throw new RuntimeError('Variable "ea_icon" does not exist.', 594, $this->source); })()), "class" => "form-fieldset-icon"]);
            yield "
    ";
        }
        // line 596
        yield "
    ";
        // line 597
        yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 597, $this->source); })()), "vars", [], "any", false, false, false, 597), "label", [], "any", false, false, false, 597));
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 600
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_fieldset_open_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_label"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_label"));

        // line 601
        yield "    <div class=\"form-fieldset-header ";
        yield (((isset($context["ea_is_collapsible"]) || array_key_exists("ea_is_collapsible", $context) ? $context["ea_is_collapsible"] : (function () { throw new RuntimeError('Variable "ea_is_collapsible" does not exist.', 601, $this->source); })())) ? ("collapsible") : (""));
        yield " ";
        yield (( !Twig\Extension\CoreExtension::testEmpty((isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 601, $this->source); })()))) ? ("with-help") : (""));
        yield "\">
        <div class=\"form-fieldset-title\">
            ";
        // line 603
        if ((isset($context["ea_is_collapsible"]) || array_key_exists("ea_is_collapsible", $context) ? $context["ea_is_collapsible"] : (function () { throw new RuntimeError('Variable "ea_is_collapsible" does not exist.', 603, $this->source); })())) {
            // line 604
            yield "                <a href=\"#content-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 604, $this->source); })()), "vars", [], "any", false, false, false, 604), "name", [], "any", false, false, false, 604), "html", null, true);
            yield "\" data-bs-toggle=\"collapse\"
                   class=\"form-fieldset-title-content form-fieldset-collapse ";
            // line 605
            yield (((isset($context["ea_is_collapsed"]) || array_key_exists("ea_is_collapsed", $context) ? $context["ea_is_collapsed"] : (function () { throw new RuntimeError('Variable "ea_is_collapsed" does not exist.', 605, $this->source); })())) ? ("collapsed") : (""));
            yield "\"
                   aria-expanded=\"";
            // line 606
            yield (((isset($context["ea_is_collapsed"]) || array_key_exists("ea_is_collapsed", $context) ? $context["ea_is_collapsed"] : (function () { throw new RuntimeError('Variable "ea_is_collapsed" does not exist.', 606, $this->source); })())) ? ("false") : ("true"));
            yield "\" aria-controls=\"content-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 606, $this->source); })()), "vars", [], "any", false, false, false, 606), "name", [], "any", false, false, false, 606), "html", null, true);
            yield "\">
                    ";
            // line 607
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 607, $this->source); })()), 'ealabel');
            yield "
                </a>
            ";
        } else {
            // line 610
            yield "                <span class=\"not-collapsible form-fieldset-title-content\">
                    ";
            // line 611
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 611, $this->source); })()), 'ealabel');
            yield "
                </span>
            ";
        }
        // line 614
        yield "
            ";
        // line 615
        if ((isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 615, $this->source); })())) {
            // line 616
            yield "                <div class=\"form-fieldset-help\">";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 616, $this->source); })()));
            yield "</div>
            ";
        }
        // line 618
        yield "        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 622
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_fieldset_open_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_open_row"));

        // line 623
        yield "    ";
        $context["fieldset_has_header"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 623, $this->source); })()), "vars", [], "any", false, false, false, 623), "label", [], "any", false, false, false, 623) || (isset($context["ea_icon"]) || array_key_exists("ea_icon", $context) ? $context["ea_icon"] : (function () { throw new RuntimeError('Variable "ea_icon" does not exist.', 623, $this->source); })())) || (isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 623, $this->source); })()));
        // line 624
        yield "
    <div class=\"form-fieldset ";
        // line 625
        yield (( !(isset($context["fieldset_has_header"]) || array_key_exists("fieldset_has_header", $context) ? $context["fieldset_has_header"] : (function () { throw new RuntimeError('Variable "fieldset_has_header" does not exist.', 625, $this->source); })())) ? ("form-fieldset-no-header") : (""));
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ea_css_class"]) || array_key_exists("ea_css_class", $context) ? $context["ea_css_class"] : (function () { throw new RuntimeError('Variable "ea_css_class" does not exist.', 625, $this->source); })()), "html", null, true);
        yield "\">
        <fieldset>
            ";
        // line 627
        if ((isset($context["fieldset_has_header"]) || array_key_exists("fieldset_has_header", $context) ? $context["fieldset_has_header"] : (function () { throw new RuntimeError('Variable "fieldset_has_header" does not exist.', 627, $this->source); })())) {
            // line 628
            yield "                ";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 628, $this->source); })()), 'label');
            yield "
            ";
        }
        // line 630
        yield "
            <div id=\"content-";
        // line 631
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 631, $this->source); })()), "vars", [], "any", false, false, false, 631), "name", [], "any", false, false, false, 631), "html", null, true);
        yield "\" class=\"form-fieldset-body ";
        yield (( !(isset($context["fieldset_has_header"]) || array_key_exists("fieldset_has_header", $context) ? $context["fieldset_has_header"] : (function () { throw new RuntimeError('Variable "fieldset_has_header" does not exist.', 631, $this->source); })())) ? ("without-header") : (""));
        yield " ";
        yield (((isset($context["ea_is_collapsible"]) || array_key_exists("ea_is_collapsible", $context) ? $context["ea_is_collapsible"] : (function () { throw new RuntimeError('Variable "ea_is_collapsible" does not exist.', 631, $this->source); })())) ? ("collapse") : (""));
        yield " ";
        yield (( !(isset($context["ea_is_collapsed"]) || array_key_exists("ea_is_collapsed", $context) ? $context["ea_is_collapsed"] : (function () { throw new RuntimeError('Variable "ea_is_collapsed" does not exist.', 631, $this->source); })())) ? ("show") : (""));
        yield "\">
                <div class=\"row\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 635
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_fieldset_close_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_close_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_fieldset_close_row"));

        // line 636
        yield "                </div>
            </div>
        </fieldset>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 642
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_tablist_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tablist_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tablist_row"));

        // line 643
        yield "    ";
        $context["tab_id_option_name"] = Twig\Extension\CoreExtension::constant("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\FormField::OPTION_TAB_ID");
        // line 644
        yield "    ";
        $context["tab_is_active_option_name"] = Twig\Extension\CoreExtension::constant("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\FormField::OPTION_TAB_IS_ACTIVE");
        // line 645
        yield "    ";
        $context["tab_error_count_option_name"] = Twig\Extension\CoreExtension::constant("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\FormField::OPTION_TAB_ERROR_COUNT");
        // line 646
        yield "    ";
        $context["field"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 646, $this->source); })()), "vars", [], "any", false, false, false, 646), "ea_vars", [], "any", false, false, false, 646), "field", [], "any", false, false, false, 646);
        // line 647
        yield "
    <div class=\"nav-tabs-custom form-tabs-tablist\">
        <ul class=\"nav nav-tabs\">
            ";
        // line 650
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 650, $this->source); })()), "getCustomOption", ["tabs"], "method", false, false, false, 650));
        foreach ($context['_seq'] as $context["_key"] => $context["tab"]) {
            // line 651
            yield "                <li class=\"nav-item\">
                    <a class=\"nav-link ";
            // line 652
            if (CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", [(isset($context["tab_is_active_option_name"]) || array_key_exists("tab_is_active_option_name", $context) ? $context["tab_is_active_option_name"] : (function () { throw new RuntimeError('Variable "tab_is_active_option_name" does not exist.', 652, $this->source); })())], "method", false, false, false, 652)) {
                yield "active";
            }
            yield "\" href=\"#";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", [(isset($context["tab_id_option_name"]) || array_key_exists("tab_id_option_name", $context) ? $context["tab_id_option_name"] : (function () { throw new RuntimeError('Variable "tab_id_option_name" does not exist.', 652, $this->source); })())], "method", false, false, false, 652), "html", null, true);
            yield "\" id=\"tablist-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", [(isset($context["tab_id_option_name"]) || array_key_exists("tab_id_option_name", $context) ? $context["tab_id_option_name"] : (function () { throw new RuntimeError('Variable "tab_id_option_name" does not exist.', 652, $this->source); })())], "method", false, false, false, 652), "html", null, true);
            yield "\" data-bs-toggle=\"tab\">";
            // line 653
            if (((CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", ["icon"], "method", true, true, false, 653)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", ["icon"], "method", false, false, false, 653), false)) : (false))) {
                // line 654
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", ["icon"], "method", false, false, false, 654), "class" => "tab-nav-item-icon"]);
            }
            // line 656
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "label", [], "any", false, false, false, 656), [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 656, $this->source); })()), "i18n", [], "any", false, false, false, 656), "translationDomain", [], "any", false, false, false, 656));
            yield "

                        ";
            // line 658
            $context["tab_error_count"] = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "getCustomOption", [(isset($context["tab_error_count_option_name"]) || array_key_exists("tab_error_count_option_name", $context) ? $context["tab_error_count_option_name"] : (function () { throw new RuntimeError('Variable "tab_error_count_option_name" does not exist.', 658, $this->source); })())], "method", false, false, false, 658);
            // line 659
            if (((isset($context["tab_error_count"]) || array_key_exists("tab_error_count", $context) ? $context["tab_error_count"] : (function () { throw new RuntimeError('Variable "tab_error_count" does not exist.', 659, $this->source); })()) > 0)) {
                // line 660
                yield "<span class=\"badge badge-danger\" title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("form.tab.error_badge_title", ["%count%" => (isset($context["tab_error_count"]) || array_key_exists("tab_error_count", $context) ? $context["tab_error_count"] : (function () { throw new RuntimeError('Variable "tab_error_count" does not exist.', 660, $this->source); })())], "EasyAdminBundle"), "html", null, true);
                yield "\">";
                // line 661
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["tab_error_count"]) || array_key_exists("tab_error_count", $context) ? $context["tab_error_count"] : (function () { throw new RuntimeError('Variable "tab_error_count" does not exist.', 661, $this->source); })()), "html", null, true);
                // line 662
                yield "</span>";
            }
            // line 664
            yield "</a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['tab'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 667
        yield "        </ul>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 671
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_tabpane_group_open_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_group_open_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_group_open_row"));

        // line 672
        yield "    <div class=\"nav-tabs-custom form-tabs-content\">
        <div class=\"tab-content\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 676
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_tabpane_group_close_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_group_close_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_group_close_row"));

        // line 677
        yield "        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 681
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_tabpane_open_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_open_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_open_row"));

        // line 682
        yield "    ";
        $context["tab_is_active_option_name"] = Twig\Extension\CoreExtension::constant("EasyCorp\\Bundle\\EasyAdminBundle\\Field\\FormField::OPTION_TAB_IS_ACTIVE");
        // line 683
        yield "    ";
        $context["field"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 683, $this->source); })()), "vars", [], "any", false, false, false, 683), "ea_vars", [], "any", false, false, false, 683), "field", [], "any", false, false, false, 683);
        // line 684
        yield "
    <div id=\"";
        // line 685
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ea_tab_id"]) || array_key_exists("ea_tab_id", $context) ? $context["ea_tab_id"] : (function () { throw new RuntimeError('Variable "ea_tab_id" does not exist.', 685, $this->source); })()), "html", null, true);
        yield "\" class=\"tab-pane ";
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["field"]) || array_key_exists("field", $context) ? $context["field"] : (function () { throw new RuntimeError('Variable "field" does not exist.', 685, $this->source); })()), "getCustomOption", [(isset($context["tab_is_active_option_name"]) || array_key_exists("tab_is_active_option_name", $context) ? $context["tab_is_active_option_name"] : (function () { throw new RuntimeError('Variable "tab_is_active_option_name" does not exist.', 685, $this->source); })())], "method", false, false, false, 685)) {
            yield "active";
        }
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ea_css_class"]) || array_key_exists("ea_css_class", $context) ? $context["ea_css_class"] : (function () { throw new RuntimeError('Variable "ea_css_class" does not exist.', 685, $this->source); })()), "html", null, true);
        yield "\" ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 685, $this->source); })()), "vars", [], "any", false, false, false, 685), "attr", [], "any", false, false, false, 685));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["key"], "html", null, true);
            yield "=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html");
            yield "\"";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['value'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        yield ">
        ";
        // line 686
        if ((isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 686, $this->source); })())) {
            // line 687
            yield "            <div class=\"content-header-help tab-help\">
                ";
            // line 688
            yield $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans((isset($context["ea_help"]) || array_key_exists("ea_help", $context) ? $context["ea_help"] : (function () { throw new RuntimeError('Variable "ea_help" does not exist.', 688, $this->source); })()), [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 688, $this->source); })()), "i18n", [], "any", false, false, false, 688), "translationDomain", [], "any", false, false, false, 688));
            yield "
            </div>
        ";
        }
        // line 691
        yield "
        <div class=\"row\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 695
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_form_tabpane_close_row(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_close_row"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_form_tabpane_close_row"));

        // line 696
        yield "        </div>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 701
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_filters_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_filters_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_filters_widget"));

        // line 702
        yield "    ";
        $context["applied_filters"] = Twig\Extension\CoreExtension::keys(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["ea"] ?? null), "request", [], "any", false, true, false, 702), "query", [], "any", false, true, false, 702), "all", [], "method", false, true, false, 702), "filters", [], "array", true, true, false, 702)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 702, $this->source); })()), "request", [], "any", false, false, false, 702), "query", [], "any", false, false, false, 702), "all", [], "method", false, false, false, 702), "filters", [], "array", false, false, false, 702), [])) : ([])));
        // line 703
        yield "
    ";
        // line 704
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 704, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            // line 705
            yield "        <div class=\"col-12\">
            <div class=\"filter-field px-3\" data-filter-property=\"";
            // line 706
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 706), "name", [], "any", false, false, false, 706), "html", null, true);
            yield "\">
                <div class=\"filter-heading\" id=\"filter-heading-";
            // line 707
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 707), "html", null, true);
            yield "\">
                    <input type=\"checkbox\" class=\"filter-checkbox\" ";
            // line 708
            if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 708), "name", [], "any", false, false, false, 708), (isset($context["applied_filters"]) || array_key_exists("applied_filters", $context) ? $context["applied_filters"] : (function () { throw new RuntimeError('Variable "applied_filters" does not exist.', 708, $this->source); })()))) {
                yield "checked";
            }
            yield ">
                    <a data-bs-toggle=\"collapse\" href=\"#filter-content-";
            // line 709
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 709), "html", null, true);
            yield "\" aria-expanded=\"";
            yield ((CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 709), "name", [], "any", false, false, false, 709), (isset($context["applied_filters"]) || array_key_exists("applied_filters", $context) ? $context["applied_filters"] : (function () { throw new RuntimeError('Variable "applied_filters" does not exist.', 709, $this->source); })()))) ? ("true") : ("false"));
            yield "\" aria-controls=\"filter-content-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 709), "html", null, true);
            yield "\"
                        ";
            // line 710
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, true, false, 710), "label_attr", [], "any", true, true, false, 710)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 710), "label_attr", [], "any", false, false, false, 710), [])) : ([])));
            foreach ($context['_seq'] as $context["name"] => $context["value"]) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
                yield "=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["value"], "html");
                yield "\" ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['name'], $context['value'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            yield ">
                        ";
            // line 711
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, true, false, 711), "label", [], "any", true, true, false, 711)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 711), "label", [], "any", false, false, false, 711), $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 711), "name", [], "any", false, false, false, 711)))) : ($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->humanize(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 711), "name", [], "any", false, false, false, 711)))), [], CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["ea"]) || array_key_exists("ea", $context) ? $context["ea"] : (function () { throw new RuntimeError('Variable "ea" does not exist.', 711, $this->source); })()), "i18n", [], "any", false, false, false, 711), "translationDomain", [], "any", false, false, false, 711)), "html", null, true);
            yield "
                    </a>
                </div>
                <div id=\"filter-content-";
            // line 714
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 714), "html", null, true);
            yield "\" class=\"filter-content collapse ";
            if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 714), "name", [], "any", false, false, false, 714), (isset($context["applied_filters"]) || array_key_exists("applied_filters", $context) ? $context["applied_filters"] : (function () { throw new RuntimeError('Variable "applied_filters" does not exist.', 714, $this->source); })()))) {
                yield "show";
            }
            yield "\" aria-labelledby=\"filter-heading-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 714), "html", null, true);
            yield "\">
                    <div class=\"form-widget\">
                        ";
            // line 716
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'widget');
            yield "
                    </div>
                </div>
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
        unset($context['_seq'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 724
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_comparison_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "comparison_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "comparison_widget"));

        // line 725
        yield "    ";
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 725, $this->source); })()), 'widget', ["attr" => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 725, $this->source); })()), "vars", [], "any", false, false, false, 725), "attr", [], "any", false, false, false, 725), ["data-ea-comparison-id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 725, $this->source); })()), "vars", [], "any", false, false, false, 725), "id", [], "any", false, false, false, 725)])]);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 728
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_numeric_filter_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_numeric_filter_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_numeric_filter_widget"));

        // line 729
        yield "    <div class=\"form-widget-compound\">
        ";
        // line 730
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 730, $this->source); })()), "comparison", [], "any", false, false, false, 730), 'row');
        yield "
        ";
        // line 731
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 731, $this->source); })()), "value", [], "any", false, false, false, 731), 'row');
        yield "
        <div data-ea-value2-of-comparison-id=\"";
        // line 732
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 732, $this->source); })()), "comparison", [], "any", false, false, false, 732), "vars", [], "any", false, false, false, 732), "id", [], "any", false, false, false, 732), "html", null, true);
        yield "\" class=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 732, $this->source); })()), "comparison", [], "any", false, false, false, 732), "vars", [], "any", false, false, false, 732), "value", [], "any", false, false, false, 732) != "between")) ? ("d-none") : (""));
        yield "\">
            ";
        // line 733
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 733, $this->source); })()), "value2", [], "any", false, false, false, 733), 'row');
        yield "
        </div>
    </div>";
        // line 736
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 736, $this->source); })()), 'errors');
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 739
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_datetime_filter_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_datetime_filter_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_datetime_filter_widget"));

        // line 740
        yield "    ";
        yield from         $this->unwrap()->yieldBlock("ea_numeric_filter_widget", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 743
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_fileupload_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_fileupload_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_fileupload_widget"));

        // line 744
        yield "    <div class=\"ea-fileupload\">
        <div class=\"input-group\">
            ";
        // line 746
        $context["placeholder"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->createTranslatable("action.choose_file", [], "EasyAdminBundle");
        // line 747
        yield "            ";
        $context["title"] = "";
        // line 748
        yield "            ";
        $context["filesLabel"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("files", [], "EasyAdminBundle");
        // line 749
        yield "            ";
        if ((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 749, $this->source); })())) {
            // line 750
            yield "                ";
            if ((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 750, $this->source); })())) {
                // line 751
                yield "                    ";
                $context["placeholder"] = ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 751, $this->source); })())) . " ") . (isset($context["filesLabel"]) || array_key_exists("filesLabel", $context) ? $context["filesLabel"] : (function () { throw new RuntimeError('Variable "filesLabel" does not exist.', 751, $this->source); })()));
                // line 752
                yield "                ";
            } else {
                // line 753
                yield "                    ";
                $context["placeholder"] = CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 753, $this->source); })())), "filename", [], "any", false, false, false, 753);
                // line 754
                yield "                    ";
                $context["title"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 754, $this->source); })())), "mTime", [], "any", false, false, false, 754));
                // line 755
                yield "                ";
            }
            // line 756
            yield "            ";
        }
        // line 757
        yield "            <div class=\"custom-file\">
                ";
        // line 758
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 758, $this->source); })()), "file", [], "any", false, false, false, 758), 'widget', ["attr" => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 758, $this->source); })()), "file", [], "any", false, false, false, 758), "vars", [], "any", false, false, false, 758), "attr", [], "any", false, false, false, 758), ["placeholder" => (isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new RuntimeError('Variable "placeholder" does not exist.', 758, $this->source); })()), "title" => (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 758, $this->source); })()), "data-files-label" => (isset($context["filesLabel"]) || array_key_exists("filesLabel", $context) ? $context["filesLabel"] : (function () { throw new RuntimeError('Variable "filesLabel" does not exist.', 758, $this->source); })()), "class" => "d-none"])]);
        yield "
                ";
        // line 759
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 759, $this->source); })()), "file", [], "any", false, false, false, 759), 'label', ["label_attr" => ["class" => "custom-file-label"]] + (CoreExtension::testEmpty($_label_ = (isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new RuntimeError('Variable "placeholder" does not exist.', 759, $this->source); })())) ? [] : ["label" => $_label_]));
        yield "
            </div>
            <div class=\"input-group-text\">";
        // line 762
        if ((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 762, $this->source); })())) {
            // line 763
            if ((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 763, $this->source); })())) {
                // line 764
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 764, $this->source); })()), function ($__carry__, $__file__) use ($context, $macros) { $context["carry"] = $__carry__; $context["file"] = $__file__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 764, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["file"]) || array_key_exists("file", $context) ? $context["file"] : (function () { throw new RuntimeError('Variable "file" does not exist.', 764, $this->source); })()), "size", [], "any", false, false, false, 764)); })), "html", null, true);
                yield "
                    ";
            } else {
                // line 766
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 766, $this->source); })())), "size", [], "any", false, false, false, 766)), "html", null, true);
                yield "
                    ";
            }
        }
        // line 769
        if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 769, $this->source); })())) {
            // line 770
            yield "                    <label class=\"btn ea-fileupload-delete-btn ";
            yield ((Twig\Extension\CoreExtension::testEmpty((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 770, $this->source); })()))) ? ("d-none") : (""));
            yield "\" for=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 770, $this->source); })()), "delete", [], "any", false, false, false, 770), "vars", [], "any", false, false, false, 770), "id", [], "any", false, false, false, 770), "html", null, true);
            yield "\">
                        ";
            // line 771
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:delete"]);
            yield "
                    </label>
                ";
        }
        // line 774
        yield "                <label class=\"btn\" for=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 774, $this->source); })()), "file", [], "any", false, false, false, 774), "vars", [], "any", false, false, false, 774), "id", [], "any", false, false, false, 774), "html", null, true);
        yield "\">
                    ";
        // line 775
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:folder-open"]);
        yield "
                </label>
            </div>
        </div>
        ";
        // line 779
        if (((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 779, $this->source); })()) && (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 779, $this->source); })()))) {
            // line 780
            yield "            <div class=\"form-control fileupload-list\">
                <table class=\"fileupload-table\">
                    <tbody>
                    ";
            // line 783
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 783, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 784
                yield "                        <tr>
                            <td>
                                ";
                // line 786
                if ((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 786, $this->source); })())) {
                    yield "<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 786, $this->source); })()) . CoreExtension::getAttribute($this->env, $this->source, $context["file"], "filename", [], "any", false, false, false, 786))), "html", null, true);
                    yield "\">";
                }
                // line 787
                yield "                                    <span title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "mTime", [], "any", false, false, false, 787)), "html", null, true);
                yield "\">
                                        ";
                // line 788
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:file-lines"]);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "filename", [], "any", false, false, false, 788), "html", null, true);
                yield "
                                    </span>
                                ";
                // line 790
                if ((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 790, $this->source); })())) {
                    yield "</a>";
                }
                // line 791
                yield "                            </td>
                            <td class=\"text-right file-size\">";
                // line 792
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "size", [], "any", false, false, false, 792)), "html", null, true);
                yield "</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['file'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 795
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 799
        yield "        ";
        if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 799, $this->source); })())) {
            // line 800
            yield "            <div class=\"d-none\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 800, $this->source); })()), "delete", [], "any", false, false, false, 800), 'widget', ["label" => false]);
            yield "</div>
        ";
        }
        // line 802
        yield "    </div>
    ";
        // line 803
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 803, $this->source); })()), "file", [], "any", false, false, false, 803), 'errors');
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 806
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_TODO_ea_fileupload_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "TODO_ea_fileupload_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "TODO_ea_fileupload_widget"));

        // line 807
        yield "    ";
        $context["placeholder"] = "";
        // line 808
        yield "    ";
        $context["title"] = "";
        // line 809
        yield "    ";
        $context["filesLabel"] = $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans("files", [], "EasyAdminBundle");
        // line 810
        yield "    ";
        if ((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 810, $this->source); })())) {
            // line 811
            yield "        ";
            if ((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 811, $this->source); })())) {
                // line 812
                yield "            ";
                $context["placeholder"] = ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 812, $this->source); })())) . " ") . (isset($context["filesLabel"]) || array_key_exists("filesLabel", $context) ? $context["filesLabel"] : (function () { throw new RuntimeError('Variable "filesLabel" does not exist.', 812, $this->source); })()));
                // line 813
                yield "        ";
            } else {
                // line 814
                yield "            ";
                $context["placeholder"] = CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 814, $this->source); })())), "filename", [], "any", false, false, false, 814);
                // line 815
                yield "            ";
                $context["title"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 815, $this->source); })())), "mTime", [], "any", false, false, false, 815));
                // line 816
                yield "        ";
            }
            // line 817
            yield "    ";
        }
        // line 818
        yield "
    <div class=\"ea-fileupload\">
        <div class=\"input-group\">
            ";
        // line 821
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 821, $this->source); })()), "file", [], "any", false, false, false, 821), 'widget', ["attr" => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 821, $this->source); })()), "file", [], "any", false, false, false, 821), "vars", [], "any", false, false, false, 821), "attr", [], "any", false, false, false, 821), ["placeholder" => (isset($context["placeholder"]) || array_key_exists("placeholder", $context) ? $context["placeholder"] : (function () { throw new RuntimeError('Variable "placeholder" does not exist.', 821, $this->source); })()), "title" => (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new RuntimeError('Variable "title" does not exist.', 821, $this->source); })()), "data-files-label" => (isset($context["filesLabel"]) || array_key_exists("filesLabel", $context) ? $context["filesLabel"] : (function () { throw new RuntimeError('Variable "filesLabel" does not exist.', 821, $this->source); })()), "class" => "form-control"])]);
        yield "

            ";
        // line 823
        if ((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 823, $this->source); })())) {
            // line 824
            yield "                <span class=\"input-group-text\">
                    ";
            // line 825
            if ((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 825, $this->source); })())) {
                // line 826
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(Twig\Extension\CoreExtension::reduce($this->env, (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 826, $this->source); })()), function ($__carry__, $__file__) use ($context, $macros) { $context["carry"] = $__carry__; $context["file"] = $__file__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 826, $this->source); })()) + CoreExtension::getAttribute($this->env, $this->source, (isset($context["file"]) || array_key_exists("file", $context) ? $context["file"] : (function () { throw new RuntimeError('Variable "file" does not exist.', 826, $this->source); })()), "size", [], "any", false, false, false, 826)); })), "html", null, true);
                yield "
                    ";
            } else {
                // line 828
                yield "                        ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 828, $this->source); })())), "size", [], "any", false, false, false, 828)), "html", null, true);
                yield "
                    ";
            }
            // line 830
            yield "                </span>
            ";
        }
        // line 832
        yield "
            ";
        // line 833
        if (((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 833, $this->source); })()) && (isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 833, $this->source); })()))) {
            // line 834
            yield "                <button class=\"btn ea-fileupload-delete-btn\">
                    ";
            // line 835
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:delete"]);
            yield "
                </button>
            ";
        }
        // line 838
        yield "
            ";
        // line 839
        if ((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 839, $this->source); })())) {
            // line 840
            yield "                <button class=\"btn\">
                    ";
            // line 841
            yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:folder-open"]);
            yield "
                </button>
            ";
        }
        // line 844
        yield "        </div>

        ";
        // line 846
        if (((isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 846, $this->source); })()) && (isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 846, $this->source); })()))) {
            // line 847
            yield "            <div class=\"form-control fileupload-list\">
                <table class=\"fileupload-table\">
                    <tbody>
                    ";
            // line 850
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["currentFiles"]) || array_key_exists("currentFiles", $context) ? $context["currentFiles"] : (function () { throw new RuntimeError('Variable "currentFiles" does not exist.', 850, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                // line 851
                yield "                        <tr>
                            <td>
                                ";
                // line 853
                if ((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 853, $this->source); })())) {
                    yield "<a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 853, $this->source); })()) . CoreExtension::getAttribute($this->env, $this->source, $context["file"], "filename", [], "any", false, false, false, 853))), "html", null, true);
                    yield "\">";
                }
                // line 854
                yield "                                    <span title=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "mTime", [], "any", false, false, false, 854)), "html", null, true);
                yield "\">
                                        ";
                // line 855
                yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:file-lines"]);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "filename", [], "any", false, false, false, 855), "html", null, true);
                yield "
                                    </span>
                                    ";
                // line 857
                if ((isset($context["download_path"]) || array_key_exists("download_path", $context) ? $context["download_path"] : (function () { throw new RuntimeError('Variable "download_path" does not exist.', 857, $this->source); })())) {
                    yield "</a>";
                }
                // line 858
                yield "                            </td>
                            <td class=\"text-right file-size\">";
                // line 859
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension']->fileSize(CoreExtension::getAttribute($this->env, $this->source, $context["file"], "size", [], "any", false, false, false, 859)), "html", null, true);
                yield "</td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['file'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 862
            yield "                    </tbody>
                </table>
            </div>
        ";
        }
        // line 866
        yield "        ";
        if ((isset($context["allow_delete"]) || array_key_exists("allow_delete", $context) ? $context["allow_delete"] : (function () { throw new RuntimeError('Variable "allow_delete" does not exist.', 866, $this->source); })())) {
            // line 867
            yield "            <div class=\"d-none\">";
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 867, $this->source); })()), "delete", [], "any", false, false, false, 867), 'widget', ["label" => false]);
            yield "</div>
        ";
        }
        // line 869
        yield "    </div>

    ";
        // line 871
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 871, $this->source); })()), "file", [], "any", false, false, false, 871), 'errors');
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 874
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_ea_slug_widget(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_slug_widget"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "ea_slug_widget"));

        // line 875
        yield "    ";
        $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 875, $this->source); })()), ["data-ea-slug-field" => "", "data-target" => json_encode(Twig\Extension\CoreExtension::map($this->env, Twig\Extension\CoreExtension::split($this->env->getCharset(),         // line 877
(isset($context["target"]) || array_key_exists("target", $context) ? $context["target"] : (function () { throw new RuntimeError('Variable "target" does not exist.', 877, $this->source); })()), "|"), function ($__name__) use ($context, $macros) { $context["name"] = $__name__; return CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 877, $this->source); })()), "parent", [], "any", false, false, false, 877), "children", [], "any", false, false, false, 877), (isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 877, $this->source); })()), [], "array", false, false, false, 877), "vars", [], "any", false, false, false, 877), "id", [], "any", false, false, false, 877); }))]);
        // line 879
        yield "    ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["attr"] ?? null), "data-confirm-text", [], "array", true, true, false, 879)) {
            // line 880
            yield "        ";
            $context["attr"] = Twig\Extension\CoreExtension::merge((isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 880, $this->source); })()), ["data-confirm-text" => $this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source,             // line 881
(isset($context["attr"]) || array_key_exists("attr", $context) ? $context["attr"] : (function () { throw new RuntimeError('Variable "attr" does not exist.', 881, $this->source); })()), "data-confirm-text", [], "array", false, false, false, 881))]);
            // line 883
            yield "    ";
        }
        // line 884
        yield "
    <div class=\"input-group\">
        ";
        // line 886
        yield from         $this->unwrap()->yieldBlock("form_widget", $context, $blocks);
        yield "
        <button type=\"button\" class=\"btn\"
                data-icon-locked=\"";
        // line 888
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:lock"]), "html");
        yield "\"
                data-icon-unlocked=\"";
        // line 889
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:lock-open-solid"]), "html");
        yield "\">
            ";
        // line 890
        yield $this->env->getRuntime('Symfony\UX\TwigComponent\Twig\ComponentRuntime')->render("ea:Icon", ["name" => "internal:lock"]);
        yield "
        </button>
    </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 494
    public function macro_recursiveFieldsetForm($form = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "form" => $form,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "recursiveFieldsetForm"));

            $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "macro", "recursiveFieldsetForm"));

            // line 495
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::filter($this->env, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 495, $this->source); })()), function ($__field__) use ($context, $macros) { $context["field"] = $__field__; return (!CoreExtension::inFilter("hidden", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 495), "block_prefixes", [], "any", false, false, false, 495)) && ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, true, false, 495), "ea_crud_form", [], "any", false, true, false, 495), "form_tab", [], "any", true, true, false, 495) &&  !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, false, false, 495), "ea_crud_form", [], "any", false, false, false, 495), "form_tab", [], "any", false, false, false, 495)) || CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, true, false, 495), "ea_crud_form", [], "any", false, true, false, 495), "form_tabs", [], "any", true, true, false, 495))); }));
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 496
                yield "                ";
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["field"], "vars", [], "any", false, true, false, 496), "ea_crud_form", [], "any", false, true, false, 496), "form_tabs", [], "any", true, true, false, 496)) {
                    // line 497
                    yield "                    ";
                    // line 498
                    yield "                    ";
                    yield $this->getTemplateForMacro("macro_recursiveFieldsetForm", $context, 498, $this->getSourceContext())->macro_recursiveFieldsetForm(...[$context["field"]]);
                    yield "
                ";
                } else {
                    // line 500
                    yield "                    ";
                    // line 501
                    yield "                    ";
                    yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["field"], 'row');
                    yield "
                ";
                }
                // line 503
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['field'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 504
            yield "        ";
            
            $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

            
            $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@EasyAdmin/crud/form_theme.html.twig";
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
        return array (  3433 => 504,  3427 => 503,  3421 => 501,  3419 => 500,  3413 => 498,  3411 => 497,  3408 => 496,  3403 => 495,  3385 => 494,  3370 => 890,  3366 => 889,  3362 => 888,  3357 => 886,  3353 => 884,  3350 => 883,  3348 => 881,  3346 => 880,  3343 => 879,  3341 => 877,  3339 => 875,  3326 => 874,  3313 => 871,  3309 => 869,  3303 => 867,  3300 => 866,  3294 => 862,  3285 => 859,  3282 => 858,  3278 => 857,  3271 => 855,  3266 => 854,  3260 => 853,  3256 => 851,  3252 => 850,  3247 => 847,  3245 => 846,  3241 => 844,  3235 => 841,  3232 => 840,  3230 => 839,  3227 => 838,  3221 => 835,  3218 => 834,  3216 => 833,  3213 => 832,  3209 => 830,  3203 => 828,  3197 => 826,  3195 => 825,  3192 => 824,  3190 => 823,  3185 => 821,  3180 => 818,  3177 => 817,  3174 => 816,  3171 => 815,  3168 => 814,  3165 => 813,  3162 => 812,  3159 => 811,  3156 => 810,  3153 => 809,  3150 => 808,  3147 => 807,  3134 => 806,  3121 => 803,  3118 => 802,  3112 => 800,  3109 => 799,  3103 => 795,  3094 => 792,  3091 => 791,  3087 => 790,  3080 => 788,  3075 => 787,  3069 => 786,  3065 => 784,  3061 => 783,  3056 => 780,  3054 => 779,  3047 => 775,  3042 => 774,  3036 => 771,  3029 => 770,  3027 => 769,  3020 => 766,  3014 => 764,  3012 => 763,  3010 => 762,  3005 => 759,  3001 => 758,  2998 => 757,  2995 => 756,  2992 => 755,  2989 => 754,  2986 => 753,  2983 => 752,  2980 => 751,  2977 => 750,  2974 => 749,  2971 => 748,  2968 => 747,  2966 => 746,  2962 => 744,  2949 => 743,  2935 => 740,  2922 => 739,  2911 => 736,  2906 => 733,  2900 => 732,  2896 => 731,  2892 => 730,  2889 => 729,  2876 => 728,  2862 => 725,  2849 => 724,  2820 => 716,  2809 => 714,  2803 => 711,  2789 => 710,  2781 => 709,  2775 => 708,  2771 => 707,  2767 => 706,  2764 => 705,  2747 => 704,  2744 => 703,  2741 => 702,  2728 => 701,  2715 => 696,  2702 => 695,  2689 => 691,  2683 => 688,  2680 => 687,  2678 => 686,  2656 => 685,  2653 => 684,  2650 => 683,  2647 => 682,  2634 => 681,  2621 => 677,  2608 => 676,  2595 => 672,  2582 => 671,  2569 => 667,  2561 => 664,  2558 => 662,  2556 => 661,  2552 => 660,  2550 => 659,  2548 => 658,  2543 => 656,  2540 => 654,  2538 => 653,  2529 => 652,  2526 => 651,  2522 => 650,  2517 => 647,  2514 => 646,  2511 => 645,  2508 => 644,  2505 => 643,  2492 => 642,  2477 => 636,  2464 => 635,  2444 => 631,  2441 => 630,  2435 => 628,  2433 => 627,  2426 => 625,  2423 => 624,  2420 => 623,  2407 => 622,  2394 => 618,  2388 => 616,  2386 => 615,  2383 => 614,  2377 => 611,  2374 => 610,  2368 => 607,  2362 => 606,  2358 => 605,  2353 => 604,  2351 => 603,  2343 => 601,  2330 => 600,  2317 => 597,  2314 => 596,  2308 => 594,  2306 => 593,  2303 => 592,  2297 => 590,  2294 => 589,  2281 => 588,  2269 => 585,  2256 => 584,  2243 => 580,  2237 => 578,  2235 => 577,  2231 => 575,  2226 => 574,  2222 => 573,  2218 => 571,  2216 => 570,  2210 => 569,  2207 => 568,  2204 => 567,  2201 => 566,  2198 => 565,  2185 => 564,  2172 => 560,  2169 => 559,  2167 => 557,  2154 => 556,  2141 => 552,  2138 => 551,  2136 => 550,  2123 => 549,  2109 => 546,  2096 => 545,  2082 => 540,  2078 => 539,  2074 => 537,  2072 => 536,  2071 => 535,  2069 => 533,  2056 => 532,  2044 => 528,  2042 => 527,  2041 => 526,  2040 => 525,  2039 => 524,  2038 => 523,  2036 => 521,  2023 => 520,  2009 => 516,  2006 => 515,  1993 => 514,  1979 => 511,  1966 => 510,  1948 => 505,  1946 => 494,  1944 => 493,  1936 => 489,  1930 => 488,  1924 => 486,  1921 => 485,  1917 => 484,  1906 => 482,  1903 => 481,  1898 => 478,  1892 => 476,  1890 => 475,  1883 => 472,  1877 => 470,  1875 => 469,  1872 => 468,  1866 => 466,  1864 => 465,  1861 => 464,  1854 => 462,  1850 => 461,  1845 => 460,  1841 => 458,  1839 => 457,  1831 => 455,  1829 => 454,  1824 => 452,  1821 => 451,  1818 => 450,  1816 => 449,  1813 => 448,  1810 => 447,  1805 => 446,  1802 => 445,  1799 => 444,  1786 => 443,  1773 => 440,  1770 => 439,  1767 => 438,  1754 => 437,  1736 => 432,  1731 => 431,  1718 => 430,  1704 => 426,  1691 => 425,  1677 => 421,  1674 => 420,  1668 => 418,  1666 => 417,  1660 => 414,  1654 => 413,  1651 => 412,  1647 => 409,  1641 => 407,  1634 => 404,  1632 => 403,  1629 => 402,  1626 => 401,  1622 => 399,  1616 => 397,  1613 => 396,  1608 => 394,  1606 => 391,  1604 => 390,  1600 => 389,  1596 => 387,  1590 => 385,  1587 => 384,  1582 => 382,  1580 => 379,  1578 => 378,  1574 => 377,  1571 => 376,  1568 => 375,  1564 => 373,  1558 => 371,  1555 => 370,  1550 => 368,  1548 => 365,  1546 => 364,  1543 => 363,  1540 => 362,  1538 => 361,  1535 => 360,  1532 => 359,  1519 => 358,  1505 => 355,  1502 => 354,  1489 => 353,  1475 => 349,  1472 => 348,  1466 => 346,  1464 => 345,  1458 => 342,  1452 => 341,  1449 => 340,  1445 => 337,  1439 => 335,  1432 => 332,  1430 => 331,  1427 => 330,  1423 => 328,  1420 => 326,  1417 => 324,  1415 => 323,  1413 => 322,  1408 => 321,  1406 => 320,  1403 => 319,  1390 => 318,  1376 => 315,  1373 => 314,  1360 => 313,  1346 => 309,  1343 => 308,  1330 => 307,  1316 => 301,  1312 => 298,  1309 => 296,  1307 => 295,  1303 => 292,  1300 => 290,  1298 => 289,  1296 => 288,  1281 => 287,  1277 => 284,  1274 => 281,  1273 => 280,  1272 => 279,  1270 => 278,  1268 => 277,  1266 => 274,  1263 => 272,  1261 => 271,  1258 => 269,  1255 => 267,  1253 => 266,  1251 => 265,  1248 => 261,  1235 => 260,  1224 => 255,  1222 => 254,  1216 => 253,  1203 => 252,  1189 => 248,  1186 => 247,  1183 => 246,  1180 => 245,  1177 => 244,  1174 => 243,  1168 => 241,  1165 => 240,  1162 => 239,  1160 => 237,  1158 => 236,  1155 => 235,  1142 => 234,  1130 => 231,  1121 => 225,  1113 => 222,  1110 => 221,  1104 => 219,  1102 => 218,  1096 => 215,  1092 => 214,  1086 => 213,  1082 => 211,  1079 => 210,  1073 => 208,  1071 => 207,  1067 => 206,  1062 => 205,  1060 => 204,  1054 => 203,  1051 => 202,  1044 => 199,  1040 => 198,  1037 => 197,  1034 => 196,  1031 => 195,  1028 => 194,  1025 => 193,  1022 => 192,  1019 => 191,  1006 => 190,  991 => 185,  987 => 184,  984 => 183,  982 => 182,  979 => 181,  976 => 180,  973 => 179,  971 => 178,  967 => 176,  961 => 173,  958 => 172,  952 => 170,  950 => 169,  945 => 168,  943 => 167,  939 => 165,  936 => 164,  933 => 163,  931 => 161,  918 => 160,  905 => 157,  902 => 156,  900 => 154,  899 => 153,  898 => 152,  897 => 151,  896 => 150,  895 => 148,  892 => 147,  886 => 146,  883 => 145,  880 => 144,  877 => 143,  874 => 142,  871 => 141,  868 => 140,  863 => 139,  861 => 138,  858 => 137,  855 => 136,  852 => 135,  849 => 134,  836 => 133,  823 => 130,  820 => 129,  817 => 128,  814 => 123,  811 => 122,  798 => 121,  785 => 117,  782 => 116,  776 => 111,  774 => 110,  768 => 107,  766 => 106,  761 => 105,  759 => 104,  756 => 103,  751 => 102,  745 => 100,  743 => 99,  738 => 97,  735 => 96,  729 => 93,  726 => 92,  723 => 91,  719 => 90,  716 => 89,  713 => 88,  710 => 87,  708 => 86,  705 => 85,  703 => 84,  691 => 83,  689 => 82,  686 => 81,  683 => 80,  680 => 79,  678 => 77,  676 => 76,  663 => 75,  651 => 69,  648 => 67,  646 => 66,  644 => 65,  631 => 64,  620 => 61,  618 => 60,  616 => 59,  603 => 58,  592 => 55,  590 => 54,  588 => 53,  575 => 52,  563 => 49,  561 => 48,  559 => 47,  556 => 45,  554 => 44,  541 => 43,  530 => 40,  527 => 38,  525 => 37,  523 => 36,  520 => 34,  518 => 33,  505 => 32,  493 => 27,  482 => 25,  477 => 24,  474 => 23,  461 => 22,  449 => 19,  443 => 17,  440 => 16,  427 => 15,  412 => 11,  410 => 10,  406 => 9,  403 => 8,  397 => 6,  394 => 5,  381 => 4,  370 => 874,  367 => 873,  365 => 806,  362 => 805,  360 => 743,  357 => 742,  355 => 739,  352 => 738,  350 => 728,  347 => 727,  345 => 724,  342 => 723,  340 => 701,  337 => 699,  335 => 695,  332 => 694,  330 => 681,  327 => 680,  325 => 676,  322 => 675,  320 => 671,  317 => 670,  315 => 642,  312 => 641,  310 => 635,  307 => 634,  305 => 622,  302 => 621,  300 => 600,  297 => 599,  295 => 588,  292 => 587,  290 => 584,  287 => 583,  285 => 564,  282 => 563,  280 => 556,  277 => 555,  275 => 549,  272 => 548,  270 => 545,  267 => 543,  265 => 532,  262 => 530,  260 => 520,  257 => 518,  255 => 514,  252 => 513,  250 => 510,  247 => 508,  245 => 443,  242 => 442,  240 => 437,  237 => 435,  235 => 430,  232 => 428,  230 => 425,  227 => 424,  225 => 358,  222 => 357,  220 => 353,  217 => 352,  215 => 318,  212 => 317,  210 => 313,  207 => 312,  205 => 307,  202 => 306,  199 => 304,  197 => 260,  194 => 259,  191 => 257,  189 => 252,  186 => 251,  184 => 234,  181 => 233,  179 => 190,  176 => 189,  174 => 160,  171 => 159,  169 => 133,  166 => 132,  164 => 121,  161 => 120,  159 => 75,  156 => 74,  153 => 72,  151 => 64,  148 => 63,  146 => 58,  143 => 57,  141 => 52,  138 => 51,  136 => 43,  133 => 42,  131 => 32,  128 => 31,  125 => 29,  123 => 22,  120 => 21,  118 => 15,  115 => 14,  113 => 4,  110 => 3,  35 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# @var ea \\EasyCorp\\Bundle\\EasyAdminBundle\\Context\\AdminContext #}
{% use '@EasyAdmin/symfony-form-themes/bootstrap_5_layout.html.twig' %}

{% block form_start %}
    {% if form.vars.errors|length > 0 and 'ea_crud' in form.vars.block_prefixes|default([]) %}
        {{ form_errors(form, {attr: { class: 'global-invalid-feedback' }}) }}
    {% endif %}

    {{ parent() }}
    {% if ea.request.query.get('referrer')  %}
        <input type=\"hidden\" name=\"referrer\" value=\"{{ ea.request.query.get('referrer') }}\">
    {% endif %}
{% endblock form_start %}

{% block form_end %}
        {% if not render_rest is defined or render_rest %}
            {{ form_rest(form) }}
        {% endif %}
    </form>
{% endblock %}

{% block form_errors %}
    {% if errors|length > 0 %}
        {% for error in errors %}
            <div class=\"{{ attr.class|default('') }} invalid-feedback d-block\">{{ error.message }}</div>
        {% endfor %}
    {% endif %}
{% endblock form_errors %}

{# Widgets #}

{% block form_widget_simple -%}
    {% if type is not defined or type not in ['file', 'hidden'] %}
        {%- set attr = attr|merge({class: (attr.class|default(''))|trim}) -%}
    {% endif %}
    {%- if type is defined and (type == 'range' or type == 'color') %}
        {# Attribute \"required\" is not supported #}
        {%- set required = false -%}
    {% endif %}
    {{- parent() -}}
{%- endblock form_widget_simple %}

{% block datetime_widget %}
    {%- if widget != 'single_text' -%}
        {%- set attr = attr|merge({class: (attr.class|default('') ~ ' form-inline')|trim}) -%}
    {%- endif -%}
    <div class=\"datetime-widget datetime-widget-datetime\">
        {{- parent() -}}
    </div>
{% endblock datetime_widget %}

{% block date_widget -%}
    <div class=\"datetime-widget datetime-widget-date\">
        {{- parent() -}}
    </div>
{%- endblock date_widget %}

{% block time_widget -%}
    <div class=\"datetime-widget datetime-widget-time\">
        {{- parent() -}}
    </div>
{%- endblock time_widget %}

{% block file_widget -%}
    {% if vich|default(false) %}
        {%- set type = type|default('file') -%}
        {{- block('form_widget_simple') -}}
    {% else %}
        {{- block('form_widget_simple') -}}
    {% endif %}
{%- endblock %}

{# Rows #}

{% block form_row %}
    {% set row_attr = row_attr|merge({
        class: row_attr.class|default('') ~ ' form-group'
    }) %}
    {%  set field = form.vars.ea_vars.field %}

    <div class=\"{{ field.columns ?? field.defaultColumns ?? '' }}\">
        {%- set row_class = row_class|default(row_attr.class|default('mb-3')) -%}
        <div {% with {attr: row_attr|merge({class: (row_class ~ ((not compound or force_error|default(false)) and not valid ? ' has-error'))|trim})} %}{{ block('attributes') }}{% endwith %}>
            {{- form_label(form) -}}
            <div class=\"form-widget\">
                {% set has_prepend_html = field.prepend_html|default(null) is not null %}
                {% set has_append_html = field.append_html|default(null) is not null %}
                {% set has_input_groups = has_prepend_html or has_append_html %}

                {% if has_input_groups %}<div class=\"input-group\">{% endif %}
                    {% if has_prepend_html %}
                        <div class=\"input-group-prepend\">
                            <span class=\"input-group-text\">{{ field.prepend_html|raw }}</span>
                        </div>
                    {% endif %}

                    {{ form_widget(form) }}

                    {% if has_append_html %}
                        <span class=\"input-group-text\">{{ field.append_html|raw }}</span>
                    {% endif %}
                {% if has_input_groups %}</div>{% endif %}

                {% if field.help ?? false %}
                    <small class=\"form-text form-help\">{{ field.help|trans(label_translation_parameters, translation_domain)|raw }}</small>
                {% elseif form.vars.help ?? false %}
                    <small class=\"form-text form-help\">{{ form.vars.help|trans(form.vars.help_translation_parameters, form.vars.translation_domain)|raw }}</small>
                {% endif %}

                {{- form_errors(form) -}}
            </div>
        </div>
    </div>

    {# if a field doesn't define its columns explicitly, insert a fill element to make the field take the entire row space #}
    {% if field.columns|default(null) is null %}
        <div class=\"flex-fill\"></div>
    {% endif %}
{% endblock form_row %}

{% block choice_widget_collapsed %}
    {% if 'ea-autocomplete' == attr['data-ea-widget']|default(false) %}
        {% set attr = attr|merge({
            'data-ea-i18n-no-results-found': 'autocomplete.no-results-found'|trans({}, 'EasyAdminBundle'),
            'data-ea-i18n-no-more-results': 'autocomplete.no-more-results'|trans({}, 'EasyAdminBundle'),
            'data-ea-i18n-loading-more-results': 'autocomplete.loading-more-results'|trans({}, 'EasyAdminBundle'),
        }) %}
    {% endif %}

    {{ parent() }}
{% endblock choice_widget_collapsed %}

{% block collection_row %}
    {% if prototype is defined and not prototype.rendered %}
        {% set row_attr = row_attr|merge({ 'data-prototype': form_row(prototype) }) %}
    {% endif %}

    {% set maxKey = 0 %}
    {% for key in form.children|keys %}
        {% if key matches '/^\\\\d+\$/' %}
            {% set intKey = key|number_format(0, '', '', '') %}
            {% if intKey > maxKey %}
                {% set maxKey = intKey %}
            {% endif %}
        {% endif %}
    {% endfor %}

    {% set row_attr = row_attr|merge({
        'data-ea-collection-field': 'true',
        'data-entry-is-complex': form.vars.ea_vars.field and form.vars.ea_vars.field.customOptions.get('entryIsComplex') ? 'true' : 'false',
        'data-allow-add': allow_add ? 'true' : 'false',
        'data-allow-delete': allow_delete ? 'true' : 'false',
        'data-num-items': form.children is empty ? 0 : maxKey + 1,
        'data-form-type-name-placeholder': prototype is defined ? prototype.vars.name : '',
    }) %}

    {{ block('form_row') }}
{% endblock collection_row %}

{% block collection_widget %}
    {# the \"is iterable\" check is needed because if an object implements __toString() and
               returns an empty string, \"is empty\" returns true even if it's not a collection #}
    {% set isEmptyCollection = value is null or (value is iterable and value is empty) %}
    {% set is_array_field = 'EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\ArrayField' == form.vars.ea_vars.field.fieldFqcn|default(false) %}

    <div class=\"ea-form-collection-items\">
        {% if isEmptyCollection %}
            {{ block('empty_collection') }}
        {% elseif is_array_field %}
            {{ block('form_widget') }}
        {% else %}
            <div class=\"accordion\">
                {{ block('form_widget') }}
            </div>
        {% endif %}
    </div>

    {% if isEmptyCollection or form.vars.prototype is defined %}
        {% set attr = attr|merge({'data-empty-collection': block('empty_collection') }) %}
    {% endif %}

    {% if allow_add|default(false) and not disabled %}
        <button type=\"button\" class=\"btn btn-link field-collection-add-button\">
            {{ component('ea:Icon', { name: 'internal:plus', class: 'pr-1' }) }}
            {{ 'action.add_new_item'|trans({}, 'EasyAdminBundle') }}
        </button>
    {% endif %}
{% endblock collection_widget %}

{% block collection_entry_row %}
    {% set is_array_field = 'EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\ArrayField' == form_parent(form).vars.ea_vars.field.fieldFqcn|default(false) %}
    {% set is_complex = form_parent(form).vars.ea_vars.field.customOptions.get('entryIsComplex') ?? false %}
    {% set to_string_method = form_parent(form).vars.ea_vars.field.customOptions.get('entryToStringMethod') ?? null %}
    {% set allows_deleting_items = form_parent(form).vars.allow_delete|default(false) %}
    {% set render_expanded = not form.vars.valid or form_parent(form).vars.ea_vars.field.customOptions.get('renderExpanded')|default(false) %}
    {% set delete_item_button %}
        <button type=\"button\" class=\"btn btn-link btn-link-danger field-collection-delete-button\"
                title=\"{{ 'action.remove_item'|trans({}, 'EasyAdminBundle') }}\">
            {{ component('ea:Icon', { name: 'internal:delete' }) }}
        </button>
    {% endset %}

    <div class=\"field-collection-item {{ is_complex ? 'field-collection-item-complex' }} {{ not form.vars.valid ? 'is-invalid' }}\">
        {% if is_array_field|default(false) %}
            {{ form_label(form) }}
            {{ form_widget(form) }}
            {% if allows_deleting_items and not disabled %}
                {{ delete_item_button }}
            {% endif %}
        {% else %}
            <div class=\"accordion-item\">
                <h2 class=\"accordion-header\">
                    <button class=\"accordion-button {{ render_expanded ? '' : 'collapsed' }}\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#{{ id }}-contents\">
                        {{ component('ea:Icon', { name: 'internal:chevron-right', class: 'form-collection-item-collapse-marker' }) }}
                        {{ value|ea_as_string(to_string_method) }}
                    </button>

                    {% if allows_deleting_items and not disabled %}
                        {{ delete_item_button }}
                    {% endif %}
                </h2>
                <div id=\"{{ id }}-contents\" class=\"accordion-collapse collapse {{ render_expanded ? 'show' }}\">
                    <div class=\"accordion-body\">
                        <div class=\"row\">
                            {{ form_widget(form) }}
                        </div>
                    </div>
                </div>
            </div>
        {% endif %}
    </div>
{% endblock collection_entry_row %}

{% block form_widget_compound %}
    <div class=\"form-widget-compound\">
        {% if 'collection' in block_prefixes %}
            {# the \"is iterable\" check is needed because if an object implements __toString() and
               returns an empty string, \"is empty\" returns true even if it's not a collection #}
            {% set isEmptyCollection = value is null or (value is iterable and value is empty) %}
            {% if isEmptyCollection %}
                {{ block('empty_collection') }}
            {% endif %}
            {% if isEmptyCollection or form.vars.prototype is defined %}
                {% set attr = attr|merge({'data-empty-collection': block('empty_collection') }) %}
            {% endif %}
        {% endif %}

        {{ parent() }}
    </div>
{% endblock form_widget_compound %}

{% block button_row -%}
    <div class=\"form-group field-{{ block_prefixes|slice(-2)|first }} {{ ea.field.css_class|default('') }}\">
        {{- form_widget(form) -}}
    </div>
{%- endblock button_row %}

{# Labels #}

{% block form_label -%}
    {% if label is same as(false) -%}
        {# don't display anything, not even an empty <label> element; if you want to not display
           any label contents but keep the form layout, use an empty string as the field label #}
    {%- else -%}
        {%- if compound is defined and compound -%}
            {%- set element = 'legend' -%}
            {%- set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' col-form-label')|trim}) -%}
        {%- else -%}
            {%- set label_attr = label_attr|merge({for: id, class: (label_attr.class|default('') ~ ' form-control-label')|trim}) -%}
        {%- endif -%}
        {% if required -%}
            {% set label_attr = label_attr|merge({class: (label_attr.class|default('') ~ ' required')|trim}) %}
        {%- endif -%}
        {% if label is same as('') -%}
            {# don't process the label; this is used to not display any label content
               but render an empty <label> element keep the form layout #}
        {%- elseif label is null -%}
            {%- if label_format is not empty -%}
                {% set label = label_format|replace({
                    '%name%': name,
                    '%id%': id,
                }) %}
            {%- else -%}
                {% set label = name|humanize %}
            {%- endif -%}
        {%- endif -%}
        <{{ element|default('label') }}{% if label_attr %}{% with { attr: label_attr } %}{{ block('attributes') }}{% endwith %}{% endif %}>
        {%- if translation_domain is same as(false) -%}
            {%- if label_html|default(false) is same as(false) -%}
                {{- label -}}
            {%- else -%}
                {{- label|raw -}}
            {%- endif -%}
        {%- else -%}
            {%- if label_html|default(false) is same as(false) -%}
                {{- label|trans(label_translation_parameters, translation_domain) -}}
            {%- else -%}
                {{- label|trans(label_translation_parameters, translation_domain)|raw -}}
            {%- endif -%}
        {%- endif -%}
        </{{ element|default('label') }}>
    {%- endif -%}
{%- endblock form_label %}

{# Errors #}

{% block empty_collection %}
    <div class=\"empty collection-empty\">
        {{ include(ea.templatePath('label/empty')) }}
    </div>
{% endblock empty_collection %}

{% block vich_file_row %}
    {% set force_error = true %}
    {{ block('form_row') }}
{% endblock %}

{% block vich_file_widget %}
    <div class=\"ea-vich-file\">
        {% if download_uri|default('') is not empty %}
            <a class=\"ea-vich-file-name\" href=\"{{ asset_helper is same as(true) ? asset(download_uri) : download_uri }}\">
                {{ component('ea:Icon', { name: 'internal:file-lines' }) }}
                {%- if download_label|default(false) -%}
                    {{ download_label|trans({}, 'VichUploaderBundle') }}
                {%- else -%}
                    {{ download_uri|split('/')|last ?: 'download'|trans({}, 'VichUploaderBundle') }}
                {%- endif -%}
            </a>
        {% endif %}

        {% set file_upload_js %}
            var newFile = document.getElementById('{{ form.file.vars.id }}').files[0];
            var fileSizeInMegabytes = newFile.size > 1024 * 1024;
            var fileSize = fileSizeInMegabytes ? newFile.size / (1024 * 1024) : newFile.size / 1024;
            document.getElementById('{{ form.file.vars.id }}_new_file_name').innerText = newFile.name + ' (' + fileSize.toFixed(2) + ' ' + (fileSizeInMegabytes ? 'MB' : 'KB') + ')';
        {% endset %}

        <div class=\"ea-vich-file-actions\">
            {# the container element is needed to allow customizing the <input type=\"file\" /> #}
            <div class=\"btn btn-secondary input-file-container\">
                {{ component('ea:Icon', { name: 'internal:upload' }) }} {{ 'action.choose_file'|trans({}, 'EasyAdminBundle') }}
                {{ form_widget(form.file, { 'attr': { 'onchange': file_upload_js }, vich: true}) }}
            </div>

            {% if form.delete is defined %}
                {{ form_row(form.delete) }}
            {% endif %}
        </div>
        <div class=\"small\" id=\"{{ form.file.vars.id }}_new_file_name\"></div>
    </div>
{% endblock %}

{% block vich_image_row %}
    {% set force_error = true %}
    {{ block('form_row') }}
{% endblock %}

{% block vich_image_widget %}
    {% set formTypeOptions = ea_vars.field.formTypeOptions|default('') %}
    <div class=\"ea-vich-image\">
        {% if image_uri|default('') is not empty %}
            {% if download_uri|default('') is empty %}
                <div class=\"ea-lightbox-thumbnail\">
                    {% if formTypeOptions.imagine_pattern is defined and formTypeOptions.imagine_pattern is not empty %}
                        {% guard filter imagine_filter %}
                            <img style=\"cursor: initial\" src=\"{{ (asset_helper is same as(true) ? asset(image_uri) : image_uri)|imagine_filter(formTypeOptions.imagine_pattern) }}\">
                        {% else %}
                            <img style=\"cursor: initial\" src=\"{{ (asset_helper is same as(true) ? asset(image_uri) : image_uri) }}\">
                        {% endguard %}
                    {% else %}
                        <img style=\"cursor: initial\" src=\"{{ asset_helper is same as(true) ? asset(image_uri) : image_uri }}\">
                    {% endif %}
                </div>
            {% else %}
                {% set _lightbox_id = 'ea-lightbox-' ~ id %}

                <a href=\"#\" class=\"ea-lightbox-thumbnail\" data-ea-lightbox-content-selector=\"#{{ _lightbox_id }}\">
                    {% if formTypeOptions.imagine_pattern is defined and formTypeOptions.imagine_pattern is not empty %}
                        {% guard filter imagine_filter %}
                            <img src=\"{{ (asset_helper is same as(true) ? asset(image_uri) : image_uri)|imagine_filter(formTypeOptions.imagine_pattern) }}\">
                        {% else %}
                            <img src=\"{{ (asset_helper is same as(true) ? asset(image_uri) : image_uri) }}\">
                        {% endguard %}
                    {% else %}
                        <img src=\"{{ asset_helper is same as(true) ? asset(image_uri) : image_uri }}\">
                    {% endif %}
                </a>

                <div id=\"{{ _lightbox_id }}\" class=\"ea-lightbox\">
                    {% if formTypeOptions.imagine_pattern is defined and formTypeOptions.imagine_pattern is not empty %}
                        {% guard filter imagine_filter %}
                            <img src=\"{{ (asset_helper is same as(true) ? asset(download_uri) : download_uri)|imagine_filter(formTypeOptions.imagine_pattern) }}\">
                        {% else %}
                            <img src=\"{{ (asset_helper is same as(true) ? asset(download_uri) : download_uri) }}\">
                        {% endguard %}
                    {% else %}
                        <img src=\"{{ asset_helper is same as(true) ? asset(download_uri) : download_uri }}\">
                    {% endif %}
                </div>
            {% endif %}
        {% endif %}

        {% set file_upload_js %}
            var newFile = document.getElementById('{{ form.file.vars.id }}').files[0];
            var fileSizeInMegabytes = newFile.size > 1024 * 1024;
            var fileSize = fileSizeInMegabytes ? newFile.size / (1024 * 1024) : newFile.size / 1024;
            document.getElementById('{{ form.file.vars.id }}_new_file_name').innerText = newFile.name + ' (' + fileSize.toFixed(2) + ' ' + (fileSizeInMegabytes ? 'MB' : 'KB') + ')';
        {% endset %}

        <div class=\"ea-vich-image-actions\">
            {# the container element is needed to allow customizing the <input type=\"file\" /> #}
            <div class=\"btn btn-secondary input-file-container\">
                {{ component('ea:Icon', { name: 'internal:upload' }) }} {{ 'action.choose_file'|trans({}, 'EasyAdminBundle') }}
                {{ form_widget(form.file, { 'attr': { 'onchange': file_upload_js }, vich: true}) }}
            </div>

            {% if form.delete is defined %}
                {{ form_row(form.delete) }}
            {% endif %}
        </div>
        <div class=\"small\" id=\"{{ form.file.vars.id }}_new_file_name\"></div>
    </div>
{% endblock %}

{% block ea_crud_rest %}
    {{ form_rest(form) }}
{% endblock ea_crud_rest %}

{# EasyAdmin form type #}
{% block ea_crud_widget %}
    {% for field in form %}
        {{ form_row(field) }}
    {% endfor %}
{% endblock ea_crud_widget %}

{# TODO: remove this when \"form panels\" are removed #}
{% block ea_crud_widget_panels %}
    {% deprecated 'The \"ea_crud_widget_panels\" block is deprecated because the form layout building logic has been revamped. Check \"ea_crud_widget\" block in `form_theme.html.page` for more details.' %}

    {{ block('ea_crud_widget_fieldsets') }}
{% endblock ea_crud_widget_panels %}

{% block ea_crud_widget_fieldsets %}
    {% deprecated 'The \"ea_crud_widget_fieldsets\" block is deprecated because the form layout building logic has been revamped. Check \"ea_crud_widget\" block in `form_theme.html.page` for more details.' %}

    {% for fieldset_name, fieldset_config in field.vars.ea_crud_form.form_fieldsets|filter(fieldset_config => not fieldset_config.form_tab or fieldset_config.form_tab == tab_name) %}
        {% set fieldset_has_header = fieldset_config.label|default(false) or fieldset_config.icon|default(false) or fieldset_config.help|default(false) %}

        {% set collapsible = fieldset_config.collapsible %}
        {% set collapsed = fieldset_config.collapsed %}

        <div class=\"{{ fieldset_config.css_class ?? '' }}\">
            <fieldset class=\"form-fieldset\">
                {% if fieldset_has_header %}
                    <div class=\"form-fieldset-header {{ collapsible ? 'collapsible' }} {{ fieldset_config.help|default(false) is not empty ? 'with-help' }}\">
                        <div class=\"form-fieldset-title\">
                            <a {% if not collapsible %}
                                href=\"#\" class=\"not-collapsible\"
                            {% else %}
                                href=\"#content-{{ fieldset_name }}\" data-bs-toggle=\"collapse\"
                                class=\"form-fieldset-collapse {{ collapsed ? 'collapsed' }}\"
                                aria-expanded=\"{{ collapsed ? 'false' : 'true' }}\" aria-controls=\"content-{{ fieldset_name }}\"
                            {% endif %}
                            >
                                {% if collapsible %}
                                    {{ component('ea:Icon', { name: 'internal:chevron-right', class: 'form-fieldset-collapse-marker' }) }}
                                {% endif %}

                                {% if fieldset_config.icon|default(false) %}
                                    {{ component('ea:Icon', { name: (fieldset_config.icon), class: 'form-fieldset-icon' }) }}
                                {% endif %}
                                {{ fieldset_config.label|trans|raw }}
                            </a>

                            {% if fieldset_config.help|default(false) %}
                                <div class=\"form-fieldset-help\">{{ fieldset_config.help|trans|raw }}</div>
                            {% endif %}
                        </div>
                    </div>
                {% endif %}

                <div id=\"content-{{ fieldset_name }}\" class=\"form-fieldset-body {{ not fieldset_has_header ? 'without-header' }} {{ collapsible ? 'collapse' }} {{ not collapsed ? 'show'}}\">
                    <div class=\"row\">
                        {% for field in form|filter(field => 'hidden' not in field.vars.block_prefixes and field.vars.ea_crud_form.form_fieldset == fieldset_name) %}
                            {% if not field.vars.ea_crud_form.form_tab or field.vars.ea_crud_form.form_tab == tab_name %}
                                {{ form_row(field) }}
                            {% endif %}
                        {% endfor %}
                    </div>
                </div>
            </fieldset>
        </div>
    {% else %}
        {% macro recursiveFieldsetForm(form) %}
            {% for field in form|filter(field => 'hidden' not in field.vars.block_prefixes and ((field.vars.ea_crud_form.form_tab is defined and not field.vars.ea_crud_form.form_tab) or field.vars.ea_crud_form.form_tabs is defined)) %}
                {% if field.vars.ea_crud_form.form_tabs is defined %}
                    {# If the field is a nested CRUD form then only render its children #}
                    {{ _self.recursiveFieldsetForm(field) }}
                {% else %}
                    {# Render all other fields #}
                    {{ form_row(field) }}
                {% endif %}
            {% endfor %}
        {% endmacro %}
        {{ _self.recursiveFieldsetForm(form) }}
    {% endfor %}
{% endblock ea_crud_widget_fieldsets %}

{# EasyAdminAutocomplete form type #}
{% block ea_autocomplete_widget %}
    {{ form_widget(form.autocomplete, { attr: attr|merge({ required: required }) }) }}
{% endblock ea_autocomplete_widget %}

{% block ea_autocomplete_inner_label %}
    {% set name = form_parent(form).vars.name %}
    {{ block('form_label') }}
{% endblock ea_autocomplete_inner_label %}

{# EasyAdmin's CodeEditor form type #}
{% block ea_code_editor_widget %}
    {{ form_widget(form, { attr: attr|merge({
        'data-ea-code-editor-field': 'true',
        'data-language': form.vars.ea_vars.field.customOptions.get('language'),
        'data-tab-size': form.vars.ea_vars.field.customOptions.get('tabSize'),
        'data-indent-with-tabs': form.vars.ea_vars.field.customOptions.get('indentWithTabs') ? 'true' : 'false',
        'data-show-line-numbers': form.vars.ea_vars.field.customOptions.get('showLineNumbers') ? 'true' : 'false',
        'data-number-of-rows': form.vars.ea_vars.field.customOptions.get('numOfRows'),
    }) }) }}
{% endblock ea_code_editor_widget %}

{# EasyAdmin's TextEditor form type #}
{% block ea_text_editor_widget %}
    {{ form_widget(form, { attr: attr|merge({
        class: 'ea-text-editor-content d-none',
        'data-number-of-rows': form.vars.ea_vars.field.customOptions.get('numOfRows')|default(5),
        'data-trix-editor-config': form.vars.ea_vars.field.customOptions.get('trixEditorConfig')|default(null)|json_encode,
    }) }) }}

    <div class=\"ea-text-editor-wrapper {{ row_attr.class|default('') ~ (not valid ? ' has-error') }}\">
        <trix-editor input=\"{{ id }}\" class=\"trix-content\"></trix-editor>
    </div>
{% endblock ea_text_editor_widget %}

{# EasyAdminSection form type #}
{% block ea_form_row_row %}
    <div class=\"{{ form.vars.row_attr.class }}\"></div>
{% endblock %}

{% block ea_form_column_group_open_row %}
    {# if columns are inside tabs, don't add a '.row' element because the tab pane already opens it #}
    {% if not form.vars.ea_is_inside_tab|default(false) %}
        <div class=\"row\">
    {% endif %}
{% endblock ea_form_column_group_open_row %}

{% block ea_form_column_group_close_row %}
    {# if columns are inside tabs, we don't add a '.row' element because
       the tab pane already opens it; so, don't close it here #}
    {% if not form.vars.ea_is_inside_tab|default(false) %}
        </div>
    {% endif %}
{% endblock ea_form_column_group_close_row %}

{% block ea_form_column_open_row %}
    {% set field = form.vars.ea_vars.field %}
    {% set field_icon = field.getCustomOption('icon') %}
    {% set column_has_title = field_icon != null or field.label != false or field.label != null or field.label != '' or field.help != null %}

    <div class=\"form-column {{ not column_has_title ? 'form-column-no-header' }} {{ field.cssClass }}\">
        {% if column_has_title %}
            <div class=\"form-column-title\">
                <div class=\"form-column-title-content\">
                    {% if field_icon %}{{ component('ea:Icon', { name: (field_icon), class: 'form-column-icon' }) }}{% endif %}
                    {% if field.label %}{{ field.label|default('')|trans(domain = ea.i18n.translationDomain)|raw }}{% endif %}
                </div>

                {% if field.help %}
                    <div class=\"form-column-help\">{{ field.help|trans(domain = ea.i18n.translationDomain)|raw }}</div>
                {% endif %}
            </div>
        {% endif %}
{% endblock ea_form_column_open_row %}

{% block ea_form_column_close_row %}
    </div>
{% endblock ea_form_column_close_row %}

{% block ea_form_fieldset_open_ealabel %}
    {% if ea_is_collapsible %}
        {{ component('ea:Icon', { name: 'internal:chevron-right', class: 'form-fieldset-collapse-marker' }) }}
    {% endif %}

    {% if ea_icon %}
        {{ component('ea:Icon', { name: (ea_icon), class: 'form-fieldset-icon' }) }}
    {% endif %}

    {{ form.vars.label|trans|raw }}
{% endblock ea_form_fieldset_open_ealabel %}

{% block ea_form_fieldset_open_label %}
    <div class=\"form-fieldset-header {{ ea_is_collapsible ? 'collapsible' }} {{ ea_help is not empty ? 'with-help' }}\">
        <div class=\"form-fieldset-title\">
            {% if ea_is_collapsible %}
                <a href=\"#content-{{ form.vars.name }}\" data-bs-toggle=\"collapse\"
                   class=\"form-fieldset-title-content form-fieldset-collapse {{ ea_is_collapsed ? 'collapsed' }}\"
                   aria-expanded=\"{{ ea_is_collapsed ? 'false' : 'true' }}\" aria-controls=\"content-{{ form.vars.name }}\">
                    {{ ea_form_ealabel(form) }}
                </a>
            {% else %}
                <span class=\"not-collapsible form-fieldset-title-content\">
                    {{ ea_form_ealabel(form) }}
                </span>
            {% endif %}

            {% if ea_help %}
                <div class=\"form-fieldset-help\">{{ ea_help|trans|raw }}</div>
            {% endif %}
        </div>
    </div>
{% endblock ea_form_fieldset_open_label %}

{% block ea_form_fieldset_open_row %}
    {% set fieldset_has_header = form.vars.label or ea_icon or ea_help %}

    <div class=\"form-fieldset {{ not fieldset_has_header ? 'form-fieldset-no-header' }} {{ ea_css_class }}\">
        <fieldset>
            {% if fieldset_has_header %}
                {{ form_label(form) }}
            {% endif %}

            <div id=\"content-{{ form.vars.name }}\" class=\"form-fieldset-body {{ not fieldset_has_header ? 'without-header' }} {{ ea_is_collapsible ? 'collapse' }} {{ not ea_is_collapsed ? 'show'}}\">
                <div class=\"row\">
{% endblock ea_form_fieldset_open_row %}

{% block ea_form_fieldset_close_row %}
                </div>
            </div>
        </fieldset>
    </div>
{% endblock ea_form_fieldset_close_row %}

{% block ea_form_tablist_row %}
    {% set tab_id_option_name = constant('EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\FormField::OPTION_TAB_ID') %}
    {% set tab_is_active_option_name = constant('EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\FormField::OPTION_TAB_IS_ACTIVE') %}
    {% set tab_error_count_option_name = constant('EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\FormField::OPTION_TAB_ERROR_COUNT') %}
    {% set field = form.vars.ea_vars.field %}

    <div class=\"nav-tabs-custom form-tabs-tablist\">
        <ul class=\"nav nav-tabs\">
            {% for tab in field.getCustomOption('tabs') %}
                <li class=\"nav-item\">
                    <a class=\"nav-link {% if tab.getCustomOption(tab_is_active_option_name) %}active{% endif %}\" href=\"#{{ tab.getCustomOption(tab_id_option_name) }}\" id=\"tablist-{{ tab.getCustomOption(tab_id_option_name) }}\" data-bs-toggle=\"tab\">
                        {%- if tab.getCustomOption('icon')|default(false) -%}
                            {{ component('ea:Icon', { name: (tab.getCustomOption('icon')), class: 'tab-nav-item-icon' }) }}
                        {%- endif -%}
                        {{ tab.label|trans(domain = ea.i18n.translationDomain)|raw }}

                        {% set tab_error_count = tab.getCustomOption(tab_error_count_option_name)  %}
                        {%- if tab_error_count > 0 -%}
                            <span class=\"badge badge-danger\" title=\"{{ 'form.tab.error_badge_title'|trans({'%count%': tab_error_count}, 'EasyAdminBundle') }}\">
                                {{- tab_error_count -}}
                            </span>
                        {%- endif -%}
                    </a>
                </li>
            {% endfor %}
        </ul>
    </div>
{% endblock ea_form_tablist_row %}

{% block ea_form_tabpane_group_open_row %}
    <div class=\"nav-tabs-custom form-tabs-content\">
        <div class=\"tab-content\">
{% endblock ea_form_tabpane_group_open_row %}

{% block ea_form_tabpane_group_close_row %}
        </div>
    </div>
{% endblock ea_form_tabpane_group_close_row %}

{% block ea_form_tabpane_open_row %}
    {% set tab_is_active_option_name = constant('EasyCorp\\\\Bundle\\\\EasyAdminBundle\\\\Field\\\\FormField::OPTION_TAB_IS_ACTIVE') %}
    {% set field = form.vars.ea_vars.field %}

    <div id=\"{{ ea_tab_id }}\" class=\"tab-pane {% if field.getCustomOption(tab_is_active_option_name) %}active{% endif %} {{ ea_css_class }}\" {% for key, value in form.vars.attr %}{{ key }}=\"{{ value|e('html') }}\"{% endfor %}>
        {% if ea_help %}
            <div class=\"content-header-help tab-help\">
                {{ ea_help|trans(domain = ea.i18n.translationDomain)|raw }}
            </div>
        {% endif %}

        <div class=\"row\">
{% endblock ea_form_tabpane_open_row %}

{% block ea_form_tabpane_close_row %}
        </div>
    </div>
{% endblock ea_form_tabpane_close_row %}

{# EasyAdminFilters form type #}
{% block ea_filters_widget %}
    {% set applied_filters = ea.request.query.all()['filters']|default([])|keys %}

    {% for field in form %}
        <div class=\"col-12\">
            <div class=\"filter-field px-3\" data-filter-property=\"{{ field.vars.name }}\">
                <div class=\"filter-heading\" id=\"filter-heading-{{ loop.index }}\">
                    <input type=\"checkbox\" class=\"filter-checkbox\" {% if field.vars.name in applied_filters %}checked{% endif %}>
                    <a data-bs-toggle=\"collapse\" href=\"#filter-content-{{ loop.index }}\" aria-expanded=\"{{ field.vars.name in applied_filters ? 'true' : 'false' }}\" aria-controls=\"filter-content-{{ loop.index }}\"
                        {% for name, value in field.vars.label_attr|default([]) %}{{ name }}=\"{{ value|e('html') }}\" {% endfor %}>
                        {{ field.vars.label|default(field.vars.name|humanize)|trans(domain = ea.i18n.translationDomain) }}
                    </a>
                </div>
                <div id=\"filter-content-{{ loop.index }}\" class=\"filter-content collapse {% if field.vars.name in applied_filters %}show{% endif %}\" aria-labelledby=\"filter-heading-{{ loop.index }}\">
                    <div class=\"form-widget\">
                        {{ form_widget(field) }}
                    </div>
                </div>
            </div>
        </div>
    {% endfor %}
{% endblock ea_filters_widget %}

{% block comparison_widget %}
    {{ form_widget(form, { attr: form.vars.attr|merge({'data-ea-comparison-id': form.vars.id}) }) }}
{% endblock comparison_widget %}

{% block ea_numeric_filter_widget %}
    <div class=\"form-widget-compound\">
        {{ form_row(form.comparison) }}
        {{ form_row(form.value) }}
        <div data-ea-value2-of-comparison-id=\"{{ form.comparison.vars.id }}\" class=\"{{ form.comparison.vars.value != 'between' ? 'd-none' }}\">
            {{ form_row(form.value2) }}
        </div>
    </div>
    {{- form_errors(form) -}}
{% endblock ea_numeric_filter_widget %}

{% block ea_datetime_filter_widget %}
    {{ block('ea_numeric_filter_widget') }}
{% endblock ea_datetime_filter_widget %}

{% block ea_fileupload_widget %}
    <div class=\"ea-fileupload\">
        <div class=\"input-group\">
            {% set placeholder = t('action.choose_file', {}, 'EasyAdminBundle') %}
            {% set title = '' %}
            {% set filesLabel = 'files'|trans({}, 'EasyAdminBundle') %}
            {% if currentFiles %}
                {% if multiple %}
                    {% set placeholder = currentFiles|length ~ ' ' ~ filesLabel %}
                {% else %}
                    {% set placeholder = (currentFiles|first).filename %}
                    {% set title = (currentFiles|first).mTime|date %}
                {% endif %}
            {% endif %}
            <div class=\"custom-file\">
                {{ form_widget(form.file, { attr: form.file.vars.attr|merge({ placeholder: placeholder, title: title, 'data-files-label': filesLabel, class: 'd-none' }) }) }}
                {{ form_label(form.file, placeholder, { label_attr: { class: 'custom-file-label' }}) }}
            </div>
            <div class=\"input-group-text\">
                {%- if currentFiles -%}
                    {% if multiple %}
                        {{ (currentFiles|reduce((carry, file) => carry + file.size))|ea_filesize }}
                    {% else %}
                        {{ (currentFiles|first).size|ea_filesize }}
                    {% endif %}
                {%- endif -%}
                {% if allow_delete %}
                    <label class=\"btn ea-fileupload-delete-btn {{ currentFiles is empty ? 'd-none' }}\" for=\"{{ form.delete.vars.id }}\">
                        {{ component('ea:Icon', { name: 'internal:delete' }) }}
                    </label>
                {% endif %}
                <label class=\"btn\" for=\"{{ form.file.vars.id }}\">
                    {{ component('ea:Icon', { name: 'internal:folder-open' }) }}
                </label>
            </div>
        </div>
        {% if multiple and currentFiles %}
            <div class=\"form-control fileupload-list\">
                <table class=\"fileupload-table\">
                    <tbody>
                    {% for file in currentFiles %}
                        <tr>
                            <td>
                                {% if download_path %}<a href=\"{{ asset(download_path ~ file.filename) }}\">{% endif %}
                                    <span title=\"{{ file.mTime|date }}\">
                                        {{ component('ea:Icon', { name: 'internal:file-lines' }) }} {{ file.filename }}
                                    </span>
                                {% if download_path %}</a>{% endif %}
                            </td>
                            <td class=\"text-right file-size\">{{ file.size|ea_filesize }}</td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
        {% if allow_delete %}
            <div class=\"d-none\">{{ form_widget(form.delete, { label: false }) }}</div>
        {% endif %}
    </div>
    {{ form_errors(form.file) }}
{% endblock %}

{% block TODO_ea_fileupload_widget %}
    {% set placeholder = '' %}
    {% set title = '' %}
    {% set filesLabel = 'files'|trans({}, 'EasyAdminBundle') %}
    {% if currentFiles %}
        {% if multiple %}
            {% set placeholder = currentFiles|length ~ ' ' ~ filesLabel %}
        {% else %}
            {% set placeholder = (currentFiles|first).filename %}
            {% set title = (currentFiles|first).mTime|date %}
        {% endif %}
    {% endif %}

    <div class=\"ea-fileupload\">
        <div class=\"input-group\">
            {{ form_widget(form.file, { attr: form.file.vars.attr|merge({ placeholder: placeholder, title: title, 'data-files-label': filesLabel, class: 'form-control' }) }) }}

            {% if currentFiles %}
                <span class=\"input-group-text\">
                    {% if multiple %}
                        {{ (currentFiles|reduce((carry, file) => carry + file.size))|ea_filesize }}
                    {% else %}
                        {{ (currentFiles|first).size|ea_filesize }}
                    {% endif %}
                </span>
            {% endif %}

            {% if currentFiles and allow_delete %}
                <button class=\"btn ea-fileupload-delete-btn\">
                    {{ component('ea:Icon', { name: 'internal:delete' }) }}
                </button>
            {% endif %}

            {% if currentFiles %}
                <button class=\"btn\">
                    {{ component('ea:Icon', { name: 'internal:folder-open' }) }}
                </button>
            {% endif %}
        </div>

        {% if multiple and currentFiles %}
            <div class=\"form-control fileupload-list\">
                <table class=\"fileupload-table\">
                    <tbody>
                    {% for file in currentFiles %}
                        <tr>
                            <td>
                                {% if download_path %}<a href=\"{{ asset(download_path ~ file.filename) }}\">{% endif %}
                                    <span title=\"{{ file.mTime|date }}\">
                                        {{ component('ea:Icon', { name: 'internal:file-lines' }) }} {{ file.filename }}
                                    </span>
                                    {% if download_path %}</a>{% endif %}
                            </td>
                            <td class=\"text-right file-size\">{{ file.size|ea_filesize }}</td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
        {% endif %}
        {% if allow_delete %}
            <div class=\"d-none\">{{ form_widget(form.delete, { label: false }) }}</div>
        {% endif %}
    </div>

    {{ form_errors(form.file) }}
{% endblock %}

{% block ea_slug_widget %}
    {% set attr = attr|merge({
        'data-ea-slug-field': '',
        'data-target': target|split('|')|map(name => form.parent.children[name].vars.id)|json_encode
    }) %}
    {% if attr['data-confirm-text'] is defined %}
        {% set attr = attr|merge({
            'data-confirm-text': attr['data-confirm-text']|trans
        }) %}
    {% endif %}

    <div class=\"input-group\">
        {{ block('form_widget') }}
        <button type=\"button\" class=\"btn\"
                data-icon-locked=\"{{ component('ea:Icon', {name: 'internal:lock'})|e('html') }}\"
                data-icon-unlocked=\"{{ component('ea:Icon', {name: 'internal:lock-open-solid'})|e('html') }}\">
            {{ component('ea:Icon', { name: 'internal:lock' }) }}
        </button>
    </div>
{% endblock %}
", "@EasyAdmin/crud/form_theme.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\vendor\\easycorp\\easyadmin-bundle\\templates\\crud\\form_theme.html.twig");
    }
}
