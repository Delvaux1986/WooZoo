<template>
<app-layout>
    <div class="container">
        <h2 class="text-center mb-5 ">Espèces</h2>
        <inertia-link :href="route('enclosures.create')" class="btn btn-outline-primary mb-3">Ajouter</inertia-link>

        <table class="table text-center table-bordered w-80">
            <thead class="table-dark ">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Occupé</th>
                    <th>Par</th>
                    <td>Mis à jour</td>
                    <th v-if="user.role === 'Admin'">Editer</th>
                    <th v-if="user.role === 'Admin'">Supprimer</th>
                </tr>
            </thead>
            <tbody v-for="enclos in this.enclosurelist" :key="enclos.id">
                <tr>
                    <td><a :href="route('enclosures.show' , enclos.id)">{{enclos.id}}</a></td>
                    <td>{{enclos.name ? enclos.name : 'N/A'}}</td>
                    <td>{{enclos.description ? enclos.description : 'N/A'}}</td>
                    <td>{{ enclos.occupy ? enclos.occupy: 'N/A' }}</td>
                    <td>{{ enclos.specie ? enclos.specie.family : 'N/A'}}</td>
                    <td>{{ enclos.updated_at ? enclos.updated_at : 'N/A'}}</td>
                    <td v-if="user.role === 'Admin'">
                        <a :href="route('enclosures.edit', enclos.id)">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                    </td>
                    <td v-if="user.role === 'Admin'">
                        <a :href="route('enclosures.delete', enclos.id)">
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
        enclosurelist: Object,
        user: Object,
    },
    mounted() {
        console.log("Component Enclosure/Index mounted.");
        console.log(this.enclosurelist);
    },

}
</script>
