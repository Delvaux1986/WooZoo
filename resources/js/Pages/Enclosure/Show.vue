<template>
    <app-layout>
        <div class="container d-flex justify-content-center mt-5">
            <div class='card d-flex w-50 '>
            <div class="card-body">
                <div class="card-title text-center bg-dark text-info"><h5>{{ this.enclosure.name }}</h5></div>
                <div class="card-body text-center">
                    <ul class="card-text list-group list-group-flush">
                        <li class="list-group-item">Nom : {{ this.enclosure.name ? this.enclosure.name: 'N/A'}}</li>   
                        <li class="list-group-item">Description : {{ this.enclosure.description ? this.enclosure.description : 'N/A'}}</li>
                        <li class="list-group-item">Occuper : {{ this.enclosure.occupy ? this.enclosure.occupy : 'N/A'}}</li>
                        <li class="list-group-item">Par : {{ this.enclosure.specie.family ? this.enclosure.specie.family : 'N/A'}}</li>
                        <li class="list-group-item">Mis à jour : {{ this.enclosure.updated_at ? this.enclosure.updated_at: 'N/A'}}</li>
                        <li class="list-group-item">Créer le  : {{this.enclosure.created_at ? this.enclosure.created_at : 'N/A'}}</li>
                    </ul>
                    <div  v-if="user.role === 'Admin'" class="d-flex justify-content-between">
                        <inertia-link :href="route('enclosures.edit', this.enclosure.id)" class="btn btn-outline-warning">Editer</inertia-link>
                        <inertia-link :href="route('enclosures.delete', this.enclosure.id)" class="btn btn-outline-danger">Supprimer</inertia-link>
                    </div>
                    

                </div>
            </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

    export default {
        components : {
            AppLayout,
        },
        props: {
            enclosure:Object,
            user : Object,
        },
    mounted() {
        console.log("Component Enclosure/Show mounted.");
        console.log(this.enclosure);
    },
    }
</script>