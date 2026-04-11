<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description"
        content="Produção e montagem de placas eletrônicas, peças e acessórios, prestação de serviços técnicos, transmissores de temperatura.">
    <meta name="keywords"
        content="eletrônica, onchip, on chip, on, chip, placa, circuito, sensor, sensores, componentes, temperatura, montagem, técnico, técnica, manutenção, fabricante, produção, eletrônico, board, pcb">
    <meta name="author" content="Fábio Monari">
    <meta name="copyright" content="© 2019 OnChip" />
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="15 days">
    <meta name="rating" content="general">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../assets/img/favicon/safari-pinned-tab.svg" color="#104778">
    <meta name="msapplication-TileColor" content="#104778">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,500&display=swap"
        rel="stylesheet">
    <title>Document</title>
    <style>
        :root {
            --primary-color: #061d38;
            --second-color: #104778;
            --light-color: #00d7ec;
            --white-color: #fff;
        }

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
            background-color: rgba(6, 29, 56, 0.95);
            color: #fff;
            padding: 20px;
            position: fixed;
            width: 100%;
            height: 80px;
            z-index: 100;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            opacity: 1;
            transform: translateY(-100%);
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        section {
            height: 1000px;
            background-color: red;
        }

        header.show {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        header a {
            color: var(--white-color);
            text-decoration: none;
        }

        header a:hover {
            color: var(--light-color);
            text-decoration: none;
        }

        header .logo {
            text-align: center;
            /* flex: 1 0 auto; */
        }

        header .logo img {
            width: 160px;
        }

        .main-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1 0 auto;
            flex-flow: row nowrap;
            justify-content: flex-end;
        }

        .main-nav ul {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0;
            color: var(--light);
            list-style: none;
            width: auto;
            margin: 0;
            line-height: inherit;
            text-align: right;
            text-transform: inherit;
            font-size: 1.1rem;
            font-weight: 100;
        }

        .main-nav ul li {
            border: 0;
            display: inline-block;
            margin-right: 1rem;
        }

        /* Search NavBar */

        .search-container {
            position: relative;
            box-sizing: border-box;
            width: fit-content;
        }

        .search-container:hover .mainbox {
            background-color: var(--second-color);
        }

        .mainbox {
            box-sizing: border-box;
            position: relative;
            width: 230px;
            height: 40px;
            display: flex;
            flex-direction: row-reverse;
            align-items: center;
            justify-content: center;
            border-radius: 160px;
            background-color: var(--second-color);
            transition: all 0.3s ease;
            margin-left: 20px;
        }


        .checkbox:focus {
            border: none;
            outline: none;
        }

        .checkbox:checked {
            right: 10px;
        }

        .checkbox:checked~.mainbox {
            width: 40px;
            background-color: var(--light-color);
        }

        .checkbox:checked~.mainbox:hover {
            width: 40px;
        }

        .checkbox:checked~.mainbox .search-input {
            width: 0;
            height: 0px;
        }

        .checkbox:checked~.mainbox .icon-container {
            padding-right: 8px;
        }

        .checkbox {
            box-sizing: border-box;
            width: 30px;
            height: 30px;
            position: absolute;
            right: 17px;
            top: 10px;
            z-index: 9;
            cursor: pointer;
            appearance: none;
        }

        .search-input {
            box-sizing: border-box;
            height: 100%;
            width: 170px;
            background-color: transparent;
            border: none;
            outline: none;
            padding-bottom: 4px;
            padding-left: 10px;
            font-size: 16px;
            color: white;
            transition: all 0.3s ease;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.776);
        }

        .icon-container {
            box-sizing: border-box;
            width: fit-content;
            transition: all 0.3s ease;
        }

        .search-icon {
            box-sizing: border-box;
            fill: white;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <header id="navbar">

        <div id="h-logo" class="logo">
            <a href="#"><img src="../assets/img/logo-onchip-c02.png" alt="Logo OnChip" /></a>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="#section-intro">O Que Fazemos</a></li>
                <li><a href="#section-products">Produtos</a></li>
                <li><a href="#section-about">Quem Somos</a></li>
                <li><a href="#section-contact">Fale Conosco</a></li>
                <li>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contatos</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button"><i class="fas fa-phone fa-xs"></i><a
                                    href="tel:+551120199748">(11) 2019-9748</a></button>
                            <button class="dropdown-item" type="button"><i class="fab fa-whatsapp"></i><a
                                    href="https://wa.me/5511910381415">(11) 91038-1415</a></button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="search-container">
                        <input checked="" class="checkbox" type="checkbox">
                        <div class="mainbox">
                            <div class="icon-container">
                                <svg viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg"
                                    class="search-icon">
                                    <path
                                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                                    </path>
                                </svg>
                            </div>
                            <input class="search-input" placeholder="Pequise aqui.." type="text">
                        </div>
                    </div>
                </li>

            </ul>
        </nav>

    </header>

    <section>

    </section>

    <script src="../assets/scripts/jquery.min.js"></script>
    <script src="../assets/scripts/grid-expander.min.js"></script>
    <script src="../assets/scripts/main.min.js"></script>
    <script src="../assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>