<template>
<app-layout>
    <div class="container">
        <h2 class="text-center mb-5 ">Espèces</h2>
        <inertia-link :href="route('species.create')" class="btn btn-outline-primary mb-3">Ajouter</inertia-link>

        <table class="table text-center table-bordered w-80">
            <thead class="table-dark ">
                <tr>
                    <th>#</th>
                    <th>Famille</th>
                    <th>Type de nourriture</th>
                    <th>H - Repas Matin</th>
                    <th>Nourris</th>
                    <th>H - Repas Soir</th>
                    <th>Nourris</th>
                    <td>Enclos</td>
                    <th v-if="user.role === 'Admin'">Editer</th>
                    <th v-if="user.role === 'Admin'">Supprimer</th>
                </tr>
            </thead>
            <tbody v-for="specie in this.species" :key="specie.id">
                <tr>
                    <td><a :href="route('species.show' , specie.id)">{{specie.id}}</a></td>
                    <td>{{specie.family ? specie.family : 'N/A'}}</td>
                    <td>{{ specie.food_type ? specie.food_type: 'N/A' }}</td>
                    <td>{{ specie.lunchtime ? specie.lunchtime : 'N/A'}}</td>
                    <th>{{ specie.feedSpecie ? 'Oui' : 'Non' }}</th>
                    <th>{{ specie.lunchtimeTwo ? specie.lunchtimeTwo : 'N/A' }}</th>
                    <th>{{ specie.feedSpecieTwo ? 'Oui' : 'Non' }}</th>
                    <td v-if="specie.enclosure">{{specie.enclosure.name }}</td>
                    <td v-else>Pas d'enclos Attitré</td>
                    <td v-if="user.role === 'Admin'">
                        <a :href="route('species.edit', specie.id)">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                    </td>
                    <td v-if="user.role === 'Admin'">
                        <a :href="route('species.delete', specie.id)">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    components: {
        AppLayout,
    },

    props: {
        species: Object,
        user: Object,
    },
    mounted() {
        console.log("Component Species/index mounted.");

    },

}
</script>
