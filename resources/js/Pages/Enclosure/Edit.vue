<template>
<app-layout>
    <div class="container">
        <h2 class="text-center mb-5 text-info">{{this.enclosure.name}}</h2>
        <form @submit.prevent="submit" :action="route('enclosures.update', this.enclosure)" :method="POST" class="d-flex flex-column justify-content-around form-group">
            <div class="row">
                <div class="col">
                    <label for="enclosName">Nom :</label>
                    <input class="form-control mb-1" type="text" name="enclosName" id="enclosName" v-model="form.enclosName">
                </div>
                <div class="col">
                    <label for="enclosDescription">Description :</label>
                    <textarea class="form-control mb-1" type="textarea" name="enclosDescription" id="enclosDescription" v-model="form.enclosDescription" rows="3"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="enclosOccupy">Occuper :</label>
                    <select class="form-control mb-1" name="enclosOccupy" id="enclosOccupy" v-model="form.enclosOccupy">
                        <option value="0">NON</option>
                        <option value="1">OUI</option>
                    </select>
                </div>
                <div class="col">
                    <label for="enclosSpecie">Par :</label>
                    <ul v-for="specie in this.enclosure.specie_enclosure" :key="specie.id" id="enclosSpecie">
                        <li>{{ specie.specie.family }}</li>
                    </ul>
                </div>
            </div>
            <!-- <div class="row">
                        <div class="col">
                            <input type="hidden" name="enclosUpdate" id="enclosUpdate" v-model="form.enclosUpdate">
                        </div>
                    </div> -->
            <div class="col mt-5">
                <button type="submit" value="Update" class="btn btn-outline-warning">Update</button>
            </div>
        </form>
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
        enclosure: Object,
        specieslist: Object,
    },
    data() {
        return {
            time: this.time,
            form: {
                enclosName: this.enclosure.name,
                enclosDescription: this.enclosure.description,
                enclosOccupy: this.enclosure.occupy,
                // enclosSpecie: this.enclosure.specie,
                enclosUpdate: this.time,
            }
        }
    },
    mounted() {
        console.log("Component Enclosure/Edit mounted.");
        console.log(this.enclosure.specie_enclosure[0]);
    },
    methods: {
        submit() {
            this.$inertia.post('/enclosure/update/' + this.enclosure.id, this.form)
        },
        now() {
            let currentDate = new Date();
            let timestamp = currentDate.getTime();

            return timestamp;
        }
    }
}
</script>
