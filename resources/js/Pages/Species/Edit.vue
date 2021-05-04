<template>
    <app-layout>
        <div class="container">
            <!--  -->
            <h2 class="text-center mb-5 text-info">{{this.specie.specie}}</h2>
            <form  class="d-flex flex-column justify-content-around form-group" @submit.prevent="submit" :action="route('species.update', this.specie)" :method="POST">
                <div class="row">
                    <div class="col">
                        <label for="specieName">Nom de l'espece :</label>
                        <input type="text" name="specieName" id="specieName" class="form-control mb-1" v-model="form.specieName">
                    </div>
                    <div class="col">
                         <label for="specieFamily">Famille :</label>
                        <select  name="specieFamily" id="specieFamily" class="form-control mb-1" v-model="form.specieFamily">
                            <option v-for="family in this.specieslist" :key="family.id" :value="family.family">{{ family.family ? family.family : 'N/A'}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <label for="specieFoodType">Type d'aliment :</label>
                        <input type="text" name="specieFoodType" id="specieFoodType" class="form-control mb-1" v-model="form.specieFoodType">
                    </div>
                    <div class="col">
                        <label for="specieLunchtime">Heure repas :</label>
                        <input type="time" min="09:00" max="18:00" name="specieLunchtime" id="specieLunchtime" class="form-control mb-1" v-model="form.specieLunchtime">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="specieEnclosure">Enclos :</label>
                            <select name="specieEnclosure" id="specieEnclosure" class="form-control mb-1" v-model="form.specieEnclosure">
                                <option value="0" selected>Aucun</option>
                                <option v-for="enclos in this.enclosurelist" :key="enclos.id" :value="enclos.id">{{ enclos.name}}</option>
                            </select> 
                    </div>
                    <div class="col"></div>
                </div>
                    <div class="col mt-5">
                        <button type="submit" value="Update" class="btn btn-outline-warning">Update</button>
                    </div>
            </form>
        </div> 
        
    </app-layout>
</template>

<script>

    import AppLayout from "./../../Layouts/AppLayout";
    import VueDatepickerLocal from 'vue-datepicker-local'

    export default {
        components: {
            AppLayout,
            VueDatepickerLocal
            },
    
            props : {
                specie : Object,
                user : Object,
                userslist : Object,
                enclosurelist : Object,
                specieslist : Object,
            }
            ,
        mounted() {
            console.log("Component Animals.edit mounted.");
            console.log(this.userslist);
        },
        data () {
            return{
                time: new Date(),
                form:{
                    specieId : this.specie.id,
                    specieName : this.specie.specie,
                    specieFamily: this.specie.family,
                    specieFoodType : this.specie.food_type,
                    specieLunchtime : this.specie.lunchtime,
                    specieEnclosure : this.specie.enclosure_id,
                    _token: this.$page.props.csrf_token,
                }
                
            }     
        },
        methods: {
            submit(){
                this.$inertia.post('/species/update/'+this.specie.id, this.form);
            }
        }
  
}
</script>