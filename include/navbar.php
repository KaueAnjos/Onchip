<header id="navbar">

    <div id="h-logo" class="logo">
      <a href="#"><img src="../assets/img/logo-onchip-c02.png" alt="Logo OnChip" /></a>
    </div>

    <a id="main-nav-toggle" href="javascript:void(0)">
      <i class="fas fa-ellipsis-v"></i>
    </a>

    <nav id="main-nav">
      <ul>
        <li><a href="#s-intro">O Que Fazemos</a></li>
        <li><a href="#s-products">Produtos</a></li>
        <li><a href="#s-about">Quem Somos</a></li>
        <li><a href="#s-contact">Fale Conosco</a></li>
        <li>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Contatos
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <button class="dropdown-item" type="button"><i class="fas fa-phone fa-xs"></i><a
                  href="tel:+551120199748">(11) 2019-9748</a></button>
              <button class="dropdown-item" type="button"><i class="fab fa-whatsapp"></i><a
                  href="https://wa.me/5511910381415">(11) 91038-1415</a></button>
            </div>
            </button>
          </div>
          </div>
        </li>

      </ul>
    </nav>

  </header>

/* Navbar */

.dropdown .btn.btn-secondary {
    background-color: var(--light-color);
    border: none;
    border-radius: 15px;
}

.dropdown .btn.btn-secondary:hover {
    transition: 0.5s;
    background-color: var(--second-color);
}

.dropdown-menu button a {
    color: #061d38 !important;
    margin-left: 5px;
}


header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-flow: row wrap;
    background-color: rgba(6, 29, 56, 0.95);
    color: #fff;
    padding: 20px;
    position: fixed;
    width: 100%;
    height: 80px;
    z-index: 100;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}

@media (min-width: 992px) {
    header {
        visibility: hidden;
        opacity: 0;
    }
}

header.show {
    visibility: visible;
    opacity: 1;
    transition: opacity 0.3s ease;
}

header a {
    color: #fff;
    text-decoration: none;
}

header a:hover {
    color: var(--light-color);
    text-decoration: none;
}

#h-logo {
    flex: 1 0 auto;
    text-align: center;
}

@media (min-width: 992px) {
    #h-logo {
        flex: 0 0 auto;
        text-align: left;
    }
}

#h-logo img {
    width: 160px;
}

#main-nav-toggle {
    width: 27px;
    height: 27px;
    display: block;
    text-align: center;
    font-size: 1.5rem;
    transition: transform 0.5s ease;
    color: #fff;
    position: absolute;
    right: 10px;
    top: 35px;
}

#main-nav-toggle.flip {
    transform: rotate(90deg);
}

#main-nav-toggle:hover,
#main-nav-toggle:focus,
#main-nav-toggle:active {
    color: #fff;
}

@media (min-width: 992px) {
    #main-nav-toggle {
        display: none;
    }
}

#main-nav {
    flex: 1 0 100%;
    display: flex;
    justify-content: center;
    max-height: 0;

    flex-flow: column wrap;
    align-items: center;
    transition: max-height 0.5s ease;
}

@media (min-width: 992px) {
    #main-nav {
        flex: 1 0 auto;
        flex-flow: row nowrap;
        justify-content: flex-end;
        max-height: 400px;
    }
}

#main-nav.show {
    max-height: 400px;
}

#main-nav ul {
    width: 100%;
    padding: 0;
    margin-bottom: 0;
    list-style: none;
    line-height: 3.4rem;
    font-size: 1.4rem;
    font-weight: 300;
    text-align: center;
    text-transform: uppercase;
}

@media (min-width: 992px) {
    #main-nav ul {
        width: auto;
        margin: 0;
        line-height: inherit;
        text-align: right;
        text-transform: inherit;
        font-size: 1.1rem;
        font-weight: 100;
    }
}

#main-nav ul li {
    border-bottom: 1px solid rgba(255, 255, 255, 0.25);
}

#main-nav ul li.phone {
    color: var(--light-color);
    font-weight: 500;
}

#main-nav ul li:last-child {
    border: 0;
}

@media (min-width: 992px) {
    #main-nav ul li {
        border: 0;
        display: inline-block;
        margin-right: 1rem;
    }

    #main-nav ul li:last-child {
        margin-right: 0;
    }
}