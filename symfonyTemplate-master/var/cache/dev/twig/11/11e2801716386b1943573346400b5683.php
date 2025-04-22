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

/* shop/cart.html.twig */
class __TwigTemplate_9aada1645134b35c8472677870be5b42 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/cart.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "shop/cart.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "shop/cart.html.twig", 1);
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

        yield "Shopping Cart - Shop";
        
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
    .cart-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }
    .cart-item {
        padding: 20px;
        border-bottom: 1px solid #f5f5f5;
    }
    .cart-item:last-child {
        border-bottom: none;
    }
    .cart-item-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }
    .cart-item-details h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #344767;
    }
    .cart-item-price {
        font-size: 16px;
        color: #fb6340;
        font-weight: bold;
    }
    .cart-quantity {
        width: 60px;
        text-align: center;
    }
    .cart-summary {
        padding: 20px;
        background-color: #f8f9fa;
    }
    .cart-summary h3 {
        color: #344767;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .cart-total {
        font-size: 24px;
        color: #fb6340;
        font-weight: bold;
        margin-top: 20px;
    }
    .checkout-btn {
        background-color: #fb6340;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: bold;
    }
    .checkout-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .continue-shopping {
        background-color: #67748e;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .continue-shopping:hover {
        background-color: #5c677d;
        color: white;
    }
    .remove-btn {
        background-color: #f5365c;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 14px;
    }
    .remove-btn:hover {
        background-color: #d63553;
        color: white;
    }
    .empty-cart {
        padding: 40px 20px;
        text-align: center;
    }
    .empty-cart h3 {
        color: #344767;
        margin-bottom: 20px;
    }
    .empty-cart p {
        color: #67748e;
        margin-bottom: 30px;
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
    .cart-badge {
        position: relative;
        top: -8px;
        right: 5px;
        background-color: #fb6340;
        color: white;
        border-radius: 50%;
        padding: 4px 8px;
        font-size: 12px;
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 139
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

        // line 140
        yield "<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12 text-center\">
                <h1>Your Shopping Cart</h1>
                <p class=\"text-white\">Review your items before checkout</p>
            </div>
        </div>
    </div>
</div>

<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-12\">
            ";
        // line 154
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 154, $this->source); })()), "flashes", [], "any", false, false, false, 154));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 155
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 156
                yield "                    <div class=\"alert alert-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true);
                yield "\">
                        ";
                // line 157
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 160
            yield "            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "        </div>
    </div>
    
    ";
        // line 164
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["cartItems"]) || array_key_exists("cartItems", $context) ? $context["cartItems"] : (function () { throw new RuntimeError('Variable "cartItems" does not exist.', 164, $this->source); })())) > 0)) {
            // line 165
            yield "        <div class=\"row\">
            <div class=\"col-lg-8\">
                <div class=\"cart-card\">
                    ";
            // line 168
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["cartItems"]) || array_key_exists("cartItems", $context) ? $context["cartItems"] : (function () { throw new RuntimeError('Variable "cartItems" does not exist.', 168, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 169
                yield "                        <div class=\"cart-item\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-2\">
                                    ";
                // line 172
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 172), "image", [], "any", false, false, false, 172)) {
                    // line 173
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/products/" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 173), "image", [], "any", false, false, false, 173))), "html", null, true);
                    yield "\" class=\"cart-item-image\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 173), "nameproduct", [], "any", false, false, false, 173), "html", null, true);
                    yield "\">
                                    ";
                } else {
                    // line 175
                    yield "                                        <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assets/images/default-product.png"), "html", null, true);
                    yield "\" class=\"cart-item-image\" alt=\"Default Image\">
                                    ";
                }
                // line 177
                yield "                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"cart-item-details\">
                                        <h4>";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 180), "nameproduct", [], "any", false, false, false, 180), "html", null, true);
                yield "</h4>
                                        <div class=\"cart-item-price\">";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 181), "priceproduct", [], "any", false, false, false, 181), "html", null, true);
                yield " €</div>
                                        <div>Category: ";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["item"], "product", [], "any", false, false, false, 182), "category", [], "any", false, false, false, 182)), "html", null, true);
                yield "</div>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <div class=\"quantity\">
                                        <span>Qty: ";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "quantity", [], "any", false, false, false, 187), "html", null, true);
                yield "</span>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <div class=\"item-total\">
                                        <strong>";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "total", [], "any", false, false, false, 192), "html", null, true);
                yield " €</strong>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <a href=\"";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop_cart_remove", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, false, 196)]), "html", null, true);
                yield "\" class=\"btn remove-btn\">
                                        <i class=\"icon-trash\"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            yield "                </div>
            </div>
            
            <div class=\"col-lg-4\">
                <div class=\"cart-card\">
                    <div class=\"cart-summary\">
                        <h3>Order Summary</h3>
                        
                        <div class=\"d-flex justify-content-between mb-2\">
                            <span>Subtotal</span>
                            <span>";
            // line 213
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 213, $this->source); })()), "html", null, true);
            yield " €</span>
                        </div>
                        
                        <div class=\"d-flex justify-content-between mb-2\">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        
                        <hr>
                        
                        <div class=\"d-flex justify-content-between cart-total\">
                            <span>Total</span>
                            <span>";
            // line 225
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 225, $this->source); })()), "html", null, true);
            yield " €</span>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button class=\"btn checkout-btn w-100\">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
        } else {
            // line 236
            yield "        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"cart-card\">
                    <div class=\"empty-cart\">
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added any products to your cart yet.</p>
                        <a href=\"";
            // line 242
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
            yield "\" class=\"btn continue-shopping\">
                            <i class=\"icon-arrow-left\"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    ";
        }
        // line 250
        yield "    
    ";
        // line 251
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["cartItems"]) || array_key_exists("cartItems", $context) ? $context["cartItems"] : (function () { throw new RuntimeError('Variable "cartItems" does not exist.', 251, $this->source); })())) > 0)) {
            // line 252
            yield "        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"text-center mt-3 mb-5\">
                    <a href=\"";
            // line 255
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_shop");
            yield "\" class=\"btn continue-shopping\">
                        <i class=\"icon-arrow-left\"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    ";
        }
        // line 262
        yield "</div>
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
        return "shop/cart.html.twig";
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
        return array (  467 => 262,  457 => 255,  452 => 252,  450 => 251,  447 => 250,  436 => 242,  428 => 236,  414 => 225,  399 => 213,  387 => 203,  374 => 196,  367 => 192,  359 => 187,  351 => 182,  347 => 181,  343 => 180,  338 => 177,  332 => 175,  324 => 173,  322 => 172,  317 => 169,  313 => 168,  308 => 165,  306 => 164,  301 => 161,  295 => 160,  286 => 157,  281 => 156,  276 => 155,  272 => 154,  256 => 140,  243 => 139,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Shopping Cart - Shop{% endblock %}

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
    .cart-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 40px;
    }
    .cart-item {
        padding: 20px;
        border-bottom: 1px solid #f5f5f5;
    }
    .cart-item:last-child {
        border-bottom: none;
    }
    .cart-item-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
    }
    .cart-item-details h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #344767;
    }
    .cart-item-price {
        font-size: 16px;
        color: #fb6340;
        font-weight: bold;
    }
    .cart-quantity {
        width: 60px;
        text-align: center;
    }
    .cart-summary {
        padding: 20px;
        background-color: #f8f9fa;
    }
    .cart-summary h3 {
        color: #344767;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .cart-total {
        font-size: 24px;
        color: #fb6340;
        font-weight: bold;
        margin-top: 20px;
    }
    .checkout-btn {
        background-color: #fb6340;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-weight: bold;
    }
    .checkout-btn:hover {
        background-color: #fa3a2e;
        color: white;
    }
    .continue-shopping {
        background-color: #67748e;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .continue-shopping:hover {
        background-color: #5c677d;
        color: white;
    }
    .remove-btn {
        background-color: #f5365c;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
        font-size: 14px;
    }
    .remove-btn:hover {
        background-color: #d63553;
        color: white;
    }
    .empty-cart {
        padding: 40px 20px;
        text-align: center;
    }
    .empty-cart h3 {
        color: #344767;
        margin-bottom: 20px;
    }
    .empty-cart p {
        color: #67748e;
        margin-bottom: 30px;
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
    .cart-badge {
        position: relative;
        top: -8px;
        right: 5px;
        background-color: #fb6340;
        color: white;
        border-radius: 50%;
        padding: 4px 8px;
        font-size: 12px;
    }
</style>
{% endblock %}

{% block body %}
<div class=\"shop-header\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12 text-center\">
                <h1>Your Shopping Cart</h1>
                <p class=\"text-white\">Review your items before checkout</p>
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
    
    {% if cartItems|length > 0 %}
        <div class=\"row\">
            <div class=\"col-lg-8\">
                <div class=\"cart-card\">
                    {% for item in cartItems %}
                        <div class=\"cart-item\">
                            <div class=\"row align-items-center\">
                                <div class=\"col-md-2\">
                                    {% if item.product.image %}
                                        <img src=\"{{ asset('uploads/products/' ~ item.product.image) }}\" class=\"cart-item-image\" alt=\"{{ item.product.nameproduct }}\">
                                    {% else %}
                                        <img src=\"{{ asset('assets/images/default-product.png') }}\" class=\"cart-item-image\" alt=\"Default Image\">
                                    {% endif %}
                                </div>
                                <div class=\"col-md-4\">
                                    <div class=\"cart-item-details\">
                                        <h4>{{ item.product.nameproduct }}</h4>
                                        <div class=\"cart-item-price\">{{ item.product.priceproduct }} €</div>
                                        <div>Category: {{ item.product.category|capitalize }}</div>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <div class=\"quantity\">
                                        <span>Qty: {{ item.quantity }}</span>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <div class=\"item-total\">
                                        <strong>{{ item.total }} €</strong>
                                    </div>
                                </div>
                                <div class=\"col-md-2 text-center\">
                                    <a href=\"{{ path('app_shop_cart_remove', {'id': item.id}) }}\" class=\"btn remove-btn\">
                                        <i class=\"icon-trash\"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                    {% endfor %}
                </div>
            </div>
            
            <div class=\"col-lg-4\">
                <div class=\"cart-card\">
                    <div class=\"cart-summary\">
                        <h3>Order Summary</h3>
                        
                        <div class=\"d-flex justify-content-between mb-2\">
                            <span>Subtotal</span>
                            <span>{{ total }} €</span>
                        </div>
                        
                        <div class=\"d-flex justify-content-between mb-2\">
                            <span>Shipping</span>
                            <span>Free</span>
                        </div>
                        
                        <hr>
                        
                        <div class=\"d-flex justify-content-between cart-total\">
                            <span>Total</span>
                            <span>{{ total }} €</span>
                        </div>
                        
                        <div class=\"mt-4\">
                            <button class=\"btn checkout-btn w-100\">Proceed to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {% else %}
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"cart-card\">
                    <div class=\"empty-cart\">
                        <h3>Your cart is empty</h3>
                        <p>Looks like you haven't added any products to your cart yet.</p>
                        <a href=\"{{ path('app_shop') }}\" class=\"btn continue-shopping\">
                            <i class=\"icon-arrow-left\"></i> Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    {% endif %}
    
    {% if cartItems|length > 0 %}
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"text-center mt-3 mb-5\">
                    <a href=\"{{ path('app_shop') }}\" class=\"btn continue-shopping\">
                        <i class=\"icon-arrow-left\"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    {% endif %}
</div>
{% endblock %} ", "shop/cart.html.twig", "C:\\Users\\Raouf\\Desktop\\symfonyTemplate-master-yes\\symfonyTemplate-master\\templates\\shop\\cart.html.twig");
    }
}
