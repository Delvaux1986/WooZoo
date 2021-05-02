<template>
    <app-layout>
        <div class="container">
            
            <h2 class="text-center mb-5 text-info">{{this.animal.name}}</h2>
            <form  class="d-flex flex-column justify-content-around form-group" @submit.prevent="submit" :action="route('animals.update', this.animal)" :method="POST">
                <div class="row">
                    <div class="col">
                        <label for="petName">Name :</label>
                        <input class="form-control mb-1" id="petName" name="petName" type="text"  v-model="form.petName">
                        
                    </div>
                    <div class="col">
                        <label for="petSpecie">Specie :</label>
                            <select class="form-control mb-1" name="petSpecie" id="petSpecie" type="text" v-model="form.petSpecie">
                                <option v-for="specie in this.specieslist" :key="specie.id" :value="specie.id" >{{specie.specie}}</option>
                            </select>
                    </div>
                </div>    
                <div class="row">
                    <div class="col">
                        <label for="petFamily">Family : </label>
                    <input class="form-control mb-1" name="petFamily" id="petFamily" type="text" v-model="form.petFamily">
                    </div>
                    <div class="col">
                        <label for="petLunchtime">Lunch time :</label>
                        <vue-datepicker-local v-model="form.petLunchtime" clearable name="petLunchtime" format="HH:mm:ss" class="form-control mb-1" > </vue-datepicker-local>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="petFeeds">Animal feed : </label>
                        <select name="petFeeds" id="petFeeds" class="form-control mb-1" v-model="form.petFeeds">
                            <option value="0">Not Do</option>
                            <option value="1">Do</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="petHealer">Healer</label>
                        <select name="petHealer" id="petHealer" class="form-control mb-1" v-model="form.petHealer"> 
                            <option v-for="healer in this.userslist" :key="healer.id" :value="healer.id" :v-if="healer.worktoday === 1">{{healer.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="petFoodType">Food type</label>
                        <input class="form-control mb-1" type="text" id="petFoodType" name="petFoodType" v-model="form.petFoodType">
                    </div>
                    <div class="col">
                        <label for="petEnclosure">Enclosures</label>
                        <select name="petEnclosure" id="petEnclosure" class="form-control mb-1" v-model="form.petEnclosure">
                            <option value="NULL">No one</option>
                            <option v-for="enclosure in this.enclosurelist" :key="enclosure.id" :value="enclosure.id">{{enclosure.name}}</option>
                        </select>
                        <input type="hidden" name="petUpdateTime" v-model="form.petUpdateTime">
                        
                    </div>
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
                animal : Object,
                userslist : Object,
                user : Object,
                specieslist : Object,
                enclosurelist : Object
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
                    id : this.animal.id,
                    petName: this.animal.name,
                    petSpecie : this.animal.specie_id,
                    petFamily : this.animal.specie.family,
                    petLunchtime : this.animal.specie.lunchtime,
                    petFeeds : this.animal.feeds,
                    petFoodType : this.animal.specie.food_type,
                    petEnclosure : this.animal.specie.enclosure_id,
                    update_at : this.time,
                    _token: this.$page.props.csrf_token,
                }
                
            }     
        },
        methods: {
            submit(){
                this.$inertia.post('/animals/update/'+this.animal.id, this.form)
            }
        }
  
}
</script>