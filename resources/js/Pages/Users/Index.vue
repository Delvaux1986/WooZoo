<template>
<app-layout>
    <div class="container">
        <h2 class="text-center mb-5 ">Soigneurs</h2>
        <table class="table text-center table-bordered w-80">
            <thead class="table-dark ">
                <tr>
                    <th>Nom</th>
                    <th>Rôle</th>
                    <th>Present</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody v-for="healer in this.users" :key="healer.id">
                <tr>
                    <td>{{healer.name ? healer.name : 'N/A'}}</td>
                    <td>{{healer.role ? healer.role : 'N/A'}}</td>
                    <td>{{healer.workToday ? 'Oui' : 'Non'}}</td>
                    <td>{{ healer.email ? healer.email : 'N/A'}}</td>
                    <td>{{ healer.phone ? '0'+healer.phone : 'N/A'}}</td>
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
        users: Object,
    },
    mounted() {
        console.log("Component Home mounted.");
        console.log(this.users);
    },

}
</script>
