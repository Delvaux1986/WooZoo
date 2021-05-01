<template>
    <app-Layout>
        <h1>Woozoo</h1>
        <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Specie</th>
                </tr>
            </thead>
            <tbody >
                <tr>
                    <th scope="row" v-for="pet in pets " :key="pet.name">{{pet.id}}</th>
                    <td>{{pet}}</td>
                    <td>Otto</td>
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
    props: ["pets"],

  mounted() {
    console.log("Component Home mounted.");
  },
}
</script>