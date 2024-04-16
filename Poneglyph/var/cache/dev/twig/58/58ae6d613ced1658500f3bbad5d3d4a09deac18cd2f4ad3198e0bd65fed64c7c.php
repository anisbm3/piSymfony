<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base-front.html.twig */
class __TwigTemplate_1354d081f2731a1c1dcb7af76f134bad1f21c27c99b8fcefa8cf3059dfdbd66e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base-front.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base-front.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset=\"utf-8\">
  <title>Constra - Construction Html5 Template</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"description\" content=\"Construction Html5 Template\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=5.0\">
  <meta name=author content=\"Themefisher\">
  <meta name=generator content=\"Themefisher Constra HTML Template v1.0\">

  <!-- Favicon
================================================== -->
  <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel=\"stylesheet\" href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("frontOffice/plugins/bootstrap/bootstrap.min.css"), "html", null, true);
        echo "\">
  <!-- FontAwesome -->
  <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("frontOffice/plugins/fontawesome/css/all.min.css"), "html", null, true);
        echo "\">
  <!-- Animation -->
  <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("frontOffice/plugins/animate-css/animate.css"), "html", null, true);
        echo "\">
  <!-- slick Carousel -->
  <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("frontOffice/plugins/slick/slick.css"), "html", null, true);
        echo " \">
  <link rel=\"stylesheet\" href=\"plugins/slick/slick-theme.css\">
  <!-- Colorbox -->
  <link rel=\"stylesheet\" href=\"plugins/colorbox/colorbox.css\">
  <!-- Template styles-->
  <link rel=\"stylesheet\" href=\"css/style.css\">

</head>
<body>
  <div class=\"body-inner\">

    <div id=\"top-bar\" class=\"top-bar\">
        <div class=\"container\">
          <div class=\"row\">
              <div class=\"col-lg-8 col-md-8\">
                <ul class=\"top-info text-center text-md-left\">
                    <li><i class=\"fas fa-map-marker-alt\"></i> <p class=\"info-text\">Cite Al Ghazela Esprit</p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class=\"col-lg-4 col-md-4 top-social text-center text-md-right\">
                <ul class=\"list-unstyled\">
                    <li>
                      <a title=\"Facebook\" href=\"https://facebbok.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-facebook-f\"></i></span>
                      </a>
                      <a title=\"Twitter\" href=\"https://twitter.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-twitter\"></i></span>
                      </a>
                      <a title=\"Instagram\" href=\"https://instagram.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-instagram\"></i></span>
                      </a>
                      <a title=\"Linkdin\" href=\"https://github.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-github\"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id=\"header\" class=\"header-one\">
  <div class=\"bg-white\">
    <div class=\"container\">
      <div class=\"logo-area\">
          <div class=\"row align-items-center\">
            <div class=\"logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0\">
              <a class=\"d-block\" href=\"index.html\">
                  <span class=\"logo-text anime-font\">Laugh Tale</span>
                  <img loading=\"lazy\" src=\"images/logo.png\" alt=\"Laugh_Tale\">
              </a>
          </div><!-- logo end -->
          
            <div class=\"col-lg-9 header-right\">
                <ul class=\"top-info-box\">
                  <li>
                    <div class=\"info-box\">
                      <div class=\"info-box-content\">
                          <p class=\"info-box-title\">Coontactez nous</p>
                          <p class=\"info-box-subtitle\">(+216) 53796961</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class=\"info-box\">
                      <div class=\"info-box-content\">
                          <p class=\"info-box-title\">Email </p>
                          <p class=\"info-box-subtitle\">anis.benmehrez@esprit.tn</p>
                      </div>
                    </div>
                  </li>
                  
                  <li class=\"header-get-a-quote\">
                    <a class=\"btn btn-primary\" href=\"contact.html\">Sign Up</a>
                  </li>
                  <li class=\"header-get-a-quote\">
                    <a class=\"btn btn-primary\" href=\"contact.html\">Login </a>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class=\"site-navigation\">
    <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-12\">
              <nav class=\"navbar navbar-expand-lg navbar-dark p-0\">
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\".navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                
                <div id=\"navbar-collapse\" class=\"collapse navbar-collapse\">
                    <ul class=\"nav navbar-nav mr-auto\">
                      <li class=\"nav-item dropdown active\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Home <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li class=\"active\"><a href=\"index.html\">Home One</a></li>
                            <li><a href=\"index-2.html\">Home Two</a></li>
                          </ul>
                      </li>

                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Catalogue <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"about.html\">About Us</a></li>
                            <li><a href=\"team.html\">Our People</a></li>
                            <li><a href=\"testimonials.html\">Temoignages</a></li>
                            <li><a href=\"faq.html\">Faq</a></li>
                            <li><a href=\"pricing.html\">Pricing</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Cosplays <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"projects.html\">Projects All</a></li>
                            <li><a href=\"projects-single.html\">Projects Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Debates <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"services.html\">Services All</a></li>
                            <li><a href=\"service-single.html\">Services Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Livraisons <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"typography.html\">Typography</a></li>
                            <li><a href=\"404.html\">404</a></li>
                            <li class=\"dropdown-submenu\">
                                <a href=\"#!\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Parent Menu</a>
                                <ul class=\"dropdown-menu\">
                                  <li><a href=\"#!\">Child Menu 1</a></li>
                                  <li><a href=\"#!\">Child Menu 2</a></li>
                                  <li><a href=\"#!\">Child Menu 3</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Events <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"news-left-sidebar.html\">News Left Sidebar</a></li>
                            <li><a href=\"news-right-sidebar.html\">News Right Sidebar</a></li>
                            <li><a href=\"news-single.html\">News Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item\"><a class=\"nav-link\" href=\"contact.html\">Contact</a></li>
                     
                    </ul>
                    
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class=\"nav-search\">
          <span id=\"search\"><i class=\"fa fa-search\"></i></span>
        
        </div><!-- Search end -->
      
        <div class=\"search-block\" style=\"display: none;\">
          <label for=\"search-field\" class=\"w-100 mb-0\">
            <input type=\"text\" class=\"form-control\" id=\"search-field\" placeholder=\"Type what you want and enter\">
          </label>
          <span class=\"search-close\">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

<div class=\"banner-carousel banner-carousel-1 mb-0\">
  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg1.jpg)\">
    <div class=\"slider-content\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12 text-center\">
                <h2 class=\"slide-title\" data-animation-in=\"slideInLeft\">Bienvenue dans Laugh_Tale le monde des Otakus</h2>
                <h3 class=\"slide-sub-title\" data-animation-in=\"slideInRight\">Reservez les places sont limitées</h3>
                <p data-animation-in=\"slideInLeft\" data-duration-in=\"1.2\">
                    <a href=\"services.html\" class=\"slider btn btn-primary\">Nos Evenements</a>
                    <a href=\"contact.html\" class=\"slider btn btn-primary border\">Notre Contact</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg2.jpg)\">
    <div class=\"slider-content text-left\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12\">
                <h2 class=\"slide-title-box\" data-animation-in=\"slideInDown\">Service Rapide</h2>
                <h3 class=\"slide-title\" data-animation-in=\"fadeIn\">Nos nouveautés</h3>
                <h3 class=\"slide-sub-title\" data-animation-in=\"slideInLeft\">Des prix incroyables</h3>
                <p data-animation-in=\"slideInRight\">
                    <a href=\"services.html\" class=\"slider btn btn-primary border\">Catalogue</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg3.jpg)\">
    <div class=\"slider-content text-right\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12\">
                <h2 class=\"slide-title\" data-animation-in=\"slideInDown\">Partagez vos passions</h2>
                <h3 class=\"slide-sub-title\" data-animation-in=\"fadeIn\">Cosplay</h3>
                <p class=\"slider-description lead\" data-animation-in=\"slideInRight\">Et gagnez le premier prix</p>
                <div data-animation-in=\"slideInLeft\">
                    <a href=\"contact.html\" class=\"slider btn btn-primary\" aria-label=\"contact-with-us\">Accedez</a>
                    <a href=\"about.html\" class=\"slider btn btn-primary border\" aria-label=\"learn-more-about-us\">Contactez</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class=\"call-to-action-box no-padding\">
  <div class=\"container\">
    <div class=\"action-style-box\">
        <div class=\"row align-items-center\">
          <div class=\"col-md-8 text-center text-md-left\">
              <div class=\"call-to-action-text\">
                <h3 class=\"action-title\">Je veux m'inscrire</h3>
              </div>
          </div><!-- Col end -->
          <div class=\"col-md-4 text-center text-md-right mt-3 mt-md-0\">
              <div class=\"call-to-action-btn\">
                <a class=\"btn btn-dark\" href=\"#\">Log In</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

<section id=\"ts-features\" class=\"ts-features\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
          
          <div class=\"gap-20\"></div>

          <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-trophy\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Excellente Reputation</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-sliders-h\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Partenariats </h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->

          <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-thumbs-up\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Discipline</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-users\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Equipe de professionnels</h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->
        </div><!-- Col end -->

        <div class=\"col-lg-6 mt-4 mt-lg-0\">
          <h3 class=\"into-sub-title\">Nos valeurs</h3>
          <p>Bienvenue sur Laugh_Tale ! Nous sommes une plateforme dédiée à l'anime, où la communauté anime se réunit pour partager sa passion. Notre engagement envers la qualité, la diversité et l'intégrité se reflète dans tout ce que nous offrons. Rejoignez-nous pour découvrir de nouvelles séries, échanger des idées et célébrer l'anime ensemble !</p>

          <div class=\"accordion accordion-group\" id=\"our-values-accordion\">
              <div class=\"card\">
                <div class=\"card-header p-0 bg-transparent\" id=\"headingOne\">
                    <h2 class=\"mb-0\">
                      <button class=\"btn btn-block text-left\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                          Sécurité
                      </button>
                    </h2>
                </div>
              
                <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#our-values-accordion\">
                    <div class=\"card-body\">
                     Notre site est en un haut niveau de sécurité qui protège l'utilisateur et ses données de toutes types d'espionnage ou depassement de limites
                    </div>
                </div>
              </div>
              <div class=\"card\">
                <div class=\"card-header p-0 bg-transparent\" id=\"headingTwo\">
                    <h2 class=\"mb-0\">
                      <button class=\"btn btn-block text-left collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                         Service
                      </button>
                    </h2>
                </div>
                <div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#our-values-accordion\">
                    <div class=\"card-body\">
                      Notre departement de ventes accepte tous formes de reclamation et écoute tous les feedbacks attentivements avec des livraisons qui ne dépassent pas 2 jours
                    </div>
                </div>
              </div>
            
          <!--/ Accordion end -->

        </div><!-- Col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

<section id=\"facts\" class=\"facts-area dark-bg\">
  <div class=\"container\">
    <div class=\"facts-wrapper\">
        <div class=\"row\">
          <div class=\"col-md-3 col-sm-6 ts-facts\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact1.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"18\">0</span></h2>
                <h3 class=\"ts-facts-title\">Projets Total</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact2.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"6\">0</span></h2>
                <h3 class=\"ts-facts-title\">Membres du staf</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-md-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact3.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"400\">0</span></h2>
                <h3 class=\"ts-facts-title\">Les Heures de travail</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-md-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact4.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"5\">0</span></h2>
                <h3 class=\"ts-facts-title\">Pays</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<section id=\"ts-service-area\" class=\"ts-service-area pb-0\">
  <div class=\"container\">
    <div class=\"row text-center\">
        <div class=\"col-12\">
          <h2 class=\"section-title\">On est specialiste en</h2>
          <h3 class=\"section-sub-title\">Faire</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class=\"row\">
        <div class=\"col-lg-4\">
          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon1.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Developper les relations entre les fans</a></h3>
                
              </div>
          </div><!-- Service 1 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon2.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Créer des communautés</a></h3>
              
              </div>
          </div><!-- Service 2 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon3.png\"  alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Organizer des évenements</a></h3>
                
              </div>
          </div><!-- Service 3 end -->

        </div><!-- Col end -->

        <div class=\"col-lg-4 text-center\">
          <img loading=\"lazy\" class=\"img-fluid\" src=\"images/services/service-center.jpg\" alt=\"service-avater-image\">
        </div><!-- Col end -->

        <div class=\"col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0\">
          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon4.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Faire des competitions de cosplays</a></h3>
              
              </div>
          </div><!-- Service 4 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon5.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Vendre des produits amis de la nature</a></h3>
              
              </div>
          </div><!-- Service 5 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon6.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Organiser des debats</a></h3>
              
              </div>
          </div><!-- Service 6 end -->
        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div>
  <!--/ Container end -->
</section><!-- Service end -->


<section class=\"content\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
          <h3 class=\"column-title\">Temoignages</h3>

          <div id=\"testimonial-slide\" class=\"testimonial-slide\">
              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                     Service Parfait. Un très bon pottentiel. 
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial1.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Gabriel Denis</h3>
                          <span class=\"quote-subtext\">Chairman, OKT</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->

              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                     Bonne Qualité de produits qui ne s'oppose pas à la nature.
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial2.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Weldon Cash</h3>
                          <span class=\"quote-subtext\">CFO, First Choice</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 2 end -->

              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                Bon Contenu. Travaillez pour assurez la continuité.
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial3.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Minter Puchan</h3>
                          <span class=\"quote-subtext\">Director, AKT</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 3 end -->

          </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        

        </div><!-- Col end -->

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

<section class=\"subscribe no-padding\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-4\">
          <div class=\"subscribe-call-to-acton\">
              <h3>AIDE</h3>
              <h4>(+216)53796961</h4>
          </div>
        </div><!-- Col end -->

       

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section id=\"news\" class=\"news\">
  <div class=\"container\">
    <div class=\"row text-center\">
        <div class=\"col-12\">
          <h2 class=\"section-title\">Work of Excellence</h2>
          <h3 class=\"section-sub-title\">Recent Projects</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class=\"row\">
        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news1.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">La mort du mangaka de Dragon Ball</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> 3 Mars 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 1st post col end -->

        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news2.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">Evenement Cosplay</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> Mars 17, 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 2nd post col end -->

        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news3.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">Revelation de la date du film De Demon Slayer</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> Mars 13, 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 3rd post col end -->
    </div>
    <!--/ Content row end -->

    <div class=\"general-btn text-center mt-4\">
        <a class=\"btn btn-primary\" href=\"news-left-sidebar.html\">Voir les Postes</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->

  <footer id=\"footer\" class=\"footer bg-overlay\">
    <div class=\"footer-main\">
      <div class=\"container\">
        <div class=\"row justify-content-between\">
          <div class=\"col-lg-4 col-md-6 footer-widget footer-about\">
            <h3 class=\"widget-title\">Nous</h3>
            <img loading=\"lazy\" width=\"200px\" class=\"footer-logo\" src=\"images/logo.png\" alt=\"Constra\">
            <p>La famille qui réunit tous les fans de l'anime et leur crée un paradis ou ils peuvent pratiquer leurs passions </p>
              
            </div></p>
            <div class=\"footer-social\">
              <ul>
                <li><a href=\"https://www.facebook.com/anis.benmehrez.7/\" aria-label=\"Facebook\"><i
                      class=\"fab fa-facebook-f\"></i></a></li>
                <li><a href=\"https://twitter.com/themefisher\" aria-label=\"Twitter\"><i class=\"fab fa-twitter\"></i></a>
                </li>
                <li><a href=\"https://www.instagram.com/anis_ben_mehrez/\" aria-label=\"Instagram\"><i
                      class=\"fab fa-instagram\"></i></a></li>
                <li><a href=\"https://github.com/anisbm3/poneglyphe-S-Hunters1\" aria-label=\"Github\"><i class=\"fab fa-github\"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->


      </div><!-- Container end -->
    </div><!-- Footer main end -->

  
  </footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src=\"plugins/jQuery/jquery.min.js\"></script>
  <!-- Bootstrap jQuery -->
  <script src=\"plugins/bootstrap/bootstrap.min.js\" defer></script>
  <!-- Slick Carousel -->
  <script src=\"plugins/slick/slick.min.js\"></script>
  <script src=\"plugins/slick/slick-animation.min.js\"></script>
  <!-- Color box -->
  <script src=\"plugins/colorbox/jquery.colorbox.js\"></script>
  <!-- shuffle -->
  <script src=\"plugins/shuffle/shuffle.min.js\" defer></script>


  <!-- Google Map API Key-->
  <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU\" defer></script>
  <!-- Google Map Plugin-->
  <script src=\"plugins/google-map/map.js\" defer></script>

  <!-- Template custom -->
  <script src=\"js/script.js\"></script>

  </div><!-- Body inner end -->
  </body>

  </html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "base-front.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  84 => 31,  79 => 29,  74 => 27,  69 => 25,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset=\"utf-8\">
  <title>Constra - Construction Html5 Template</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <meta name=\"description\" content=\"Construction Html5 Template\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=5.0\">
  <meta name=author content=\"Themefisher\">
  <meta name=generator content=\"Themefisher Constra HTML Template v1.0\">

  <!-- Favicon
================================================== -->
  <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel=\"stylesheet\" href=\"{{asset ('frontOffice/plugins/bootstrap/bootstrap.min.css')}}\">
  <!-- FontAwesome -->
  <link rel=\"stylesheet\" href=\"{{asset ('frontOffice/plugins/fontawesome/css/all.min.css')}}\">
  <!-- Animation -->
  <link rel=\"stylesheet\" href=\"{{asset ('frontOffice/plugins/animate-css/animate.css')}}\">
  <!-- slick Carousel -->
  <link rel=\"stylesheet\" href=\"{{asset ('frontOffice/plugins/slick/slick.css')}} \">
  <link rel=\"stylesheet\" href=\"plugins/slick/slick-theme.css\">
  <!-- Colorbox -->
  <link rel=\"stylesheet\" href=\"plugins/colorbox/colorbox.css\">
  <!-- Template styles-->
  <link rel=\"stylesheet\" href=\"css/style.css\">

</head>
<body>
  <div class=\"body-inner\">

    <div id=\"top-bar\" class=\"top-bar\">
        <div class=\"container\">
          <div class=\"row\">
              <div class=\"col-lg-8 col-md-8\">
                <ul class=\"top-info text-center text-md-left\">
                    <li><i class=\"fas fa-map-marker-alt\"></i> <p class=\"info-text\">Cite Al Ghazela Esprit</p>
                    </li>
                </ul>
              </div>
              <!--/ Top info end -->
  
              <div class=\"col-lg-4 col-md-4 top-social text-center text-md-right\">
                <ul class=\"list-unstyled\">
                    <li>
                      <a title=\"Facebook\" href=\"https://facebbok.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-facebook-f\"></i></span>
                      </a>
                      <a title=\"Twitter\" href=\"https://twitter.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-twitter\"></i></span>
                      </a>
                      <a title=\"Instagram\" href=\"https://instagram.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-instagram\"></i></span>
                      </a>
                      <a title=\"Linkdin\" href=\"https://github.com/themefisher.com\">
                          <span class=\"social-icon\"><i class=\"fab fa-github\"></i></span>
                      </a>
                    </li>
                </ul>
              </div>
              <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id=\"header\" class=\"header-one\">
  <div class=\"bg-white\">
    <div class=\"container\">
      <div class=\"logo-area\">
          <div class=\"row align-items-center\">
            <div class=\"logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0\">
              <a class=\"d-block\" href=\"index.html\">
                  <span class=\"logo-text anime-font\">Laugh Tale</span>
                  <img loading=\"lazy\" src=\"images/logo.png\" alt=\"Laugh_Tale\">
              </a>
          </div><!-- logo end -->
          
            <div class=\"col-lg-9 header-right\">
                <ul class=\"top-info-box\">
                  <li>
                    <div class=\"info-box\">
                      <div class=\"info-box-content\">
                          <p class=\"info-box-title\">Coontactez nous</p>
                          <p class=\"info-box-subtitle\">(+216) 53796961</p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class=\"info-box\">
                      <div class=\"info-box-content\">
                          <p class=\"info-box-title\">Email </p>
                          <p class=\"info-box-subtitle\">anis.benmehrez@esprit.tn</p>
                      </div>
                    </div>
                  </li>
                  
                  <li class=\"header-get-a-quote\">
                    <a class=\"btn btn-primary\" href=\"contact.html\">Sign Up</a>
                  </li>
                  <li class=\"header-get-a-quote\">
                    <a class=\"btn btn-primary\" href=\"contact.html\">Login </a>
                  </li>
                </ul><!-- Ul end -->
            </div><!-- header right end -->
          </div><!-- logo area end -->
  
      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class=\"site-navigation\">
    <div class=\"container\">
        <div class=\"row\">
          <div class=\"col-lg-12\">
              <nav class=\"navbar navbar-expand-lg navbar-dark p-0\">
                <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\".navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
                
                <div id=\"navbar-collapse\" class=\"collapse navbar-collapse\">
                    <ul class=\"nav navbar-nav mr-auto\">
                      <li class=\"nav-item dropdown active\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Home <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li class=\"active\"><a href=\"index.html\">Home One</a></li>
                            <li><a href=\"index-2.html\">Home Two</a></li>
                          </ul>
                      </li>

                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Catalogue <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"about.html\">About Us</a></li>
                            <li><a href=\"team.html\">Our People</a></li>
                            <li><a href=\"testimonials.html\">Temoignages</a></li>
                            <li><a href=\"faq.html\">Faq</a></li>
                            <li><a href=\"pricing.html\">Pricing</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Cosplays <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"projects.html\">Projects All</a></li>
                            <li><a href=\"projects-single.html\">Projects Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Debates <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"services.html\">Services All</a></li>
                            <li><a href=\"service-single.html\">Services Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Livraisons <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"typography.html\">Typography</a></li>
                            <li><a href=\"404.html\">404</a></li>
                            <li class=\"dropdown-submenu\">
                                <a href=\"#!\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">Parent Menu</a>
                                <ul class=\"dropdown-menu\">
                                  <li><a href=\"#!\">Child Menu 1</a></li>
                                  <li><a href=\"#!\">Child Menu 2</a></li>
                                  <li><a href=\"#!\">Child Menu 3</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item dropdown\">
                          <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Events <i class=\"fa fa-angle-down\"></i></a>
                          <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"news-left-sidebar.html\">News Left Sidebar</a></li>
                            <li><a href=\"news-right-sidebar.html\">News Right Sidebar</a></li>
                            <li><a href=\"news-single.html\">News Single</a></li>
                          </ul>
                      </li>
              
                      <li class=\"nav-item\"><a class=\"nav-link\" href=\"contact.html\">Contact</a></li>
                     
                    </ul>
                    
                </div>
              </nav>
          </div>
          <!--/ Col end -->
        </div>
        <!--/ Row end -->

        <div class=\"nav-search\">
          <span id=\"search\"><i class=\"fa fa-search\"></i></span>
        
        </div><!-- Search end -->
      
        <div class=\"search-block\" style=\"display: none;\">
          <label for=\"search-field\" class=\"w-100 mb-0\">
            <input type=\"text\" class=\"form-control\" id=\"search-field\" placeholder=\"Type what you want and enter\">
          </label>
          <span class=\"search-close\">&times;</span>
        </div><!-- Site search end -->
    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->

<div class=\"banner-carousel banner-carousel-1 mb-0\">
  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg1.jpg)\">
    <div class=\"slider-content\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12 text-center\">
                <h2 class=\"slide-title\" data-animation-in=\"slideInLeft\">Bienvenue dans Laugh_Tale le monde des Otakus</h2>
                <h3 class=\"slide-sub-title\" data-animation-in=\"slideInRight\">Reservez les places sont limitées</h3>
                <p data-animation-in=\"slideInLeft\" data-duration-in=\"1.2\">
                    <a href=\"services.html\" class=\"slider btn btn-primary\">Nos Evenements</a>
                    <a href=\"contact.html\" class=\"slider btn btn-primary border\">Notre Contact</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg2.jpg)\">
    <div class=\"slider-content text-left\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12\">
                <h2 class=\"slide-title-box\" data-animation-in=\"slideInDown\">Service Rapide</h2>
                <h3 class=\"slide-title\" data-animation-in=\"fadeIn\">Nos nouveautés</h3>
                <h3 class=\"slide-sub-title\" data-animation-in=\"slideInLeft\">Des prix incroyables</h3>
                <p data-animation-in=\"slideInRight\">
                    <a href=\"services.html\" class=\"slider btn btn-primary border\">Catalogue</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class=\"banner-carousel-item\" style=\"background-image:url(images/slider-main/bg3.jpg)\">
    <div class=\"slider-content text-right\">
        <div class=\"container h-100\">
          <div class=\"row align-items-center h-100\">
              <div class=\"col-md-12\">
                <h2 class=\"slide-title\" data-animation-in=\"slideInDown\">Partagez vos passions</h2>
                <h3 class=\"slide-sub-title\" data-animation-in=\"fadeIn\">Cosplay</h3>
                <p class=\"slider-description lead\" data-animation-in=\"slideInRight\">Et gagnez le premier prix</p>
                <div data-animation-in=\"slideInLeft\">
                    <a href=\"contact.html\" class=\"slider btn btn-primary\" aria-label=\"contact-with-us\">Accedez</a>
                    <a href=\"about.html\" class=\"slider btn btn-primary border\" aria-label=\"learn-more-about-us\">Contactez</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class=\"call-to-action-box no-padding\">
  <div class=\"container\">
    <div class=\"action-style-box\">
        <div class=\"row align-items-center\">
          <div class=\"col-md-8 text-center text-md-left\">
              <div class=\"call-to-action-text\">
                <h3 class=\"action-title\">Je veux m'inscrire</h3>
              </div>
          </div><!-- Col end -->
          <div class=\"col-md-4 text-center text-md-right mt-3 mt-md-0\">
              <div class=\"call-to-action-btn\">
                <a class=\"btn btn-dark\" href=\"#\">Log In</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

<section id=\"ts-features\" class=\"ts-features\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
          
          <div class=\"gap-20\"></div>

          <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-trophy\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Excellente Reputation</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-sliders-h\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Partenariats </h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->

          <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-thumbs-up\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Discipline</h3>
                    </div>
                </div><!-- Service 1 end -->
              </div><!-- col end -->

              <div class=\"col-md-6\">
                <div class=\"ts-service-box\">
                    <span class=\"ts-service-icon\">
                      <i class=\"fas fa-users\"></i>
                    </span>
                    <div class=\"ts-service-box-content\">
                      <h3 class=\"service-box-title\">Equipe de professionnels</h3>
                    </div>
                </div><!-- Service 2 end -->
              </div><!-- col end -->
          </div><!-- Content row 1 end -->
        </div><!-- Col end -->

        <div class=\"col-lg-6 mt-4 mt-lg-0\">
          <h3 class=\"into-sub-title\">Nos valeurs</h3>
          <p>Bienvenue sur Laugh_Tale ! Nous sommes une plateforme dédiée à l'anime, où la communauté anime se réunit pour partager sa passion. Notre engagement envers la qualité, la diversité et l'intégrité se reflète dans tout ce que nous offrons. Rejoignez-nous pour découvrir de nouvelles séries, échanger des idées et célébrer l'anime ensemble !</p>

          <div class=\"accordion accordion-group\" id=\"our-values-accordion\">
              <div class=\"card\">
                <div class=\"card-header p-0 bg-transparent\" id=\"headingOne\">
                    <h2 class=\"mb-0\">
                      <button class=\"btn btn-block text-left\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseOne\" aria-expanded=\"true\" aria-controls=\"collapseOne\">
                          Sécurité
                      </button>
                    </h2>
                </div>
              
                <div id=\"collapseOne\" class=\"collapse show\" aria-labelledby=\"headingOne\" data-parent=\"#our-values-accordion\">
                    <div class=\"card-body\">
                     Notre site est en un haut niveau de sécurité qui protège l'utilisateur et ses données de toutes types d'espionnage ou depassement de limites
                    </div>
                </div>
              </div>
              <div class=\"card\">
                <div class=\"card-header p-0 bg-transparent\" id=\"headingTwo\">
                    <h2 class=\"mb-0\">
                      <button class=\"btn btn-block text-left collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapseTwo\" aria-expanded=\"false\" aria-controls=\"collapseTwo\">
                         Service
                      </button>
                    </h2>
                </div>
                <div id=\"collapseTwo\" class=\"collapse\" aria-labelledby=\"headingTwo\" data-parent=\"#our-values-accordion\">
                    <div class=\"card-body\">
                      Notre departement de ventes accepte tous formes de reclamation et écoute tous les feedbacks attentivements avec des livraisons qui ne dépassent pas 2 jours
                    </div>
                </div>
              </div>
            
          <!--/ Accordion end -->

        </div><!-- Col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

<section id=\"facts\" class=\"facts-area dark-bg\">
  <div class=\"container\">
    <div class=\"facts-wrapper\">
        <div class=\"row\">
          <div class=\"col-md-3 col-sm-6 ts-facts\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact1.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"18\">0</span></h2>
                <h3 class=\"ts-facts-title\">Projets Total</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact2.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"6\">0</span></h2>
                <h3 class=\"ts-facts-title\">Membres du staf</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-md-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact3.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"400\">0</span></h2>
                <h3 class=\"ts-facts-title\">Les Heures de travail</h3>
              </div>
          </div><!-- Col end -->

          <div class=\"col-md-3 col-sm-6 ts-facts mt-5 mt-md-0\">
              <div class=\"ts-facts-img\">
                <img loading=\"lazy\" src=\"images/icon-image/fact4.png\" alt=\"facts-img\">
              </div>
              <div class=\"ts-facts-content\">
                <h2 class=\"ts-facts-num\"><span class=\"counterUp\" data-count=\"5\">0</span></h2>
                <h3 class=\"ts-facts-title\">Pays</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<section id=\"ts-service-area\" class=\"ts-service-area pb-0\">
  <div class=\"container\">
    <div class=\"row text-center\">
        <div class=\"col-12\">
          <h2 class=\"section-title\">On est specialiste en</h2>
          <h3 class=\"section-sub-title\">Faire</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class=\"row\">
        <div class=\"col-lg-4\">
          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon1.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Developper les relations entre les fans</a></h3>
                
              </div>
          </div><!-- Service 1 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon2.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Créer des communautés</a></h3>
              
              </div>
          </div><!-- Service 2 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon3.png\"  alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Organizer des évenements</a></h3>
                
              </div>
          </div><!-- Service 3 end -->

        </div><!-- Col end -->

        <div class=\"col-lg-4 text-center\">
          <img loading=\"lazy\" class=\"img-fluid\" src=\"images/services/service-center.jpg\" alt=\"service-avater-image\">
        </div><!-- Col end -->

        <div class=\"col-lg-4 mt-5 mt-lg-0 mb-4 mb-lg-0\">
          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon4.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Faire des competitions de cosplays</a></h3>
              
              </div>
          </div><!-- Service 4 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon5.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Vendre des produits amis de la nature</a></h3>
              
              </div>
          </div><!-- Service 5 end -->

          <div class=\"ts-service-box d-flex\">
              <div class=\"ts-service-box-img\">
                <img loading=\"lazy\" src=\"images/icon-image/service-icon6.png\" alt=\"service-icon\">
              </div>
              <div class=\"ts-service-box-info\">
                <h3 class=\"service-box-title\"><a href=\"#\">Organiser des debats</a></h3>
              
              </div>
          </div><!-- Service 6 end -->
        </div><!-- Col end -->
    </div><!-- Content row end -->

  </div>
  <!--/ Container end -->
</section><!-- Service end -->


<section class=\"content\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
          <h3 class=\"column-title\">Temoignages</h3>

          <div id=\"testimonial-slide\" class=\"testimonial-slide\">
              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                     Service Parfait. Un très bon pottentiel. 
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial1.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Gabriel Denis</h3>
                          <span class=\"quote-subtext\">Chairman, OKT</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 1 end -->

              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                     Bonne Qualité de produits qui ne s'oppose pas à la nature.
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial2.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Weldon Cash</h3>
                          <span class=\"quote-subtext\">CFO, First Choice</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 2 end -->

              <div class=\"item\">
                <div class=\"quote-item\">
                    <span class=\"quote-text\">
                Bon Contenu. Travaillez pour assurez la continuité.
                    </span>

                    <div class=\"quote-item-footer\">
                      <img loading=\"lazy\" class=\"testimonial-thumb\" src=\"images/clients/testimonial3.png\" alt=\"testimonial\">
                      <div class=\"quote-item-info\">
                          <h3 class=\"quote-author\">Minter Puchan</h3>
                          <span class=\"quote-subtext\">Director, AKT</span>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              <!--/ Item 3 end -->

          </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        

        </div><!-- Col end -->

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

<section class=\"subscribe no-padding\">
  <div class=\"container\">
    <div class=\"row\">
        <div class=\"col-lg-4\">
          <div class=\"subscribe-call-to-acton\">
              <h3>AIDE</h3>
              <h4>(+216)53796961</h4>
          </div>
        </div><!-- Col end -->

       

    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->

<section id=\"news\" class=\"news\">
  <div class=\"container\">
    <div class=\"row text-center\">
        <div class=\"col-12\">
          <h2 class=\"section-title\">Work of Excellence</h2>
          <h3 class=\"section-sub-title\">Recent Projects</h3>
        </div>
    </div>
    <!--/ Title row end -->

    <div class=\"row\">
        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news1.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">La mort du mangaka de Dragon Ball</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> 3 Mars 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 1st post col end -->

        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news2.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">Evenement Cosplay</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> Mars 17, 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 2nd post col end -->

        <div class=\"col-lg-4 col-md-6 mb-4\">
          <div class=\"latest-post\">
              <div class=\"latest-post-media\">
                <a href=\"news-single.html\" class=\"latest-post-img\">
                    <img loading=\"lazy\" class=\"img-fluid\" src=\"images/news/news3.jpg\" alt=\"img\">
                </a>
              </div>
              <div class=\"post-body\">
                <h4 class=\"post-title\">
                    <a href=\"news-single.html\" class=\"d-inline-block\">Revelation de la date du film De Demon Slayer</a>
                </h4>
                <div class=\"latest-post-meta\">
                    <span class=\"post-item-date\">
                      <i class=\"fa fa-clock-o\"></i> Mars 13, 2024
                    </span>
                </div>
              </div>
          </div><!-- Latest post end -->
        </div><!-- 3rd post col end -->
    </div>
    <!--/ Content row end -->

    <div class=\"general-btn text-center mt-4\">
        <a class=\"btn btn-primary\" href=\"news-left-sidebar.html\">Voir les Postes</a>
    </div>

  </div>
  <!--/ Container end -->
</section>
<!--/ News end -->

  <footer id=\"footer\" class=\"footer bg-overlay\">
    <div class=\"footer-main\">
      <div class=\"container\">
        <div class=\"row justify-content-between\">
          <div class=\"col-lg-4 col-md-6 footer-widget footer-about\">
            <h3 class=\"widget-title\">Nous</h3>
            <img loading=\"lazy\" width=\"200px\" class=\"footer-logo\" src=\"images/logo.png\" alt=\"Constra\">
            <p>La famille qui réunit tous les fans de l'anime et leur crée un paradis ou ils peuvent pratiquer leurs passions </p>
              
            </div></p>
            <div class=\"footer-social\">
              <ul>
                <li><a href=\"https://www.facebook.com/anis.benmehrez.7/\" aria-label=\"Facebook\"><i
                      class=\"fab fa-facebook-f\"></i></a></li>
                <li><a href=\"https://twitter.com/themefisher\" aria-label=\"Twitter\"><i class=\"fab fa-twitter\"></i></a>
                </li>
                <li><a href=\"https://www.instagram.com/anis_ben_mehrez/\" aria-label=\"Instagram\"><i
                      class=\"fab fa-instagram\"></i></a></li>
                <li><a href=\"https://github.com/anisbm3/poneglyphe-S-Hunters1\" aria-label=\"Github\"><i class=\"fab fa-github\"></i></a></li>
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->


      </div><!-- Container end -->
    </div><!-- Footer main end -->

  
  </footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src=\"plugins/jQuery/jquery.min.js\"></script>
  <!-- Bootstrap jQuery -->
  <script src=\"plugins/bootstrap/bootstrap.min.js\" defer></script>
  <!-- Slick Carousel -->
  <script src=\"plugins/slick/slick.min.js\"></script>
  <script src=\"plugins/slick/slick-animation.min.js\"></script>
  <!-- Color box -->
  <script src=\"plugins/colorbox/jquery.colorbox.js\"></script>
  <!-- shuffle -->
  <script src=\"plugins/shuffle/shuffle.min.js\" defer></script>


  <!-- Google Map API Key-->
  <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU\" defer></script>
  <!-- Google Map Plugin-->
  <script src=\"plugins/google-map/map.js\" defer></script>

  <!-- Template custom -->
  <script src=\"js/script.js\"></script>

  </div><!-- Body inner end -->
  </body>

  </html>", "base-front.html.twig", "C:\\Users\\sabri\\OneDrive\\Bureau\\webintegration\\Poneglyph\\templates\\base-front.html.twig");
    }
}
