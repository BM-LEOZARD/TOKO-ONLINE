<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />

    <!--=============== SWIPER CSS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <title>Ecommerce Website</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header">
      <div class="header__top">
        <div class="header__container container">
          <div class="header__contact">
            <span>(+01) - 2345 - 6789</span>
            <span>Our location</span>
          </div>
          <p class="header__alert-news">
            Super Values Deals - Save more coupons
          </p>
          <a href="login-register.html" class="header__top-action">
            Log In / Sign Up
          </a>
        </div>
      </div>

      <nav class="nav container">
        <a href="index.html" class="nav__logo">
          <img
            class="nav__logo-img"
            src="assets/img/logo.svg"
            alt="website logo"
          />
        </a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.html" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="shop.html" class="nav__link">Shop</a>
            </li>
            <li class="nav__item">
              <a href="accounts.html" class="nav__link">My Account</a>
            </li>
            <li class="nav__item">
              <a href="compare.html" class="nav__link active-link">Compare</a>
            </li>
            <li class="nav__item">
              <a href="login-register.html" class="nav__link"
                >Login</a
              >
            </li>
          </ul>
          <div class="header__search">
            <input
              type="text"
              placeholder="Search For Items..."
              class="form__input"
            />
            <button class="search__btn">
              <img src="assets/img/search.png" alt="search icon" />
            </button>
          </div>
        </div>
        <div class="header__user-actions">
          <a href="wishlist.html" class="header__action-btn" title="Wishlist">
            <img src="assets/img/icon-heart.svg" alt="" />
            <span class="count">3</span>
          </a>
          <a href="cart.html" class="header__action-btn" title="Cart">
            <img src="assets/img/icon-cart.svg" alt="" />
            <span class="count">3</span>
          </a>
        </div>
      </nav>
    </header>

    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Shop</span></li>
          <li><span class="breadcrumb__link">></span></li>
          <li><span class="breadcrumb__link">Compare</span></li>
        </ul>
      </section>

      <!--=============== COMPARE ===============-->
      <section class="compare container section--lg">
        <table class="compare__table">
          <tr>
            <th>Image</th>
            <td>
              <img
                src="./assets/img/product-2-1.jpg"
                alt=""
                class="compare__img"
              />
            </td>
            <td>
              <img
                src="./assets/img/product-4-1.jpg"
                alt=""
                class="compare__img"
              />
            </td>
            <td>
              <img
                src="./assets/img/product-7-1.jpg"
                alt=""
                class="compare__img"
              />
            </td>
          </tr>
          <tr>
            <th>Name</th>
            <td><h3 class="table__title">Plain Striola Shirts</h3></td>
            <td><h3 class="table__title">Chen Cardigan</h3></td>
            <td><h3 class="table__title">Henley Shirt</h3></td>
          </tr>
          <tr>
            <th>Price</th>
            <td><span class="table__price">$35</span></td>
            <td><span class="table__price">$67</span></td>
            <td><span class="table__price">$24</span></td>
          </tr>
          <tr>
            <th>Description</th>
            <td>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
                perferendis nam, fuga reiciendis libero doloremque distinctio.
              </p>
            </td>
            <td>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
                perferendis nam, fuga reiciendis libero doloremque distinctio.
              </p>
            </td>
            <td>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
                perferendis nam, fuga reiciendis libero doloremque distinctio.
              </p>
            </td>
          </tr>
          <tr>
            <th>Colors</th>
            <td>
              <ul class="color__list compare__colors">
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(37, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(353, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(49, 100%, 60%)"
                  ></a>
                </li>
              </ul>
            </td>
            <td>
              <ul class="color__list compare__colors">
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(37, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(353, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(49, 100%, 60%)"
                  ></a>
                </li>
              </ul>
            </td>
            <td>
              <ul class="color__list compare__colors">
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(37, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(353, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(49, 100%, 60%)"
                  ></a>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <th>Stock</th>
            <td><span class="table__stock">Out of stock</span></td>
            <td><span class="table__stock">Out of stock</span></td>
            <td><span class="table__stock">Out of stock</span></td>
          </tr>
          <tr>
            <th>Weight</th>
            <td><span class="table__weight">150 gram</span></td>
            <td><span class="table__weight">150 gram</span></td>
            <td><span class="table__weight">150 gram</span></td>
          </tr>
          <tr>
            <th>Dimensions</th>
            <td><span class="table__dimension">N/A</span></td>
            <td><span class="table__dimension">N/A</span></td>
            <td><span class="table__dimension">N/A</span></td>
          </tr>
          <tr>
            <th>Buy</th>
            <td><a href="#" class="btn btm--sm">Add to Cart</a></td>
            <td><a href="#" class="btn btm--sm">Add to Cart</a></td>
            <td><a href="#" class="btn btm--sm">Add to Cart</a></td>
          </tr>
          <tr>
            <th>Remove</th>
            <td><i class="fi fi-rs-trash table__trash"></i></td>
            <td><i class="fi fi-rs-trash table__trash"></i></td>
            <td><i class="fi fi-rs-trash table__trash"></i></td>
          </tr>
        </table>
      </section>

      <!--=============== NEWSLETTER ===============-->
      <section class="newsletter section">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="./assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
            Sign in to Newsletter
          </h3>
          <p class="newsletter__description">
            ...and receive $25 coupon for first shopping.
          </p>
          <form action="" class="newsletter__form">
            <input
              type="text"
              placeholder="Enter Your Email"
              class="newsletter__input"
            />
            <button type="submit" class="newsletter__btn">Subscribe</button>
          </form>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="./assets/img/logo.svg" alt="" class="footer__logo-img" />
          </a>
          <h4 class="footer__subtitle">Contact</h4>
          <p class="footer__description">
            <span>Address:</span> 13 Tlemcen Road, Street 32, Beb-Wahren
          </p>
          <p class="footer__description">
            <span>Phone:</span> +01 2222 365 /(+91) 01 2345 6789
          </p>
          <p class="footer__description">
            <span>Hours:</span> 10:00 - 18:00, Mon - Sat
          </p>
          <div class="footer__social">
            <h4 class="footer__subtitle">Follow Me</h4>
            <div class="footer__links flex">
              <a href="#">
                <img
                  src="./assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-youtube.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
            </div>
          </div>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Address</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">About Us</a></li>
            <li><a href="#" class="footer__link">Delivery Information</a></li>
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
            <li><a href="#" class="footer__link">Terms & Conditions</a></li>
            <li><a href="#" class="footer__link">Contact Us</a></li>
            <li><a href="#" class="footer__link">Support Center</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">My Account</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Sign In</a></li>
            <li><a href="#" class="footer__link">View Cart</a></li>
            <li><a href="#" class="footer__link">My Wishlist</a></li>
            <li><a href="#" class="footer__link">Track My Order</a></li>
            <li><a href="#" class="footer__link">Help</a></li>
            <li><a href="#" class="footer__link">Order</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Secured Payed Gateways</h3>
          <img
            src="./assets/img/payment-method.png"
            alt=""
            class="payment__img"
          />
        </div>
      </div>
      <div class="footer__bottom">
        <p class="copyright">&copy; 2024 Evara. All right reserved</p>
        <span class="designer">Designer by Crypticalcoder</span>
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
