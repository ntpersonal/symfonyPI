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

/* dashboard/index.html.twig */
class __TwigTemplate_3ad626750a17a055dbfece474a3299ff extends Template
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
            'content' => [$this, 'block_content'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "dashboard/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "dashboard/index.html.twig", 1);
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

        yield "Dashboard - Soft UI Dashboard 3";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 6
        yield "<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-lg-6 col-12\">
      <div class=\"row\">
        <div class=\"col-lg-6 col-md-6 col-12\">
          <div class=\"card\">
            <span class=\"mask bg-primary opacity-10 border-radius-lg\"></span>
            <div class=\"card-body p-3 position-relative\">
              <div class=\"row\">
                <div class=\"col-8 text-start\">
                  <div class=\"icon icon-shape bg-white shadow text-center border-radius-2xl\">
                    <i class=\"ni ni-circle-08 text-dark text-gradient text-lg opacity-10\" aria-hidden=\"true\"></i>
                  </div>
                  <h5 class=\"text-white font-weight-bolder mb-0 mt-3\">
                    1600
                  </h5>
                  <span class=\"text-white text-sm\">Users Active</span>
                </div>
                <div class=\"col-4\">
                  <div class=\"dropdown text-end mb-6\">
                    <a href=\"javascript:;\" class=\"cursor-pointer\" id=\"dropdownUsers1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                      <i class=\"fa fa-ellipsis-h text-white\"></i>
                    </a>
                    <ul class=\"dropdown-menu px-2 py-3\" aria-labelledby=\"dropdownUsers1\">
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Action</a></li>
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Another action</a></li>
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Something else here</a></li>
                    </ul>
                  </div>
                  <p class=\"text-white text-sm text-end font-weight-bolder mt-auto mb-0\">+55%</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add other cards here -->
      </div>
    </div>
    <!-- Add other sections here -->
  </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 49
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 50
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script>
  var ctx = document.getElementById(\"chart-bars\").getContext(\"2d\");

  new Chart(ctx, {
    type: \"bar\",
    data: {
      labels: [\"Apr\", \"May\", \"Jun\", \"Jul\", \"Aug\", \"Sep\", \"Oct\", \"Nov\", \"Dec\"],
      datasets: [{
        label: \"Sales\",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: \"#fff\",
        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: \"Inter\",
              style: 'normal',
              lineHeight: 2
            },
            color: \"#fff\"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false
          },
          ticks: {
            display: false
          },
        },
      },
    },
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
        return "dashboard/index.html.twig";
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
        return array (  166 => 50,  153 => 49,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Dashboard - Soft UI Dashboard 3{% endblock %}

{% block content %}
<div class=\"container-fluid py-4\">
  <div class=\"row\">
    <div class=\"col-lg-6 col-12\">
      <div class=\"row\">
        <div class=\"col-lg-6 col-md-6 col-12\">
          <div class=\"card\">
            <span class=\"mask bg-primary opacity-10 border-radius-lg\"></span>
            <div class=\"card-body p-3 position-relative\">
              <div class=\"row\">
                <div class=\"col-8 text-start\">
                  <div class=\"icon icon-shape bg-white shadow text-center border-radius-2xl\">
                    <i class=\"ni ni-circle-08 text-dark text-gradient text-lg opacity-10\" aria-hidden=\"true\"></i>
                  </div>
                  <h5 class=\"text-white font-weight-bolder mb-0 mt-3\">
                    1600
                  </h5>
                  <span class=\"text-white text-sm\">Users Active</span>
                </div>
                <div class=\"col-4\">
                  <div class=\"dropdown text-end mb-6\">
                    <a href=\"javascript:;\" class=\"cursor-pointer\" id=\"dropdownUsers1\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                      <i class=\"fa fa-ellipsis-h text-white\"></i>
                    </a>
                    <ul class=\"dropdown-menu px-2 py-3\" aria-labelledby=\"dropdownUsers1\">
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Action</a></li>
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Another action</a></li>
                      <li><a class=\"dropdown-item border-radius-md\" href=\"javascript:;\">Something else here</a></li>
                    </ul>
                  </div>
                  <p class=\"text-white text-sm text-end font-weight-bolder mt-auto mb-0\">+55%</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add other cards here -->
      </div>
    </div>
    <!-- Add other sections here -->
  </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
<script>
  var ctx = document.getElementById(\"chart-bars\").getContext(\"2d\");

  new Chart(ctx, {
    type: \"bar\",
    data: {
      labels: [\"Apr\", \"May\", \"Jun\", \"Jul\", \"Aug\", \"Sep\", \"Oct\", \"Nov\", \"Dec\"],
      datasets: [{
        label: \"Sales\",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: \"#fff\",
        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: \"Inter\",
              style: 'normal',
              lineHeight: 2
            },
            color: \"#fff\"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false
          },
          ticks: {
            display: false
          },
        },
      },
    },
  });
</script>
{% endblock %} ", "dashboard/index.html.twig", "C:\\Users\\Raouf\\Documents\\arij\\symfonyTemplate-master\\templates\\dashboard\\index.html.twig");
    }
}
