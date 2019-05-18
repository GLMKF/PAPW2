<template>
    <div>
        <div class="row">
            <template v-if="showField">
                <div class="form-group standard">
                    <label for="desc">Describe acontinuacion una plaza de estudios donde hayas estado</label>
                </div>
                <div class="form-group">
                    <label for="position">Posición que desarrolló:</label>
                    <input type="text" class="form-control" id="position" name="position" required v-model="newItem.position" placeholder="Ej. Licenciatura en ...">
                </div>
                <div class="form-group">
                    <label for="institution">Institución donde desarrolló:</label>
                    <input type="text" class="form-control" id="institution" name="institution" required v-model="newItem.institution" placeholder="Ej. UANL">
                </div>
                <div class="form-group">
                    <label for="finish">Período de tiempo:</label>
                    <input type="text" class="form-control" id="finish" name="finish" required v-model="newItem.finish" placeholder="Ej. 2007 - 2013">
                </div>
                <div class="form-group">
                    <label for="description">Descripción general de la institucion y sus asignaturas:</label>
                    <textarea  rows="5" class="form-control" id="description" name="description" required v-model="newItem.description" style="" placeholder="Ej. La carrera cuenta con un giro para que los estudiantes sean capaces de crear secuencias de codigo para soluciones empresariales."></textarea>
                </div>
                <div>
                    <button class="btn btn-primary" @click.prevent="createItem()" style="float:left;">
                        <span class="glyphicon-plus"></span> ADD
                    </button>
                    <button class="btn btn-primary" @click.prevent="cancelEducation()" style="float:left;">
                        <span class="glyphicon-plus"></span> Cancelar
                    </button>
                </div>
            </template>
            <template v-for="item in items">
                <div class="col-sm-12 col-md-9">
                    <div class="education margin-b-50">
                        <h4><b>{{ item.position }}</b></h4>
                        <h5 class="font-yellow"><b>{{ item.institution }}</b></h5>
                        <h6 class="font-lite-black margin-t-10">{{ item.finish }}</h6>
                        <p class="margin-tb-30">{{ item.description }}</p>
                    </div><!-- experience -->

                    <div id="Ed_show-modal" @click="showModal=true; setVal(item)"  class="btn btn-info" >
                        <span class="lnr lnr-pencil"></span>
                    </div>
                    <div @click.prevent="deleteEducation(item)" class="btn btn-danger">
                        <span class="lnr lnr-trash"></span>
                    </div>

                </div><!-- col-sm-9 -->
            </template>
            <template v-if="!showField">
                <div>
                    <button @click.prevent="showField=true" class="btn btn-primary" style="float:left;">
                        <span class="glyphicon-plus"></span> Nuevo nivel de estudios
                    </button>
                </div>
            </template>
            <p class="text-center alert alert-danger"
                v-bind:class="{ hidden: hasError }">Please fill all fields!</p>
        </div>

        <div class="row" v-if="showModal" @close="showModal=false">
            <h3 slot="header">Editar Dependencia</h3>
            
            <div slot="body">
                <div class="form-group">
                    <label for="position">Posición que desarrolló:</label>
                    <input type="text" class="form-control" id="eE_position" name="position" required :value="this.editItem.position">
                </div>
                    <label>Nota: El nombre de la institucion no se puede cambiar, de ser asi favor de eliminar y volver a redactar todo.</label>
                    <input type="hidden" class="form-control" id="eE_institution" name="institution" :value="this.editItem.institution">
                <div class="form-group">
                    <label for="finish">Período de tiempo:</label>
                    <input type="text" class="form-control" id="eE_finish" name="finish" required :value="this.editItem.finish">
                </div>
                <div class="form-group">
                    <label for="description">Descripción general de la institucion y sus asignaturas::</label>
                    <textarea  rows="5" class="form-control" id="eE_description" name="description" required :value="this.editItem.description"></textarea>
                </div>
            </div>

            <div slot="footer">
                <button class="btn btn-default" @click="showModal = false; editItem={};">
                    Cancel
                </button>
                
                <button class="btn btn-info" @click="editEducation()">
                    Update
                </button>
            </div>
        </div>

    </div>
</template>

<script>
   export default {
        props: {
            email:String
        },
         data() {
            return { 
              items: [], //All work experience of user
              hasError: true, //Validate
              newItem: { 'user': '','position' : '','institution' : '','finish': '','description' : '' },
              showField: false,
              showModal: false,
              editItem: { 'user': '','position' : '','institution' : '','finish': '','description' : '' },
            }
        },
        mounted() {
            this.getVueItems();
            console.log('Component Education mounted.');      
        },
        methods: {
            createItem: function createItem() {
                var _this = this;
                this.newItem.user = this.email;
                var input = this.newItem;
            
                if (input['position'] == '' || input['institution'] == '' || input['finish'] == '' || input['description'] == '') {
                    this.hasError = false;
                } else {
                    this.hasError = true;
                    console.log('validado');
                    axios.post('/storeEducation', input).then(function (response) {
                    _this.newItem = { 'name': '' };
                    _this.getVueItems();
                    });
                }
            },
            cancelEducation: function () {
                this.showField=false;
                this.newItem.user = '';
                this.newItem.position = '';
                this.newItem.institution = '';
                this.newItem.finish = '';
                this.newItem.description = '';
            },
            getVueItems: function getVueItems() {
                var _this = this;
                axios.get('/getEducation',{
                    params: {
                        email: this.email
                        }
                    }).then(function (response) {
                    _this.items = response.data.education;
                    console.log(_this.items);
                });
            },
            setVal: function setVal(item) {
                this.editItem = item;
            },
            editEducation: function editEducation() {
                var position = document.getElementById('eE_position');
                var institucion = document.getElementById('eE_institution');
                var finish = document.getElementById('eE_finish');
                var description = document.getElementById('eE_description');
                if(position.value == "")
                    this.editItem.position = "No Definido";
                else
                    this.editItem.position = position.value;

                if(finish.value == "")
                    this.editItem.finish = "No Definido";
                else
                    this.editItem.finish = finish.value;

                if(description.value == "")
                    this.editItem.description = "No Definido";
                else
                    this.editItem.description = description.value;
                

                axios.post('/updateEducation',this.editItem
                )
                .then(response => {
                    this.getVueItems();
                    this.showModal=false;
                });   
            },
            deleteEducation: function deleteEducation(item) {
                axios.post('/deleteEducation',item)
                .then(response => {
                    this.getVueItems();
                    this.showModal=false;
                });
            }
        }
    }
</script>


<style>
.btnvue{
    background-color:#cacaca; 
    border-radius:5px;
}
.standard{
    line-height: 1; 
    float: center;
    font-size: 22px;
    padding: auto;
    margin: auto;
}
.liwx{
    display:-webkit-box;
}
</style>