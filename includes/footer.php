<?php declare(strict_types=1);
$content = require INCLUDES_PATH . '/data/site-content.php';
?>
<!-- Footer -->
<footer class="ej-footer">
    <div class="ej-footer__main">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div class="ej-footer__brand-card">
                        <a href="index.html" class="ej-footer__brand">
                            <img src="<?= e($config['logo_footer']) ?>" alt="Ejense Technology" width="45" height="45" loading="lazy">
                            <span>Ejense.in</span>
                        </a>
                        <p><?= e($content['footer']['about']) ?></p>
                        <form id="signupForm" class="ej-footer__signup" novalidate>
                            <input type="hidden" name="csrf_token" value="<?= e(csrf_token()) ?>">
                            <div class="input-group">
                                <input type="email" id="signupemail" class="form-control" placeholder="Your Email" aria-label="Email for newsletter">
                                <button type="button" class="btn ej-btn-dark" onclick="validateAndSignUp()">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <h3 class="ej-footer__title">Get In Touch</h3>
                            <ul class="ej-footer__contact">
                                <li><i class="bi bi-geo-alt"></i><span><?= e($config['company_address']) ?></span></li>
                                <li><i class="bi bi-envelope-open"></i><a href="mailto:<?= e($config['company_email']) ?>"><?= e($config['company_email']) ?></a></li>
                                <li><i class="bi bi-telephone"></i><a href="tel:<?= e(preg_replace('/\s+/', '', $config['company_phone'])) ?>"><?= e($config['company_phone']) ?></a></li>
                            </ul>
                            <div class="ej-footer__social">
                                <a href="<?= e($config['social']['twitter']) ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="<?= e($config['social']['facebook']) ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?= e($config['social']['linkedin']) ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                <a href="<?= e($config['social']['instagram']) ?>" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h3 class="ej-footer__title">Quick Links</h3>
                            <ul class="ej-footer__links">
                                <li><a href="index.html"><i class="bi bi-arrow-right"></i>Home</a></li>
                                <li><a href="about.html"><i class="bi bi-arrow-right"></i>About Us</a></li>
                                <li><a href="service.html"><i class="bi bi-arrow-right"></i>Our Services</a></li>
                                <li><a href="team.html"><i class="bi bi-arrow-right"></i>Meet The Team</a></li>
                                <li><a href="detail.html"><i class="bi bi-arrow-right"></i>Latest Blog</a></li>
                                <li><a href="contact.html"><i class="bi bi-arrow-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <h3 class="ej-footer__title">Popular Links</h3>
                            <ul class="ej-footer__links">
                                <li><a href="index.html"><i class="bi bi-arrow-right"></i>Home</a></li>
                                <li><a href="about.html"><i class="bi bi-arrow-right"></i>About Us</a></li>
                                <li><a href="service.html"><i class="bi bi-arrow-right"></i>Our Services</a></li>
                                <li><a href="team.html"><i class="bi bi-arrow-right"></i>Meet The Team</a></li>
                                <li><a href="detail.html"><i class="bi bi-arrow-right"></i>Latest Blog</a></li>
                                <li><a href="contact.html"><i class="bi bi-arrow-right"></i>Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ej-footer__bottom">
        <div class="container text-center">
            <p>&copy; <a href="#">Ejense Technology</a>. All Rights Reserved. Designed by <a href="http://ejense.in">Ejense Technology</a></p>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<a href="#" class="ej-back-to-top" id="backToTop" aria-label="Back to top"><i class="bi bi-arrow-up"></i></a>

<!-- WhatsApp Float -->
<a href="https://wa.me/<?= e($config['whatsapp_number']) ?>" class="ej-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- Validation Modal -->
<div class="modal fade" id="validationModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ej-modal">
            <div class="modal-header">
                <h5 class="modal-title"><img src="<?= e($config['logo_footer']) ?>" alt="" width="32" height="32"> Ejense Technology</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"><p id="validationMessage"></p></div>
            <div class="modal-footer">
                <button type="button" class="btn ej-btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Loader Overlay -->
<div id="overlay" class="ej-overlay" style="display:none;"></div>
<div id="loader" class="ej-loader" style="display:none;">
    <img src="img/Ejense_logo2s.jpg" alt="Loading..." class="ej-loader__img">
    <p>Loading...</p>
</div>
