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

/* themes/tara/templates/layout/page.html.twig */
class __TwigTemplate_278161cabbe01def35d93fd85c612fc7 extends Template
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
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 52
        yield from         $this->loadTemplate("@tara/template-parts/header.html.twig", "themes/tara/templates/layout/page.html.twig", 52)->unwrap()->yield($context);
        // line 53
        yield from         $this->loadTemplate("@tara/template-parts/breadcrumb_region.html.twig", "themes/tara/templates/layout/page.html.twig", 53)->unwrap()->yield($context);
        // line 54
        yield from         $this->loadTemplate("@tara/template-parts/highlighted.html.twig", "themes/tara/templates/layout/page.html.twig", 54)->unwrap()->yield($context);
        // line 55
        yield "<div id=\"main-wrapper\" class=\"main-wrapper\">
  <div class=\"container\">
  <div class=\"main-container\">
    <main id=\"main\" class=\"page-content\">
      <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 60
        yield "      ";
        yield from         $this->loadTemplate("@tara/template-parts/content_top.html.twig", "themes/tara/templates/layout/page.html.twig", 60)->unwrap()->yield($context);
        // line 61
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
        yield "
      ";
        // line 62
        yield from         $this->loadTemplate("@tara/template-parts/content_bottom.html.twig", "themes/tara/templates/layout/page.html.twig", 62)->unwrap()->yield($context);
        // line 63
        yield "    </main>
    ";
        // line 64
        yield from         $this->loadTemplate("@tara/template-parts/left_sidebar.html.twig", "themes/tara/templates/layout/page.html.twig", 64)->unwrap()->yield($context);
        // line 65
        yield "    ";
        yield from         $this->loadTemplate("@tara/template-parts/right_sidebar.html.twig", "themes/tara/templates/layout/page.html.twig", 65)->unwrap()->yield($context);
        // line 66
        yield "  </div> ";
        // line 67
        yield "  </div> ";
        // line 68
        yield "</div>";
        // line 69
        yield from         $this->loadTemplate("@tara/template-parts/footer.html.twig", "themes/tara/templates/layout/page.html.twig", 69)->unwrap()->yield($context);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/tara/templates/layout/page.html.twig";
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
        return array (  80 => 69,  78 => 68,  76 => 67,  74 => 66,  71 => 65,  69 => 64,  66 => 63,  64 => 62,  59 => 61,  56 => 60,  50 => 55,  48 => 54,  46 => 53,  44 => 52,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/tara/templates/layout/page.html.twig", "C:\\xampp\\htdocs\\dip_cc\\web\\themes\\tara\\templates\\layout\\page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 52);
        static $filters = array("escape" => 61);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
