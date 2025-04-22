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

/* shop/index.html.twig */
class __TwigTemplate_8eedb299ef7a9951afd494f1dfb22227 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "shop/index.html.twig", 1);
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

        yield "Shop - Soccer";
        
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
    .product-card {
        height: 100%;
        margin-bottom: 30px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .product-img {
        height: 250px;
        overflow: hidden;
    }
    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .product-info {
        padding: 20px;
        background-color: white;
    }
    .product-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 18px;
        color: #344767;
    }
    .product-price {
        font-size: 20px;
        font-weight: bold;
        color: #fb6340;
        margin-bottom: 10px;
    }
    .product-meta {
        font-size: 14px;
        color: #67748e;
        margin-bottom: 15px;
    }
    .product-btn {
        background-color: #fb6340;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .product-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .stock-yes {
        color: #2dce89;
    }
    .stock-coming {
        color: #fb6340;
    }
    .stock-no {
        color: #f5365c;
    }
    .filter-card {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .filter-card h4 {
        margin-bottom: 20px;
        color: #344767;
        font-weight: bold;
    }
    .user-actions {
        display: inline-block;
        margin-left: 15px;
    }
    .user-actions .btn {
        margin-left: 5px;
    }
    .cart-icon {
        position: relative;
        margin-left: 15px;
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
    .add-to-cart-form {
        margin-top: 10px;
    }
    /* Login Modal Styles */
    .login-modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }
    .login-modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 0;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        max-width: 400px;
        position: relative;
    }
    .login-modal-header {
        background-color: #fb6340;
        color: white;
        padding: 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .login-modal-body {
        padding: 20px;
    }
    .login-modal-footer {
        padding: 15px 20px;
        background-color: #f8f9fa;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        text-align: center;
    }
    .close-modal {
        position: absolute;
        right: 15px;
        top: 15px;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 174
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

        // line 175
        yield "<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6 text-center text-md-left\">
                <h1>Shop</h1>
                <p class=\"text-white\">Browse our products and find the perfect gear for your sports needs</p>
            </div>
            <div class=\"col-md-6 text-center text-md-right\">
                ";
        // line 183
        if ((isset($context["isLoggedIn"]) || array_key_exists("isLoggedIn", $context) ? $context["isLoggedIn"] : (function () { throw new RuntimeError('Variable "isLoggedIn" does not exist.', 183, $this->source); })())) {
            // line 184
            yield "                    <span class=\"text-white\">Welcome, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userName"]) || array_key_exists("userName", $context) ? $context["userName"] : (function () { throw new RuntimeError('Variable "userName" does not exist.', 184, $this->source); })()), "html", null, true);
            yield "!</span>
                    <div class=\"user-actions\">
                        <a href=\"";
            // line 186
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_cart");
            yield "\" class=\"btn btn-light\">
                            <i class=\"icon-shopping-cart\"></i> Cart
                            ";
            // line 188
            if (((isset($context["cartCount"]) || array_key_exists("cartCount", $context) ? $context["cartCount"] : (function () { throw new RuntimeError('Variable "cartCount" does not exist.', 188, $this->source); })()) > 0)) {
                // line 189
                yield "                                <span class=\"cart-badge\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["cartCount"]) || array_key_exists("cartCount", $context) ? $context["cartCount"] : (function () { throw new RuntimeError('Variable "cartCount" does not exist.', 189, $this->source); })()), "html", null, true);
                yield "</span>
                            ";
            }
            // line 191
            yield "                        </a>
                        <a href=\"";
            // line 192
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_logout");
            yield "\" class=\"btn btn-outline-light\">Logout</a>
                    </div>
                ";
        } else {
            // line 195
            yield "                    <div class=\"user-actions\">
                        <a href=\"#\" class=\"btn btn-light login-trigger\">Login</a>
                        <a href=\"";
            // line 197
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_register");
            yield "\" class=\"btn btn-outline-light\">Register</a>
                    </div>
                ";
        }
        // line 200
        yield "            </div>
        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 208
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 208, $this->source); })()), "flashes", [], "any", false, false, false, 208));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 209
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 210
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
                        ";
                // line 211
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 214
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 215
        yield "        </div>
    </div>
    
    <div class=\"row\">
        <!-- Filter Sidebar -->
        <div class=\"col-lg-3\">
            <div class=\"filter-card\">
                <h4>Filter Products</h4>
                <form method=\"GET\" action=\"";
        // line 223
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
        yield "\">
                    <div class=\"form-group\">
                        <label for=\"search\">Search</label>
                        <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" placeholder=\"Product name...\" value=\"";
        // line 226
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["searchTerm"]) || array_key_exists("searchTerm", $context) ? $context["searchTerm"] : (function () { throw new RuntimeError('Variable "searchTerm" does not exist.', 226, $this->source); })()), "html", null, true);
        yield "\">
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"category\">Category</label>
                        <select class=\"form-control\" id=\"category\" name=\"category\">
                            <option value=\"\">All Categories</option>
                            ";
        // line 233
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 233, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 234
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cat"], "html", null, true);
            yield "\" ";
            if (((isset($context["selectedCategory"]) || array_key_exists("selectedCategory", $context) ? $context["selectedCategory"] : (function () { throw new RuntimeError('Variable "selectedCategory" does not exist.', 234, $this->source); })()) == $context["cat"])) {
                yield "selected";
            }
            yield ">
                                    ";
            // line 235
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["cat"]), "html", null, true);
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['cat'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 238
        yield "                        </select>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"stock\">Availability</label>
                        <select class=\"form-control\" id=\"stock\" name=\"stock\">
                            <option value=\"\">All</option>
                            ";
        // line 245
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["stockOptions"]) || array_key_exists("stockOptions", $context) ? $context["stockOptions"] : (function () { throw new RuntimeError('Variable "stockOptions" does not exist.', 245, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
            // line 246
            yield "                                <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
            yield "\" ";
            if (((isset($context["selectedStock"]) || array_key_exists("selectedStock", $context) ? $context["selectedStock"] : (function () { throw new RuntimeError('Variable "selectedStock" does not exist.', 246, $this->source); })()) == $context["option"])) {
                yield "selected";
            }
            yield ">
                                    ";
            // line 247
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), $context["option"]), "html", null, true);
            yield "
                                </option>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['option'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 250
        yield "                        </select>
                    </div>
                    
                    <div class=\"form-group\">
                        <div class=\"d-flex gap-2 w-100\">
                            <button type=\"submit\" class=\"btn product-btn\">Search</button>
                            <a href=\"";
        // line 256
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
        yield "\" class=\"btn btn-secondary\">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class=\"col-lg-9\">
            ";
        // line 265
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 265, $this->source); })())) > 0)) {
            // line 266
            yield "                <div class=\"row\">
                    ";
            // line 267
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 267, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 268
                yield "                        <div class=\"col-md-4\">
                            <div class=\"product-card\">
                                <div class=\"product-img\">
                                    ";
                // line 271
                if (CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 271)) {
                    // line 272
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/products/" . CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 272))), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "nameproduct", [], "any", false, false, false, 272), "html", null, true);
                    yield "\">
                                    ";
                } else {
                    // line 274
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/default-product.png"), "html", null, true);
                    yield "\" alt=\"Default Image\">
                                    ";
                }
                // line 276
                yield "                                </div>
                                <div class=\"product-info\">
                                    <h3 class=\"product-title\">";
                // line 278
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "nameproduct", [], "any", false, false, false, 278), "html", null, true);
                yield "</h3>
                                    <div class=\"product-price\">";
                // line 279
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "priceproduct", [], "any", false, false, false, 279), "html", null, true);
                yield " €</div>
                                    <div class=\"product-meta\">
                                        <div>
                                            <strong>Category:</strong> ";
                // line 282
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 282)), "html", null, true);
                yield "
                                        </div>
                                        <div>
                                            <strong>Status:</strong> 
                                            <span class=\"stock-";
                // line 286
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 286) == "yes")) {
                    yield "yes";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 286) == "coming")) {
                    yield "coming";
                } else {
                    yield "no";
                }
                yield "\">
                                                ";
                // line 287
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 287)), "html", null, true);
                yield "
                                            </span>
                                        </div>
                                    </div>
                                    <a href=\"";
                // line 291
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_product", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 291)]), "html", null, true);
                yield "\" class=\"btn product-btn\">
                                        ";
                // line 292
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 292) == "yes")) {
                    // line 293
                    yield "                                            View Details
                                        ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 294
$context["product"], "stock", [], "any", false, false, false, 294) == "coming")) {
                    // line 295
                    yield "                                            Coming Soon
                                        ";
                } else {
                    // line 297
                    yield "                                            Out of Stock
                                        ";
                }
                // line 299
                yield "                                    </a>
                                    
                                    ";
                // line 301
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 301) == "yes")) {
                    // line 302
                    yield "                                        ";
                    if ((isset($context["isLoggedIn"]) || array_key_exists("isLoggedIn", $context) ? $context["isLoggedIn"] : (function () { throw new RuntimeError('Variable "isLoggedIn" does not exist.', 302, $this->source); })())) {
                        // line 303
                        yield "                                            <form method=\"POST\" action=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_add_to_cart", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 303)]), "html", null, true);
                        yield "\" class=\"add-to-cart-form\">
                                                <input type=\"hidden\" name=\"quantity\" value=\"1\">
                                                <button type=\"submit\" class=\"btn btn-secondary w-100\">
                                                    <i class=\"icon-shopping-cart\"></i> Add to Cart
                                                </button>
                                            </form>
                                        ";
                    } else {
                        // line 310
                        yield "                                            <button class=\"btn btn-secondary w-100 login-trigger\" data-product-id=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "id", [], "any", false, false, false, 310), "html", null, true);
                        yield "\">
                                                <i class=\"icon-shopping-cart\"></i> Add to Cart
                                            </button>
                                        ";
                    }
                    // line 314
                    yield "                                    ";
                }
                // line 315
                yield "                                </div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 319
            yield "                </div>
            ";
        } else {
            // line 321
            yield "                <div class=\"text-center py-5\">
                    <h3>No products found</h3>
                    <p>Try adjusting your filters or check back soon for new products.</p>
                </div>
            ";
        }
        // line 326
        yield "        </div>
    </div>
</div>

<!-- Login Modal -->
<div id=\"loginModal\" class=\"login-modal\">
    <div class=\"login-modal-content\">
        <div class=\"login-modal-header\">
            <h4>Login to Shop</h4>
            <span class=\"close-modal\">&times;</span>
        </div>
        <div class=\"login-modal-body\">
            <form id=\"loginForm\" method=\"POST\" action=\"";
        // line 338
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_login");
        yield "\">
                <div class=\"form-group mb-3\">
                    <label for=\"email\">Email or Username</label>
                    <input type=\"text\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Enter email or username\" required>
                </div>
                
                <div class=\"form-group mb-3\">
                    <label for=\"password\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Enter password\" required>
                </div>
                
                <div class=\"form-group mb-3\">
                    <button type=\"submit\" class=\"btn product-btn w-100\">Sign In</button>
                </div>
                
                <div class=\"quick-login mb-3\">
                    <p class=\"text-center mb-2\">Quick Login as Admin:</p>
                    <button type=\"button\" id=\"adminLoginBtn\" class=\"btn btn-secondary w-100\">Admin Login</button>
                </div>
            </form>
        </div>
        <div class=\"login-modal-footer\">
            <p>Don't have an account? <a href=\"";
        // line 360
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_register");
        yield "\">Register here</a></p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('loginModal');
    const loginTriggers = document.querySelectorAll('.login-trigger');
    const closeModal = document.querySelector('.close-modal');
    const adminLoginBtn = document.getElementById('adminLoginBtn');
    
    // Open modal on login trigger click
    loginTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
        });
    });
    
    // Close modal when clicking the X
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
    
    // Admin quick login
    adminLoginBtn.addEventListener('click', function() {
        document.getElementById('email').value = 'admin';
        document.getElementById('password').value = 'passworde';
        document.getElementById('loginForm').submit();
    });
});
</script>
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
        return "shop/index.html.twig";
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
        return array (  656 => 360,  631 => 338,  617 => 326,  610 => 321,  606 => 319,  597 => 315,  594 => 314,  586 => 310,  575 => 303,  572 => 302,  570 => 301,  566 => 299,  562 => 297,  558 => 295,  556 => 294,  553 => 293,  551 => 292,  547 => 291,  540 => 287,  530 => 286,  523 => 282,  517 => 279,  513 => 278,  509 => 276,  503 => 274,  495 => 272,  493 => 271,  488 => 268,  484 => 267,  481 => 266,  479 => 265,  467 => 256,  459 => 250,  450 => 247,  441 => 246,  437 => 245,  428 => 238,  419 => 235,  410 => 234,  406 => 233,  396 => 226,  390 => 223,  380 => 215,  374 => 214,  365 => 211,  360 => 210,  355 => 209,  351 => 208,  341 => 200,  335 => 197,  331 => 195,  325 => 192,  322 => 191,  316 => 189,  314 => 188,  309 => 186,  303 => 184,  301 => 183,  291 => 175,  278 => 174,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Shop - Soccer{% endblock %}

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
    .product-card {
        height: 100%;
        margin-bottom: 30px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .product-img {
        height: 250px;
        overflow: hidden;
    }
    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .product-info {
        padding: 20px;
        background-color: white;
    }
    .product-title {
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 18px;
        color: #344767;
    }
    .product-price {
        font-size: 20px;
        font-weight: bold;
        color: #fb6340;
        margin-bottom: 10px;
    }
    .product-meta {
        font-size: 14px;
        color: #67748e;
        margin-bottom: 15px;
    }
    .product-btn {
        background-color: #fb6340;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .product-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .stock-yes {
        color: #2dce89;
    }
    .stock-coming {
        color: #fb6340;
    }
    .stock-no {
        color: #f5365c;
    }
    .filter-card {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .filter-card h4 {
        margin-bottom: 20px;
        color: #344767;
        font-weight: bold;
    }
    .user-actions {
        display: inline-block;
        margin-left: 15px;
    }
    .user-actions .btn {
        margin-left: 5px;
    }
    .cart-icon {
        position: relative;
        margin-left: 15px;
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
    .add-to-cart-form {
        margin-top: 10px;
    }
    /* Login Modal Styles */
    .login-modal {
        display: none;
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }
    .login-modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 0;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        max-width: 400px;
        position: relative;
    }
    .login-modal-header {
        background-color: #fb6340;
        color: white;
        padding: 20px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .login-modal-body {
        padding: 20px;
    }
    .login-modal-footer {
        padding: 15px 20px;
        background-color: #f8f9fa;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        text-align: center;
    }
    .close-modal {
        position: absolute;
        right: 15px;
        top: 15px;
        color: white;
        font-size: 24px;
        cursor: pointer;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-6 text-center text-md-left\">
                <h1>Shop</h1>
                <p class=\"text-white\">Browse our products and find the perfect gear for your sports needs</p>
            </div>
            <div class=\"col-md-6 text-center text-md-right\">
                {% if isLoggedIn %}
                    <span class=\"text-white\">Welcome, {{ userName }}!</span>
                    <div class=\"user-actions\">
                        <a href=\"{{ path('app_shop_cart') }}\" class=\"btn btn-light\">
                            <i class=\"icon-shopping-cart\"></i> Cart
                            {% if cartCount > 0 %}
                                <span class=\"cart-badge\">{{ cartCount }}</span>
                            {% endif %}
                        </a>
                        <a href=\"{{ path('app_shop_logout') }}\" class=\"btn btn-outline-light\">Logout</a>
                    </div>
                {% else %}
                    <div class=\"user-actions\">
                        <a href=\"#\" class=\"btn btn-light login-trigger\">Login</a>
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
        <!-- Filter Sidebar -->
        <div class=\"col-lg-3\">
            <div class=\"filter-card\">
                <h4>Filter Products</h4>
                <form method=\"GET\" action=\"{{ path('app_shop') }}\">
                    <div class=\"form-group\">
                        <label for=\"search\">Search</label>
                        <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" placeholder=\"Product name...\" value=\"{{ searchTerm }}\">
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"category\">Category</label>
                        <select class=\"form-control\" id=\"category\" name=\"category\">
                            <option value=\"\">All Categories</option>
                            {% for cat in categories %}
                                <option value=\"{{ cat }}\" {% if selectedCategory == cat %}selected{% endif %}>
                                    {{ cat|capitalize }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <div class=\"form-group\">
                        <label for=\"stock\">Availability</label>
                        <select class=\"form-control\" id=\"stock\" name=\"stock\">
                            <option value=\"\">All</option>
                            {% for option in stockOptions %}
                                <option value=\"{{ option }}\" {% if selectedStock == option %}selected{% endif %}>
                                    {{ option|capitalize }}
                                </option>
                            {% endfor %}
                        </select>
                    </div>
                    
                    <div class=\"form-group\">
                        <div class=\"d-flex gap-2 w-100\">
                            <button type=\"submit\" class=\"btn product-btn\">Search</button>
                            <a href=\"{{ path('app_shop') }}\" class=\"btn btn-secondary\">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class=\"col-lg-9\">
            {% if products|length > 0 %}
                <div class=\"row\">
                    {% for product in products %}
                        <div class=\"col-md-4\">
                            <div class=\"product-card\">
                                <div class=\"product-img\">
                                    {% if product.image %}
                                        <img src=\"{{ asset('uploads/products/' ~ product.image) }}\" alt=\"{{ product.nameproduct }}\">
                                    {% else %}
                                        <img src=\"{{ asset('assets/images/default-product.png') }}\" alt=\"Default Image\">
                                    {% endif %}
                                </div>
                                <div class=\"product-info\">
                                    <h3 class=\"product-title\">{{ product.nameproduct }}</h3>
                                    <div class=\"product-price\">{{ product.priceproduct }} €</div>
                                    <div class=\"product-meta\">
                                        <div>
                                            <strong>Category:</strong> {{ product.category|capitalize }}
                                        </div>
                                        <div>
                                            <strong>Status:</strong> 
                                            <span class=\"stock-{% if product.stock == 'yes' %}yes{% elseif product.stock == 'coming' %}coming{% else %}no{% endif %}\">
                                                {{ product.stock|capitalize }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href=\"{{ path('app_shop_product', {'id': product.id}) }}\" class=\"btn product-btn\">
                                        {% if product.stock == 'yes' %}
                                            View Details
                                        {% elseif product.stock == 'coming' %}
                                            Coming Soon
                                        {% else %}
                                            Out of Stock
                                        {% endif %}
                                    </a>
                                    
                                    {% if product.stock == 'yes' %}
                                        {% if isLoggedIn %}
                                            <form method=\"POST\" action=\"{{ path('app_shop_add_to_cart', {'id': product.id}) }}\" class=\"add-to-cart-form\">
                                                <input type=\"hidden\" name=\"quantity\" value=\"1\">
                                                <button type=\"submit\" class=\"btn btn-secondary w-100\">
                                                    <i class=\"icon-shopping-cart\"></i> Add to Cart
                                                </button>
                                            </form>
                                        {% else %}
                                            <button class=\"btn btn-secondary w-100 login-trigger\" data-product-id=\"{{ product.id }}\">
                                                <i class=\"icon-shopping-cart\"></i> Add to Cart
                                            </button>
                                        {% endif %}
                                    {% endif %}
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            {% else %}
                <div class=\"text-center py-5\">
                    <h3>No products found</h3>
                    <p>Try adjusting your filters or check back soon for new products.</p>
                </div>
            {% endif %}
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id=\"loginModal\" class=\"login-modal\">
    <div class=\"login-modal-content\">
        <div class=\"login-modal-header\">
            <h4>Login to Shop</h4>
            <span class=\"close-modal\">&times;</span>
        </div>
        <div class=\"login-modal-body\">
            <form id=\"loginForm\" method=\"POST\" action=\"{{ path('app_shop_login') }}\">
                <div class=\"form-group mb-3\">
                    <label for=\"email\">Email or Username</label>
                    <input type=\"text\" class=\"form-control\" id=\"email\" name=\"email\" placeholder=\"Enter email or username\" required>
                </div>
                
                <div class=\"form-group mb-3\">
                    <label for=\"password\">Password</label>
                    <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" placeholder=\"Enter password\" required>
                </div>
                
                <div class=\"form-group mb-3\">
                    <button type=\"submit\" class=\"btn product-btn w-100\">Sign In</button>
                </div>
                
                <div class=\"quick-login mb-3\">
                    <p class=\"text-center mb-2\">Quick Login as Admin:</p>
                    <button type=\"button\" id=\"adminLoginBtn\" class=\"btn btn-secondary w-100\">Admin Login</button>
                </div>
            </form>
        </div>
        <div class=\"login-modal-footer\">
            <p>Don't have an account? <a href=\"{{ path('app_shop_register') }}\">Register here</a></p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('loginModal');
    const loginTriggers = document.querySelectorAll('.login-trigger');
    const closeModal = document.querySelector('.close-modal');
    const adminLoginBtn = document.getElementById('adminLoginBtn');
    
    // Open modal on login trigger click
    loginTriggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
        });
    });
    
    // Close modal when clicking the X
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
    
    // Admin quick login
    adminLoginBtn.addEventListener('click', function() {
        document.getElementById('email').value = 'admin';
        document.getElementById('password').value = 'passworde';
        document.getElementById('loginForm').submit();
    });
});
</script>
{% endblock %} ", "shop/index.html.twig", "C:\\Users\\Raouf\\Desktop\\symfonyTemplate-master-yes\\symfonyTemplate-master\\templates\\shop\\index.html.twig");
    }
}
