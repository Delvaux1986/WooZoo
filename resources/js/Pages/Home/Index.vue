<template>
    <app-Layout>
            <h2 class="text-center">Animals</h2>
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
            <tbody v-for="pet in this.pets" :key="pet.id">
                <tr>
                    <td>{{pet.id}}</td>
                    <td>{{pet.name}}</td>
                    <td>{{pet.specie.specie}}</td>
                    <td>{{pet.specie.family}}</td>
                    <td>{{pet.specie.lunchtime}}</td>
                </tr>
            </tbody>
        </table>
            <h2 class="text-center">Healers</h2>
        <table class="table text-center table-bordered">
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
                    <td>0{{user.phone}}</td>
                    <td>{{user.worktoday}}</td>
                    <td>{{user.email}}</td>
                    
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
    props: ['pets', 'users']
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
