<template>
<header class="mb-1">
    <nav class="navbar navbar-expand-lg w-100">
        <ol class="d-flex w-100 align-items-center justify-content-around">
            <a :href="route('home')">
                <img :src="`${logo}`" alt="logo" class="img-fluid" style="width: 100px; height: 100px;">
            </a>
            <li class="nav-item h3 fw-bold"><a :href="route('animals')">Animaux</a></li>
            <li class="nav-item h3 fw-bold"><a :href="route('species')">Espèces</a></li>
            <li class="nav-item h3 fw-bold"><a :href="route('users')">Soigneurs</a></li>
            <li class="nav-item h3 fw-bold"><a :href="route('enclosures')">Enclos</a></li>
            <li class="nav-item dropdown h3 fw-bold">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $page.props.user.name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" :href="route('profile.show')">Profil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" :href="route('logout')">Logout</a></li>
                </ul>
            </li>
        </ol>
    </nav>
</header>
<div class="d-flex justify-content-center content">
    <p class="text-center fs-1 border border-dark p-1" id="thisTime"></p>
</div>
<main>
    <slot></slot>
</main>
</template>

<script>
import moment from 'moment'

export default {
    components: {

    },

    data() {
        return {
            logo: "./assets/img/logo.png",
        }
    },
    methods: {
        momentHour() { // REFRESH CLOCK
            setInterval(() => {
                document.getElementById("thisTime").innerHTML = moment().format('H:mm:ss')

            }, 1000);
        },
        checkFeedTime() {
            setInterval(() => {
                let species = this.$page.props.species;
                for (let props in species) {
                    if (species[props].lunchtime.substr(0, 5) == moment().add(5, 'm').format('H:mm') ||// CHEKC IF MORNING FEED IS IN 5 MIN
                        species[props].lunchtimeTwo.substr(0, 5) == moment().add(5, 'm').format('H:mm')) {
                            if(species[props].feedSpecie === 0 && species[props].feedSpecieTwo === 1){// CHECK IF IS THE MORNING FEED
                                alert("Il va être l\'heure de nourrire les " + species[props].family + "s dans 5 min !!!");
                            }else if(species[props].feedSpecieTwo === 0 && species[props].feedSpecie === 1 ){ // CHECK IF IS THE AFTERNOOR FEED IN 5 MIN
                                alert("Il va être l\'heure de nourrire les " + species[props].family + "s dans 5 min !!!");
                            }
                    }
                }

            }, 60000);
        },

    },
    mounted() {
        this.momentHour();
        this.checkFeedTime();
        console.log();
    }

}
</script>

<style scoped>
header {
    background-color: #bacf9f;
    color: #52351e !important;
}

nav>ol>li>a {
    text-decoration: none;
}

a {
    color: #52351e !important;
}

ol {
    list-style-type: none;

}
</style>
