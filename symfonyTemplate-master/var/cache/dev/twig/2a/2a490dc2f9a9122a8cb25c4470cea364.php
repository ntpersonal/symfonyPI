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

/* Home/single.html.twig */
class __TwigTemplate_13d8ae94a08d46cbe19392da84010112 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/single.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Home/single.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "Home/single.html.twig", 1);
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

        yield "Blog Post - Soccer";
        
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
                    <h1 class=\"text-white\">Romolu to stay at Real Nadrid?</h1>
                    <p><span>May 20, 2020</span> <span class=\"mx-3\">&bullet;</span> <span>by Admin</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section first-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-8 blog-content\">
                    <p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae expedita cumque necessitatibus ducimus debitis totam, quasi praesentium eveniet tempore possimus illo esse, facilis? Corrupti possimus quae ipsa pariatur cumque, accusantium tenetur voluptatibus incidunt reprehenderit, quidem repellat sapiente, id, earum obcaecati.</p>
                    <p><img src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_1.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\"></p>

                    <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit quaerat aperiam minima eveniet quis placeat.</p></blockquote>

                    <p>Eveniet deleniti accusantium nulla natus nobis nam asperiores ipsa minima laudantium vero cumque cupiditate ipsum ratione dicta, expedita quae, officiis provident harum nisi! Esse eligendi ab molestias, quod nostrum hic saepe repudiandae non. Suscipit reiciendis tempora ut, saepe temporibus nemo.</p>
                    <p>Accusamus, temporibus, ullam. Voluptate consectetur laborum totam sunt culpa repellat, dolore voluptas. Quaerat cum ducimus aut distinctio sit, facilis corporis ab vel alias, voluptas aliquam, expedita molestias quisquam sequi eligendi nobis ea error omnis consequatur iste deleniti illum, dolorum odit.</p>
                    <p>In adipisci corporis at delectus! Cupiditate, voluptas, in architecto odit id error reprehenderit quam quibusdam excepturi distinctio dicta laborum deserunt qui labore dignissimos necessitatibus reiciendis tenetur corporis quas explicabo exercitationem suscipit. Nisi quo nulla, nihil harum obcaecati vel atque quos.</p>
                    <p><img src=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/img_2.jpg"), "html", null, true);
        yield "\" alt=\"Image\" class=\"img-fluid\"></p>
                    <p>Amet sint explicabo maxime accusantium qui dicta enim quia, nostrum id libero voluptates quae suscipit dolor quam tenetur dolores inventore illo laborum, corporis non ex, debitis quidem obcaecati! Praesentium maiores illo atque error! Earum, et, fugit. Sint, delectus molestiae. Totam.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa iste, repudiandae facere aperiam sapiente, officia delectus soluta molestiae nihil corporis animi quos ratione qui labore? Sint eaque perspiciatis minus illum.</p>
                    <p>Consectetur porro odio quod iure quaerat cupiditate similique, dolor reprehenderit molestias provident, esse dolorum omnis architecto magni amet corrupti neque ratione sunt beatae perspiciatis? Iste pariatur omnis sed ut itaque.</p>
                    <p>Id similique, rem ipsam accusantium iusto dolores sit velit ex quas ea atque, molestiae. Sint, sed. Quisquam, suscipit! Quisquam quibusdam maiores fugiat eligendi eius consequuntur, molestiae saepe commodi expedita nemo!</p>
                    <div class=\"pt-5\">
                        <p>Categories:  <a href=\"#\">HTML5</a>, <a href=\"#\">Bootstrap 4</a>  Tags: <a href=\"#\">#html</a>, <a href=\"#\">#trends</a></p>
                    </div>

                    <div class=\"pt-5\">
                        <h3 class=\"mb-5 text-white\">6 Comments</h3>
                        <ul class=\"comment-list\">
                            ";
        // line 43
        $context["comments"] = [["name" => "Jean Doe", "date" => "January 9, 2018 at 2:21pm", "hasReplies" => true], ["name" => "Jean Doe", "date" => "January 9, 2018 at 2:21pm", "hasReplies" => false]];
        // line 47
        yield "                            
                            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["comments"]) || array_key_exists("comments", $context) ? $context["comments"] : (function () { throw new RuntimeError('Variable "comments" does not exist.', 48, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 49
            yield "                                <li class=\"comment\">
                                    <div class=\"vcard bio\">
                                        <img src=\"";
            // line 51
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_1.jpg"), "html", null, true);
            yield "\" alt=\"Image placeholder\">
                                    </div>
                                    <div class=\"comment-body\">
                                        <h3>";
            // line 54
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "name", [], "any", false, false, false, 54), "html", null, true);
            yield "</h3>
                                        <div class=\"meta\">";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "date", [], "any", false, false, false, 55), "html", null, true);
            yield "</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href=\"#\" class=\"reply\">Reply</a></p>
                                    </div>

                                    ";
            // line 60
            if (CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "hasReplies", [], "any", false, false, false, 60)) {
                // line 61
                yield "                                        <ul class=\"children\">
                                            ";
                // line 62
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 63
                    yield "                                                <li class=\"comment\">
                                                    <div class=\"vcard bio\">
                                                        <img src=\"";
                    // line 65
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_1.jpg"), "html", null, true);
                    yield "\" alt=\"Image placeholder\">
                                                    </div>
                                                    <div class=\"comment-body\">
                                                        <h3>";
                    // line 68
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "name", [], "any", false, false, false, 68), "html", null, true);
                    yield "</h3>
                                                        <div class=\"meta\">";
                    // line 69
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["comment"], "date", [], "any", false, false, false, 69), "html", null, true);
                    yield "</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href=\"#\" class=\"reply\">Reply</a></p>
                                                    </div>
                                                </li>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 75
                yield "                                        </ul>
                                    ";
            }
            // line 77
            yield "                                </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['comment'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        yield "                        </ul>

                        <div class=\"comment-form-wrap pt-5\">
                            <h3 class=\"mb-5\">Leave a comment</h3>
                            <form action=\"#\" class=\"p-5 bg-light\">
                                <div class=\"form-group\">
                                    <label for=\"name\">Name *</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"email\">Email *</label>
                                    <input type=\"email\" class=\"form-control\" id=\"email\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"website\">Website</label>
                                    <input type=\"url\" class=\"form-control\" id=\"website\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"message\">Message</label>
                                    <textarea name=\"\" id=\"message\" cols=\"30\" rows=\"10\" class=\"form-control\"></textarea>
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"submit\" value=\"Post Comment\" class=\"btn btn-primary py-3 px-4 text-white\">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class=\"col-md-4 sidebar\">
                    <div class=\"sidebar-box\">
                        <form action=\"#\" class=\"search-form\">
                            <div class=\"form-group\">
                                <span class=\"icon fa fa-search\"></span>
                                <input type=\"text\" class=\"form-control\" placeholder=\"Type a keyword and hit enter\">
                            </div>
                        </form>
                    </div>
                    <div class=\"sidebar-box\">
                        <div class=\"categories\">
                            <h3 class=\"text-uppercase\">Categories</h3>
                            ";
        // line 120
        $context["categories"] = [["name" => "Creatives", "count" => 12], ["name" => "News", "count" => 22], ["name" => "Design", "count" => 37], ["name" => "HTML", "count" => 42], ["name" => "Web Development", "count" => 14]];
        // line 127
        yield "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 127, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 128
            yield "                                <li><a href=\"#\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 128), "html", null, true);
            yield " <span>(";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "count", [], "any", false, false, false, 128), "html", null, true);
            yield ")</span></a></li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        yield "                        </div>
                    </div>
                    <div class=\"sidebar-box\">
                        <img src=\"";
        // line 133
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("images/person_1.jpg"), "html", null, true);
        yield "\" alt=\"Image placeholder\" class=\"img-fluid mb-4\">
                        <h3 class=\"text-uppercase\">About The Author</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        <p><a href=\"#\" class=\"btn btn-primary text-white\">Read More</a></p>
                    </div>

                    <div class=\"sidebar-box\">
                        <h3 class=\"text-uppercase\">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
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
        return "Home/single.html.twig";
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
        return array (  290 => 133,  285 => 130,  274 => 128,  269 => 127,  267 => 120,  224 => 79,  217 => 77,  213 => 75,  201 => 69,  197 => 68,  191 => 65,  187 => 63,  183 => 62,  180 => 61,  178 => 60,  170 => 55,  166 => 54,  160 => 51,  156 => 49,  152 => 48,  149 => 47,  147 => 43,  131 => 30,  121 => 23,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Blog Post - Soccer{% endblock %}

{% block body %}
    <div class=\"hero overlay\" style=\"background-image: url('{{ asset('images/bg_3.jpg') }}');\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-9 mx-auto text-center\">
                    <h1 class=\"text-white\">Romolu to stay at Real Nadrid?</h1>
                    <p><span>May 20, 2020</span> <span class=\"mx-3\">&bullet;</span> <span>by Admin</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class=\"site-section first-section\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-8 blog-content\">
                    <p class=\"lead\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda nihil aspernatur nemo sunt, qui, harum repudiandae quisquam eaque dolore itaque quod tenetur quo quos labore?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae expedita cumque necessitatibus ducimus debitis totam, quasi praesentium eveniet tempore possimus illo esse, facilis? Corrupti possimus quae ipsa pariatur cumque, accusantium tenetur voluptatibus incidunt reprehenderit, quidem repellat sapiente, id, earum obcaecati.</p>
                    <p><img src=\"{{ asset('images/img_1.jpg') }}\" alt=\"Image\" class=\"img-fluid\"></p>

                    <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident vero tempora aliquam excepturi labore, ad soluta voluptate necessitatibus. Nulla error beatae, quam, facilis suscipit quaerat aperiam minima eveniet quis placeat.</p></blockquote>

                    <p>Eveniet deleniti accusantium nulla natus nobis nam asperiores ipsa minima laudantium vero cumque cupiditate ipsum ratione dicta, expedita quae, officiis provident harum nisi! Esse eligendi ab molestias, quod nostrum hic saepe repudiandae non. Suscipit reiciendis tempora ut, saepe temporibus nemo.</p>
                    <p>Accusamus, temporibus, ullam. Voluptate consectetur laborum totam sunt culpa repellat, dolore voluptas. Quaerat cum ducimus aut distinctio sit, facilis corporis ab vel alias, voluptas aliquam, expedita molestias quisquam sequi eligendi nobis ea error omnis consequatur iste deleniti illum, dolorum odit.</p>
                    <p>In adipisci corporis at delectus! Cupiditate, voluptas, in architecto odit id error reprehenderit quam quibusdam excepturi distinctio dicta laborum deserunt qui labore dignissimos necessitatibus reiciendis tenetur corporis quas explicabo exercitationem suscipit. Nisi quo nulla, nihil harum obcaecati vel atque quos.</p>
                    <p><img src=\"{{ asset('images/img_2.jpg') }}\" alt=\"Image\" class=\"img-fluid\"></p>
                    <p>Amet sint explicabo maxime accusantium qui dicta enim quia, nostrum id libero voluptates quae suscipit dolor quam tenetur dolores inventore illo laborum, corporis non ex, debitis quidem obcaecati! Praesentium maiores illo atque error! Earum, et, fugit. Sint, delectus molestiae. Totam.</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa iste, repudiandae facere aperiam sapiente, officia delectus soluta molestiae nihil corporis animi quos ratione qui labore? Sint eaque perspiciatis minus illum.</p>
                    <p>Consectetur porro odio quod iure quaerat cupiditate similique, dolor reprehenderit molestias provident, esse dolorum omnis architecto magni amet corrupti neque ratione sunt beatae perspiciatis? Iste pariatur omnis sed ut itaque.</p>
                    <p>Id similique, rem ipsam accusantium iusto dolores sit velit ex quas ea atque, molestiae. Sint, sed. Quisquam, suscipit! Quisquam quibusdam maiores fugiat eligendi eius consequuntur, molestiae saepe commodi expedita nemo!</p>
                    <div class=\"pt-5\">
                        <p>Categories:  <a href=\"#\">HTML5</a>, <a href=\"#\">Bootstrap 4</a>  Tags: <a href=\"#\">#html</a>, <a href=\"#\">#trends</a></p>
                    </div>

                    <div class=\"pt-5\">
                        <h3 class=\"mb-5 text-white\">6 Comments</h3>
                        <ul class=\"comment-list\">
                            {% set comments = [
                                { name: 'Jean Doe', date: 'January 9, 2018 at 2:21pm', hasReplies: true },
                                { name: 'Jean Doe', date: 'January 9, 2018 at 2:21pm', hasReplies: false }
                            ] %}
                            
                            {% for comment in comments %}
                                <li class=\"comment\">
                                    <div class=\"vcard bio\">
                                        <img src=\"{{ asset('images/person_1.jpg') }}\" alt=\"Image placeholder\">
                                    </div>
                                    <div class=\"comment-body\">
                                        <h3>{{ comment.name }}</h3>
                                        <div class=\"meta\">{{ comment.date }}</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href=\"#\" class=\"reply\">Reply</a></p>
                                    </div>

                                    {% if comment.hasReplies %}
                                        <ul class=\"children\">
                                            {% for i in 1..3 %}
                                                <li class=\"comment\">
                                                    <div class=\"vcard bio\">
                                                        <img src=\"{{ asset('images/person_1.jpg') }}\" alt=\"Image placeholder\">
                                                    </div>
                                                    <div class=\"comment-body\">
                                                        <h3>{{ comment.name }}</h3>
                                                        <div class=\"meta\">{{ comment.date }}</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href=\"#\" class=\"reply\">Reply</a></p>
                                                    </div>
                                                </li>
                                            {% endfor %}
                                        </ul>
                                    {% endif %}
                                </li>
                            {% endfor %}
                        </ul>

                        <div class=\"comment-form-wrap pt-5\">
                            <h3 class=\"mb-5\">Leave a comment</h3>
                            <form action=\"#\" class=\"p-5 bg-light\">
                                <div class=\"form-group\">
                                    <label for=\"name\">Name *</label>
                                    <input type=\"text\" class=\"form-control\" id=\"name\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"email\">Email *</label>
                                    <input type=\"email\" class=\"form-control\" id=\"email\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"website\">Website</label>
                                    <input type=\"url\" class=\"form-control\" id=\"website\">
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"message\">Message</label>
                                    <textarea name=\"\" id=\"message\" cols=\"30\" rows=\"10\" class=\"form-control\"></textarea>
                                </div>
                                <div class=\"form-group\">
                                    <input type=\"submit\" value=\"Post Comment\" class=\"btn btn-primary py-3 px-4 text-white\">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class=\"col-md-4 sidebar\">
                    <div class=\"sidebar-box\">
                        <form action=\"#\" class=\"search-form\">
                            <div class=\"form-group\">
                                <span class=\"icon fa fa-search\"></span>
                                <input type=\"text\" class=\"form-control\" placeholder=\"Type a keyword and hit enter\">
                            </div>
                        </form>
                    </div>
                    <div class=\"sidebar-box\">
                        <div class=\"categories\">
                            <h3 class=\"text-uppercase\">Categories</h3>
                            {% set categories = [
                                { name: 'Creatives', count: 12 },
                                { name: 'News', count: 22 },
                                { name: 'Design', count: 37 },
                                { name: 'HTML', count: 42 },
                                { name: 'Web Development', count: 14 }
                            ] %}
                            {% for category in categories %}
                                <li><a href=\"#\">{{ category.name }} <span>({{ category.count }})</span></a></li>
                            {% endfor %}
                        </div>
                    </div>
                    <div class=\"sidebar-box\">
                        <img src=\"{{ asset('images/person_1.jpg') }}\" alt=\"Image placeholder\" class=\"img-fluid mb-4\">
                        <h3 class=\"text-uppercase\">About The Author</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                        <p><a href=\"#\" class=\"btn btn-primary text-white\">Read More</a></p>
                    </div>

                    <div class=\"sidebar-box\">
                        <h3 class=\"text-uppercase\">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %} ", "Home/single.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\Home\\single.html.twig");
    }
}
