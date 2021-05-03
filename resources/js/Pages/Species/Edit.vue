<template>
    <app-layout>
        <div class="container">
            <!-- :action="route('species.update', this.specie)" -->
            <h2 class="text-center mb-5 text-info">{{this.specie.specie}}</h2>
            <form  class="d-flex flex-column justify-content-around form-group" @submit.prevent="submit"  :method="POST">
                <div class="row">
                    <div class="col">
                        <label for="specieName">Nom de l'espece :</label>
                        <input type="text" name="specieName" id="specieName" class="form-control mb-1" v-model="form.specieName">
                    </div>
                    <div class="col">
                         <label for="specieName">Famille :</label>
                        <select  name="specieName" id="specieName" class="form-control mb-1" v-model="form.specieName">
                            <option v-for="family in this.specieslist" :key="family.id" :value="family.id">{{ family.family ? family.family : 'N/A'}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <label for="specieName">Nom de l'espece :</label>
                        <input type="text" name="specieName" id="specieName" class="form-control mb-1" v-model="form.specieName">
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col"></div>
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
                    specieName : this.specie.specie,
                    _token: this.$page.props.csrf_token,
                }
                
            }     
        },
        methods: {
            submit(){
                // this.$inertia.post('/species/update/'+this.animal.id, this.form);
            }
        }
  
}
</script>