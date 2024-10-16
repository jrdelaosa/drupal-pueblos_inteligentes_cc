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

/* themes/tara/templates/views/views-view.html.twig */
class __TwigTemplate_7b7fd53d31e038fcce6fc676a8960e00 extends Template
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
        // line 34
        $context["classes"] = ["view", ("view-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 36
($context["id"] ?? null), 36, $this->source))), ("view-display-id-" . $this->sandbox->ensureToStringAllowed(        // line 37
($context["display_id"] ?? null), 37, $this->source)), ((        // line 38
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 38, $this->source))) : (""))];
        // line 41
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 41), 41, $this->source), "html", null, true);
        yield ">
  ";
        // line 42
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 42, $this->source), "html", null, true);
        yield "
  ";
        // line 43
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 43, $this->source), "html", null, true);
        yield "
  ";
        // line 44
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 44, $this->source), "html", null, true);
        yield "

  ";
        // line 46
        if (($context["header"] ?? null)) {
            // line 47
            yield "    <div class=\"view-header\">
      ";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 48, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 51
        yield "
  ";
        // line 52
        if (($context["exposed"] ?? null)) {
            // line 53
            yield "    <div class=\"view-filters\">
      ";
            // line 54
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 54, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 57
        yield "  ";
        if (($context["attachment_before"] ?? null)) {
            // line 58
            yield "    <div class=\"view-attachment view-attachment-before\">
      ";
            // line 59
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 59, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 62
        yield "
  ";
        // line 63
        if (($context["rows"] ?? null)) {
            // line 64
            yield "    <div class=\"view-content\">
      ";
            // line 65
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 65, $this->source), "html", null, true);
            yield "
    </div>
  ";
        } elseif (        // line 67
($context["empty"] ?? null)) {
            // line 68
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 68, $this->source), "html", null, true);
            yield "
  ";
        }
        // line 70
        yield "
  ";
        // line 71
        if (($context["pager"] ?? null)) {
            // line 72
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 72, $this->source), "html", null, true);
            yield "
  ";
        }
        // line 74
        yield "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 75
            yield "    <div class=\"view-attachment view-attachment-after\">
      ";
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 76, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 79
        yield "  ";
        if (($context["more"] ?? null)) {
            // line 80
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 80, $this->source), "html", null, true);
            yield "
  ";
        }
        // line 82
        yield "
  ";
        // line 83
        if (($context["footer"] ?? null)) {
            // line 84
            yield "    <div class=\"view-footer\">
      ";
            // line 85
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 85, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 88
        yield "
  ";
        // line 89
        if (($context["feed_icons"] ?? null)) {
            // line 90
            yield "    <div class=\"feed-icons\">
      ";
            // line 91
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 91, $this->source), "html", null, true);
            yield "
    </div>
  ";
        }
        // line 94
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["id", "display_id", "dom_id", "attributes", "title_prefix", "title", "title_suffix", "header", "exposed", "attachment_before", "rows", "empty", "pager", "attachment_after", "more", "footer", "feed_icons"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/tara/templates/views/views-view.html.twig";
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
        return array (  184 => 94,  178 => 91,  175 => 90,  173 => 89,  170 => 88,  164 => 85,  161 => 84,  159 => 83,  156 => 82,  150 => 80,  147 => 79,  141 => 76,  138 => 75,  135 => 74,  129 => 72,  127 => 71,  124 => 70,  119 => 68,  117 => 67,  112 => 65,  109 => 64,  107 => 63,  104 => 62,  98 => 59,  95 => 58,  92 => 57,  86 => 54,  83 => 53,  81 => 52,  78 => 51,  72 => 48,  69 => 47,  67 => 46,  62 => 44,  58 => 43,  54 => 42,  49 => 41,  47 => 38,  46 => 37,  45 => 36,  44 => 34,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/tara/templates/views/views-view.html.twig", "C:\\xampp\\htdocs\\dip_cc\\web\\themes\\tara\\templates\\views\\views-view.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 34, "if" => 46);
        static $filters = array("clean_class" => 36, "escape" => 41);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
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
