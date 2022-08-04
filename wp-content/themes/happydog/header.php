<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
<script src="/wp-content/themes/happydog/assets/js/cookiesconsent.min-min.js"></script>
    <script>
        window.CookieConsent.init({
            modalMainTextMoreLink: null,
            barTimeout: 1000,
            theme: {
                barColor: '#003863',
                barTextColor: '#FFF',
                barMainButtonColor: '#FFF',
                barMainButtonTextColor: '#003863',
                modalMainButtonColor: '#003863',
                modalMainButtonTextColor: '#FFF',
            },
            language: {
                current: 'pl',
                locale: {
                    pl: {
                        barMainText: 'Administratorem Twoich danych osobowych jest P.W. HOBBY i będą one przetwarzane przede wszystkim w celu realizacji Twojego zapytania. Więcej informacji o swoich prawach oraz o celach przetwarzania danych znajdziesz w Polityce prywatności i plików cookies. ',
                        barLinkSetting: 'Zaakceptuj wybrane',
                        barBtnAcceptAll: 'Zaakceptuj wszystkie',
                        modalMainTitle: 'Ustawienia plików cookies',
                        modalMainText: '',
                        modalBtnSave: 'Zapisz ustawienia',
                        modalBtnAcceptAll: 'Zaakceptuj wszystkie ciasteczka i zamknij',
                        modalAffectedSolutions: 'Używane rozwiązania:',
                        learnMore: 'Dowiedz się więcej',
                        on: 'Wł',
                        off: 'Wył',
                    }
                }
            },
            categories: {
                necessary: {
                    needed: true,
                    wanted: true,
                    checked: true,
                    language: {
                        locale: {
                            pl: {
                                name: 'Cookies niezbędne',
                                description: 'Służą do prawidłowego funkcjonowania strony internetowej. Pliki te pomagają nam zapamiętać wybrane przez użytkownika ustawienia strony, czy też pomagają przy innych funkcjach podczas przeglądania i korzystania z witryny.',
                            }
                        }
                    }
                },
                analytics: {
                    needed: false,
                    wanted: false,
                    checked: false,
                    language: {
                        locale: {
                            pl: {
                                name: 'Cookies funkcjonalne',
                                description: 'Służą do pomiaru aktywności podczas przeglądania strony, aby dowiedzieć się w jaki sposób jest ona wykorzystywana. Dzięki nim możemy mierzyć efektywność naszych działań marketingowych bez identyfikacji danych osobowych oraz ulepszać funkcjonowanie strony internetowej.'
                            }
                        }
                    }
                },
                marketing: {
                    needed: false,
                    wanted: false,
                    checked: false,
                    language: {
                        locale: {
                            pl: {
                                name: 'Cookies reklamowe',
                                description: 'Służą do wyświetlania reklam odpowiednich dla zainteresowań danego użytkownika. Służą one również do ograniczenia liczby wyświetleń danej reklamy oraz pomiaru skuteczności kampanii reklamowej. Dzięki nim możliwe jest przekazanie użytkownikowi tylko tych informacji, którymi aktualnie jest zainteresowany'
                            }
                        }
                    }
                }
            },
            services: {

                analytics: {
                    category: 'analytics',
                    type: 'dynamic-script',
                    search: 'analytics',
                    cookies: [
                        {
                            name: '/^_ga/',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '_gid',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '_gat_',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '_gat_*',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '_dc_gtm_',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'AMP_TOKEN',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '__utma',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '__utmt',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '__utmb',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '__utmc',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '__utmz',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'HSID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'SSID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'APISID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'SAPISID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'SIDCC',
                            domain: `.${window.location.hostname}`
                        },
                    ],
                    language: {
                        locale: {
                            pl: {
                                name: 'Google Analytics'
                            }
                        }
                    }
                },
                analytics1: {
                    category: 'marketing',
                    type: 'dynamic-script',
                    search: 'analytics1',
                    cookies: [
                        {
                            name: '_gac_*',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'APISID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'NID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: 'SID',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '1P_JAR',
                            domain: `.${window.location.hostname}`
                        },
                        {
                            name: '_gcl_au',
                            domain: `.${window.location.hostname}`
                        },
                    ],
                    language: {
                        locale: {
                            pl: {
                                name: 'Google Analytics'
                            }
                        }
                    }
                }
            }
        });
    </script>
    <meta name="theme-color" content="#CF6187">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <link rel="icon" type="image/png" href="/wp-content/themes/happydog/favicon.png"/>
    <?php wp_head();?>

</head>

<body <?php body_class(); ?> >

<section class="nav">
    <div class="nav__top">
        <div class="container">
        <form role="search" method="get" class="woocommerce-product-search nav__search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
        	<label class="screen-reader-text" for="s">Szukaj w sklepie</label>
        	<input type="search" class="search-field" placeholder="Szukaj w sklepie" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
        	<input type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>" />
        	<input type="hidden" name="post_type" value="product" />
        </form>
        <nav class="nav__info">
             <?php echo do_shortcode("[woo_cart_but]"); ?>
             <a href="/moje-konto">
                <img src="/wp-content/themes/happydog/assets/img/paws.svg" alt="Moje konto" width="32" height="28" />
                <span>Moje konto</span>
             </a>
         </nav>
        </div>
    </div>
    <div class="nav__bottom">
       <div class="container">
            <a href="/" class="nav__logo">
               <img src="/wp-content/themes/happydog/assets/img/logo.webp" alt="HappyDog" width="178" height="69" />
            </a>
            <nav class="nav__menu">
                <?php wp_nav_menu( array('theme_location' => 'my-menu', 'container' => 'ul', 'menu_class' => 'nav__menu-list') );  ;?>
                <div class="nav__btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </nav>

       </div>
   </div>
</section>

<main>