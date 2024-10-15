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

/* @tara/template-parts/header.html.twig */
class __TwigTemplate_e1fb752320fe108b6d55e144ebfc4698 extends Template
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
        // line 1
        yield "<!-- Start: Header -->
<header id=\"header\">
  ";
        // line 3
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "header_top", [], "any", false, false, true, 3) || ($context["all_icons_show"] ?? null))) {
            // line 4
            yield "    ";
            yield from             $this->loadTemplate("@tara/template-parts/header_top.html.twig", "@tara/template-parts/header.html.twig", 4)->unwrap()->yield($context);
            // line 5
            yield "  ";
        }
        // line 6
        yield "  <div class=\"header\">
    <div class=\"container\">
      <div class=\"header-container\">
        ";
        // line 9
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 9)) {
            // line 10
            yield "          <div class=\"site-branding-region\">
            ";
            // line 11
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "site_branding", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            yield "
          </div> <!--/.site-branding -->
        ";
        }
        // line 13
        yield " <!--/.end if for site_branding -->
        ";
        // line 14
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 14) || CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 14))) {
            // line 15
            yield "          <div class=\"header-right\">
            <!-- Start: primary menu region -->
            ";
            // line 17
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 17)) {
                // line 18
                yield "            <div class=\"mobile-menu\">
              <span></span>
              <span></span>
              <span></span>
            </div><!-- /mobile-menu -->
            <div class=\"primary-menu-wrapper\">
              <div class=\"menu-wrap\">
                <div class=\"close-mobile-menu\"><i class=\"icon-close\" aria-hidden=\"true\"></i></div>
                ";
                // line 26
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
                yield "
              </div>
            </div><!-- /primary-menu-wrapper -->
            ";
            }
            // line 29
            yield "<!-- end if for page.primary_menu -->
            ";
            // line 30
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 30)) {
                // line 31
                yield "              <div class=\"full-page-search\">
                <div class=\"search-icon\">
                  <i class=\"icon-search\" aria-hidden=\"true\"></i>
                </div> <!--/.search icon -->
                <div class=\"search-box\">
                  <div class=\"search-box-close\"></div>
                  <div class=\"search-box-content\">
                    ";
                // line 38
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(CoreExtension::getAttribute($this->env, $this->source, ($context["page"] ?? null), "search_box", [], "any", false, false, true, 38), 38, $this->source), "html", null, true);
                yield "
                  </div>
                  <div class=\"search-box-close\"></div>
                </div><!--/.search-box -->
              </div> <!--/.full-page-search -->
            ";
            }
            // line 43
            yield " <!-- end if for page.search_box -->
          </div> <!--/.header-right -->
        ";
        }
        // line 45
        yield "<!-- end if for page.search_box or  page.primary_menu -->
      </div> <!--/.header-container -->
    </div> <!--/.container -->
  </div><!-- /.header -->
</header>
<!-- End: Header -->
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["page", "all_icons_show"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@tara/template-parts/header.html.twig";
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
        return array (  128 => 45,  123 => 43,  114 => 38,  105 => 31,  103 => 30,  100 => 29,  93 => 26,  83 => 18,  81 => 17,  77 => 15,  75 => 14,  72 => 13,  66 => 11,  63 => 10,  61 => 9,  56 => 6,  53 => 5,  50 => 4,  48 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@tara/template-parts/header.html.twig", "C:\\xampp\\htdocs\\dip_cc\\web\\themes\\tara\\templates\\template-parts\\header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3, "include" => 4);
        static $filters = array("escape" => 11);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
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
