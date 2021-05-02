<template>
    <app-Layout>
            <h2 class="text-center mb-5">Animals</h2>
        <table class="table text-center table-bordered">
            <thead class="table-dark w-80">
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Specie</th>
                <th>Family</th>
                <th>Lunch Time</th>
                </tr>
            </thead>
            <tbody v-for="pet in this.animals" :key="pet.id">
                <tr>
                    <td><a :href="route('animals.show' , pet)">{{pet.id}}</a></td>
                    <td>{{pet.name}}</td>
                    <td>{{pet.specie.specie ? pet.specie.specie : 'N/A'}}</td>
                    <td>{{pet.specie.family ? pet.specie.family : 'N/A'}}</td>
                    <td>{{pet.specie.lunchtime ? pet.specie.lunchtime : 'N/A'}}</td>
                </tr>
            </tbody>
        </table>
            <h2 class="text-center mb-5">Healers</h2>
        <table class="table text-center table-bordered mt-5">
            <thead class="table-dark w-80">
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Work today</th>
                <th>E-mail</th>
                </tr>
            </thead>
            <tbody v-for="user in this.users" :key="user.id">
                <tr>
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.role}}</td>
                    <td>{{user.phone ? '0'+ user.phone : 'N/A'}}</td>
                    <td>{{user.worktoday ? user.worktoday  : 'N/A'}}</td>
                    <td>{{user.email ? user.email : 'N/A'}}</td>
                    
                </tr>
            </tbody>
        </table>
    </app-Layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    components: {
        AppLayout,
        },
    props: {
        animals:Object,
        users:Object,
    }
        ,
    mounted() {
        console.log("Component Home mounted.");
        console.log(this.users);
    },
  
}
</script>

<style>
    *{
        
        font-size: 18px;
        font-weight: 500;
    }
</style>
