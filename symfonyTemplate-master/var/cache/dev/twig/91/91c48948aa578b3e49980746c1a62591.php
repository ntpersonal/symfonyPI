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

/* shop/product.html.twig */
class __TwigTemplate_634fc9562ebe67602bb81c9838ef6189 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/product.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/product.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "shop/product.html.twig", 1);
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })()), "nameproduct", [], "any", false, false, false, 3), "html", null, true);
        yield " - Shop";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    .shop-header {
        background-color: #fb6340;
        padding: 50px 0;
        margin-bottom: 40px;
    }
    .shop-header h1 {
        color: white;
        font-weight: bold;
    }
    .product-detail {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }
    .product-image {
        height: 400px;
        overflow: hidden;
    }
    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .product-info {
        padding: 30px;
    }
    .product-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #344767;
    }
    .product-price {
        font-size: 24px;
        font-weight: bold;
        color: #fb6340;
        margin-bottom: 20px;
    }
    .product-meta {
        margin-bottom: 20px;
        font-size: 16px;
        color: #67748e;
    }
    .product-meta div {
        margin-bottom: 10px;
    }
    .stock-yes {
        color: #2dce89;
        font-weight: bold;
    }
    .stock-coming {
        color: #fb6340;
        font-weight: bold;
    }
    .back-btn {
        background-color: #67748e;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-right: 10px;
    }
    .back-btn:hover {
        background-color: #5c677d;
        color: white;
    }
    .add-to-cart-btn {
        background-color: #fb6340;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .add-to-cart-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .user-actions {
        display: inline-block;
        margin-left: 15px;
    }
    .user-actions .btn {
        margin-left: 5px;
    }
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #fb6340;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
        font-weight: bold;
    }
    .quantity-control {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .quantity-control label {
        margin-right: 10px;
        color: #344767;
        font-weight: bold;
    }
    .quantity-control input {
        width: 60px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    .alert {
        margin-bottom: 20px;
        border-radius: 5px;
        padding: 15px;
    }
    .alert-success {
        background-color: #2dce89;
        color: white;
        border: none;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 134
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

        // line 135
        yield "<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <h1>";
        // line 139
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 139, $this->source); })()), "nameproduct", [], "any", false, false, false, 139), "html", null, true);
        yield "</h1>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb\">
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 142
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"text-white\">Home</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 143
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
        yield "\" class=\"text-white\">Shop</a></li>
                        <li class=\"breadcrumb-item active text-white\" aria-current=\"page\">";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 144, $this->source); })()), "nameproduct", [], "any", false, false, false, 144), "html", null, true);
        yield "</li>
                    </ol>
                </nav>
            </div>
            <div class=\"col-md-6 text-center text-md-right\">
                ";
        // line 149
        if ((isset($context["isLoggedIn"]) || array_key_exists("isLoggedIn", $context) ? $context["isLoggedIn"] : (function () { throw new RuntimeError('Variable "isLoggedIn" does not exist.', 149, $this->source); })())) {
            // line 150
            yield "                    <span class=\"text-white\">Welcome, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userName"]) || array_key_exists("userName", $context) ? $context["userName"] : (function () { throw new RuntimeError('Variable "userName" does not exist.', 150, $this->source); })()), "html", null, true);
            yield "!</span>
                    <div class=\"user-actions\">
                        <a href=\"";
            // line 152
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_cart");
            yield "\" class=\"btn btn-light position-relative\">
                            <i class=\"icon-shopping-cart\"></i> Cart
                            ";
            // line 154
            if (((isset($context["cartCount"]) || array_key_exists("cartCount", $context) ? $context["cartCount"] : (function () { throw new RuntimeError('Variable "cartCount" does not exist.', 154, $this->source); })()) > 0)) {
                // line 155
                yield "                                <span class=\"cart-badge\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["cartCount"]) || array_key_exists("cartCount", $context) ? $context["cartCount"] : (function () { throw new RuntimeError('Variable "cartCount" does not exist.', 155, $this->source); })()), "html", null, true);
                yield "</span>
                            ";
            }
            // line 157
            yield "                        </a>
                        <a href=\"";
            // line 158
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_logout");
            yield "\" class=\"btn btn-outline-light\">Logout</a>
                    </div>
                ";
        } else {
            // line 161
            yield "                    <div class=\"user-actions\">
                        <a href=\"";
            // line 162
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_login");
            yield "\" class=\"btn btn-light\">Login</a>
                        <a href=\"";
            // line 163
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_register");
            yield "\" class=\"btn btn-outline-light\">Register</a>
                    </div>
                ";
        }
        // line 166
        yield "            </div>
        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 174
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 174, $this->source); })()), "flashes", [], "any", false, false, false, 174));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 175
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 176
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
                        ";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        yield "        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"product-detail\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"product-image\">
                            ";
        // line 190
        if (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 190, $this->source); })()), "image", [], "any", false, false, false, 190)) {
            // line 191
            yield "                                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/products/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 191, $this->source); })()), "image", [], "any", false, false, false, 191))), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 191, $this->source); })()), "nameproduct", [], "any", false, false, false, 191), "html", null, true);
            yield "\">
                            ";
        } else {
            // line 193
            yield "                                <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/default-product.png"), "html", null, true);
            yield "\" alt=\"Default Image\">
                            ";
        }
        // line 195
        yield "                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"product-info\">
                            <h1 class=\"product-title\">";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 199, $this->source); })()), "nameproduct", [], "any", false, false, false, 199), "html", null, true);
        yield "</h1>
                            <div class=\"product-price\">";
        // line 200
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 200, $this->source); })()), "priceproduct", [], "any", false, false, false, 200), "html", null, true);
        yield " €</div>
                            
                            <div class=\"product-meta\">
                                <div>
                                    <strong>Category:</strong> ";
        // line 204
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 204, $this->source); })()), "category", [], "any", false, false, false, 204)), "html", null, true);
        yield "
                                </div>
                                <div>
                                    <strong>Availability:</strong> 
                                    <span class=\"stock-";
        // line 208
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 208, $this->source); })()), "stock", [], "any", false, false, false, 208) == "yes")) {
            yield "yes";
        } else {
            yield "coming";
        }
        yield "\">
                                        ";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 209, $this->source); })()), "stock", [], "any", false, false, false, 209)), "html", null, true);
        yield "
                                    </span>
                                </div>
                            </div>
                            
                            ";
        // line 214
        if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 214, $this->source); })()), "stock", [], "any", false, false, false, 214) == "yes") && (isset($context["isLoggedIn"]) || array_key_exists("isLoggedIn", $context) ? $context["isLoggedIn"] : (function () { throw new RuntimeError('Variable "isLoggedIn" does not exist.', 214, $this->source); })()))) {
            // line 215
            yield "                                <form method=\"POST\" action=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_add_to_cart", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 215, $this->source); })()), "id", [], "any", false, false, false, 215)]), "html", null, true);
            yield "\">
                                    <div class=\"quantity-control\">
                                        <label for=\"quantity\">Quantity:</label>
                                        <input type=\"number\" id=\"quantity\" name=\"quantity\" value=\"1\" min=\"1\" max=\"10\">
                                    </div>
                                    
                                    <div class=\"product-actions\">
                                        <a href=\"";
            // line 222
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
            yield "\" class=\"btn back-btn\">
                                            <i class=\"icon-arrow-left\"></i> Back to Shop
                                        </a>
                                        
                                        <button type=\"submit\" class=\"btn add-to-cart-btn\">
                                            <i class=\"icon-shopping-cart\"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            ";
        } else {
            // line 232
            yield "                                <div class=\"product-actions\">
                                    <a href=\"";
            // line 233
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
            yield "\" class=\"btn back-btn\">
                                        <i class=\"icon-arrow-left\"></i> Back to Shop
                                    </a>
                                    
                                    ";
            // line 237
            if (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 237, $this->source); })()), "stock", [], "any", false, false, false, 237) == "yes") &&  !(isset($context["isLoggedIn"]) || array_key_exists("isLoggedIn", $context) ? $context["isLoggedIn"] : (function () { throw new RuntimeError('Variable "isLoggedIn" does not exist.', 237, $this->source); })()))) {
                // line 238
                yield "                                        <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_login");
                yield "\" class=\"btn add-to-cart-btn\">
                                            Login to Purchase
                                        </a>
                                    ";
            }
            // line 242
            yield "                                </div>
                            ";
        }
        // line 244
        yield "                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row mb-5\">
        <div class=\"col-12\">
            <h3>Related Products</h3>
            <p>Check out these products in the ";
        // line 254
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 254, $this->source); })()), "category", [], "any", false, false, false, 254)), "html", null, true);
        yield " category</p>
            <!-- Here you would add related products logic - this is just a placeholder -->
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
        return "shop/product.html.twig";
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
        return array (  491 => 254,  479 => 244,  475 => 242,  467 => 238,  465 => 237,  458 => 233,  455 => 232,  442 => 222,  431 => 215,  429 => 214,  421 => 209,  413 => 208,  406 => 204,  399 => 200,  395 => 199,  389 => 195,  383 => 193,  375 => 191,  373 => 190,  362 => 181,  356 => 180,  347 => 177,  342 => 176,  337 => 175,  333 => 174,  323 => 166,  317 => 163,  313 => 162,  310 => 161,  304 => 158,  301 => 157,  295 => 155,  293 => 154,  288 => 152,  282 => 150,  280 => 149,  272 => 144,  268 => 143,  264 => 142,  258 => 139,  252 => 135,  239 => 134,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ product.nameproduct }} - Shop{% endblock %}

{% block stylesheets %}
<style>
    .shop-header {
        background-color: #fb6340;
        padding: 50px 0;
        margin-bottom: 40px;
    }
    .shop-header h1 {
        color: white;
        font-weight: bold;
    }
    .product-detail {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }
    .product-image {
        height: 400px;
        overflow: hidden;
    }
    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .product-info {
        padding: 30px;
    }
    .product-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #344767;
    }
    .product-price {
        font-size: 24px;
        font-weight: bold;
        color: #fb6340;
        margin-bottom: 20px;
    }
    .product-meta {
        margin-bottom: 20px;
        font-size: 16px;
        color: #67748e;
    }
    .product-meta div {
        margin-bottom: 10px;
    }
    .stock-yes {
        color: #2dce89;
        font-weight: bold;
    }
    .stock-coming {
        color: #fb6340;
        font-weight: bold;
    }
    .back-btn {
        background-color: #67748e;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-right: 10px;
    }
    .back-btn:hover {
        background-color: #5c677d;
        color: white;
    }
    .add-to-cart-btn {
        background-color: #fb6340;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .add-to-cart-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .user-actions {
        display: inline-block;
        margin-left: 15px;
    }
    .user-actions .btn {
        margin-left: 5px;
    }
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: #fb6340;
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
        font-weight: bold;
    }
    .quantity-control {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .quantity-control label {
        margin-right: 10px;
        color: #344767;
        font-weight: bold;
    }
    .quantity-control input {
        width: 60px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 5px;
    }
    .alert {
        margin-bottom: 20px;
        border-radius: 5px;
        padding: 15px;
    }
    .alert-success {
        background-color: #2dce89;
        color: white;
        border: none;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6\">
                <h1>{{ product.nameproduct }}</h1>
                <nav aria-label=\"breadcrumb\">
                    <ol class=\"breadcrumb\">
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('app_home') }}\" class=\"text-white\">Home</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('app_shop') }}\" class=\"text-white\">Shop</a></li>
                        <li class=\"breadcrumb-item active text-white\" aria-current=\"page\">{{ product.nameproduct }}</li>
                    </ol>
                </nav>
            </div>
            <div class=\"col-md-6 text-center text-md-right\">
                {% if isLoggedIn %}
                    <span class=\"text-white\">Welcome, {{ userName }}!</span>
                    <div class=\"user-actions\">
                        <a href=\"{{ path('app_shop_cart') }}\" class=\"btn btn-light position-relative\">
                            <i class=\"icon-shopping-cart\"></i> Cart
                            {% if cartCount > 0 %}
                                <span class=\"cart-badge\">{{ cartCount }}</span>
                            {% endif %}
                        </a>
                        <a href=\"{{ path('app_shop_logout') }}\" class=\"btn btn-outline-light\">Logout</a>
                    </div>
                {% else %}
                    <div class=\"user-actions\">
                        <a href=\"{{ path('app_shop_login') }}\" class=\"btn btn-light\">Login</a>
                        <a href=\"{{ path('app_shop_register') }}\" class=\"btn btn-outline-light\">Register</a>
                    </div>
                {% endif %}
            </div>
        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12\">
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class=\"alert alert-{{ label }}\">
                        {{ message }}
                    </div>
                {% endfor %}
            {% endfor %}
        </div>
    </div>
    
    <div class=\"row\">
        <div class=\"col-12\">
            <div class=\"product-detail\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"product-image\">
                            {% if product.image %}
                                <img src=\"{{ asset('uploads/products/' ~ product.image) }}\" alt=\"{{ product.nameproduct }}\">
                            {% else %}
                                <img src=\"{{ asset('assets/images/default-product.png') }}\" alt=\"Default Image\">
                            {% endif %}
                        </div>
                    </div>
                    <div class=\"col-md-6\">
                        <div class=\"product-info\">
                            <h1 class=\"product-title\">{{ product.nameproduct }}</h1>
                            <div class=\"product-price\">{{ product.priceproduct }} €</div>
                            
                            <div class=\"product-meta\">
                                <div>
                                    <strong>Category:</strong> {{ product.category|capitalize }}
                                </div>
                                <div>
                                    <strong>Availability:</strong> 
                                    <span class=\"stock-{% if product.stock == 'yes' %}yes{% else %}coming{% endif %}\">
                                        {{ product.stock|capitalize }}
                                    </span>
                                </div>
                            </div>
                            
                            {% if product.stock == 'yes' and isLoggedIn %}
                                <form method=\"POST\" action=\"{{ path('app_shop_add_to_cart', {'id': product.id}) }}\">
                                    <div class=\"quantity-control\">
                                        <label for=\"quantity\">Quantity:</label>
                                        <input type=\"number\" id=\"quantity\" name=\"quantity\" value=\"1\" min=\"1\" max=\"10\">
                                    </div>
                                    
                                    <div class=\"product-actions\">
                                        <a href=\"{{ path('app_shop') }}\" class=\"btn back-btn\">
                                            <i class=\"icon-arrow-left\"></i> Back to Shop
                                        </a>
                                        
                                        <button type=\"submit\" class=\"btn add-to-cart-btn\">
                                            <i class=\"icon-shopping-cart\"></i> Add to Cart
                                        </button>
                                    </div>
                                </form>
                            {% else %}
                                <div class=\"product-actions\">
                                    <a href=\"{{ path('app_shop') }}\" class=\"btn back-btn\">
                                        <i class=\"icon-arrow-left\"></i> Back to Shop
                                    </a>
                                    
                                    {% if product.stock == 'yes' and not isLoggedIn %}
                                        <a href=\"{{ path('app_shop_login') }}\" class=\"btn add-to-cart-btn\">
                                            Login to Purchase
                                        </a>
                                    {% endif %}
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class=\"row mb-5\">
        <div class=\"col-12\">
            <h3>Related Products</h3>
            <p>Check out these products in the {{ product.category|capitalize }} category</p>
            <!-- Here you would add related products logic - this is just a placeholder -->
        </div>
    </div>
</div>
{% endblock %} ", "shop/product.html.twig", "C:\\Users\\Raouf\\Desktop\\symfonyTemplate-master-yes\\symfonyTemplate-master\\templates\\shop\\product.html.twig");
    }
}
