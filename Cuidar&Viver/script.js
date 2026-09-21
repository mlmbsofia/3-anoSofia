const searchInput = document.getElementById("siteSearch");

if (searchInput) {

    searchInput.addEventListener("input", function () {

        const termo = this.value
            .toLowerCase()
            .trim();


        const cards = document.querySelectorAll(
            ".searchable .card"
        );


        cards.forEach(function (card) {

            const texto = card.innerText
                .toLowerCase();


            if (
                termo !== "" &&
                !texto.includes(termo)
            ) {

                card.classList.add(
                    "hidden-by-search"
                );

            } else {

                card.classList.remove(
                    "hidden-by-search"
                );

            }

        });

    });

}