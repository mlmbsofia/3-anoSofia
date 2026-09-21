document.addEventListener("DOMContentLoaded", function () {

    /*
     * Seleção visual das alternativas
     */

    const alternativas =
        document.querySelectorAll(".alternativa");

    alternativas.forEach(function (alternativa) {

        alternativa.addEventListener("click", function () {

            alternativas.forEach(function (item) {

                item.classList.remove("selecionada");

            });

            alternativa.classList.add("selecionada");

        });

    });


    /*
     * Animação simples dos cards
     */

    const cards =
        document.querySelectorAll(
            ".beneficio, .questao-card, .simulado-card"
        );

    const observer =
        new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.style.opacity = "1";

                        entry.target.style.transform =
                            "translateY(0)";

                    }

                });

            },
            {
                threshold: 0.1
            }
        );


    cards.forEach(function (card) {

        card.style.opacity = "0";

        card.style.transform =
            "translateY(15px)";

        card.style.transition =
            "opacity .5s ease, transform .5s ease";

        observer.observe(card);

    });

});