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

/* themes/tara/templates/layout/page--front.html.twig */
class __TwigTemplate_c6ea5dac4984158151c76f4bf528c2be extends Template
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
        // line 11
        yield from         $this->loadTemplate("@tara/template-parts/header.html.twig", "themes/tara/templates/layout/page--front.html.twig", 11)->unwrap()->yield($context);
        // line 12
        if (($context["slider_show"] ?? null)) {
            // line 13
            yield "  ";
            yield from             $this->loadTemplate("@tara/template-parts/slider.html.twig", "themes/tara/templates/layout/page--front.html.twig", 13)->unwrap()->yield($context);
        }
        // line 15
        yield "<div id=\"main-wrapper\" class=\"main-wrapper\">
  <div class=\"container\">
    ";
        // line 17
        if (($context["front_sidebar"] ?? null)) {
            // line 18
            yield "      <div class=\"main-container\">
    ";
        }
        // line 20
        yield "    <main id=\"front-main\" class=\"homepage-content page-content\" role=\"main\">
      <a id=\"main-content\" tabindex=\"-1\"></a>";
        // line 22
        yield "      ";
        yield from         $this->loadTemplate("@tara/template-parts/content_top.html.twig", "themes/tara/templates/layout/page--front.html.twig", 22)->unwrap()->yield($context);
        // line 23
        yield "      ";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 23)) {
            // line 24
            yield "\t\t\t\t";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            yield "
\t\t\t";
        }
        // line 26
        yield "\t\t\t";
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content_home", [], "any", false, false, true, 26)) {
            // line 27
            yield "\t\t\t\t<div class=\"content-home\">
\t\t\t\t\t";
            // line 28
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "content_home", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            yield "
\t\t\t\t</div><!--/.homepage-content -->
\t\t\t";
        }
        // line 31
        yield "      ";
        yield from         $this->loadTemplate("@tara/template-parts/content_bottom.html.twig", "themes/tara/templates/layout/page--front.html.twig", 31)->unwrap()->yield($context);
        // line 32
        yield "    </main>
    ";
        // line 33
        if (($context["front_sidebar"] ?? null)) {
            // line 34
            yield "      ";
            yield from             $this->loadTemplate("@tara/template-parts/left_sidebar.html.twig", "themes/tara/templates/layout/page--front.html.twig", 34)->unwrap()->yield($context);
            // line 35
            yield "      ";
            yield from             $this->loadTemplate("@tara/template-parts/right_sidebar.html.twig", "themes/tara/templates/layout/page--front.html.twig", 35)->unwrap()->yield($context);
            // line 36
            yield "      </div> ";
            // line 37
            yield "    ";
        }
        // line 38
        yield "  </div><!--/.container -->
</div><!-- /main-wrapper -->
";
        // line 40
        yield from         $this->loadTemplate("@tara/template-parts/footer.html.twig", "themes/tara/templates/layout/page--front.html.twig", 40)->unwrap()->yield($context);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["slider_show", "front_sidebar", "page"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/tara/templates/layout/page--front.html.twig";
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
        return array (  112 => 40,  108 => 38,  105 => 37,  103 => 36,  100 => 35,  97 => 34,  95 => 33,  92 => 32,  89 => 31,  83 => 28,  80 => 27,  77 => 26,  71 => 24,  68 => 23,  65 => 22,  62 => 20,  58 => 18,  56 => 17,  52 => 15,  48 => 13,  46 => 12,  44 => 11,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/tara/templates/layout/page--front.html.twig", "C:\\xampp\\htdocs\\dip_cc\\web\\themes\\tara\\templates\\layout\\page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 11, "if" => 12);
        static $filters = array("escape" => 24);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
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
