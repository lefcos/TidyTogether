<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Tidy Together</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/landing.css"/>
</head>

<body>

    <div class="text-half">
    <header class="header">
        <h1 class="header_branding">
            <img src="public/logo.png" alt="TidyTogether" class="header_logo">
            <span class="header_text">TidyTogether</span>
        </h1>

        <nav class="header_nav">
            <ul class="header_ul">
                <li class="header_li">
                    <a href="https://github.com/lefcos/TidyTogether" target="_blank" class="header_a header_a--github">
                        <?php require 'view/components/svg/githubSvg.php'; ?>
                    </a></li>

                <li class="header_li">
                    <button id="open">      
                        <span class="header_a header_a--linkedin">
                            <?php require 'view/components/svg/linkedinSvg.php'; ?>
                        </span>
                    </button>

                    <div class="modal-container" id = "modal_container">
                        <div class="linkedin-modal">
                            <span>Connect with us:</span>
                            <ul class="linkedin-profiles">
                                <li class="linkedin-profile">
                                    <a href="https://www.linkedin.com/in/petrubraha/" target="_blank" class="linkedin-link">Brahă Petru</a>
                                </li>
                                <li class="linkedin-profile">
                                    <a href="https://www.linkedin.com/in/leftercosmin/" target="_blank" class="linkedin-link">Lefter Cosmin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <main class="landingpage">
        <div class="content">
            <h1 class="content_title">
                Caring for
                <span id="cityslideshow" class="textwithbackground"> your city</span><br>
                Uniting the community
            </h1>

            <div class="content-bottom">
                <div class="description">
                <p class="description-line">A web application that helps you find recycling spots</p>
                <p class="description-line">and streamlines collaboration between citizens and official waste managers.</p>
                </div>
                <form method="POST" action="index.php" class="content-buttons">
                    <button type="submit" name="whatPage" value="Signup" class="body-buttons">Sign up</button>
                    <button type="submit" name="whatPage" value="Login" class="body-buttons">Log In</button>
                </form>
            </div>

        </div>
    </main>
    </div>

<div class="image-half">
    <img src="public/building.jpg" alt="CITY+GREEN">
</div>

<script>
    //this is for the modal
    const open = document.getElementById("open");
    const modalcontainer = document.getElementById("modal_container");

    open.addEventListener('click', () => {
        modalcontainer.classList.toggle('show');
    })

    window.addEventListener('click', (e) => {
        if (!open.contains(e.target) && !modalcontainer.contains(e.target)) {
            modalcontainer.classList.remove('show');
        }
    });

    //this is for the slideshow (not optimized but works)
    let currentIndex = 0;
    const citySlot = document.getElementById('cityslideshow');
        const cities = [
            { name: "Iași", img: "https://images.unsplash.com/photo-1699359104149-8a959a1c348c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"},
            { name: "Cluj", img: "https://images.unsplash.com/photo-1583751636643-94790958040a?q=80&w=1182&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"},
            { name: "Bucharest", img: "https://images.unsplash.com/photo-1574616979112-f9f52d3747f8?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"},
            { name: "Timișoara", img: "https://images.unsplash.com/photo-1687696162729-a75f9ddc004d?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"},
            { name: "Galați", img: "https://images.unsplash.com/photo-1664912879009-fcf1fb932009?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"}
        ];
        
    function updateCity() {
        citySlot.classList.add('fade-out');
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % cities.length;
            const city = cities[currentIndex];
            citySlot.textContent = city.name;
            if (city.img) {
                citySlot.style.backgroundImage = `url('${city.img}')`;
                citySlot.classList.add('has-bg');
            } else {
                citySlot.style.backgroundImage = 'none';
                citySlot.classList.remove('has-bg');
            }
            citySlot.classList.remove('fade-out');
        }, 500); 
    }
    setInterval(updateCity, 4000);
</script>
</body>
</html>