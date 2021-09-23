<?php

use App\repositories\UserRepository;

require __DIR__ . '/partials/header.php';
?>

<!-- Masthead-->
<header class="masthead" id="home">
    <div class="container">
        <div class="masthead-subheading">Bienvenue sur DevBlog!</div>
        <div class="masthead-heading text-uppercase">DevBlog, l'informatique au quotidien !</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Mes posts</a>
    </div>
</header>


<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Posts</h2>
            <!--            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
        </div>
        <div class="row">
            <?php foreach ($posts as $post) { ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item" style="display: flex;flex-direction: column;justify-content: center;
                align-items: center;background-color: white;padding-top: 2vh">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div><?php if ($post->photo != null) { ?>
                            <img class="img-fluid"
                                 style="width: 30vw;max-height: 60vh" <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                                src="../public/images/post/<?= $post->photo ?>"
                            <?php } else { ?>
                                src="../../public/images/post/<?= $post->photo ?>"
                            <?php } ?> alt="..."/><?php } ?>
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading"><?= $post->title ?></div>
                        <div class="portfolio-caption-subheading text-muted"><?= $post->content ?></div>
                    </div>
                    <br>

                    Posté le <?= $post->post_date ?>

                    <?php if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                        <a class="nav-link" href="./index.php/post/<?= $post->id ?>">Voir le post</a>
                    <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') { ?>
                        <a class="nav-link" href="../../index.php/post/<?= $post->id ?>">Voir le post</a>
                        <?php
                    } else { ?>
                        <a class="nav-link" href="./post/<?= $post->id ?>">Voir le post</a>
                    <?php } ?>

                </div>
                </div><?php } ?>
        </div>
    </div>
</section>
<!-- About-->
<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">A propos de moi</h2>
            <h3 class="section-subheading text-muted">Mon parcours.</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class=""><img class="rounded-circle img-fluid"
                                                 src="../../src/assets/img/about/sport.png"
                                                 alt="..."/></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2009-2019</h4>
                        <h4 class="subheading">Ma voie de départ</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">J'ai commencé le monde professionnel par une expérience hors-norme.
                            Etre sportif professionnel m'a permis de me confronter au monde réel et de me surpasser dans
                            des conditions difficiles.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                                                 src="../../src/assets/img/about/2.jpg"
                                                 alt="..."/></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2019</h4>
                        <h4 class="subheading">Reconversion</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">En plus des études effectuées durant mes années sportives,
                        je me suis reconverti dans l'informatique.
                        J'ai effectué des formations pour avoir des opportunités.</p></div>
                </div>
            </li>
            <li>
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                                                 src="../../src/assets/img/about/3.jpg"
                                                 alt="..."/></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2020</h4>
                        <h4 class="subheading">Transition en apprentissage</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Et ensuite j'ai trouvé une entreprise qui a su me donner ma chance...</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image"><img class="rounded-circle img-fluid"
                                                 src="../../src/assets/img/about/4.jpg"
                                                 alt="..."/></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>July 2021</h4>
                        <h4 class="subheading">Phase de progression</h4>
                    </div>
                    <div class="timeline-body"><p class="text-muted">Tout mon parcours m'a permis d'avoir la force et l'envie de trouver ma voie professionnelle.
                        Je suis heureux de vous présenter donc ce pourquoi je me lève chaque matin.</p></div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Be Part
                        <br/>
                        Of My
                        <br/>
                        Story!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- Team-->
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Mon profil</h2>
            <h3 class="section-subheading text-muted">Développeur web</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="../../src/assets/img/team/Profil.jpg" alt="..."/>
                    <h4>Cyril Guittet</h4>
                    <p class="text-muted">Développeur web</p>
                    <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/?lang=fr"><i
                                class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/cyriil.guittet"><i
                                class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://fr.linkedin.com/"><i
                                class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Développeur web au sein d'une agence
                    multimédia, j'apprends et retranscrit les technologies
                    sur ce site à base de blog posts pour partager ma connaissance .</p></div>
        </div>
    </div>
</section>

<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="https://www.google.com/search?q=veille+informatique&ei=QCpMYczkFoyOlwTviZXgBA&oq=veille+informatique&gs_lcp=Cgdnd3Mtd2l6EAMyBQgAEIAEMgUIABCABDIFCAAQgAQyBQgAEIAEMgUIABCABDIFCAAQgAQyBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjoHCAAQRxCwAzoHCAAQsAMQQzoNCC4QxwEQ0QMQsAMQQzoUCC4QgAQQsQMQgwEQxwEQ0QMQkwI6CwgAEIAEELEDEIMBOggIABCxAxCDAToOCC4QgAQQsQMQxwEQ0QM6EQguEIAEELEDEIMBEMcBENEDOgUILhCABDoICAAQgAQQsQM6EQguEIAEELEDEIMBEMcBEKMCOg4ILhCABBCxAxDHARCjAjoECAAQQzoKCAAQsQMQgwEQQzoHCC4QsQMQQ0oECEEYAFC2QlioVmD_VmgGcAJ4AIABuwGIAd0TkgEEMy4xNpgBAKABAcgBCsABAQ&sclient=gws-wiz&ved=0ahUKEwjMhNP9xpTzAhUMx4UKHe9EBUwQ4dUDCA4&uact=5"><img
                                class="img-fluid img-brand d-block mx-auto"
                                src="../../src/assets/img/logos/google.svg"
                                alt="..."/></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="https://www.facebook.com/cyriil.guittet"><img class="img-fluid img-brand d-block mx-auto"
                                                                           src="../../src/assets/img/logos/facebook.svg"
                                                                           alt="..."/></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                Copyright &copy; Your Website
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/?lang=fr"><i
                            class="fab fa-twitter"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/"><i
                            class="fab fa-facebook-f"></i></a>
                <a class="btn btn-dark btn-social mx-2" href="https://www.linkedin.com/home/?originalSubdomain=fr"><i
                            class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="col-lg-4 text-lg-end">
                <!--                <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>-->
                <!--                <a class="link-dark text-decoration-none" href="#!">Termes du contrat</a>-->

                <?php
                $userRepo = new UserRepository();
                if (isset($_SESSION['email'])) {
                    if ($_SESSION['email'] != []) {
                        $userEmail = $userRepo->searchUserByMail($_SESSION['email']);
                    }
                }

                if (isset($userEmail) != null) {
                    if ($userEmail != []) {
                        if ($userEmail[0]->role_id == 10) {
                            if (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] == '/') { ?>
                                <a class="nav-link" style="color: black"
                                   href="./index.php/admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                            <?php } elseif (str_contains($_SERVER['HTTP_HOST'], 'festival') === true && $_SERVER['REQUEST_URI'] != '/') {
                                ?>
                                <a class="nav-link" style="color: black"
                                   href="../../index.php/admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                                <?php
                            } else { ?>
                                <a class="link-dark text-decoration-none" style="color: black"
                                   href="./admin?email=<?= $_SESSION['email'] ?>">Espace
                                    admin</a>
                            <?php } ?>
                        <?php }

                    }
                }
                ?>

            </div>
        </div>
    </div>
</footer>
<!-- Portfolio item 1 modal popup-->
<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal"><img src="../../src/assets/img/close-icon.svg"
                                                                  alt="Close modal"/>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project details-->
                            <h2 class="text-uppercase">Project Name</h2>
                            <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                            <img class="img-fluid d-block mx-auto" src="../../src/assets/img/portfolio/1.jpg"
                                 alt="..."/>
                            <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt
                                repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae,
                                nostrum, reiciendis facere nemo!</p>
                            <ul class="list-inline">
                                <li>
                                    <strong>Client:</strong>
                                    Threads
                                </li>
                                <li>
                                    <strong>Category:</strong>
                                    Illustration
                                </li>
                            </ul>
                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-times me-1"></i>
                                Close Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../../src/assets/js/scripts.js"></script>
</body>
</html>
